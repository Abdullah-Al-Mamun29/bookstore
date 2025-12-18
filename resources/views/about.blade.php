@extends('layouts.app')

@section('content')
<style>
    .page-header {
        background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)), url("{{ asset('images/carousel-1.jpg') }}");
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 400px;
        display: flex;
        align-items: center;
    }
    .section-title {
        position: relative;
        display: inline-block;
        text-transform: uppercase;
        font-weight: 700;
        color: #8e44ad;
    }
    .section-title::after {
        position: absolute;
        content: "";
        width: 45px;
        height: 2px;
        top: 50%;
        right: -55px;
        margin-top: -1px;
        background: #8e44ad;
    }
    .about-content h3 {
        color: #333;
        font-weight: 700;
        margin-top: 35px;
        border-left: 4px solid #8e44ad;
        padding-left: 15px;
    }
    .about-content p {
        line-height: 1.8;
        color: #555;
        text-align: justify;
    }
    .about-content ul {
        list-style: none;
        padding-left: 0;
    }
    .about-content ul li {
        margin-bottom: 12px;
        padding-left: 30px;
        position: relative;
    }
    .about-content ul li::before {
        content: "\f058";
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        position: absolute;
        left: 0;
        color: #8e44ad;
    }
    .deep-blue-footer-shape {
        background-color: #1a427a;
        color: #ffffff;
        padding: 30px 0;
        border-radius: 0 0 80px 0;
        margin-top: 50px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .breadcrumb-item + .breadcrumb-item::before {
        display: none;
    }
    .breadcrumb-item a {
        text-decoration: none;
    }
</style>

<div class="container-fluid page-header mb-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown fw-bold">About Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">/ About</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5 about-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start pe-3">About Us</h6>
                <h1 class="mb-4 display-5 fw-bold" style="color: #8e44ad;">Welcome to Book Point</h1>
                
                <p class="mb-5">
                    Welcome to <strong>Book Point</strong>, where the love for literature comes to life! Established in 2025, we are
                    more than just a bookstore; we are a haven for bibliophiles and a community dedicated to the written
                    word. Our goal is to provide a platform where every reader finds their next favorite story.
                </p>

                <h3>Who We Are</h3>
                <p>Founded in 2025, Book Point is not just a bookstore; it's a community of avid readers,
                    writers, and storytellers. We believe in the power of books to foster imagination, empathy, and a
                    deeper understanding of the world around us.</p>

                <h3>Our Mission</h3>
                <p>At Book Point, we are passionate about bringing the joy of reading to book enthusiasts
                    all around the world. Our mission is to curate a diverse collection of novels that captivate,
                    inspire, and transport readers to new worlds.</p>
                
                <h3>Our Collection</h3>
                <p>Explore our carefully curated selection of novels, spanning various genres from classic
                    literature to contemporary fiction, science fiction, mystery, romance, and more.</p>

                <h3>Why Choose Us?</h3>
                <ul class="mt-3">
                    <li><b>Diverse Selection:</b> Books catering to all tastes.</li>
                    <li><b>Quality Service:</b> Exceptional delivery service.</li>
                    <li><b>Engagement:</b> Active literary community.</li>
                </ul>

                <h3>Our Team</h3>
                <p>Meet the passionate book lovers behind Book Point. Our team is committed to creating an enriching reading experience for every customer.</p>

                <div class="bg-light p-4 rounded-3 border-start border-4 border-primary mt-5">
                    <h5 class="fw-bold">Contact Us</h5>
                    <p class="mb-0">Have a question? Reach out to us through our 
                        <a href="{{ route('contact') }}" class="text-decoration-none fw-bold" style="color: #8e44ad;">Contact Page</a>.
                    </p>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</div>

<div class="container-fluid px-0">
    <div class="deep-blue-footer-shape text-center">
        <div class="container">
            <p class="mb-0 fw-bold fs-5">Thank you for being a part of the Book Point family. Happy reading!</p>
        </div>
    </div>
</div>

@endsection