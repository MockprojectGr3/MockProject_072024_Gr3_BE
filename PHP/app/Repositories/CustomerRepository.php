<?php

namespace App\Repositories;

use App\Dtos\Customer\ProfileRes;
use App\Models\Customer;
use App\Models\Role;
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

    public function updateProfile(User $user, Customer $customer, string $id)
    {
        // SQL query to update profile customer information
        $user_sql = "UPDATE users SET address_id = ?, full_name = ?, user_name = ?,  phone = ?, email = ?, password = ?, gender = ?, day_of_birth = ? WHERE id = ?";
        $customer_sql = "UPDATE customers SET avatar = ?, bio = ? WHERE user_id = ?";

        DB::update($user_sql, [
            $user->getAddressId(),
            $user->getFullName(),
            $user->getUserName(),
            $user->getPhone(),
            $user->getEmail(),
            $user->getPassword(),
            $user->getGender(),
            $user->getDayOfBirth(),
            $customer->user_id
        ]);
        
        DB::update($customer_sql, [
            $customer->getAvatar(),
            $customer->getBio(),
            $customer->getUserId(),
            $id,
        ]);

        $newInformationCustomer = DB::selectOne("SELECT * FROM customers WHERE id = ?", [$id]);

        $newInformationUser = DB::selectOne("SELECT * FROM users WHERE id = ?", [$newInformationCustomer->user_id]);

        return new Customer([
            'user_id' => $newInformationCustomer->user_id,
            'avatar' => $newInformationCustomer->avatar,
            'bio' => $customer->getBio(),
            new User([
                'role' => Role::Customer->getValue(),
                'address_id' => $newInformationUser->address_id,
                'full_name' => $newInformationUser->full_name,
                'user_name' => $newInformationUser->user_name,
                'phone' => $newInformationUser->phone,
                'email' => $newInformationUser->email,
                'password' => $newInformationUser->password,
                'gender' => $newInformationUser->gender,
                'day_of_birth' => $newInformationUser->day_of_birth,
            ])
        ]);
    }
}
