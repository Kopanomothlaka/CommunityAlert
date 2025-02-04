<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .feature-card {
            transition: transform 0.3s ease;
            height: 100%;
        }
        .feature-card:hover {
            transform: translateY(-5px);
        }
        .bg-laravel {
            background-color: rgba(255, 45, 32, 0.1);
        }
        .text-laravel {
            color: #FF2D20;
        }
        .hero-section {
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }
        .background-image {
            position: absolute;
            left: -5rem;
            top: 0;
            max-width: 877px;
            z-index: 0;
        }
    </style>
</head>
<body class="bg-light text-dark">
<div class="hero-section d-flex align-items-center">
    <img src="https://laravel.com/assets/img/welcome/background.svg" alt="Background" class="background-image">

    <div class="container position-relative z-1">
        <header class="py-5">
            <div class="row align-items-center">
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    <img src="https://laravel.com/assets/img/logo.svg" alt="Laravel Logo" style="height: 3rem;">
                </div>
                <div class="col-md-8 d-flex justify-content-end">
                    @if (Route::has('login'))
                        <nav class="d-flex gap-2">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-outline-dark">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-dark">
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-dark">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </div>
        </header>

        <main class="my-5">
            <div class="row g-4">
                <!-- Documentation Card -->
                <div class="col-md-6">
                    <a href="https://laravel.com/docs" class="card feature-card h-100 text-decoration-none text-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div class="bg-laravel rounded-circle p-3">
                                    <i class="bi bi-journal-code fs-3 text-laravel"></i>
                                </div>
                                <h3 class="mb-0">Documentation</h3>
                                <i class="bi bi-arrow-right ms-auto fs-4 text-laravel"></i>
                            </div>
                            <p class="text-muted">
                                Laravel has wonderful documentation covering every aspect of the framework.
                                Whether you are a newcomer or have prior experience with Laravel, we recommend
                                reading our documentation from beginning to end.
                            </p>
                        </div>
                    </a>
                </div>

                <!-- Laracasts Card -->
                <div class="col-md-6">
                    <a href="https://laracasts.com" class="card feature-card h-100 text-decoration-none text-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div class="bg-laravel rounded-circle p-3">
                                    <i class="bi bi-film fs-3 text-laravel"></i>
                                </div>
                                <h3 class="mb-0">Laracasts</h3>
                                <i class="bi bi-arrow-right ms-auto fs-4 text-laravel"></i>
                            </div>
                            <p class="text-muted">
                                Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript
                                development. Check them out, see for yourself, and massively level up your
                                development skills in the process.
                            </p>
                        </div>
                    </a>
                </div>

                <!-- Laravel News Card -->
                <div class="col-md-6">
                    <a href="https://laravel-news.com" class="card feature-card h-100 text-decoration-none text-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div class="bg-laravel rounded-circle p-3">
                                    <i class="bi bi-newspaper fs-3 text-laravel"></i>
                                </div>
                                <h3 class="mb-0">Laravel News</h3>
                                <i class="bi bi-arrow-right ms-auto fs-4 text-laravel"></i>
                            </div>
                            <p class="text-muted">
                                Laravel News is a community driven portal and newsletter aggregating all of
                                the latest and most important news in the Laravel ecosystem, including new
                                package releases and tutorials.
                            </p>
                        </div>
                    </a>
                </div>

                <!-- Ecosystem Card -->
                <div class="col-md-6">
                    <div class="card feature-card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div class="bg-laravel rounded-circle p-3">
                                    <i class="bi bi-boxes fs-3 text-laravel"></i>
                                </div>
                                <h3 class="mb-0">Vibrant Ecosystem</h3>
                            </div>
                            <p class="text-muted">
                                Laravel's robust library of first-party tools and libraries, such as
                                <a href="#" class="link-dark text-decoration-underline">Forge</a>,
                                <a href="#" class="link-dark text-decoration-underline">Vapor</a>,
                                <a href="#" class="link-dark text-decoration-underline">Nova</a>, and
                                <a href="#" class="link-dark text-decoration-underline">Envoyer</a> help
                                you take your projects to the next level.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="py-5 text-center text-muted">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </footer>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
