<?php

namespace App\Dtos\Customer;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileReq
{
    public ?string $id;
    public string $user_id;
    public string $address_id;
    public string $full_name;
    public string $user_name;
    public string $phone;
    public string $email;
    public string $password;
    public string $gender;
    public DateTime $day_of_birth;
    public ?string $avatar;
    public ?string $bio;

    public function __construct(Request $req)
    {
        $data = [
            'id' => $req->input('id'),
            'user_id' => $req->input('user_id'),
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

        $this->id = $data['id'];
        $this->user_id = $data['user_id'];
        $this->address_id = $data['address_id'];
        $this->full_name = $data['full_name'];
        $this->user_name = $data['user_name'];
        $this->phone = $data['phone'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->gender = $data['gender'];
        $this->day_of_birth = new DateTime($data['day_of_birth']);
        $this->avatar = $data['avatar'] ?? null;
        $this->bio = $data['bio'] ?? null;
    }
}