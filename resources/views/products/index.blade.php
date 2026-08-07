<style>
    .product-card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(79, 70, 229, 0.08);
        overflow: hidden;
        background: #ffffff;
    }

    .product-header-gradient {
        background: linear-gradient(135deg, #6366f1 0%, #a855f7 50%, #ec4899 100%);
        color: #ffffff;
        border: none;
        padding: 1.5rem 2rem !important;
    }

    .product-header-gradient h1 {
        color: #ffffff !important;
        font-weight: 800;
        letter-spacing: -0.5px;
    }

    .btn-add-product {
        background: rgba(255, 255, 255, 0.2);
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(10px);
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-add-product:hover {
        background: #ffffff;
        color: #6366f1;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .table-hover tbody tr:hover {
        background-color: rgba(99, 102, 241, 0.03);
    }

    .badge-available {
        background: linear-gradient(135deg, #10b981, #059669);
        box-shadow: 0 4px 10px rgba(16, 185, 129, 0.2);
    }

    .badge-low-stock {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        box-shadow: 0 4px 10px rgba(245, 158, 11, 0.2);
    }

    .badge-unavailable {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        box-shadow: 0 4px 10px rgba(239, 68, 68, 0.2);
    }

    .action-btn-view {
        background: linear-gradient(135deg, #0ea5e9, #0284c7);
        color: #ffffff;
        border: none;
        box-shadow: 0 3px 8px rgba(14, 165, 233, 0.2);
        transition: all 0.2s ease;
    }

    .action-btn-edit {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: #ffffff;
        border: none;
        box-shadow: 0 3px 8px rgba(245, 158, 11, 0.2);
        transition: all 0.2s ease;
    }

    .action-btn-delete {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: #ffffff;
        border: none;
        box-shadow: 0 3px 8px rgba(239, 68, 68, 0.2);
        transition: all 0.2s ease;
    }

    .action-btn-view:hover, .action-btn-edit:hover, .action-btn-delete:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        color: #ffffff;
    }
</style>

<div class="card product-card">
    <div class="card-header product-header-gradient d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0">Products List</h1>
        <a href="{{ route('products.create') }}" class="btn btn-add-product">Add Product</a>
    </div>
    
    <div class="card-body p-4">
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
                                <td><code class="text-indigo">{{ $product->product_code ?? 'N/A' }}</code></td>
                                <td><strong class="text-dark">{{ $product->name }}</strong></td>
                                <td><span class="text-secondary">{{ $product->category ?? 'N/A' }}</span></td>
                                <td><span class="text-secondary">{{ $product->brand ?? 'N/A' }}</span></td>
                                <td>
                                    @if($product->discount > 0)
                                        <del class="text-muted small">${{ number_format($product->price, 2) }}</del><br>
                                    @endif
                                    <span class="fw-bold text-dark">${{ number_format($product->final_price ?? ($product->price - ($product->price * ($product->discount / 100))), 2) }}</span>
                                </td>
                                <td><span class="badge bg-light text-dark border">{{ $product->stock_quantity }} {{ $product->unit ?? 'pcs' }}</span></td>
                                <td>
                                    @if(!$product->is_available)
                                        <span class="badge badge-unavailable">Unavailable</span>
                                    @elseif($product->stock_quantity <= $product->min_stock_level)
                                        <span class="badge badge-low-stock">Low Stock</span>
                                    @else
                                        <span class="badge badge-available">Available</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn action-btn-view btn-sm text-white">View</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn action-btn-edit btn-sm">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn action-btn-delete btn-sm">Delete</button>
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
