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
    .text-capitalize-custom {
        text-transform: capitalize;
    }
    .btn-search {
        background-color: #8e44ad;
        border: none;
        color: white;
    }
    .btn-cart {
        background-color: #8e44ad;
        border: none;
        transition: 0.3s;
    }
    .btn-cart:hover {
        background-color: #732d91;
    }
</style>

<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown fw-bold">Search</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-capitalize-custom">
                        <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">/ Search</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-8">
                <form action="{{ route('search') }}" method="GET" class="d-flex shadow-sm">
                    <input type="text" name="query" placeholder="Search Books..." class="form-control p-3 border-0" value="{{ request('query') }}" required>
                    <button type="submit" class="btn btn-search px-4 fw-bold shadow-sm">Submit</button>
                </form>
            </div>

            <div class="col-12 mt-4">
                @if(session('success'))
                    <div class="alert alert-success d-flex justify-content-between shadow-sm">
                        <span>{{ session('success') }}</span>
                        <i class="fas fa-times" style="cursor:pointer;" onclick="this.parentElement.remove();"></i>
                    </div>
                @endif
            </div>

            <div class="row g-4 mt-2">
                @if(isset($products) && $products->count() > 0)
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="card shadow border-0 h-100">
                                <div class="overflow-hidden">
                                    <img src="{{ asset('uploaded_img/' . $product->image) }}" class="card-img-top" 
                                         alt="{{ $product->name }}" style="height:350px; object-fit: cover;">
                                </div>
                                <div class="card-body p-4 text-center">
                                    <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                                    <p class="text-muted small mb-2">{{ $product->author }}</p>
                                    <p class="fw-bold fs-5 text-dark mb-3">BDT {{ $product->price }}/-</p>

                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <div class="d-flex justify-content-center align-items-center mb-3">
                                            <input type="number" min="1" name="product_quantity" value="1" 
                                                   class="form-control text-center shadow-sm" style="width:75px;">
                                        </div>
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-cart text-white w-100 py-2 fw-bold shadow-sm">
                                            <i class="fas fa-shopping-cart me-2"></i>Add to cart
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @elseif(request()->has('query'))
                    <div class="col-12 text-center py-5">
                        <img src="{{ asset('images/not_found.jpg') }}" alt="not found" style="max-width: 400px;" class="img-fluid mb-4">
                        <h4 class="text-muted">No books found for "{{ request('query') }}"</h4>
                    </div>
                @else
                    <div class="col-12 text-center py-5">
                        <p class="fs-5 text-muted italic">Type something to search for your favorite books!</p>
                    </div>
                @endif
            </div>
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