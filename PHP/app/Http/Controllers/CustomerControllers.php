<?php

namespace App\Http\Controllers;

use App\Dtos\Customer\ProfileReq;
use App\Dtos\Customer\ProfileRes;
use App\Models\Customer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\CustomerRepository;

class CustomerControllers
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
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
                $customer->user->gender,
                new \DateTime($customer->user->day_of_birth),
                $customer->avatar,
                $customer->bio
            );
        });

        return response()->json([
            'status' => 200,
            'message' => 'View list of customers successfully',
            'data' => $customerResponses
        ]);
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
                'user_id' => $customer->id,
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

    public function updateProfile(Request $request, string $id)
    {    
        try {
            // Get customer information from the request
            $profileReq = new ProfileReq($request);

            $customer = User::find($id);
            if ($customer === null) {
                return response()->json(['error' => 'User not found'], 404);
            }

            $user = new User([
                'role' => Role::Customer->getValue(),
                'address_id' => $profileReq->address_id,
                'full_name' => $profileReq->full_name,
                'user_name' => $profileReq->user_name,
                'phone' => $profileReq->phone,
                'email' => $profileReq->email,
                'password' => $profileReq->password,
                'gender' => $profileReq->gender,
                'day_of_birth' => $profileReq->day_of_birth
            ]);

            $customer = new Customer([
                'id' => $profileReq->id,
                'avatar' => $profileReq->avatar,
                'bio' => $profileReq->bio
            ]);

            // Call the update method from the repository
            $updatedProfile = $this->customerRepository->updateProfile($user, $customer, $id);

            // Prepare the response DTO
            $result = new ProfileRes(
                $updatedProfile->getUserId(),
                $updatedProfile->user->getAddressId(),
                $updatedProfile->user->getFullName(),
                $updatedProfile->user->getUserName(),
                $updatedProfile->user->getPhone(),
                $updatedProfile->user->getEmail(),
                $updatedProfile->user->getPassword(),
                $updatedProfile->user->getGender(),
                $updatedProfile->user->getDayOfBirth(),
                $updatedProfile->getAvatar(),
                $updatedProfile->getBio()
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
}
