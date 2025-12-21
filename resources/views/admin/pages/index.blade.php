<x-admin-layout title="All Pages">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-orange-600 mb-0">Content Pages</h4>
        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Page</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">Sr. No.</th> 
                            <th>Title</th>
                            <th>Slug (URL)</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pages as $page)
                        <tr>
                            <td class="ps-4 fw-bold text-secondary">{{ $loop->iteration }}</td>
                            <td class="fw-bold">{{ $page->title }}</td>
                            <td><code>/{{ $page->slug }}</code></td>
                            <td>
                                <span class="badge {{ $page->is_active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $page->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-outline-primary mb-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="d-inline-block delete-form">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger mb-1"><i class="fas fa-trash"></i></button>
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