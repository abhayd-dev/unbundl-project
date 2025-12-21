<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarType;
use Illuminate\Support\Str;

class CarTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = ['Hatchback', 'SUV', 'MUV', 'Luxury', 'Electric'];

        foreach ($types as $type) {
            CarType::create([
                'name' => $type,
                'slug' => Str::slug($type),
                'is_active' => true,
            ]);
        }
    }
}
