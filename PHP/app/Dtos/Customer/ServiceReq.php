<?php

namespace App\Dtos\Customer;

use App\Models\BaseModel;
use Illuminate\Http\Request;

class Service extends BaseModel
{
    public string $name;
    public string $description;
    public float $price;

    public function __construct(Request $req)
    {
        $data = [
            'name' => $req->input('name'),
            'description' => $req->input('description'),
            'price' => $req->input('price'),
        ];

        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->price = $data['price'];
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ];
    }
}
