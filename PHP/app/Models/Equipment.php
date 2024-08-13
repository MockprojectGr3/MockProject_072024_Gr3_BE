<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipments';

    protected $fillable = [
        'id',
        'image_id',
        'name',
        'broken_date',
        'description',
        'progress',
        'severity'
    ]; 

    protected $casts = [
        'broken_date' => 'datetime',
    ];

    // Optionally, define the relationships
    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}