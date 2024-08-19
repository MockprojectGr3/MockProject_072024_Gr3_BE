<?php

namespace App\Models;

enum Gender: string
{
    case Male = 'male';
    case Female = 'female';

    public function getValue(): string
    {
        return match($this) {
            Gender::Male => 'Male',
            Gender::Female => 'Female',
        };
    }
}