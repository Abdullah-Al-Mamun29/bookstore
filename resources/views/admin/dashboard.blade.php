@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card p-4 bg-primary text-white">
            <h3>{{ $total_products }}</h3>
            <p>Products Added</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4 bg-success text-white">
            <h3>{{ $total_orders }}</h3>
            <p>Orders Placed</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4 bg-warning text-dark">
            <h3>{{ $total_users }}</h3>
            <p>Normal Users</p>
        </div>
    </div>
</div>
@endsection