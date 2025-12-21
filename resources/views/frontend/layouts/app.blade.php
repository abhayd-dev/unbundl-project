<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unbundl - Find Your Right Car</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('admin-assets/images/car.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3 text-orange" href="{{ url('/') }}">
                @if (isset($settings['website_logo']) && $settings['website_logo'])
                    <img src="{{ asset('storage/' . $settings['website_logo']) }}" alt="Logo"
                        style="max-height: 45px;">
                @else
                    {{ $settings['site_title'] ?? 'Unbundl' }}
                @endif
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link {{ request('condition') == 'new' ? 'text-orange' : '' }}"
                                href="{{ route('cars.index', ['condition' => 'new']) }}">
                                New Cars
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request('condition') == 'used' ? 'text-orange' : '' }}"
                                href="{{ route('cars.index', ['condition' => 'used']) }}">
                                Used Cars
                            </a>
                        </li>

                        @if (Auth::check())
                            <li class="nav-item ms-3">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark btn-sm">Admin
                                    Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item ms-3">
                                <a href="{{ route('login') }}" class="btn btn-outline-dark btn-sm">Admin Login</a>
                            </li>
                        @endif
                    </ul>
            </div>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <footer class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">Unbundl</h5>
                    <p class="text-secondary small">India's most trusted car search platform. Find the right car for
                        your journey.</p>
                </div>

                <div class="col-md-2 mb-4">
                    <h6 class="fw-bold mb-3">Overview</h6>
                    <ul class="list-unstyled small">
                        <li><a href="{{ route('pages.about') }}">About Us</a></li>
                    </ul>
                </div>

                <div class="col-md-3 mb-4">
                    <h6 class="fw-bold mb-3">Connect</h6>
                    <ul class="list-unstyled small">
                        <li><a href="{{ route('pages.contact') }}">Contact Us</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h6 class="fw-bold mb-3">Follow Us</h6>
                    <div class="d-flex gap-3 social-icons">
                        @if (!empty($settings['facebook_url']))
                            <a href="{{ $settings['facebook_url'] }}" target="_blank"><i
                                    class="fab fa-facebook fa-lg"></i></a>
                        @endif

                        @if (!empty($settings['twitter_url']))
                            <a href="{{ $settings['twitter_url'] }}" target="_blank"><i class="fab fa-x fa-lg"></i></a>
                        @endif

                        @if (!empty($settings['instagram_url']))
                            <a href="{{ $settings['instagram_url'] }}" target="_blank"><i
                                    class="fab fa-instagram fa-lg"></i></a>
                        @endif

                        @if (!empty($settings['youtube_url']))
                            <a href="{{ $settings['youtube_url'] }}" target="_blank"><i
                                    class="fab fa-youtube fa-lg"></i></a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="border-top border-secondary mt-4 pt-3 text-center small text-secondary">
                &copy; {{ date('Y') }} Unbundl Project. All rights reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                confirmButtonColor: '#f75d34'
            });
        </script>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        });
    </script>
</body>

</html>
