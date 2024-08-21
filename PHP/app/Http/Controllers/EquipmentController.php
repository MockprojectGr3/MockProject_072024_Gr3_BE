<?php

namespace App\Http\Controllers;

use App\Dtos\Customer\EquipmentRes;
use App\Repositories\EquipmentRepository;

class EquipmentController 
{
    private EquipmentRepository $equipmentRepository;

    public function __construct()
    {
        $this->equipmentRepository = new EquipmentRepository;
    }

    // Get all equipments
    public function viewAllEquipments()
    {
        try {
            $equipments = $this->equipmentRepository->getAllEquiment();

            if ($equipments->isEmpty()) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Equipments not found',
                    'data' => []
                ]);
            }

            $equipmentResponses = $equipments->map(function ($equipment) {
                return new EquipmentRes(
                    $equipment->id,
                    $equipment->image_id,
                    $equipment->name,
                    $equipment->broken_date,
                    $equipment->description,
                    $equipment->progress,
                    $equipment->severity
                );
            });

            return response()->json([
                'status' => 200,
                'message' => 'View list of equipments successfully',
                'data' => $equipmentResponses
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