<header class="top-header">
    <div class="d-flex align-items-center">
        <button type="button" id="sidebarCollapse" class="btn d-md-none">
            <i class="fas fa-bars"></i>
        </button>
        <h5 class="m-0 text-muted d-none d-md-block">{{ $title ?? 'Admin Panel' }}</h5>
    </div>
    
    <div class="header-right dropdown user-dropdown">
        <a href="#" class="dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ Auth::user()->profile ? asset('storage/'.Auth::user()->profile) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&background=f75d34&color=fff' }}" 
                 alt="User" class="rounded-circle shadow-sm me-2" width="35" height="35" style="object-fit: cover;">
            <span class="d-none d-sm-inline">{{ Auth::user()->name }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="userDropdown">
            <li><h6 class="dropdown-header">Welcome, {{ Auth::user()->name }}!</h6></li>
            <li><a class="dropdown-item" href="{{ route('admin.profile.edit') }}"><i class="fas fa-user-circle me-2 text-muted"></i>My Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt me-2"></i>Logout</button>
                </form>
            </li>
        </ul>
    </div>
</header>