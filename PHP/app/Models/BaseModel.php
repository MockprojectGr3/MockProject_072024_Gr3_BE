<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

abstract class BaseModel extends Model
{
    protected $dateFormat = 'Y-m-d H:i:s';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Check if ID does not exist, then generate a new ID
        if (!isset($this->id)) {
            $this->id = $this->generateId();
        }
    }

    /**
     * Generate a unique ID based on the current date and time
     */
    protected function generateId(): string
    {
        return now()->format('YmdHis') . Str::random(8);
    }

    /**
     * Convert createdAt attribute to the desired format
     */
    public function getCreatedAtAttribute($value): string
    {
        return (new DateTime($value))->format('Y-m-d');
    }

    /**
     * Convert updatedAt attribute to the desired format
     */
    public function getUpdatedAtAttribute($value): string
    {
        return (new DateTime($value))->format('Y-m-d');
    }
}