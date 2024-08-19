<?php

namespace App\Http\Controllers;

use App\Dtos\Customer\ProfileReq;
use App\Dtos\Customer\ProfileRes;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Repositories\CustomerRepository;

class CustomerControllers
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function updateProfile(Request $request, string $id)
    {    
        try {
            // Get customer information from the request
            $profileReq = new ProfileReq($request);

            //  Find the customer by ID
            $customer = Customer::find($id);

            // Check if customer exists
            if (!$customer) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Customer not found',
                ]);
            }

            // Update the existing customer object with the new information
            $customer->user->address_id = $profileReq->address_id;
            $customer->user->full_name = $profileReq->full_name;
            $customer->user->user_name = $profileReq->user_name;
            $customer->user->phone = $profileReq->phone;
            $customer->user->email = $profileReq->email;
            $customer->user->password = $profileReq->password;
            $customer->user->gender = $profileReq->gender;
            $customer->user->day_of_birth = $profileReq->day_of_birth;
            $customer->avatar = $profileReq->avatar;
            $customer->bio = $profileReq->bio;

            $customer->save();

            // Call the update method from the repository
            $updatedProfile = $this->customerRepository->updateProfile($customer, $id);

            // Prepare the response DTO
            $result = new ProfileRes(
                $updatedProfile->id,
                $updatedProfile->address_id,
                $updatedProfile->user->full_name,
                $updatedProfile->user->user_name,
                $updatedProfile->user->phone,
                $updatedProfile->user->email,
                $updatedProfile->user->password,
                $updatedProfile->user->gender->getValue(),
                new \DateTime($updatedProfile->user->day_of_birth),
                $updatedProfile->avatar,
                $updatedProfile->bio
            );
     
            return response()->json([
                'status' => 200,
                'message' => 'Profile updated successfully',
                'data' => $result
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Server error occurred',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function profileCustomer($id)
    {
        $customer = $this->customerRepository->getCustomerById($id);

        if (!$customer) {
            return response()->json([
                'status' => 404,
                'message' => 'Customer not found',
            ]);
        }
    
        // Access properties directly
        return response()->json([
            'status' => 200,
            'message' => 'Customer data retrieved successfully',
            'data' => [
                'id' => $customer->id,
                'address_id' => $customer->address_id,
                'full_name' => $customer->full_name,
                'user_name' => $customer->user_name,
                'phone' => $customer->phone,
                'email' => $customer->email,
                'password' => $customer->password,
                'gender' => $customer->gender,
                'day_of_birth' => $customer->day_of_birth->format('Y-m-d'),
                'avatar' => $customer->avatar,
                'bio' => $customer->bio,
            ],
        ]);
    }

    public function viewAllCustomers()
    {
        $customers = $this->customerRepository->getAllCustomers();

        if ($customers->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'customers not found',
                'data' => []
            ]);
        }

        $customerResponses = $customers->map(function ($customer) {
            return new ProfileRes(
                $customer->id,
                $customer->user->address_id,
                $customer->user->full_name,
                $customer->user->user_name,
                $customer->user->phone,
                $customer->user->email,
                $customer->user->password,
                $customer->user->gender->getValue(),
                new \DateTime($customer->user->day_of_birth),
                $customer->avatar,
                $customer->bio
            );
        });

        return response()->json([
            'status' => 200,
            'message' => 'View list of equipments successfully',
            'data' => $customerResponses
        ]);
    }
}
