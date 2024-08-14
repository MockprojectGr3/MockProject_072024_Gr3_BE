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

    // Get details of a service
    public function getDetailService($id)
    {
        return Service::find($id);
    }
}