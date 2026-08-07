<div class="card shadow-sm mx-auto" style="max-width: 800px;">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0 text-dark">Product Details</h1>
        <div>
            <a href="{{ route('products.index') }}" class="btn btn-secondary me-2">Back</a>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning text-dark fw-semibold">Edit</a>
        </div>
    </div>
    
    <div class="card-body">
        <h2 class="h4 border-bottom pb-2 mb-3">{{ $product->name }}</h2>

        <div class="row g-3">
            <!-- Product Code -->
            <div class="col-md-6">
                <span class="text-muted d-block small">Product Code</span>
                <strong>{{ $product->product_code ?? 'N/A' }}</strong>
            </div>

            <!-- Category -->
            <div class="col-md-6">
                <span class="text-muted d-block small">Category</span>
                <strong>{{ $product->category ?? 'N/A' }}</strong>
            </div>

            <!-- Brand -->
            <div class="col-md-6">
                <span class="text-muted d-block small">Brand</span>
                <strong>{{ $product->brand ?? 'N/A' }}</strong>
            </div>

            <!-- Status -->
            <div class="col-md-6">
                <span class="text-muted d-block small">Status</span>
                <span class="badge bg-secondary text-uppercase">{{ $product->status ?? 'N/A' }}</span>
            </div>

            <!-- Short Description -->
            <div class="col-12">
                <span class="text-muted d-block small">Short Description</span>
                <p class="mb-0">{{ $product->short_description ?? 'No short description provided.' }}</p>
            </div>

            <!-- Description -->
            <div class="col-12">
                <span class="text-muted d-block small">Detailed Description</span>
                <p class="mb-0 text-wrap" style="white-space: pre-line;">{{ $product->description ?? 'No detailed description provided.' }}</p>
            </div>

            <div class="col-12 border-top my-3"></div>

            <!-- Price -->
            <div class="col-md-4">
                <span class="text-muted d-block small">Original Price</span>
                <strong>${{ number_format($product->price, 2) }}</strong>
            </div>

            <!-- Discount -->
            <div class="col-md-4">
                <span class="text-muted d-block small">Discount</span>
                <strong>{{ number_format($product->discount, 2) }}%</strong>
            </div>

            <!-- Final Price -->
            <div class="col-md-4">
                <span class="text-muted d-block small">Final Price</span>
                <strong class="text-primary h5">${{ number_format($product->final_price ?? ($product->price - ($product->price * ($product->discount / 100))), 2) }}</strong>
            </div>

            <!-- Stock Quantity -->
            <div class="col-md-4">
                <span class="text-muted d-block small">Stock Quantity</span>
                <strong>{{ $product->stock_quantity }} {{ $product->unit ?? 'pcs' }}</strong>
            </div>

            <!-- Min Stock Level -->
            <div class="col-md-4">
                <span class="text-muted d-block small">Min Stock Level</span>
                <strong>{{ $product->min_stock_level }} {{ $product->unit ?? 'pcs' }}</strong>
            </div>

            <!-- Availability -->
            <div class="col-md-4">
                <span class="text-muted d-block small">Availability</span>
                @if(!$product->is_available)
                    <span class="badge bg-danger">Unavailable</span>
                @else
                    <span class="badge bg-success">Active / Available</span>
                @endif
            </div>

            <div class="col-12 border-top my-3"></div>

            <!-- Color -->
            <div class="col-md-3">
                <span class="text-muted d-block small">Color</span>
                <strong>{{ $product->color ?? 'N/A' }}</strong>
            </div>

            <!-- Size -->
            <div class="col-md-3">
                <span class="text-muted d-block small">Size</span>
                <strong>{{ $product->size ?? 'N/A' }}</strong>
            </div>

            <!-- Material -->
            <div class="col-md-3">
                <span class="text-muted d-block small">Material</span>
                <strong>{{ $product->material ?? 'N/A' }}</strong>
            </div>

            <!-- Weight -->
            <div class="col-md-3">
                <span class="text-muted d-block small">Weight</span>
                <strong>{{ $product->weight ? $product->weight . ' kg' : 'N/A' }}</strong>
            </div>

            <!-- Featured -->
            <div class="col-md-6 mt-3">
                <div class="form-check ps-0">
                    <strong>Featured Product:</strong>
                    @if($product->featured)
                        <span class="text-success"><i class="fa-solid fa-circle-check"></i> Yes</span>
                    @else
                        <span class="text-muted">No</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
