<x-admin-layout title="Leads Management">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-orange-600 mb-0">Inquiries & Leads</h4>
        <button class="btn btn-outline-dark btn-sm">Export Data</button>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">Sr. No.</th> 
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Contact</th>
                            <th>Interest</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leads as $lead)
                        <tr>
                            <td class="ps-4 fw-bold text-secondary">
                                {{ $leads->firstItem() + $loop->index }}
                            </td>
                            <td class="text-muted small">{{ $lead->created_at->format('d M, Y') }}</td>
                            <td class="fw-bold">{{ $lead->name }}</td>
                            <td>
                                <div><i class="fas fa-phone-alt text-muted small me-1"></i> {{ $lead->phone }}</div>
                                <div class="small text-muted"><i class="fas fa-envelope text-muted small me-1"></i> {{ $lead->email }}</div>
                            </td>
                            <td>
                                @if(is_array($lead->interested_car_types))
                                    @foreach($lead->interested_car_types as $type)
                                        <span class="badge bg-secondary">{{ $type }}</span>
                                    @endforeach
                                @else
                                    <span class="badge bg-light text-dark border">General</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <button type="button" class="btn btn-sm btn-outline-info mb-1" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#leadModal"
                                        data-name="{{ $lead->name }}"
                                        data-email="{{ $lead->email }}"
                                        data-phone="{{ $lead->phone }}"
                                        data-date="{{ $lead->created_at->format('d M, Y h:i A') }}"
                                        data-interest="{{ is_array($lead->interested_car_types) ? implode(', ', $lead->interested_car_types) : 'General' }}"
                                        data-message="{{ $lead->message ?? 'No message provided.' }}">
                                    <i class="fas fa-eye"></i>
                                </button>

                                <form action="{{ route('admin.leads.destroy', $lead) }}" method="POST" class="d-inline-block delete-form">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger mb-1">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="p-3">
                {{ $leads->links() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="leadModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Lead Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 border-bottom pb-2">
                        <small class="text-muted d-block">Customer Name</small>
                        <span class="fw-bold fs-5" id="modalName"></span>
                        <span class="float-end badge bg-success" id="modalDate"></span>
                    </div>
                    
                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <small class="text-muted d-block">Phone</small>
                            <span class="fw-bold" id="modalPhone"></span>
                        </div>
                        <div class="col-6">
                            <small class="text-muted d-block">Email</small>
                            <span class="fw-bold" id="modalEmail"></span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted d-block">Interested In</small>
                        <span class="badge bg-dark" id="modalInterest"></span>
                    </div>

                    <div class="bg-light p-3 rounded border">
                        <small class="text-muted d-block fw-bold mb-1">Message / Query:</small>
                        <p class="mb-0 text-dark" id="modalMessage"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        var leadModal = document.getElementById('leadModal')
        leadModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget
            
            var name = button.getAttribute('data-name')
            var email = button.getAttribute('data-email')
            var phone = button.getAttribute('data-phone')
            var date = button.getAttribute('data-date')
            var interest = button.getAttribute('data-interest')
            var message = button.getAttribute('data-message')
            
            document.getElementById('modalName').textContent = name
            document.getElementById('modalEmail').textContent = email
            document.getElementById('modalPhone').textContent = phone
            document.getElementById('modalDate').textContent = date
            document.getElementById('modalInterest').textContent = interest
            document.getElementById('modalMessage').textContent = message
        })
    </script>
    @endpush
</x-admin-layout>