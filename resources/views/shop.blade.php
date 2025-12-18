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
    .card img {
        transition: .3s;
    }
    .card:hover img {
        transform: scale(1.05);
    }
    .btn-cart {
        background-color: #8e44ad;
        border: none;
        transition: 0.3s;
    }
    .btn-cart:hover {
        background-color: #732d91;
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
                <h1 class="display-3 text-white animated slideInDown fw-bold">Books</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">/ Books</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h3 class="mb-5 fw-bold" style="color: #8e44ad; text-transform: uppercase; letter-spacing: 1px;">All Books</h3>
        </div>

        <div class="row g-4">
            @forelse($products as $product)
                <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card shadow border-0 h-100">
                        <div class="overflow-hidden">
                            <a href="#">
                                <img src="{{ asset('uploaded_img/' . $product->image) }}" class="card-img-top" 
                                     alt="{{ $product->name }}" style="height:400px; object-fit: cover; width:100%;">
                            </a>
                        </div>
                        <div class="card-body p-4 text-center">
                            <h5 class="card-title fw-bold">
                                <a href="#" class="text-dark text-decoration-none">{{ $product->name }}</a>
                            </h5>
                            <p class="text-muted small mb-3">{{ $product->author }}</p>

                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="fw-bold fs-5 text-dark">BDT {{ $product->price }}/-</span>
                                    <input type="number" min="1" name="quantity" value="1" 
                                           class="form-control text-center shadow-sm" style="width:75px;">
                                </div>
                                
                                <input type="hidden" name="name" value="{{ $product->name }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <input type="hidden" name="image" value="{{ $product->image }}">
                                
                                <button type="submit" class="btn btn-cart text-white w-100 py-2 fw-bold shadow-sm">
                                    <i class="fas fa-shopping-cart me-2"></i>Add to cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="alert alert-info shadow-sm d-inline-block px-5">No products added yet!</div>
                </div>
            @endforelse
        </div>
    </div>
</div>

<div class="container-fluid px-0 mt-5">
    <div style="background-color: #1a427a; color: #ffffff; padding: 40px 0; border-radius: 0 80px 0 0;" class="text-center shadow-lg">
        <div class="container">
            <p class="mb-0 fw-bold fs-5">Find your next favorite story at Book Point. Happy reading!</p>
        </div>
    </div>
</div>
@endsection