@extends('layouts.admin')

@section('title', 'Categories')

@section('admin_content')
<div class="container-xxl py-5" style="min-height:90vh;">
    <div class="container">
        <div class="d-flex justify-content-between wow fadeInUp" data-wow-delay="0.1s">
            <h1>CATEGORIES</h1>
            <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#add">
                Add Category
            </button>
        </div>

        @if(session('messages'))
        @foreach(session('messages') as $message)
        <div class="alert alert-success mt-3">{{ $message }}</div>
        @endforeach
        @endif

        <div class="row mt-5">
            <table class="table border">
                <thead>
                    <tr>
                        <th scope="col">Sr. No.</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <th scope="row" class="py-3">{{ $category->id }}</th>
                        <td class="py-3 text-primary">{{ $category->cat_icon }}</td>
                        <td class="py-3">{{ $category->cat_name }}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="Category Name" name="name" required>
                                <label for="name">Category Name</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="icon" placeholder="Category Icon" name="icon" required>
                                <label for="icon">Category Icon (e.g. fa-book)</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Add Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection