@extends('layouts.admin')

@section('title', 'Admin Messages')

@section('admin_content')
<div class="container-xxl py-5" style="min-height:90vh;">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5 text-center px-3">MESSAGES</h1>
        </div>

        @if(session('messages'))
        @foreach(session('messages') as $message)
        <div class="alert alert-success d-flex justify-content-between">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endforeach
        @endif

        <div class="row g-4">
            @forelse($messages as $message)
            <div class="col-md-4 col-sm-6">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <h2 class="card-title h4 text-capitalize">{{ $message->name }}</h2>
                        <p class="mb-1"><b>Email :-</b> {{ $message->email }}</p>
                        <p class="mb-3"><b>Phone No. :-</b> {{ $message->number }}</p>
                        <hr>
                        <p class="card-text"><b>Message :-</b> {{ $message->message }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <a href="{{ route('admin.message.delete', $message->id) }}"
                            onclick="return confirm('delete this message?');"
                            class="btn btn-danger w-100">Delete</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-center">You have no messages!</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection