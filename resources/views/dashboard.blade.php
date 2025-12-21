<x-admin-layout title="Dashboard">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-start border-4 border-orange-500">
                <div class="card-body">
                    <h5 class="text-muted">Total Cars</h5>
                    <h2 class="mb-0">{{ $stats['total_cars'] }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-start border-4 border-primary">
                <div class="card-body">
                    <h5 class="text-muted">Total Leads</h5>
                    <h2 class="mb-0">{{ $stats['total_leads'] }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-start border-4 border-success">
                <div class="card-body">
                    <h5 class="text-muted">Car Types</h5>
                    <h2 class="mb-0">{{ $stats['total_types'] }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mt-4">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0">Recent Leads</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Interest</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($stats['recent_leads'] as $lead)
                        <tr>
                            <td>{{ $lead->name }}</td>
                            <td>{{ $lead->phone }}</td>
                            <td>
                                @foreach($lead->interested_car_types as $type)
                                    <span class="badge bg-secondary">{{ $type }}</span>
                                @endforeach
                            </td>
                            <td>{{ $lead->created_at->diffForHumans() }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-3">No recent leads found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>