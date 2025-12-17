@extends('layouts.admin')
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h5 class="mb-3">Add New Book</h5>
                <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="name" class="form-control mb-2" placeholder="Book Name" required>
                    <input type="text" name="author" class="form-control mb-2" placeholder="Author" required>
                    <input type="number" name="price" class="form-control mb-2" placeholder="Price" required>
                    <input type="file" name="image" class="form-control mb-2" required>
                    <button type="submit" class="btn btn-primary w-100">Add Product</button>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm p-3">
                <h5>Product List</h5>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td><img src="{{ asset('uploaded_img/'.$product->image) }}" width="50" class="rounded"></td>
                            <td>{{ $product->name }}</td>
                            <td>BDT {{ $product->price }}</td>
                            <td>
                                <a href="{{ url('admin/products/delete/'.$product->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection