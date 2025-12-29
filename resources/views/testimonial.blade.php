@extends('layouts.app')

@section('content')
<div class="container-fluid py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Testimonial</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Testimonial</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show text-center mb-5" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="text-center mx-auto mb-5">
            <h1 class="bg-white text-center px-3" style="color: #8e44ad; display: inline-block;">Customers Reviews</h1>
        </div>

        <div class="owl-carousel testimonial-carousel position-relative">
            @forelse($reviews as $review)
            <div class="testimonial-item text-center">
                <h4 class="testimonial-name">{{ $review->name }}</h4>
                <div class="testimonial-text text-center">
                    <p class="mb-0">{{ $review->review }}</p>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>No Reviews added yet!</p>
            </div>
            @endforelse
        </div>

        <div class="row mt-5">
            <div class="col-12 text-center">
                @if(Session::has('user_id') || auth()->check())
                <a href="{{ route('add.review') }}" class="btn-review">Add Your Review</a>
                @else
                <a href="{{ route('login') }}" class="btn-review">Login to Add Review</a>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    .btn-primary {
        background-color: #8e44ad ;
        border: none;
    }

    .page-header {
        background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)),
        url('{{ asset("images/carousel-1.jpg") }}') center center no-repeat;
        background-size: cover;
        min-height: 400px;
        display: flex;
        align-items: center;
    }

    .breadcrumb-item+.breadcrumb-item::before {
        color: rgba(255, 255, 255, 0.5);
        content: "/";
    }

    .testimonial-item {
        transition: .5s;
        padding: 30px;
        border-radius: 10px;
    }

    .testimonial-name {
        color: #555;
        font-weight: 700;
        margin-bottom: 20px;
        transition: .5s;
    }

    .testimonial-text {
        background: #f0faff;
        border-radius: 5px;
        padding: 40px 25px;
        position: relative;
        min-height: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: .5s;
    }

    .testimonial-text p {
        color: #777;
        font-size: 15px;
        line-height: 1.6;
        transition: .5s;
    }

    .owl-item.center .testimonial-text {
        background: #8e44ad ;
    }

    .owl-item.center .testimonial-name {
        color: #444 ;
    }

    .owl-item.center .testimonial-text p {
        color: #ffffff ;
    }

    .owl-dots {
        margin-top: 30px;
        text-align: center;
    }

    .owl-dot {
        height: 15px;
        width: 15px;
        border: 2px solid #8e44ad ;
        margin: 0 5px;
        border-radius: 3px;
    }

    .owl-dot.active {
        background: #8e44ad ;
    }

    .btn-review {
        background-color: #8e44ad;
        color: white;
        padding: 10px 25px;
        border-radius: 5px;
        text-decoration: none;
        transition: 0.3s;
        display: inline-block;
        font-weight: 500;
    }

    .btn-review:hover {
        background-color: #732d91;
        color: white;
    }
</style>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $(".testimonial-carousel").owlCarousel({
            autoplay: true,
            smartSpeed: 1000,
            center: true,
            margin: 24,
            dots: true,
            loop: true,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        });
    });
</script>
@endsection