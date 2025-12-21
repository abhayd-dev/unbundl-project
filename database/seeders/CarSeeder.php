<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\CarType;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $hatchback = CarType::where('slug', 'hatchback')->first()->id;
        $suv = CarType::where('slug', 'suv')->first()->id;
        $sedan = CarType::where('slug', 'sedan')->first()->id;
        $ev = CarType::where('slug', 'electric')->first()->id;

        $cars = [
            [
                'car_type_id' => $hatchback,
                'name' => 'Maruti Swift',
                'price_range' => '₹ 6.49 - 9.64 Lakh*',
                'image' => 'cars/swift.jpg',
                'is_most_searched' => true,
                'is_latest' => false,
            ],
            [
                'car_type_id' => $suv,
                'name' => 'Hyundai Creta',
                'price_range' => '₹ 11.00 - 17.20 Lakh*',
                'image' => 'cars/creta.jpg',
                'is_most_searched' => true,
                'is_latest' => true,
            ],
            [
                'car_type_id' => $suv,
                'name' => 'Tata Nexon',
                'price_range' => '₹ 8.10 - 15.50 Lakh*',
                'image' => 'cars/nexon.jpg',
                'is_most_searched' => true,
                'is_latest' => false,
            ],
            [
                'car_type_id' => $sedan,
                'name' => 'Honda City',
                'price_range' => '₹ 11.49 - 20.39 Lakh*',
                'image' => 'cars/city.jpg',
                'is_most_searched' => false,
                'is_latest' => false,
            ],
            [
                'car_type_id' => $ev,
                'name' => 'Tata Tiago EV',
                'price_range' => '₹ 8.69 - 12.04 Lakh*',
                'image' => 'cars/tiago_ev.jpg',
                'is_most_searched' => false,
                'is_latest' => true,
            ],
            [
                'car_type_id' => $suv,
                'name' => 'Mahindra Thar',
                'price_range' => '₹ 11.25 - 17.60 Lakh*',
                'image' => 'cars/thar.jpg',
                'is_most_searched' => true,
                'is_latest' => false,
            ],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}