<x-admin-layout title="{{ isset($car) ? 'Edit Car' : 'Add Car' }}">
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 text-orange-600">{{ isset($car) ? 'Edit Car Details' : 'Add New Car' }}</h5>
        </div>
        <div class="card-body p-4">
            <form action="{{ isset($car) ? route('admin.cars.update', $car) : route('admin.cars.store') }}" 
                  method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                @if(isset($car)) @method('PUT') @endif

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Car Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $car->name ?? '') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Car Types <span class="text-danger">*</span></label>
                        <select name="car_type_id" class="form-select" required>
                            <option value="">Select Car Types</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" {{ (old('car_type_id', $car->car_type_id ?? '') == $type->id) ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Condition <span class="text-danger">*</span></label>
                        <select name="condition" class="form-select" required>
                            <option value="new" {{ (old('condition', $car->condition ?? '') == 'new') ? 'selected' : '' }}>New Car</option>
                            <option value="used" {{ (old('condition', $car->condition ?? '') == 'used') ? 'selected' : '' }}>Used Car</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Price Range <span class="text-danger">*</span></label>
                        <input type="text" name="price_range" class="form-control" 
                               value="{{ old('price_range', $car->price_range ?? '') }}" 
                               placeholder="e.g. ₹ 10.50 - 15.00 Lakh" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Car Image</label>
                        <input type="file" name="image" class="form-control">
                        @if(isset($car) && $car->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$car->image) }}" width="80" class="rounded border">
                            </div>
                        @endif
                    </div>

                    <div class="col-md-6 d-flex align-items-center pt-4">
                        <div class="form-check me-3">
                            <input type="checkbox" name="is_most_searched" class="form-check-input" value="1" id="most_searched"
                                {{ old('is_most_searched', $car->is_most_searched ?? false) ? 'checked' : '' }}>
                            <label class="form-check-label" for="most_searched">Most Searched</label>
                        </div>
                        <div class="form-check me-3">
                            <input type="checkbox" name="is_latest" class="form-check-input" value="1" id="latest"
                                {{ old('is_latest', $car->is_latest ?? false) ? 'checked' : '' }}>
                            <label class="form-check-label" for="latest">Latest Launch</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="is_active" class="form-check-input" value="1" id="active"
                                {{ old('is_active', $car->is_active ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="active">Active</label>
                        </div>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <a href="{{ route('admin.cars.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Save Car</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>