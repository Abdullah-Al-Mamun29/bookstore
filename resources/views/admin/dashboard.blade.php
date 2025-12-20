@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('admin_content')
<div class="mb-3">
    <h4>Admin Dashboard</h4>
</div>

<div class="row">
    <div class="col-12 d-flex">
        <div class="card flex-fill border-0 illustration">
            <div class="card-body p-0 d-flex flex-fill">
                <div class="row g-0 w-100 align-items-center">
                    <div class="col-6">
                        @if(Session::has('admin_name'))
                        <div class="p-3 m-1">
                            <h4>Welcome Back,
                                <span style="text-transform:uppercase;">{{ Session::get('admin_name') }}</span>
                            </h4>
                        </div>
                        @endif
                    </div>
                    <div class="col-6 align-self-end text-end">
                        <img src="{{ asset('images/customer-support.jpg') }}" class="img-fluid illustration-img" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row align-items-center mt-3">
    <div class="col-12 col-md-6 col-xl-3 mb-3">
        <div class="card border-0 illustration py-4 text-center">
            <div class="card-body p-0">
                <h1>BDT {{ $total_pendings }}/-</h1><br>
                <p class="btn btn-primary btn-sm text-white p-2">Total Pending</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-xl-3 mb-3">
        <div class="card border-0 illustration py-4 text-center">
            <div class="card-body p-0">
                <h1>BDT {{ $total_completed }}/-</h1><br>
                <p class="btn btn-primary btn-sm text-white p-2">Complete Payments</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-xl-3 mb-3">
        <div class="card border-0 illustration py-4 text-center">
            <div class="card-body p-0">
                <h1>{{ $number_of_orders }}</h1><br>
                <p class="btn btn-primary btn-sm text-white p-2">Order Placed</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-xl-3 mb-3">
        <div class="card border-0 illustration py-4 text-center">
            <div class="card-body p-0">
                <h1>{{ $number_of_products }}</h1><br>
                <p class="btn btn-primary btn-sm text-white p-2">Products Added</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-xl-3 mb-3">
        <div class="card border-0 illustration py-4 text-center">
            <div class="card-body p-0">
                <h1>{{ $number_of_users }}</h1><br>
                <p class="btn btn-primary btn-sm text-white p-2">Normal Users</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-xl-3 mb-3">
        <div class="card border-0 illustration py-4 text-center">
            <div class="card-body p-0">
                <h1>{{ $number_of_admins }}</h1><br>
                <p class="btn btn-primary btn-sm text-white p-2">Admin Users</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-xl-3 mb-3">
        <div class="card border-0 illustration py-4 text-center">
            <div class="card-body p-0">
                <h1>{{ $number_of_account }}</h1><br>
                <p class="btn btn-primary btn-sm text-white p-2">Total Accounts</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-xl-3 mb-3">
        <div class="card border-0 illustration py-4 text-center">
            <div class="card-body p-0">
                <h1>{{ $number_of_messages }}</h1><br>
                <p class="btn btn-primary btn-sm text-white p-2">New Messages</p>
            </div>
        </div>
    </div>
</div>
@endsection