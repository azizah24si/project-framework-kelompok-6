<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Poseify - Modeling Agency Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('poseify/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;700&family=Work+Sans:wght@400;600&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('poseify/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('poseify/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('poseify/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('poseify/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('poseify/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Header Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-lg-5">
            <a href="{{ url('/guest') }}" class="navbar-brand ms-4 ms-lg-0">
                <h2 class="mb-0 text-primary text-uppercase"><i class="fa-regular fa-face-smile me-1"></i>Poseify</h2>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto p-4 p-lg-0">
                    <a href="{{ url('/guest') }}" class="nav-item nav-link active">Home</a>
                    <a href="#" class="nav-item nav-link">About</a>
                    <a href="#" class="nav-item nav-link">Services</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="#" class="dropdown-item">Our Models</a>
                            <a href="#" class="dropdown-item">Testimonial</a>
                            <a href="#" class="dropdown-item">404 Page</a>
                        </div>
                    </div>
                    <a href="#" class="nav-item nav-link">Contact</a>
                </div>
                <div class="d-none d-lg-flex">
                    <a class="btn btn-outline-primary border-2" href="#">Download Now</a>
                </div>
            </div>
        </nav>

        @yield('header')
    </div>
    <!-- Header End -->

    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <a href="{{ url('/guest') }}">
                <h1 class="display-4 mb-3 text-white text-uppercase"><i
                        class="fa-regular fa-face-smile me-1"></i>Poseify</h1>
            </a>
            <div class="d-flex justify-content-center mb-4">
                <a class="btn btn-lg-square btn-outline-primary border-2 m-1" href="#!"><i
                        class="fab fa-twitter"></i></a>
                <a class="btn btn-lg-square btn-outline-primary border-2 m-1" href="#!"><i
                        class="fab fa-facebook-f"></i></a>
                <a class="btn btn-lg-square btn-outline-primary border-2 m-1" href="#!"><i
                        class="fab fa-youtube"></i></a>
                <a class="btn btn-lg-square btn-outline-primary border-2 m-1" href="#!"><i
                        class="fab fa-linkedin-in"></i></a>
            </div>
            <p>&copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.</p>

            <!--/*** The author’s attribution link must remain intact in the template. ***/-->
            <!--/*** If you wish to remove this credit link, please purchase the Pro Version . ***/-->
            <p class="mb-0">Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>. Distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>.</p>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-outline-primary border-2 btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('poseify/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('poseify/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('poseify/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('poseify/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('poseify/lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('poseify/js/main.js') }}"></script>
</body>

</html>
