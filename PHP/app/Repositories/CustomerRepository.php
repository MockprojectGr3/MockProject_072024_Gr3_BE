<?php

namespace App\Repositories;

use App\Dtos\Customer\ProfileRes;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CustomerRepository
{
    public function getAllCustomers()
    {
        return Customer::with('user')->get();
    }

    public function getCustomerById($id)
    {
        $query = DB::select("SELECT users.id AS user_id, address.id AS address_id, users.role, users.full_name, users.user_name, users.phone, users.email, users.password, users.gender, users.day_of_birth, customers.avatar, customers.bio
        FROM users
        JOIN customers ON users.id = customers.user_id
        JOIN address ON users.address_id = address.id
        WHERE users.role = 'customer' AND customers.id = ?", [$id]);

        if (empty($query)) {
            return null;
        }

        $result = $query[0];

        return new ProfileRes(
            $result->user_id,
            $result->address_id,
            $result->full_name,
            $result->user_name,
            $result->phone,
            $result->email,
            $result->password,
            $result->gender,
            new \DateTime($result->day_of_birth),
            $result->avatar,
            $result->bio
        );
    }

    public function updateProfile(Customer $customer, string $id)
    {
        try {
            // SQL query to update profile customer information
            $user_sql = "UPDATE users SET address_id = ?, full_name = ?, user_name = ?,  phone = ?, email = ?, password = ?, gender = ?, day_of_birth = ? WHERE id = ?";
            $customer_sql = "UPDATE customers SET avatar = ?, bio = ? WHERE user_id = ?";
    
            DB::update($user_sql, [
                $customer->address_id,
                $customer->user->full_name,
                $customer->user->user_name,
                $customer->user->phone,
                $customer->user->email,
                $customer->user->password,
                $customer->user->gender->getValue(),
                $customer->user->day_of_birth,
                $id
            ]);
    
            DB::update($customer_sql, [
                $customer->avatar,
                $customer->bio,
                $id
            ]);

            // Fetch the updated customer record
            return Customer::find($customer->id);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
