<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">

    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0 text-dark">Products List</h1>
                <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
            </div>
            
            <div class="card-body">
                <!-- Success Message -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th class="text-end" style="min-width: 200px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($products) && count($products) > 0)
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->product_code ?? 'N/A' }}</td>
                                        <td><strong>{{ $product->name }}</strong></td>
                                        <td>{{ $product->category ?? 'N/A' }}</td>
                                        <td>{{ $product->brand ?? 'N/A' }}</td>
                                        <td>
                                            @if($product->discount > 0)
                                                <del class="text-muted small">${{ number_format($product->price, 2) }}</del><br>
                                            @endif
                                            <span class="fw-bold">${{ number_format($product->final_price ?? ($product->price - ($product->price * ($product->discount / 100))), 2) }}</span>
                                        </td>
                                        <td>{{ $product->stock_quantity }} {{ $product->unit ?? 'pcs' }}</td>
                                        <td>
                                            @if(!$product->is_available)
                                                <span class="badge bg-danger">Unavailable</span>
                                            @elseif($product->stock_quantity <= $product->min_stock_level)
                                                <span class="badge bg-warning text-dark">Low Stock</span>
                                            @else
                                                <span class="badge bg-success">Available</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm text-white">View</a>
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm text-dark">Edit</a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-center py-4 text-muted">No products found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
