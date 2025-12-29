@extends('layouts.app')

@section('content')
<div class="container-fluid py-5 mb-5 page-header">
    <div class="container py-5 text-center">
        <h1 class="display-3 text-white animated slideInDown">Add Review</h1>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="bg-light p-5 rounded">
                    <form action="{{ route('store.review') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Your Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Your Review</label>
                            <textarea name="review" class="form-control" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-3">Submit Review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-primary {
        background-color: #8e44ad !important;
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
</style>
@endsection