<x-admin-layout title="Banners">
    <div class="d-flex justify-content-between mb-4">
        <h4>Homepage Banners</h4>
        <a href="{{ route('admin.banners.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Banner</a>
    </div>

    <div class="row">
        @foreach ($banners as $banner)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/' . $banner->image) }}" class="card-img-top"
                        style="height: 150px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $banner->title ?? 'No Title' }}</h5>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span
                                class="badge {{ $banner->is_active ? 'bg-success' : 'bg-secondary' }}">{{ $banner->is_active ? 'Active' : 'Inactive' }}</span>
                            <div>
                                <a href="{{ route('admin.banners.edit', $banner) }}"
                                    class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST"
                                    class="d-inline-block delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-admin-layout>
