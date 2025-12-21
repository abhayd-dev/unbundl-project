<x-guest-layout>
    <h5 class="text-center mb-2 fw-bold text-dark">Reset Password</h5>
    <p class="auth-subtitle mb-4">
        Enter your email address and we'll send you a link to reset your password.
    </p>

    <x-auth-session-status class="mb-3" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="form-label">Email Address</label>
            <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-envelope text-muted"></i></span>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email') }}" required autofocus placeholder="Enter your registered email">
            </div>
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">
                Send Password Reset Link
            </button>
            <a href="{{ route('login') }}" class="btn btn-light text-muted border">
                <i class="fas fa-arrow-left me-2"></i> Back to Login
            </a>
        </div>
    </form>
</x-guest-layout>