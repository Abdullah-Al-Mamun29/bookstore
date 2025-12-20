@extends('layouts.admin')

@section('title', 'Placed Orders')

@section('admin_content')
<main class="content px-3 py-2">
    <div class="container-fluid">
        <div class="mb-3 text-center mt-3">
            <h1 class="mb-5 text-center px-3">PLACED ORDERS</h1>
        </div>

        @if(session('messages'))
        @foreach(session('messages') as $message)
        <div class="message alert alert-success d-flex justify-content-between" role="alert">
            <span>{{ $message }}</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        @endforeach
        @endif

        <div class="row">
            @if($orders->count() > 0)
            @foreach($orders as $order)
            <div class="col-12 mb-4">
                <div class="card shadow p-4 bg-light">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="col">User ID</th>
                                <td>{{ $order->user_id }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Placed On</th>
                                <td>{{ $order->placed_on }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Name</th>
                                <td>{{ $order->name }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Phone No.</th>
                                <td>{{ $order->number }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Email</th>
                                <td>{{ $order->email }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Address</th>
                                <td>{{ $order->address }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Total Products</th>
                                <td>{{ $order->total_products }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Total Price</th>
                                <td>TK {{ $order->total_price }} /-</td>
                            </tr>
                            <tr>
                                <th scope="col">Payment Method</th>
                                <td>{{ $order->method }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <form action="{{ route('admin.order.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <select name="update_payment" class="form-select mb-3">
                            <option value="" selected disabled>{{ $order->payment_status }}</option>
                            <option value="pending">pending</option>
                            <option value="completed">completed</option>
                        </select>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.order.delete', $order->id) }}"
                                onclick="return confirm('delete this order?');"
                                class="btn btn-danger">delete</a>
                            <input type="submit" value="update" name="update_order" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
            @else
            <p class="text-center">No Orders Placed yet!</p>
            @endif
        </div>
    </div>
</main>
@endsection