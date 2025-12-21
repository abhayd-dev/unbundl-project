<x-frontend.app-layout>

    @if ($banners->count() > 0)
        <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($banners as $index => $banner)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $banner->image) }}" class="d-block w-100"
                            alt="{{ $banner->title }}" style="height: 500px; object-fit: cover;">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    @endif

    <div class="container mb-5">

        <div class="bg-white p-4 shadow-sm search-box">
            <h4 class="fw-bold mb-3">Find your right car</h4>

            <form action="{{ route('cars.index') }}" method="GET">
                <div class="row g-2 align-items-center">

                    <div class="col-md-4">
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="condition" value="new"
                                    id="newCar" checked>
                                <label class="form-check-label fw-bold" for="newCar">New Car</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="condition" value="used"
                                    id="usedCar">
                                <label class="form-check-label text-muted" for="usedCar">Used Car</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control border-end-0 py-2"
                                placeholder="Search by car name, e.g. Thar">
                            <button type="submit" class="btn btn-orange px-4"><i class="fas fa-search"></i>
                                Search</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        <div class="my-5">
            <h3 class="section-title">Browse By Category</h3>
            <div class="category-scroll-container">
                @foreach ($carTypes as $type)
                    <a href="{{ route('cars.index', ['type' => $type->slug]) }}" class="category-item">
                        <div class="category-icon">
                            @if ($type->icon)
                                <img src="{{ asset('storage/' . $type->icon) }}" width="35">
                            @else
                                <i class="fas fa-car fa-lg"></i>
                            @endif
                        </div>
                        <span class="small fw-bold">{{ $type->name }}</span>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="mb-5">
            <h3 class="section-title">The Most Searched Cars</h3>
            <div class="row g-4">
                @foreach ($featuredCars as $car)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="car-card">
                            <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}">
                            <div class="car-details">
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $car->name }}</h6>
                                    <div class="text-orange fw-bold small">{{ $car->price_range }}</div>
                                </div>
                                <a href="{{ route('cars.show', $car) }}"
                                    class="btn btn-outline-dark btn-sm w-100 rounded-pill mt-3">Check Offers</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg-white p-4 p-md-5 rounded shadow-sm text-center mb-5 border lead-form-section">
            <h3 class="fw-bold mb-2">Can't decide which car to buy?</h3>
            <p class="text-muted mb-4">Get expert advice tailored to your needs.</p>

            <form action="{{ route('leads.store') }}" method="POST"
                class="row g-3 justify-content-center text-start needs-validation" novalidate>
                @csrf
                <div class="col-md-4">
                    <label class="form-label fw-bold small d-md-none">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control bg-light" placeholder="Your Name" required>
                    <div class="invalid-feedback">Name required.</div>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold small d-md-none">Phone <span class="text-danger">*</span></label>
                    <input type="text" name="phone" class="form-control bg-light" placeholder="Phone Number"
                        required>
                    <div class="invalid-feedback">Phone required.</div>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold small d-md-none">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control bg-light" placeholder="Email Address"
                        required>
                    <div class="invalid-feedback">Email required.</div>
                </div>

                <div class="col-12 mt-3">
                    <textarea name="message" class="form-control bg-light" rows="2"
                        placeholder="Any specific requirements? (Optional)"></textarea>
                </div>

                <div class="col-12 text-center mt-3">
                    <p class="small text-muted mb-2">I am interested in:</p>
                    <div class="d-flex flex-wrap justify-content-center gap-3 mb-3">
                        @foreach ($carTypes->take(5) as $type)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="interested_car_types[]"
                                    value="{{ $type->name }}" id="check{{ $type->id }}">
                                <label class="form-check-label small"
                                    for="check{{ $type->id }}">{{ $type->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-orange px-5 rounded-pill">Get Expert Help</button>
                </div>
            </form>
        </div>

        <div class="mb-5">
            <h3 class="section-title">Latest Cars</h3>
            <div class="row g-4">
                @foreach ($latestCars as $car)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="car-card">
                            <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}">
                            <div class="car-details">
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $car->name }}</h6>
                                    <div class="text-orange fw-bold small">{{ $car->price_range }}</div>
                                </div>
                                <a href="{{ route('cars.show', $car) }}"
                                    class="btn btn-outline-dark btn-sm w-100 rounded-pill mt-3">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</x-frontend.app-layout>
