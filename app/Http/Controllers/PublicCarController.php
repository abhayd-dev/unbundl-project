<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarType;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublicCarController extends Controller
{
    public function index(Request $request)
    {
        //active cars
        $query = Car::where('is_active', true)
            ->with('type');

        //filter by name
        if (!empty($request->search)) {
            $query->where('name', 'like', '%' . trim($request->search) . '%');
        }

        //filter by car type
        if (!empty($request->type)) {
            $query->whereHas('type', function ($q) use ($request) {
                $q->where('slug', $request->type);
            });
        }

        //filter by new/used
        if (in_array($request->condition, ['new', 'used'], true)) {
            $query->where('condition', $request->condition);
        }

        $cars = $query->latest()->paginate(12);

        //active car types
        $types = CarType::where('is_active', true)->get();

        return view('frontend.cars.index', compact('cars', 'types'));
    }

    public function show(Car $car)
    {
        //fetch car details where same car type
        $similarCars = Car::where('car_type_id', $car->car_type_id)
            ->where('id', '!=', $car->id)
            ->where('is_active', true)
            ->limit(4)
            ->get();

        return view('frontend.cars.show', compact('car', 'similarCars'));
    }

    public function downloadBrochure(Car $car)
    {
        //generate pdf brochure
        $pdf = Pdf::loadView('frontend.cars.brochure', compact('car'));

        return $pdf->download(
            Str::slug($car->name) . '-brochure.pdf'
        );
    }
}
