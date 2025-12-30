<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        //fetch cars with their type and pagination
        $cars = Car::with('type')
            ->latest()
            ->paginate(10);

        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        //fetch only active car types
        $types = CarType::where('is_active', true)->get();

        return view('admin.cars.form', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'car_type_id'  => 'required|exists:car_types,id',
            'price_range'  => 'required|string',
            'condition' => 'required',
            'image'        => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $car = new Car();
        $car->name = $request->name;
        $car->car_type_id = $request->car_type_id;
        $car->price_range = $request->price_range;
        $car->condition = $request->condition;
        $car->is_most_searched = $request->has('is_most_searched');
        $car->is_latest = $request->has('is_latest');
        $car->is_active = $request->has('is_active');

        //upload car image
        if ($request->hasFile('image')) {
            $car->image = $request->file('image')->store('cars', 'public');
        }

        $car->save();

        return redirect()
            ->route('admin.cars.index')
            ->with('success', 'Car added successfully');
    }

    public function edit(Car $car)
    {
        $types = CarType::where('is_active', true)->get();

        return view('admin.cars.form', compact('car', 'types'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'car_type_id'  => 'required|exists:car_types,id',
            'price_range'  => 'required|string',
            'condition'    => 'required',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', //2 MB img
        ]);

        $car->name = $request->name;
        $car->car_type_id = $request->car_type_id;
        $car->price_range = $request->price_range;
        $car->is_most_searched = $request->has('is_most_searched');
        $car->condition = $request->condition;
        $car->is_latest = $request->has('is_latest');
        $car->is_active = $request->has('is_active');

        //delete old img
        if ($request->hasFile('image')) {

            if ($car->image && Storage::disk('public')->exists($car->image)) {
                Storage::disk('public')->delete($car->image);
            }

            $car->image = $request->file('image')->store('cars', 'public');
        }

        $car->save();

        return redirect()
            ->route('admin.cars.index')
            ->with('success', 'Car updated successfully');
    }

    public function destroy(Car $car)
    {
        //delete car img from storage
        if ($car->image && Storage::disk('public')->exists($car->image)) {
            Storage::disk('public')->delete($car->image);
        }

        $car->delete();

        return back()->with('success', 'Car deleted successfully');
    }
}
