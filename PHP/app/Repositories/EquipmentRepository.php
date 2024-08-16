<?php

namespace App\Repositories;

use App\Models\Equipment;

class EquipmentRepository
{
    // Get all equipment
    public function getAllEquiment()
    {
        return Equipment::all();
    }
}