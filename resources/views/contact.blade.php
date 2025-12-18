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
    .breadcrumb-item + .breadcrumb-item::before {
        display: none;
    }
    .breadcrumb-item a {
        text-decoration: none;
    }
</style>

<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown fw-bold">Contact</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">/ Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp mb-2" data-wow-delay="0.1s">
            <h1 class="mb-5 bg-white text-center px-3 fw-bold" style="color: #8e44ad;">Contact Us</h1>
        </div>

        <div class="py-4">
            @if(session('success'))
                <div class="alert alert-success d-flex justify-content-between shadow-sm">
                    <span>{{ session('success') }}</span>
                    <i class="fas fa-times" style="cursor:pointer;" onclick="this.parentElement.remove();"></i>
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger d-flex justify-content-between shadow-sm">
                    <span>{{ session('error') }}</span>
                    <i class="fas fa-times" style="cursor:pointer;" onclick="this.parentElement.remove();"></i>
                </div>
            @endif
        </div>

        <div class="row g-4 mt-2">
            <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="fw-bold mb-3" style="color: #8e44ad;">Get In Touch</h5>
                <p class="mb-4">I'm happy to help! If you're looking for contact information or details about Book Point website, feel free to reach out via this form.</p>
                
                <div class="d-flex align-items-center mb-3">
                    <div class="d-flex align-items-center justify-content-center 'shrink-0' rounded"
                        style="width: 50px; height: 50px; background-color: #8e44ad;">
                        <i class="fa fa-map-marker-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="fw-bold">Office</h5>
                        <p class="mb-0 text-muted">76 Central Road, Khulna, Bangladesh</p>
                    </div>
                </div>
                
                <div class="d-flex align-items-center mb-3">
                    <div class="d-flex align-items-center justify-content-center 'shrink-0' rounded"
                        style="width: 50px; height: 50px; background-color: #8e44ad;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="fw-bold">Mobile</h5>
                        <p class="mb-0 text-muted">01902384960</p>
                    </div>
                </div>
                
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center justify-content-center 'shrink-0' rounded"
                        style="width: 50px; height: 50px; background-color: #8e44ad;">
                        <i class="fa fa-envelope-open text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="fw-bold">Email</h5>
                        <p class="mb-0 text-muted">bookpoint@gmail.com</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="Your Name" name="name" required>
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" placeholder="Your Email" name="email" required>
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="tel" class="form-control" id="number" placeholder="Mobile Number" name="number" required>
                                <label for="number">Mobile Number</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a message here" id="message"
                                    style="height: 150px" name="message" required></textarea>
                                <label for="message"> Your Message</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn text-white w-100 py-3 fw-bold" style="background-color: #8e44ad;" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid px-0 mt-5">
    <div style="background-color: #1a427a; color: #ffffff; padding: 40px 0; border-radius: 0 80px 0 0;" class="text-center shadow-lg">
        <div class="container">
            <p class="mb-0 fw-bold fs-5">We would love to hear from you. Contact us anytime!</p>
        </div>
    </div>
</div>
@endsection