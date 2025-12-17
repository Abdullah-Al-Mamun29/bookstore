<!DOCTYPE html>
<html>
<head>
    <title>Book Point</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container py-5">
    <h2 class="text-center mb-5">Latest Books</h2>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="{{ asset('uploaded_img/'.$product->image) }}" class="card-img-top" style="height: 300px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5>{{ $product->name }}</h5>
                    <p class="text-muted">{{ $product->author }}</p>
                    <div class="text-primary fw-bold mb-3">BDT {{ $product->price }}/-</div>
                    
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <input type="hidden" name="image" value="{{ $product->image }}">
                        <input type="number" name="quantity" value="1" min="1" class="form-control mb-2 w-50 mx-auto">
                        <button type="submit" class="btn btn-primary">Add To Cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

</body>
</html>