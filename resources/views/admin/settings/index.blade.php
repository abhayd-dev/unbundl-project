<x-admin-layout title="Settings">
    <div class="container-fluid">
        
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 text-orange-600"><i class="fas fa-cogs me-2"></i>General Settings</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Site Title <span class="text-danger">*</span></label>
                            <input type="text" name="site_title" class="form-control" value="{{ $settings['site_title'] ?? 'Unbundl' }}" required>
                            <div class="invalid-feedback">Site Title is required.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact Phone <span class="text-danger">*</span></label>
                            <input type="text" name="contact_phone" class="form-control" value="{{ $settings['contact_phone'] ?? '' }}" required>
                             <div class="invalid-feedback">Contact Phone is required.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact Email <span class="text-danger">*</span></label>
                            <input type="email" name="contact_email" class="form-control" value="{{ $settings['contact_email'] ?? '' }}" required>
                             <div class="invalid-feedback">Valid Email is required.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Footer Text</label>
                            <input type="text" name="footer_text" class="form-control" value="{{ $settings['footer_text'] ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 text-orange-600"><i class="fas fa-images me-2"></i>Logo Settings</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Website Logo (Frontend)</label>
                            <input type="file" name="website_logo" class="form-control">
                            <div class="form-text">Recommended size: 180x50px (PNG/JPG)</div>
                            @if(isset($settings['website_logo']))
                                <div class="mt-2 p-2 border rounded bg-light d-inline-block">
                                    <img src="{{ asset('storage/'.$settings['website_logo']) }}" height="40" alt="Website Logo">
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Admin Panel Logo</label>
                            <input type="file" name="admin_logo" class="form-control">
                            <div class="form-text">Recommended size: 150x40px (PNG/JPG)</div>
                            @if(isset($settings['admin_logo']))
                                <div class="mt-2 p-2 border rounded bg-dark d-inline-block">
                                    <img src="{{ asset('storage/'.$settings['admin_logo']) }}" height="40" alt="Admin Logo">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 text-orange-600"><i class="fas fa-share-alt me-2"></i>Social Media Links</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Facebook URL</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
                                <input type="url" name="facebook_url" class="form-control" value="{{ $settings['facebook_url'] ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Twitter (X) URL</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                <input type="url" name="twitter_url" class="form-control" value="{{ $settings['twitter_url'] ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Instagram URL</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                <input type="url" name="instagram_url" class="form-control" value="{{ $settings['instagram_url'] ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">YouTube URL</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                                <input type="url" name="youtube_url" class="form-control" value="{{ $settings['youtube_url'] ?? '' }}">
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer bg-white text-end">
                    <button type="submit" class="btn btn-primary">Save Settings</button>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>