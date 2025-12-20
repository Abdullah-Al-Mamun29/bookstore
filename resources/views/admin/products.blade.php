@extends('layouts.admin')

@section('title', 'All Books')

@section('admin_content')
<div class="container-xxl py-5" style="min-height:90vh;">
    <div class="container">
        <div class="col-12 d-flex justify-content-between align-items-center wow fadeInUp" data-wow-delay="0.1s">
            <h1>All Books</h1>
            <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#add">
                Add New Book
            </button>
        </div>

        <div class="row mt-5">
            <table class="table border">
                <thead>
                    <tr>
                        <th scope="col">Sr. No.</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Author</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $key => $product)
                    <tr>
                        <th scope="row" class="py-3">{{ $key + 1 }}</th>
                        <td class="py-3">
                            <img src="{{ asset('uploaded_img/' . $product->image) }}" alt="{{ $product->name }}" width="60px">
                        </td>
                        <td class="py-3">{{ $product->name }}</td>
                        <td class="py-3">{{ $product->author }}</td>
                        <td class="py-3">
                            <span class="badge bg-secondary">{{ $product->category }}</span>
                        </td>
                        <td class="py-3">TK {{ $product->price }} /-</td>
                        <td class="py-3">
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $product->id }}">
                                    Edit
                                </button>
                                <a href="{{ route('admin.product.delete', $product->id) }}"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this product?');">
                                    Delete
                                </a>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="edit{{ $product->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Edit Book</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label class="form-label text-dark">Current Image</label><br>
                                                <img src="{{ asset('uploaded_img/' . $product->image) }}" width="80" class="mb-2 border">
                                                <input type="file" class="form-control" name="image" accept="image/jpg, image/jpeg, image/png">
                                            </div>
                                            <div class="col-md-6 text-dark">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="edit_name" name="name" value="{{ $product->name }}" required>
                                                    <label for="edit_name">Book Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-dark">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="edit_author" name="author" value="{{ $product->author }}" required>
                                                    <label for="edit_author">Author Name</label>
                                                </div>
                                            </div>
                                            <div class="col-12 text-dark">
                                                <div class="form-floating">
                                                    <select class="form-select" name="category" required>
                                                        @php
                                                        $categories_list = DB::table('categories')->get();
                                                        @endphp
                                                        @foreach($categories_list as $cat)
                                                        <option value="{{ $cat->cat_name }}" {{ $product->category == $cat->cat_name ? 'selected' : '' }}>
                                                            {{ $cat->cat_name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    <label>Category</label>
                                                </div>
                                            </div>
                                            <div class="col-12 text-dark">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control" id="edit_price" name="price" value="{{ $product->price }}" required>
                                                    <label for="edit_price">Price</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-success w-100 py-3" type="submit">Update Book Information</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <p class="empty">No products added yet!</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Book</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label text-dark">Book Image</label>
                            <input type="file" class="form-control" name="image" accept="image/jpg, image/jpeg, image/png" required>
                        </div>
                        <div class="col-md-6 text-dark">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="Book Name" name="name" required>
                                <label for="name">Book Name</label>
                            </div>
                        </div>
                        <div class="col-md-6 text-dark">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="author" placeholder="Author Name" name="author" required>
                                <label for="author">Author Name</label>
                            </div>
                        </div>
                        <div class="col-12 text-dark">
                            <div class="form-floating">
                                <select class="form-select" id="category" name="category" required>
                                    <option value="" selected disabled>Select Category</option>
                                    @php
                                    $categories_list = DB::table('categories')->get();
                                    @endphp
                                    @foreach($categories_list as $cat)
                                    <option value="{{ $cat->cat_name }}">{{ $cat->cat_name }}</option>
                                    @endforeach
                                </select>
                                <label for="category">Category</label>
                            </div>
                        </div>
                        <div class="col-12 text-dark">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="price" placeholder="Price" name="price" required>
                                <label for="price">Price</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Add Book</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection