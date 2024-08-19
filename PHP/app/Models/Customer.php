<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
   
    protected $table = 'customers';

    protected $fillable = [
        'user_id',
        'avatar',
        'bio,'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function getUserId()
    {
        return $this->user_id;
    }
}
