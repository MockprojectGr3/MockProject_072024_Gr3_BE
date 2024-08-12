<?php

namespace App\Repositories;

use App\Models\Service;

class ServiceRepository
{
    // Get all services
    public function getAllServices()
    {
        return Service::all();
    }
}