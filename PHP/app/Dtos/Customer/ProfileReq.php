<?php

namespace App\Dtos\Customer;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileReq
{
    public string $address_id;
    public string $full_name;
    public string $user_name;
    public string $phone;
    public string $email;
    public string $password;
    public string $gender;
    public DateTime $day_of_birth;
    public string $avatar;
    public string $bio;

    public function __construct(Request $req)
    {
        $data = [
            'address_id' => $req->input('address_id'),
            'full_name' => $req->input('full_name'),
            'user_name' => $req->input('user_name'),
            'phone' => $req->input('phone'),
            'email' => $req->input('email'),
            'password' => $req->input('password'),
            'gender' => $req->input('gender'),
            'day_of_birth' => $req->input('day_of_birth'),
            'avatar' => $req->input('avatar'),
            'bio' => $req->input('bio'),
        ];

        $validator = Validator::make($data, $this->rules());

        if ($validator->fails()) {
            // throw new \Exception("Validation failed", 400);
            $errors = $validator->errors()->all();
            throw new \Exception("Validation failed: " . implode(', ', $errors), 400);
        }

        $this->address_id = $data['address_id'];
        $this->full_name = $data['full_name'];
        $this->user_name = $data['user_name'];
        $this->phone = $data['phone'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->gender = $data['gender'];

        // Convert day_of_birth to DateTime object
        $this->day_of_birth = new DateTime($data['day_of_birth']);
        
        $this->avatar = $data['avatar'];
        $this->bio = $data['bio'];
    }

    public function rules()
    {
        return [
            'address_id' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            'gender' => 'required|string|in:male,female',
            'day_of_birth' => 'required|date', 
            'avatar' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:500',
        ];
    }
}