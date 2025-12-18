@extends('layouts.app')

@section('content')
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Signup</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Signup</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-2 mt-4">
    <div class="container signup">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-6">
                <form class="shadow p-4 bg-white" method="POST" action="{{ route('signup') }}">
                    @csrf
                    <div class="text-center mb-5">
                        <h1 class="mb-2 text-center px-3">Signup</h1>
                        @if(session('message'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                <label for="name">Name</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                                <label for="email">Email Address</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                                <label for="password_confirmation">Confirm Password</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <select name="user_type" class="form-select">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                                <label>User Type</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Signup</button>
                        </div>
                        <div class="col-12 text-center">
                            <p>Already have an account? <a class="text-decoration-none" href="{{ route('login') }}">Login</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-primary { background-color: #8e44ad !important; border: none; }
    .page-header { background: linear-gradient(rgba(24, 29, 56, .7), rgba(24, 29, 56, .7)), url('{{ asset("images/carousel-1.jpg") }}') center center no-repeat; background-size: cover; }
</style>
@endsection