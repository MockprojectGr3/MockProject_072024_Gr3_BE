<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'Customer';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'avatar',
        'bio',
        'deleted_at'
    ];

    protected $dates = ['deleted_at'];

    public $timestamps = false;
        'bio'
    ];

    // No need for a custom constructor

    public function getUserId(): string 
    {
        return $this->user_id;
    }

    public function getAvatar(): string
    {
        return $this->avatar;
    }

    public function getBio(): string
    {
        return $this->bio;
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}