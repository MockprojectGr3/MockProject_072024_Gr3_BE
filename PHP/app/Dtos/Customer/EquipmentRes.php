<?php

namespace App\Dtos\Customer;

class EquipmentRes
{
    public string $id;
    public string $image_id;
    public string $name;
    public \DateTime $broken_date;
    public string $description;
    public string $progress;
    public string $severity; 

    public function __construct(string $id, string $image_id, string $name, \DateTime $broken_date, string $description, string $progress, string $severity)
    {
        $this->id = $id;
        $this->image_id = $image_id;
        $this->name = $name;
        $this->broken_date = $broken_date;
        $this->description = $description;
        $this->progress = $progress;
        $this->severity = $severity;
    }
}