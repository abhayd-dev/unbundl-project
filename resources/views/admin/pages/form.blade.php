<x-admin-layout title="{{ isset($page) ? 'Edit Page' : 'Add Page' }}">
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 text-orange-600">{{ isset($page) ? 'Edit Page Content' : 'Add New Page' }}</h5>
        </div>
        <div class="card-body p-4">
            <form action="{{ isset($page) ? route('admin.pages.update', $page) : route('admin.pages.store') }}" 
                  method="POST" class="needs-validation" novalidate>
                @csrf
                @if(isset($page)) @method('PUT') @endif

                <div class="mb-3">
                    <label class="form-label fw-bold">Page Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $page->title ?? '') }}" required>
                    <div class="invalid-feedback">Page title is required.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Content <span class="text-danger">*</span></label>
                    <textarea name="content" id="summernote" class="form-control" required>{{ old('content', $page->content ?? '') }}</textarea>
                    <div class="invalid-feedback">Content is required.</div>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" value="1" id="is_active"
                            {{ old('is_active', $page->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                </div>

                <div class="text-end">
                    <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Save Page</button>
                </div>
            </form>
        </div>
    </div>

    @push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    @endpush

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Write your content here...',
                tabsize: 2,
                height: 350,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
    @endpush
</x-admin-layout>