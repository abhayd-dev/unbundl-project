<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CarTypeController extends Controller
{
    public function index()
    {
        //fetch all car types with pagination
        $carTypes = CarType::latest()->paginate(10);

        return view('admin.car_types.index', compact('carTypes'));
    }

    public function create()
    {
        return view('admin.car_types.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:car_types,name',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048', //2 MB img
        ]);

        $carType = new CarType();
        $carType->name = $request->name;
        $carType->slug = Str::slug($request->name);
        $carType->is_active = $request->has('is_active');

        //upload icon if provided
        if ($request->hasFile('icon')) {
            $carType->icon = $request->file('icon')->store('car_types', 'public');
        }

        $carType->save();

        return redirect()
            ->route('admin.car_types.index')
            ->with('success', 'Car Type created successfully.');
    }

    public function edit(CarType $carType)
    {
        return view('admin.car_types.form', compact('carType'));
    }

    public function update(Request $request, CarType $carType)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:car_types,name,' . $carType->id,
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
        ]);

        $carType->name = $request->name;
        $carType->slug = Str::slug($request->name);
        $carType->is_active = $request->has('is_active');

        //delete old icon if new icon upload
        if ($request->hasFile('icon')) {

            if ($carType->icon && Storage::disk('public')->exists($carType->icon)) {
                Storage::disk('public')->delete($carType->icon);
            }

            $carType->icon = $request->file('icon')->store('car_types', 'public');
        }

        $carType->save();

        return redirect()
            ->route('admin.car_types.index')
            ->with('success', 'Car Type updated successfully.');
    }

    public function destroy(CarType $carType)
    {
        //delete icon from storage folder if exists
        if ($carType->icon && Storage::disk('public')->exists($carType->icon)) {
            Storage::disk('public')->delete($carType->icon);
        }

        $carType->delete();

        return redirect()
            ->route('admin.car_types.index')
            ->with('success', 'Car Type deleted successfully.');
    }
}
