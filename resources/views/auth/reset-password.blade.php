<x-guest-layout>
    <h5 class="text-center mb-2 fw-bold text-dark">Set New Password</h5>
    <p class="auth-subtitle mb-4">Please create a new password for your account.</p>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input id="email" type="email" class="form-control" name="email" 
                   value="{{ old('email', $request->email) }}" required autofocus readonly>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-lock text-muted"></i></span>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                       name="password" required autocomplete="new-password" placeholder="Enter new password">
            </div>
            @error('password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <div class="input-group">
                <span class="input-group-text bg-light"><i class="fas fa-lock text-muted"></i></span>
                <input id="password_confirmation" type="password" class="form-control" 
                       name="password_confirmation" required autocomplete="new-password" placeholder="Confirm new password">
            </div>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">
                Reset Password
            </button>
        </div>
    </form>
</x-guest-layout>