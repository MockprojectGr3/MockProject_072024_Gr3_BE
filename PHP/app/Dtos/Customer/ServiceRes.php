<?php

namespace App\Dtos\Customer;

class ServiceRes
{
    public string $id;
    public string $name;
    public string $description;
    public float $price;

    public function __construct(string $id, string $name, string $description, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
}
