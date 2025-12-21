<x-frontend.app-layout>
    <div class="container my-5">

        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $car->name }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-7 mb-4">
                <div class="bg-white p-2 rounded shadow-sm">
                    <img src="{{ asset('storage/' . $car->image) }}" class="w-100 rounded" alt="{{ $car->name }}">
                </div>
            </div>

            <div class="col-md-5">
                <div class="bg-white p-4 rounded shadow-sm h-100">
                    <span class="badge bg-orange mb-2">{{ $car->type->name }}</span>
                    <h2 class="fw-bold mb-2">{{ $car->name }}</h2>
                    <h4 class="text-orange fw-bold mb-4">{{ $car->price_range }}</h4>

                    <div class="d-grid gap-2 mb-4">
                        <button class="btn btn-orange btn-lg" data-bs-toggle="modal" data-bs-target="#leadModal">
                            <i class="fas fa-tag me-2"></i> Get Best Offer
                        </button>
                        <a href="{{ route('cars.brochure', $car) }}" class="btn btn-outline-dark btn-lg">
                            <i class="fas fa-download me-2"></i> Download Brochure
                        </a>
                    </div>

                    <hr>

                    <h5 class="fw-bold mt-4 mb-3">Key Highlights</h5>
                    <ul class="list-unstyled text-muted">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Latest Model 2025</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Best in Class Mileage</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> 5-Star Safety Rating</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Premium Interiors</li>
                    </ul>
                </div>
            </div>
        </div>

        @if ($similarCars->count() > 0)
            <div class="mt-5">
                <h3 class="section-title">Similar Cars</h3>
                <div class="row g-4">
                    @foreach ($similarCars as $similar)
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="car-card">
                                <img src="{{ asset('storage/' . $similar->image) }}" alt="{{ $similar->name }}">
                                <div class="car-details">
                                    <div>
                                        <h6 class="fw-bold mb-1">{{ $similar->name }}</h6>
                                        <div class="text-orange fw-bold small">{{ $similar->price_range }}</div>
                                    </div>
                                    <a href="{{ route('cars.show', $similar) }}"
                                        class="btn btn-outline-dark btn-sm w-100 rounded-pill mt-3">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>

    <div class="modal fade" id="leadModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold">Get Offer for {{ $car->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0">
                    <form action="{{ route('leads.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <input type="hidden" name="interested_car_types[]" value="{{ $car->type->name }}">

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" required>
                            <div class="invalid-feedback">Name is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Phone <span class="text-danger">*</span></label>
                            <input type="text" name="phone" class="form-control" required>
                            <div class="invalid-feedback">Phone is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" required>
                            <div class="invalid-feedback">Email is required.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Message</label>
                            <textarea name="message" class="form-control" rows="2" placeholder="I am interested in this car..."></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-orange">Submit Interest</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-frontend.app-layout>
