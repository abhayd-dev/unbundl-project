<x-frontend.app-layout>
    <div class="container my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">{{ $page->title ?? 'Contact Us' }}</h2>
            
            @if(isset($page))
                <div class="mb-4">
                    {!! $page->content !!}
                </div>
            @endif
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="bg-white p-4 p-md-5 rounded shadow-sm border">
                    <form action="{{ route('leads.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <input type="hidden" name="interested_car_types[]" value="General Inquiry">
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold small">Your Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" required>
                                <div class="invalid-feedback">Name is required.</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold small">Phone Number <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control" required>
                                <div class="invalid-feedback">Phone number is required.</div>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold small">Email Address <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" required>
                                <div class="invalid-feedback">Valid email is required.</div>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold small">Message / Query</label>
                                <textarea name="message" class="form-control" rows="4" placeholder="How can we help you?"></textarea>
                            </div>
                            
                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-orange px-5">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="row text-center mt-5">
            <div class="col-md-4">
                <div class="mb-3"><i class="fas fa-map-marker-alt fa-2x text-orange"></i></div>
                <h6 class="fw-bold">Address</h6>
                <p class="small text-muted">Girnar Software Pvt. Ltd.<br>Sector 135, Noida, UP</p>
            </div>
            <div class="col-md-4">
                <div class="mb-3"><i class="fas fa-phone-alt fa-2x text-orange"></i></div>
                <h6 class="fw-bold">Phone</h6>
                <p class="small text-muted">{{ $settings['contact_phone'] ?? '+91 98765 43210' }}<br>Mon-Sat, 9am - 6pm</p>
            </div>
            <div class="col-md-4">
                <div class="mb-3"><i class="fas fa-envelope fa-2x text-orange"></i></div>
                <h6 class="fw-bold">Email</h6>
                <p class="small text-muted">{{ $settings['contact_email'] ?? 'support@unbundl.com' }}</p>
            </div>
        </div>
    </div>
</x-frontend.app-layout>