<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $table = 'Contract';

    protected $primaryKey = 'id';

    protected $fillable = [
        'customer_id',
        'company_id',
        'address_id',
        'status',
        'start_date',
        'end_date',
        'price',
        'rating',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $dates = ['deleted_at'];

    public $timestamps = false;
}
