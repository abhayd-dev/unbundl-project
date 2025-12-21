<x-admin-layout title="{{ isset($carType) ? 'Edit Car Type' : 'Add Car Type' }}">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">{{ isset($carType) ? 'Edit Category' : 'New Category' }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ isset($carType) ? route('admin.car_types.update', $carType) : route('admin.car_types.store') }}" 
                          method="POST" 
                          enctype="multipart/form-data" 
                          class="needs-validation" 
                          novalidate>
                        
                        @csrf
                        @if(isset($carType)) @method('PUT') @endif

                        <div class="mb-3">
                            <label class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $carType->name ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Icon / Logo</label>
                            <input type="file" name="icon" class="form-control" accept="image/*">
                            @if(isset($carType) && $carType->icon)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/'.$carType->icon) }}" width="50" class="rounded border p-1">
                                </div>
                            @endif
                        </div>

                        <div class="form-check form-switch mb-4">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="activeStatus" 
                                {{ old('is_active', $carType->is_active ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="activeStatus">Active Status</label>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('admin.car_types.index') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>