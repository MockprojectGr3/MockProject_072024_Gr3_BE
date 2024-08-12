<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = "Service";
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'id', 'company_id', 'name', 'description', 'price', 'delete_at'
    ];
    public function serviceCompany(){
        return $this ->belongsTo(ServiceCompany::class, 'company_id', 'id');
    }

}
