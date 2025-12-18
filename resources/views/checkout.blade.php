@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <h4 class="mb-4">Place Your Order</h4>
            <form action="{{ route('order.place') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Country</label>
                        <select name="country" class="form-control" required>
                            <option value="">Select an option....</option>
                            <option value="Bangladesh">Bangladesh</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>State</label>
                        <select name="state" class="form-control" required>
                            <option value="">Select an option....</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Chattogram">Chattogram</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Barishal">Barishal</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Mymensingh">Mymensingh</option>
                            <option value="Cumilla">Cumilla</option>
                            <option value="Gazipur">Gazipur</option>
                            <option value="Narayanganj">Narayanganj</option>
                            <option value="Bogura">Bogura</option>
                            <option value="Kushtia">Kushtia</option>
                            <option value="Jessore">Jessore</option>
                            <option value="Coxs Bazar">Cox's Bazar</option>
                            <option value="Brahmanbaria">Brahmanbaria</option>
                            <option value="Dinajpur">Dinajpur</option>
                            <option value="Feni">Feni</option>
                            <option value="Tangail">Tangail</option>
                            <option value="Noakhali">Noakhali</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Town / City</label>
                        <input type="text" name="city" class="form-control" placeholder="City" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Phone No.</label>
                        <input type="text" name="number" class="form-control" placeholder="Mobile Number" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Address</label>
                    <input type="text" name="flat" class="form-control" placeholder="e.g. Flat No." required>
                </div>
                <div class="mb-3">
                    <label>Address 2 (Optional)</label>
                    <input type="text" name="street" class="form-control" placeholder="e.g. Street Name">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Postcode</label>
                        <input type="text" name="pin_code" class="form-control" placeholder="e.g. 1200" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Payment Method</label>
                        <select name="method" class="form-control" required>
                            <option value="cash on delivery">Cash On Delivery</option>
                            <option value="bkash">bKash</option>
                            <option value="nagad">Nagad</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 p-3 mt-2" style="background-color: #8e44ad; border: none;">ORDER NOW</button>
            </form>
        </div>

        <div class="col-md-4">
            <h4 class="text-muted d-flex justify-content-between align-items-center mb-3">
                Your cart
            </h4>
            <ul class="list-group mb-3">
                @php $grand_total = 0; @endphp
                @foreach($cart_items as $item)
                    @php $grand_total += ($item->price * $item->quantity); @endphp
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{ $item->name }}</h6>
                            <small class="text-muted">Quantity: {{ $item->quantity }}</small>
                        </div>
                        <span class="text-muted">BDT {{ $item->price * $item->quantity }}/-</span>
                    </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total</span>
                    <strong>BDT {{ $grand_total }} /-</strong>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection