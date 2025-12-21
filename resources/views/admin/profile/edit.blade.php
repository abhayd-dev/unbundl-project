<x-admin-layout title="My Profile">
    <div class="row">
        <div class="col-md-8 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="mb-0 text-orange-600"><i class="fas fa-user-circle me-2"></i>Profile Information</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        
                        <div class="row g-3">
                            <div class="col-md-12 text-center mb-3">
                                <div class="position-relative d-inline-block">
                                    @if($user->profile)
                                        <img src="{{ asset('storage/'.$user->profile) }}" class="rounded-circle border border-3 border-light shadow" width="120" height="120" style="object-fit: cover;">
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ $user->name }}&background=f75d34&color=fff" class="rounded-circle shadow" width="120" height="120">
                                    @endif
                                    
                                    <label for="profile" class="position-absolute bottom-0 end-0 bg-white rounded-circle shadow p-2 cursor-pointer" style="cursor: pointer;">
                                        <i class="fas fa-camera text-primary"></i>
                                        <input type="file" name="profile" id="profile" class="d-none" accept="image/*">
                                    </label>
                                </div>
                                <div class="small text-muted mt-2">Click icon to change photo</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Full Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Email Address</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Phone Number</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}" placeholder="+91 98765...">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Role</label>
                                <input type="text" class="form-control bg-light" value="{{ ucfirst($user->role) }}" readonly disabled>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold">Address</label>
                                <textarea name="address" class="form-control" rows="2">{{ old('address', $user->address) }}</textarea>
                            </div>

                            <div class="col-12 text-end mt-3">
                                <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="mb-0 text-danger"><i class="fas fa-lock me-2"></i>Change Password</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.profile.password') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <input type="password" name="current_password" class="form-control" required>
                            @error('current_password', 'updatePassword')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control" required>
                            @error('password', 'updatePassword')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-danger">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>