<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends BaseModel
{
    use HasFactory;

    protected $table = 'users';

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
        'avatar',
        'bio',
    ]; 
    
    protected $casts = [
        'gender' => Gender::class,
    ];

}
