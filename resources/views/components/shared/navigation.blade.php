<nav>
    <div class="container">
        <div class="d-flex flex-wrap border-b border-secondary align-items-center justify-content-center justify-content-lg-start">
            <a href="{{ route('home') }}"
                class="d-flex align-items-center mb-2 me-3 mb-lg-0 text-primary text-decoration-none">
                <x-shared.logo />
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('home') }}" class="nav-link px-2 text-secondary">{{ __('Home') }}</a></li>
            </ul>

            <div class="text-end">
                <a href="{{ route('registration') }}"
                    class="btn btn-primary rounded-pill">{{ __('Cadastro de Usuários') }}</a>
            </div>
        </div>
    </div>
</nav>
