<?php

namespace App\Dtos\Customer;

use DateTime;

class ProfileRes
{
    public string $id;
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

    public function __construct(string $id, string $address_id, string $full_name, string $user_name, string $phone, string $email, string $password, string $gender, DateTime $day_of_birth, string $avatar, string $bio)
    {
        $this->id = $id;
        $this->address_id = $address_id;
        $this->full_name = $full_name;
        $this->user_name = $user_name;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
        $this->gender = $gender;
        $this->day_of_birth = $day_of_birth;
        $this->avatar = $avatar;
        $this->bio = $bio;
    }
}