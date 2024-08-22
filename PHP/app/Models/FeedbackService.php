<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackService extends Model
{
    use HasFactory;
    
    protected $table = 'FeedbackService';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'user_id', 
        'service_id', 
        'content', 
        'created_at', 
        'deleted_at'
    ];
    
    protected $dates = ['deleted_at'];
    
    public $timestamps = false;
    
    const CREATED_AT = 'created_at';
    const DELETED_AT = 'deleted_at';
}
