<?php

namespace App\Models;

enum Role
{
    case Admin;
    case Customer;
    case Staff;
    case BodyGuard;

    public function getValue(): string
    {
        return match ($this)
        {
            Role::Admin => 'Admin',
            Role::Customer => 'Customer',
            Role::Staff => 'Staff',
            Role::BodyGuard => 'BodyGuard',
        };
    }
}