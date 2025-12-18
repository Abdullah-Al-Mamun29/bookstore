@extends('layouts.app')

@section('content')
<style>
    .page-header {
        background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)), url("{{ asset('images/carousel-1.jpg') }}");
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 300px;
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
    .btn-update {
        background-color: #8e44ad;
        border: none;
    }
    .btn-checkout {
        background-color: #8e44ad;
        border: none;
    }
    .btn-delete-all {
        background-color: #e74c3c;
        border: none;
    }
</style>

<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown fw-bold">Shopping Cart</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-capitalize-custom">
                        <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">/ Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-4">
    <div class="container">
        <div class="text-center wow fadeInUp mb-2" data-wow-delay="0.1s">
            <h1 class="mb-5 bg-white text-center px-3 fw-bold" style="color: #8e44ad;">Shopping Cart</h1>
        </div>
        
        <div class="container shadow py-4 px-4 bg-white rounded">
            @if(session('message'))
                <div class="alert alert-success d-flex justify-content-between">
                    <span>{{ session('message') }}</span>
                    <i class="fas fa-times" style="cursor:pointer;" onclick="this.parentElement.remove();"></i>
                </div>
            @endif

            <div class="table-responsive d-none d-lg-block">
                <table class="table mt-4 align-middle">
                    <thead>
                        <tr>
                            <th class="text-center">Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $grand_total = 0; @endphp
                        @forelse($cart_items as $item)
                            @php 
                                $sub_total = ($item->quantity * $item->price); 
                                $grand_total += $sub_total; 
                            @endphp
                            <tr>
                                <td class="text-center">
                                    <img src="{{ asset('uploaded_img/'.$item->image) }}" alt="" width="80px" class="img-fluid rounded me-2">
                                    <span class="fw-bold">{{ $item->name }}</span>
                                </td>
                                <td>BDT {{ $item->price }}/-</td>
                                <td>
                                    <form action="{{ route('cart.update') }}" method="POST" class="d-flex align-items-center">
                                        @csrf
                                        <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                        <input type="number" min="1" name="cart_quantity" value="{{ $item->quantity }}" class="form-control text-center" style="width:70px; margin-right: 5px;">
                                        <button type="submit" class="btn btn-update btn-sm text-white">Update</button>
                                    </form>
                                </td>
                                <td class="fw-bold text-dark">BDT {{ $sub_total }}/-</td>
                                <td>
                                    <a href="{{ route('cart.delete', $item->id) }}" class="fas fa-trash-alt text-danger fs-5" onclick="return confirm('Delete this from cart?');"></a>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center py-5 text-muted">Your Cart is Empty</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="row g-3 d-lg-none">
                @foreach($cart_items as $item)
                    @php $sub_total = ($item->quantity * $item->price); @endphp
                    <div class="col-md-6 col-sm-12">
                        <div class="card text-center shadow-sm border-0 mb-3">
                            <img src="{{ asset('uploaded_img/'.$item->image) }}" alt="" class="card-img-top mx-auto mt-3" style="width: 150px;">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $item->name }}</h5>
                                <h6 class="text-muted">Price: BDT {{ $item->price }}/-</h6>
                                <p class="fw-bold" style="color: #8e44ad;">Total: BDT {{ $sub_total }}/-</p>
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                    <div class="d-flex justify-content-center mb-2">
                                        <input type="number" min="1" name="cart_quantity" value="{{ $item->quantity }}" class="form-control text-center" style="width:70px; margin-right: 5px;">
                                        <button type="submit" class="btn btn-update btn-sm text-white">Update</button>
                                    </div>
                                </form>
                                <a href="{{ route('cart.delete', $item->id) }}" class="btn btn-outline-danger btn-sm mt-2" onclick="return confirm('Delete this from cart?');">Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="{{ route('cart.clear') }}" class="btn btn-delete-all text-white px-4 py-2 {{ $grand_total > 0 ? '' : 'disabled' }}" onclick="return confirm('Delete all from cart?');">Delete All</a>
                </div>
            </div>

            <div class="row p-4 mt-4 border-top">
                <div class="col-12 text-center">
                    <h3 class="fw-bold mb-4">Grand Total: <span style="color: #8e44ad;">BDT {{ $grand_total }}/-</span></h3>
                    <div class="d-grid d-md-block gap-3">
                        <a href="{{ route('shop') }}" class="btn btn-success px-4 py-2 me-md-2">Continue Shopping</a>
                        <a href="{{ route('checkout') }}" class="btn btn-checkout text-white px-4 py-2 {{ $grand_total > 0 ? '' : 'disabled' }}">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid px-0 mt-5">
    <div style="background-color: #1a427a; color: #ffffff; padding: 40px 0; border-radius: 0 80px 0 0;" class="text-center shadow-lg">
        <div class="container">
            <p class="mb-0 fw-bold fs-5">Ready to dive into your new books? Complete your order now!</p>
        </div>
    </div>
</div>
@endsection