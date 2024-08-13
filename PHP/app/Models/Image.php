<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    public $timestamps = true; 
    
    protected $fillable = [
        'id', 
        'url'
    ];
}