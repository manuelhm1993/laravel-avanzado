<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta-data')
    <title>Laravel Avanzado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    @stack('css')
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">Laravel Avanzado</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('categorias.*') ? 'active' : '' }}" href="{{ route('categorias.index') }}">Categorías</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('productos.*') ? 'active' : '' }}" href="{{ route('productos.index') }}">Productos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
        <div class="col mb-3">
            <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none"
                aria-label="Bootstrap">
                <svg class="bi me-2" width="40" height="32" aria-hidden="true">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <p class="text-body-secondary">© 2025</p>
        </div>

        <div class="col mb-3">

        </div>

        <div class="col mb-3">
            <h5>Section</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a>
                </li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a>
                </li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
                </li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a>
                </li>
            </ul>
        </div>

        <div class="col mb-3">
            <h5>Section</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a>
                </li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a>
                </li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
                </li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a>
                </li>
            </ul>
        </div>

        <div class="col mb-3">
            <h5>Section</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a>
                </li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a>
                </li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a>
                </li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a>
                </li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a>
                </li>
            </ul>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', (e) => {
            const navItems = document.querySelectorAll('nav.navbar .navbar-nav .nav-item .nav-link');

            navItems.forEach(item => {
                (item.classList['value'].includes('active')) ? item.setAttribute('aria-current', 'page') : item.removeAttribute('aria-current');
            });
        });
    </script>

    @stack('js')
</body>
</html>
