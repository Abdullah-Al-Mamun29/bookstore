@extends('layouts.app')
@section('content')
<div class="container py-5">
    <h3>Your Shopping Cart</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $grand_total = 0; @endphp
            @foreach($cart_items as $item)
            <tr>
                <td><img src="{{ asset('uploaded_img/'.$item->image) }}" width="50"></td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $sub_total = $item->price * $item->quantity }}</td>
                <td><a href="{{ url('cart/delete/'.$item->id) }}" class="btn btn-danger btn-sm">Remove</a></td>
            </tr>
            @php $grand_total += $sub_total; @endphp
            @endforeach
        </tbody>
    </table>
    <div class="text-end">
        <h4>Grand Total: BDT {{ $grand_total }}</h4>
        <a href="{{ url('checkout') }}" class="btn btn-success">Proceed to Checkout</a>
    </div>
</div>
@endsection