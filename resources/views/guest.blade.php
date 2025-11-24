@extends('layouts.poseify')

@section('header')
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{ asset('poseify/img/carousel-1.jpg') }}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="title mx-5 px-5 animated slideInDown">
                        <div class="title-center">
                            <h5>Welcome</h5>
                            <h1 class="display-1">Modeling Agency</h1>
                        </div>
                    </div>
                    <p class="fs-5 mb-5 animated slideInDown">Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit.<br> Sed erat lectus, venenatis sit amet egestas eget, aliquet a nisl.</p>
                    <a href="#!" class="btn btn-outline-primary border-2 py-3 px-5 animated slideInDown">Explore
                        More</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{ asset('poseify/img/carousel-2.jpg') }}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="title mx-5 px-5 animated slideInDown">
                        <div class="title-center">
                            <h5>Welcome</h5>
                            <h1 class="display-1">Modeling Agency</h1>
                        </div>
                    </div>
                    <p class="fs-5 mb-5 animated slideInDown">Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit.<br> Sed erat lectus, venenatis sit amet egestas eget, aliquet a nisl.</p>
                    <a href="#!" class="btn btn-outline-primary border-2 py-3 px-5 animated slideInDown">Explore
                        More</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endsection

@section('content')
    <!-- About Start -->
    <div class="container-fluid bg-secondary">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-7 pb-0 pb-lg-5 py-5">
                    <div class="pb-0 pb-lg-5 py-5">
                        <div class="title wow fadeInUp" data-wow-delay="0.1s">
                            <div class="title-left">
                                <h5>History</h5>
                                <h1>About Our Agency</h1>
                            </div>
                        </div>
                        <p class="mb-4 wow fadeInUp" data-wow-delay="0.2s">Tempor erat elitr rebum at clita. Diam dolor
                            diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet
                            lorem sit clita duo justo magna dolore erat amet. Stet no et lorem dolor et diam, amet duo
                            ut dolore vero eos.</p>
                        <ul class="list-group list-group-flush mb-5 wow fadeInUp" data-wow-delay="0.3s">
                            <li class="list-group-item bg-dark text-body border-secondary ps-0">
                                <i class="fa fa-check-circle text-primary me-1"></i> Lorem ipsum dolor sit amet
                                consectetur elit.
                            </li>
                            <li class="list-group-item bg-dark text-body border-secondary ps-0">
                                <i class="fa fa-check-circle text-primary me-1"></i> Donec vehicula, sem ut tempus
                                tempus.
                            </li>
                            <li class="list-group-item bg-dark text-body border-secondary ps-0">
                                <i class="fa fa-check-circle text-primary me-1"></i> Morbi mi dapibus, feugiat nisi non
                                mollis justo.
                            </li>
                        </ul>
                        <div class="row wow fadeInUp" data-wow-delay="0.4s">
                            <div class="col-6">
                                <a href="#!" class="btn btn-outline-primary border-2 py-3 w-100">Become A Model</a>
                            </div>
                            <div class="col-6">
                                <a href="#!" class="btn btn-primary py-3 w-100">Schedule Casting</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.5s">
                    <img class="img-fluid" src="{{ asset('poseify/img/about.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center">
                <div class="title wow fadeInUp" data-wow-delay="0.1s">
                    <div class="title-center">
                        <h5>Services</h5>
                        <h1>How We Help You</h1>
                    </div>
                </div>
            </div>
            <div class="service-item service-item-left">
                <div class="row g-0 align-items-center">
                    <div class="col-md-5">
                        <div class="service-img p-5 wow fadeInRight" data-wow-delay="0.2s">
                            <img class="img-fluid rounded-circle" src="{{ asset('poseify/img/service-1.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="service-text px-5 px-md-0 py-md-5 wow fadeInRight" data-wow-delay="0.5s">
                            <h3 class="text-uppercase">Fashion Shows</h3>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat
                                fermentum urna, sed gravida enim eleifend vitae. Ut rhoncus non metus at convallis.
                                Maecenas pharetra placerat mauris. Phasellus quis egestas dui. Nullam ornare consectetur
                                rhoncus. Praesent elit mauris, feugiat quis convallis et, egestas a tellus.</p>
                            <a class="btn btn-outline-primary border-2 px-4" href="#!">Read More <i
                                    class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-item service-item-right">
                <div class="row g-0 align-items-center">
                    <div class="col-md-5 order-md-1 text-md-end">
                        <div class="service-img p-5 wow fadeInLeft" data-wow-delay="0.2s">
                            <img class="img-fluid rounded-circle" src="{{ asset('poseify/img/service-2.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="service-text px-5 px-md-0 py-md-5 text-md-end wow fadeInLeft" data-wow-delay="0.5s">
                            <h3 class="text-uppercase">Corporate Events</h3>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat
                                fermentum urna, sed gravida enim eleifend vitae. Ut rhoncus non metus at convallis.
                                Maecenas pharetra placerat mauris. Phasellus quis egestas dui. Nullam ornare consectetur
                                rhoncus. Praesent elit mauris, feugiat quis convallis et, egestas a tellus.</p>
                            <a class="btn btn-outline-primary border-2 px-4" href="#!">Read More <i
                                    class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-item service-item-left">
                <div class="row g-0 align-items-center">
                    <div class="col-md-5">
                        <div class="service-img p-5 wow fadeInRight" data-wow-delay="0.2s">
                            <img class="img-fluid rounded-circle" src="{{ asset('poseify/img/service-3.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="service-text px-5 px-md-0 py-md-5 wow fadeInRight" data-wow-delay="0.5s">
                            <h3 class="text-uppercase">Commercial Photo Shots</h3>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat
                                fermentum urna, sed gravida enim eleifend vitae. Ut rhoncus non metus at convallis.
                                Maecenas pharetra placerat mauris. Phasellus quis egestas dui. Nullam ornare consectetur
                                rhoncus. Praesent elit mauris, feugiat quis convallis et, egestas a tellus.</p>
                            <a class="btn btn-outline-primary border-2 px-4" href="#!">Read More <i
                                    class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-item service-item-right">
                <div class="row g-0 align-items-center">
                    <div class="col-md-5 order-md-1 text-md-end">
                        <div class="service-img p-5 wow fadeInLeft" data-wow-delay="0.2s">
                            <img class="img-fluid rounded-circle" src="{{ asset('poseify/img/service-4.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="service-text px-5 px-md-0 py-md-5 text-md-end wow fadeInLeft" data-wow-delay="0.5s">
                            <h3 class="text-uppercase">Professional Modeling</h3>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam feugiat
                                fermentum urna, sed gravida enim eleifend vitae. Ut rhoncus non metus at convallis.
                                Maecenas pharetra placerat mauris. Phasellus quis egestas dui. Nullam ornare consectetur
                                rhoncus. Praesent elit mauris, feugiat quis convallis et, egestas a tellus.</p>
                            <a class="btn btn-outline-primary border-2 px-4" href="#!">Read More <i
                                    class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Banner Start -->
    <div class="container-fluid py-5 bg-secondary">
        <div class="container py-5">
            <div class="row g-0 justify-content-center">
                <div class="col-lg-7 text-center">
                    <div class="title mx-5 px-5 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="title-center">
                            <h5>Casting</h5>
                            <h1>Want to be a Model?</h1>
                        </div>
                    </div>
                    <p class="fs-5 mb-5 wow fadeInUp" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit. Sed erat lectus, venenatis sit amet egestas eget, aliquet a nisl.</p>
                    <div class="position-relative wow fadeInUp" data-wow-delay="0.3s">
                        <input class="form-control border-0 bg-dark rounded-pill w-100 py-4 ps-4 pe-5" type="text"
                            placeholder="Your email">
                        <button type="button" class="btn btn-primary py-3 px-4 position-absolute top-0 end-0 me-2"
                            style="margin-top: 7px;">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->


    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center">
                <div class="title wow fadeInUp" data-wow-delay="0.1s">
                    <div class="title-center">
                        <h5>Models</h5>
                        <h1>Meet Our Models</h1>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-1.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Naomy Olsen</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-2.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Pamela Torney</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-3.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Joanne Irwin</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-4.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Gillian Rowe</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-5.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Naomy Olsen</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-6.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Pamela Torney</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-7.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Joanne Irwin</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="team-body">
                            <div class="team-before">
                                <span>Age</span>
                                <span>Height</span>
                                <span>Weight</span>
                                <span>Bust</span>
                                <span>Waist</span>
                                <span>Hips</span>
                            </div>
                            <img class="img-fluid" src="{{ asset('poseify/img/team-8.jpg') }}" alt="">
                            <div class="team-after">
                                <span>22</span>
                                <span>185</span>
                                <span>55</span>
                                <span>79</span>
                                <span>59</span>
                                <span>89</span>
                            </div>
                        </div>
                        <a class="team-name" href="#">
                            <h5 class="text-uppercase mb-0">Gillian Rowe</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5 bg-secondary">
        <div class="container py-5">
            <div class="text-center">
                <div class="title wow fadeInUp" data-wow-delay="0.1s">
                    <div class="title-center">
                        <h5>Testimonial</h5>
                        <h1>Our Clients Say</h1>
                    </div>
                </div>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.3s">
                <div class="testimonial-item text-center"
                    data-dot="<img class='img-fluid' src='{{ asset('poseify/img/testimonial-1.jpg') }}' alt=''>">
                    <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed
                        sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum
                        justo sea clita.</p>
                    <h5 class="text-uppercase">Joanne Irwin</h5>
                    <span class="text-primary">Profession</span>
                </div>
                <div class="testimonial-item text-center"
                    data-dot="<img class='img-fluid' src='{{ asset('poseify/img/testimonial-2.jpg') }}' alt=''>">
                    <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed
                        sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum
                        justo sea clita.</p>
                    <h5 class="text-uppercase">Lana Anderson</h5>
                    <span class="text-primary">Profession</span>
                </div>
                <div class="testimonial-item text-center"
                    data-dot="<img class='img-fluid' src='{{ asset('poseify/img/testimonial-3.jpg') }}' alt=''>">
                    <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed
                        sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum
                        justo sea clita.</p>
                    <h5 class="text-uppercase">Pamela Torney</h5>
                    <span class="text-primary">Profession</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
