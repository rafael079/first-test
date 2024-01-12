<div class="container">
    <div
        class="d-flex border-top border-secondary-subtle flex-wrap justify-content-between align-items-center py-4 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="{{ route('home') }}" class="mb-3 me-2 mb-md-0 text-body-secondary logo text-decoration-none lh-1">
                <x-shared.logo />
            </a>
            <span class="mb-3 mb-md-0 text-body-secondary">{{ config('app.name') }} © {{ date('Y') }} Company,
                Inc</span>
        </div>
    </div>
</div>
