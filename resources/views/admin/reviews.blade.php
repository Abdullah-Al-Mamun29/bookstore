@extends('layouts.admin')

@section('title', 'User Reviews')

@section('admin_content')
<main class="content px-3 py-2">
    <div class="container-fluid">
        <div class="mb-3 text-center mt-3">
            <h1 class="mb-5 text-center px-3">REVIEWS</h1>
        </div>

        @if(session('messages'))
        @foreach(session('messages') as $message)
        <div class="message alert alert-success d-flex justify-content-between" role="alert">
            <span>{{ $message }}</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        @endforeach
        @endif

        <div class="row g-4">
            @forelse($reviews as $review)
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <h2 class="card-title text-capitalize h4">{{ $review->name }}</h2>
                        <p class="text-muted">{{ $review->review }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <a href="{{ route('admin.review.delete', $review->id) }}"
                            onclick="return confirm('Delete this Review?');"
                            class="btn btn-danger w-100">Delete</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-center">You have no reviews!</p>
            </div>
            @endforelse
        </div>
    </div>
</main>
@endsection