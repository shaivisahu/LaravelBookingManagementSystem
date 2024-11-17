@extends('layout.baseview')

@section('title', 'Home')

@section('style')
<style>
    /* Add custom styles here */
    .navbar-brand img {
        width: 60px;
    }

    .navbar-nav {
        align-items: center;
    }

    .navbar .navbar-nav .nav-link {
        font-size: 1.1em;
        padding: 0.5em 1em;
    }

    @media screen and (min-width: 768px) {
        .navbar-brand img {
            width: 80px;
        }

        .navbar-brand {
            margin-right: 0;
            padding: 0 1em;
        }
    }

    /* Customize carousel indicators */
    .carousel-indicators button {
        background-color: #000;
        border: 1px solid #000;
        border-radius: 50%;
        width: 12px;
        height: 12px;
        margin-right: 5px;
    }

    .carousel-indicators .active {
        background-color: #fff;
    }

    /* Style carousel navigation buttons */
    .carousel-control-prev,
    .carousel-control-next {
        width: 5%;
        font-size: 2em;
        background-color: transparent;
        border: none;
    }

    /* Customize about section */
    #about-us {
        background-color: #f9f9f9;
        padding: 50px 0;
    }

    #about-us h6 {
        color: #333;
        font-weight: bold;
    }

    #about-us p {
        color: #666;
        font-size: 1.1em;
        margin-bottom: 20px;
    }

    /* Customize team section */
    #team {
        padding: 50px 0;
    }

    #team h6 {
        color: #333;
        font-weight: bold;
        margin-bottom: 40px;
    }

    .card {
        border: none;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        color: #333;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .card-text {
        color: #666;
    }

    .icon-sm {
        font-size: 1.5em;
        color: #666;
        margin-right: 10px;
    }

    /* Customize contact section */
    #contact {
        padding: 50px 0;
    }

    #contact h6 {
        color: #333;
        font-weight: bold;
        margin-bottom: 40px;
    }

    .form-label {
        color: #333;
        font-weight: bold;
    }

    .btn-outline-dark {
        background-color: #333;
        color: #fff;
        border: 2px solid #333;
        transition: all 0.3s ease;
    }

    .btn-outline-dark:hover {
        background-color: transparent;
        color: #333;
    }

    /* Style login and signup links */
    .login-signup {
        display: flex;
        align-items: center;
        margin-right: 1em;
    }

    .login-signup a {
        color: #333;
        text-decoration: none;
        margin-right: 1em;
        font-weight: bold;
        padding: 8px 16px;
        border: 2px solid #333;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .login-signup a:hover {
        background-color: #333;
        color: #fff;
    }

    .login-signup a:last-child {
        margin-right: 0;
    }
</style>
@endsection

@section('content')
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Brand Logo">
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar1">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('page/team') }}" class="nav-link">Team</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('page/about-us') }}" class="nav-link">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('page/contact-us') }}" class="nav-link">Contact Us</a>
                    </li>
                </ul>
                <div class="login-signup">
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('signup') }}">Signup</a>
                </div>
            </div>
        </div>
    </nav>
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://dummyimage.com/600x400/000/fff" class="d-block w-100" alt="Carousel 1">
            </div>
            <div class="carousel-item">
                <img src="https://dummyimage.com/600x400/000/fff" class="d-block w-100" alt="Carousel 2">
            </div>
            <div class="carousel-item">
                <img src="https://dummyimage.com/600x400/000/fff" class="d-block w-100" alt="Carousel 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</header>

<main class="m-5">
    <!-- Content sections -->
</main>

<footer class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('assets/images/logo.png') }}" height="30" alt="Brand Logo">
                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati nulla maxime, at culpa ipsa aliquam exercitationem deserunt odit incidunt a neque voluptas suscipit maiores quae dolor dolore tenetur corrupti dolorem!</p>
            </div>
            <div class="col-md-6">
                <h4 class="mb-4">Quick Links</h4>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white">About Us</a></li>
                    <li><a href="#" class="text-white">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
@endsection

@section('customjs')
<script>
    // Custom JavaScript code goes here
</script>
@endsection
