<nav id="sidebar">
    <div class="sidebar-brand d-flex align-items-center justify-content-center py-3 border-bottom">
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-white h4 mb-0">
            @if (isset($settings['admin_logo']) && $settings['admin_logo'])
                <img src="{{ asset('storage/' . $settings['admin_logo']) }}" alt="Admin Logo"
                    style="max-height: 40px; max-width: 100%;">
            @else
                {{ $settings['site_title'] ?? 'Unbundl Admin' }}
            @endif
        </a>
    </div>

    <div class="sidebar-menu">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.car_types.*') ? 'active' : '' }}"
                    href="{{ route('admin.car_types.index') }}">
                    <i class="fas fa-list"></i> Car Types
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.cars.*') ? 'active' : '' }}"
                    href="{{ route('admin.cars.index') }}">
                    <i class="fas fa-car"></i> Cars Management
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.banners.*') ? 'active' : '' }}"
                    href="{{ route('admin.banners.index') }}">
                    <i class="fas fa-images"></i> Banners
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.leads.*') ? 'active' : '' }}"
                    href="{{ route('admin.leads.index') }}">
                    <i class="fas fa-users"></i> User Leads
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}"
                    href="{{ route('admin.pages.index') }}">
                    <i class="fas fa-file-alt me-2"></i> Pages
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}"
                    href="{{ route('admin.settings.index') }}">
                    <i class="fas fa-cogs"></i> Settings
                </a>
            </li>
        </ul>
    </div>
</nav>
