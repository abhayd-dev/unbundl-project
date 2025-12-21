<x-admin-layout title="All Cars">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-orange-600 mb-0">Cars Management</h4>
        <a href="{{ route('admin.cars.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Add New Car
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">Sr. No.</th> 
                            <th>Image</th>
                            <th>Car Name</th>
                            <th>Category</th>
                            <th>Price Range</th>
                            <th>Condition</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cars as $car)
                        <tr>
                            <td class="ps-4 fw-bold text-secondary">
                                {{ $cars->firstItem() + $loop->index }}
                            </td>
                            <td>
                                @if($car->image)
                                    <img src="{{ asset('storage/'.$car->image) }}" width="50" height="35" class="rounded object-fit-cover">
                                @else
                                    <span class="badge bg-secondary">No Img</span>
                                @endif
                            </td>
                            <td class="fw-bold">{{ $car->name }}</td>
                            <td><span class="badge bg-light text-dark border">{{ $car->type->name }}</span></td>
                            <td>{{ $car->price_range }}</td>
                            <td>
                                @if($car->condition == 'new')
                                    <span class="badge bg-success">New</span>
                                @else
                                    <span class="badge bg-warning text-dark">Used</span>
                                @endif
                            </td>
                            <td>
                                @if($car->is_active)
                                    <span class="badge bg-success"><i class="fas fa-check"></i> Active</span>
                                @else
                                    <span class="badge bg-danger"><i class="fas fa-times"></i> Inactive</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.cars.edit', $car) }}" class="btn btn-sm btn-outline-primary mb-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.cars.destroy', $car) }}" method="POST" class="d-inline-block delete-form">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger mb-1">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-3">
                {{ $cars->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>