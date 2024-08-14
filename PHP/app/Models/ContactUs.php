<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $table = 'Feedback';
    protected $primaryKey = 'id';
    protected $fillable = [
        'content', 'first_name', 'last_name', 'email', 'createdAt', 'deleted_at'
    ];
    protected $dates = ['deleted_at'];
    const CREATED_AT = 'createdAt';
    const DELETED_AT = 'deleted_at';
    public $timestamps = false;
}
