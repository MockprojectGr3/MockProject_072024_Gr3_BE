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
            // Fetch all auctions from the repository
            $services = $this->serviceRepository->getAllServices();

            // Check if the collection is empty
            if ($services->isEmpty()) {
                return response()->json([
                    'status' => 404,
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

    // Get detail information services
    public function viewDetailServices($id)
    {
        try {
            $service = $this->serviceRepository->getDetailService($id);

            if (!$service) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Service not found',
                    'data' => null
                ]);
            }

            // Transform the service data into response DTO
            $serviceResponses = new ServiceRes(
                $service->id,
                $service->name,
                $service->description,
                $service->price
            );

            return response()->json([
                'status' => '200',
                'message' => 'Successfully view service details',
                'data' => $serviceResponses
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => '500',
                'message' => 'Service error occurred',
                'error' => $e->getMessage()
            ]);
        }
    }
}
