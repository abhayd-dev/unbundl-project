<x-frontend.app-layout>
    <div class="container my-5">

        <div class="row mb-4 align-items-center">
            <div class="col-12">
                <h2 class="fw-bold mb-0">
                    @if (request('search'))
                        Search Results for "{{ request('search') }}"
                    @elseif(request('condition'))
                        {{ ucfirst(request('condition')) }} Cars
                    @elseif(request('type'))
                        {{ ucfirst(request('type')) }} Cars
                    @else
                        Cars
                    @endif
                </h2>
                <p class="text-muted mb-0">{{ $cars->total() }} cars found</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 mb-4">
                <div class="bg-white p-4 rounded shadow-sm border">
                    <h5 class="fw-bold mb-3">Filters</h5>

                    <form action="{{ route('cars.index') }}" method="GET">
                        @if (request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase text-muted">Car Type</label>
                            @foreach ($types as $type)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="type"
                                        value="{{ $type->slug }}" id="type{{ $type->id }}"
                                        {{ request('type') == $type->slug ? 'checked' : '' }}
                                        onchange="this.form.submit()">
                                    <label class="form-check-label" for="type{{ $type->id }}">
                                        {{ $type->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="d-grid">
                            <a href="{{ route('cars.index') }}" class="btn btn-sm btn-outline-danger">Clear Filters</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-9">
                @if ($cars->count() > 0)
                    <div class="row g-4">
                        @foreach ($cars as $car)
                            <div class="col-md-4 col-6">
                                <div class="car-card">
                                    <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}">
                                    <div class="car-details">
                                        <div>
                                            <div class="d-flex justify-content-between align-items-start">
                                                <h6 class="fw-bold mb-1">{{ $car->name }}</h6>
                                                @if ($car->condition == 'used')
                                                    <span class="badge bg-secondary text-white"
                                                        style="font-size: 0.7rem;">USED</span>
                                                @endif
                                            </div>
                                            <span
                                                class="badge bg-light text-dark border mb-2">{{ $car->type->name }}</span>
                                            <div class="text-orange fw-bold small">{{ $car->price_range }}</div>
                                        </div>
                                        <a href="{{ route('cars.show', $car) }}"
                                            class="btn btn-outline-dark btn-sm w-100 rounded-pill mt-3">View Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-5">
                        {{ $cars->links() }}
                    </div>
                @else
                    <div class="text-center py-5 bg-white rounded shadow-sm">
                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                        <h4>No cars found</h4>
                        <p class="text-muted">Try changing your search filters.</p>
                        <a href="{{ route('cars.index') }}" class="btn btn-orange mt-2">View All Cars</a>
                    </div>
                @endif
            </div>
        </div>

    </div>
</x-frontend.app-layout>
