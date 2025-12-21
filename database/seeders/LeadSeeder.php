<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lead;

class LeadSeeder extends Seeder
{
    public function run(): void
    {
        $leads = [
            [
                'name' => 'Rahul Sharma',
                'phone' => '9876543210',
                'email' => 'rahul@example.com',
                'address' => 'Sector 62, Noida, UP',
                'interested_car_types' => ['SUV', 'Sedan'],
            ],
            [
                'name' => 'Priya Verma',
                'phone' => '8765432109',
                'email' => 'priya@example.com',
                'address' => 'Indiranagar, Bangalore',
                'interested_car_types' => ['Hatchback'],
            ],
            [
                'name' => 'Amit Singh',
                'phone' => '7654321098',
                'email' => 'amit@example.com',
                'address' => 'Andheri West, Mumbai',
                'interested_car_types' => ['Luxury', 'SUV'],
            ],
        ];

        foreach ($leads as $lead) {
            Lead::create($lead);
        }
    }
}
