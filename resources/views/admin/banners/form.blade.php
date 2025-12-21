<x-admin-layout title="{{ isset($banner) ? 'Edit Banner' : 'Create Banner' }}">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">{{ isset($banner) ? 'Edit Banner' : 'New Banner' }}</h5>
                </div>

                <div class="card-body">
                    <form
                        action="{{ isset($banner) ? route('admin.banners.update', $banner) : route('admin.banners.store') }}"
                        method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

                        @csrf
                        @if (isset($banner))
                            @method('PUT')
                        @endif

                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Banner Title <span
                                        class="text-muted small">(Optional)</span></label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', $banner->title ?? '') }}" placeholder="e.g. New Year Sale">
                                @error('title')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Banner Image <span class="text-danger">*</span></label>
                                <input type="file" name="image" class="form-control" accept="image/*"
                                    {{ isset($banner) ? '' : 'required' }}>
                                <div class="form-text text-muted">Recommended Size: 1920x600px (JPG, PNG, WEBP)</div>
                                @error('image')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror

                                @if (isset($banner) && $banner->image)
                                    <div class="mt-3 p-2 border rounded bg-light">
                                        <p class="small text-muted mb-2">Current Image:</p>
                                        <img src="{{ asset('storage/' . $banner->image) }}" class="img-fluid rounded"
                                            style="max-height: 150px;">
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control"
                                    value="{{ old('sort_order', $banner->sort_order ?? 0) }}" min="0">
                                <div class="form-text">Lower numbers appear first in the slider.</div>
                            </div>

                            {{-- Active Status Switch --}}
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="form-check form-switch mt-4">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                        id="isActive"
                                        {{ old('is_active', $banner->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold" for="isActive">Active Status</label>
                                </div>
                            </div>

                            <div class="col-12 text-end mt-4 pt-3 border-top">
                                <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary me-2">Cancel</a>
                                <button type="submit" class="btn btn-primary px-4">
                                    {{ isset($banner) ? 'Update Banner' : 'Create Banner' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
