<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Pembangunan Guest')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="{{ asset('Poseify/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;700&family=Work+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('Poseify/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Poseify/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Bootstrap Stylesheet -->
    <link href="{{ asset('Poseify/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('Poseify/css/style.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-lg-5 py-3 py-lg-0">
        <a href="{{ url('/') }}" class="navbar-brand ms-4 ms-lg-0">
            <h2 class="mb-0 text-primary text-uppercase"><i class="fa fa-building me-2"></i>Pembangunan</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto p-4 p-lg-0">
                <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                <a href="{{ route('proyek.index') }}" class="nav-item nav-link active">Data Proyek</a>
            </div>
            <div class="d-none d-lg-flex">
                <a class="btn btn-outline-primary border-2" href="{{ route('proyek.create') }}">
                    <i class="fa fa-plus me-2"></i>Tambah Proyek
                </a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer py-5 mt-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-12 text-center">
                    <h5 class="text-white mb-4">Pembangunan Guest - Sistem Manajemen Proyek</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jakarta, Indonesia</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@pembangunan.com</p>
                    <p class="mb-0">&copy; 2024 Pembangunan Guest. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('Poseify/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('Poseify/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('Poseify/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('Poseify/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('Poseify/js/main.js') }}"></script>

    @stack('scripts')
</body>
</html>
