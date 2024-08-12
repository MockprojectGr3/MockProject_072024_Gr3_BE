<?php

namespace App\Http\Controllers;

use App\Dtos\Customer\ServiceRes;
use App\Repositories\ServiceRepository;

class ServiceController 
{
    private ServiceRepository $serviceRepository;

    public function __construct()
    {
        $this->serviceRepository = new ServiceRepository;
    }

    // Get all services
    public function viewAllServices()
    {
        try {
            $services = $this->serviceRepository->getAllServices();

            if ($services->isEmpty()) {
                return response()->json([
                    'status' => '404',
                    'message' => 'Services not found',
                    'data' => []
                ]);
            }

            $serviceResponses = $services->map(function ($service) {
                return new ServiceRes(
                    $service->id,
                    $service->name,
                    $service->description,
                    $service->price
                );
            });

            return response()->json([
                'status' => 200,
                'message' => 'View list of services successfully',
                'data' => $serviceResponses
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Server error occurred',
                'error' => $e->getMessage()
            ]);
        }
    }
}
