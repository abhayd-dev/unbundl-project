<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Lead;
use App\Models\CarType;

class DashboardController extends Controller
{
    public function index()
    {
        //prepare dashboard stats
        $stats = [
            'total_cars'   => Car::count(),
            'total_leads'  => Lead::count(),
            'total_types'  => CarType::count(),
            'recent_leads' => Lead::latest()->limit(5)->get(),
        ];

        return view('dashboard', compact('stats'));
    }
}
