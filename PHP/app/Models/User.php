<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // private string $user_id;
    // private Role $role;
    // private string $address_id;
    // private string $full_name;
    // private string $user_name;
    // private string $phone;
    // private string $email;
    // private string $password;
    // private string $gender;
    // private DateTime $day_of_birth;

    // public function __construct(
    //     Role $role,
    //     string $address_id,
    //     string $full_name,
    //     string $user_name,
    //     string $phone,
    //     string $email,
    //     string $password,
    //     string $gender,
    //     DateTime $day_of_birth,
    // ) {
    //     parent::__construct();
    //     $this->role = $role;
    //     $this->address_id = $address_id;
    //     $this->full_name = $full_name;
    //     $this->user_name = $user_name;
    //     $this->phone = $phone;
    //     $this->email = $email;
    //     $this->password = $password;
    //     $this->gender = $gender;
    //     $this->day_of_birth = $day_of_birth;
    // }

    use HasFactory;

    protected $fillable = [
        'id',
        'role',
        'address_id',
        'full_name',
        'user_name',
        'phone',
        'email',
        'password',
        'gender',
        'day_of_birth',
    ];

    protected $casts = [
        'day_of_birth' => 'datetime',
        'role' => Role::class,
    ];
    public function getRoleName(): string
    {
        return $this->role->getValue(); 
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
   
    public function getRole(): Role
    {
        return $this->role;
    }

    public function getAddressId(): string
    {
        return $this->address_id;
    }

    public function getFullName(): string
    {
        return $this->full_name;
    }

    public function getUserName(): string
    {
        return $this->user_name;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getDayOfBirth(): DateTime
    {
        return $this->day_of_birth;
    }
}