@extends('layouts.app')
@section('content')
<div class="container py-5">
    <h3>Delivery Address & Payment</h3>
    <form action="{{ url('place-order') }}" method="POST">
        @csrf
        <input type="text" name="address" class="form-control mb-2" placeholder="Full Address" required>
        <input type="text" name="phone" class="form-control mb-2" placeholder="Phone Number" required>
        <select name="method" class="form-control mb-2">
            <option value="cash on delivery">Cash on Delivery</option>
            <option value="bkash">bKash</option>
        </select>
        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
</div>
@endsection