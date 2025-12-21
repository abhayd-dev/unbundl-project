<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\CarType;
use App\Models\Car;

class HomeController extends Controller
{
    public function index()
    {
        //fetch active banners
        $banners = Banner::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        //fetch active car types
        $carTypes = CarType::where('is_active', true)->get();

        //fetch most searched cars
        $featuredCars = Car::where('is_active', true)
            ->where('is_most_searched', true)
            ->with('type')
            ->latest()
            ->take(8)
            ->get();

        //fetch latest cars
        $latestCars = Car::where('is_active', true)
            ->where('is_latest', true)
            ->with('type')
            ->latest()
            ->take(8)
            ->get();

        return view(
            'frontend.home',
            compact('banners', 'carTypes', 'featuredCars', 'latestCars')
        );
    }
}
