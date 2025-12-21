<x-frontend.app-layout>
    <div class="bg-orange py-5 text-white text-center">
        <h1 class="fw-bold">{{ $page->title ?? 'About Us' }}</h1>
    </div>

    <div class="container my-5">
        @if($page)
            <div class="content-area">
                {!! $page->content !!}
            </div>
        @else
            <div class="text-center py-5">
                <p class="text-muted">Content coming soon...</p>
            </div>
        @endif
    </div>
</x-frontend.app-layout>