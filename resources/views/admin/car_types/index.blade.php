<x-admin-layout title="Car Types">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-orange-600 mb-0">Car Categories</h4>
        <a href="{{ route('admin.car_types.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Add Category
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">Sr. No.</th> 
                            <th>Icon</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carTypes as $type)
                        <tr>
                            <td class="ps-4 fw-bold text-secondary">{{ $loop->iteration }}</td>
                            <td>
                                @if($type->icon)
                                    <img src="{{ asset('storage/'.$type->icon) }}" width="40" class="rounded">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="fw-bold">{{ $type->name }}</td>
                            <td>
                                @if($type->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.car_types.edit', $type) }}" class="btn btn-sm btn-outline-primary mb-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.car_types.destroy', $type) }}" method="POST" class="d-inline-block delete-form">
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
        </div>
    </div>
</x-admin-layout>