<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    protected $fillable = [
        'car_type_id', 
        'name', 
        'price_range', 
        'image', 
        'is_most_searched', 
        'is_latest', 
        'is_active',
        'condition',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(CarType::class, 'car_type_id');
    }
}