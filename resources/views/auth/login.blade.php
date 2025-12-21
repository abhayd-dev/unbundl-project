<x-guest-layout>
    <p class="auth-subtitle">Welcome back! Please login to your account.</p>

    <x-auth-session-status class="mb-3" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
            <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-envelope text-muted"></i></span>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email') }}" required autofocus placeholder="admin@example.com">
                <div class="invalid-feedback">Please enter your email.</div>
            </div>
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
            <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-lock text-muted"></i></span>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                       name="password" required autocomplete="current-password" placeholder="••••••••">
                <div class="invalid-feedback">Please enter your password.</div>
            </div>
            @error('password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label for="remember_me" class="form-check-label text-muted small">Remember me</label>
            </div>
            
            @if (Route::has('password.request'))
                <a class="small text-orange fw-semibold" href="{{ route('password.request') }}">
                    Forgot Password?
                </a>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">
            Sign In <i class="fas fa-arrow-right ms-2"></i>
        </button>
    </form>
</x-guest-layout>