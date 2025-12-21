<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'address', 'message', 'interested_car_types'];

    protected function casts(): array
    {
        return [
            'interested_car_types' => 'array',
        ];
    }
}
