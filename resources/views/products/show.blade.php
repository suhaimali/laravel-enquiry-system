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

    .btn-action-back {
        background: rgba(255, 255, 255, 0.2);
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(10px);
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-action-back:hover {
        background: #ffffff;
        color: #6366f1;
        transform: translateY(-1px);
    }

    .btn-action-edit {
        background: #ffffff;
        color: #a855f7;
        border: none;
        font-weight: 700;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-action-edit:hover {
        background: #f3e8ff;
        color: #7e22ce;
        transform: translateY(-1px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    .detail-label {
        font-weight: 700;
        color: #4f46e5;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .detail-value {
        font-size: 1.05rem;
        color: #1e293b;
        display: block;
        margin-top: 0.15rem;
    }
</style>

<div class="card product-card mx-auto" style="max-width: 800px;">
    <div class="card-header product-header-gradient d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0">Product Details</h1>
        <div>
            <a href="{{ route('products.index') }}" class="btn btn-action-back me-2">Back</a>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-action-edit">Edit</a>
        </div>
    </div>
    
    <div class="card-body p-4">
        <h2 class="h4 border-bottom pb-2 mb-4 text-indigo fw-bold">{{ $product->name }}</h2>

        <div class="row g-4">
            <!-- Product Code -->
            <div class="col-md-6">
                <span class="detail-label">Product Code</span>
                <span class="detail-value"><code>{{ $product->product_code ?? 'N/A' }}</code></span>
            </div>

            <!-- Category -->
            <div class="col-md-6">
                <span class="detail-label">Category</span>
                <span class="detail-value fw-semibold">{{ $product->category ?? 'N/A' }}</span>
            </div>

            <!-- Brand -->
            <div class="col-md-6">
                <span class="detail-label">Brand</span>
                <span class="detail-value fw-semibold">{{ $product->brand ?? 'N/A' }}</span>
            </div>

            <!-- Status -->
            <div class="col-md-6">
                <span class="detail-label">Status</span>
                <span class="detail-value">
                    <span class="badge bg-light text-primary border border-primary text-uppercase">{{ $product->status ?? 'N/A' }}</span>
                </span>
            </div>

            <!-- Short Description -->
            <div class="col-12">
                <span class="detail-label">Short Description</span>
                <span class="detail-value text-secondary">{{ $product->short_description ?? 'No short description provided.' }}</span>
            </div>

            <!-- Description -->
            <div class="col-12">
                <span class="detail-label">Detailed Description</span>
                <span class="detail-value text-secondary text-wrap" style="white-space: pre-line;">{{ $product->description ?? 'No detailed description provided.' }}</span>
            </div>

            <div class="col-12 border-top my-2"></div>

            <!-- Price -->
            <div class="col-md-4">
                <span class="detail-label">Original Price</span>
                <span class="detail-value fw-bold">${{ number_format($product->price, 2) }}</span>
            </div>

            <!-- Discount -->
            <div class="col-md-4">
                <span class="detail-label">Discount</span>
                <span class="detail-value text-danger fw-bold">{{ number_format($product->discount, 2) }}%</span>
            </div>

            <!-- Final Price -->
            <div class="col-md-4">
                <span class="detail-label">Final Price</span>
                <span class="detail-value text-success h5 fw-extrabold">${{ number_format($product->final_price ?? ($product->price - ($product->price * ($product->discount / 100))), 2) }}</span>
            </div>

            <!-- Stock Quantity -->
            <div class="col-md-4">
                <span class="detail-label">Stock Quantity</span>
                <span class="detail-value">{{ $product->stock_quantity }} {{ $product->unit ?? 'pcs' }}</span>
            </div>

            <!-- Min Stock Level -->
            <div class="col-md-4">
                <span class="detail-label">Min Stock Level</span>
                <span class="detail-value">{{ $product->min_stock_level }} {{ $product->unit ?? 'pcs' }}</span>
            </div>

            <!-- Availability -->
            <div class="col-md-4">
                <span class="detail-label">Availability</span>
                <span class="detail-value">
                    @if(!$product->is_available)
                        <span class="badge bg-danger">Unavailable</span>
                    @else
                        <span class="badge bg-success">Active / Available</span>
                    @endif
                </span>
            </div>

            <div class="col-12 border-top my-2"></div>

            <!-- Color -->
            <div class="col-md-3">
                <span class="detail-label">Color</span>
                <span class="detail-value">{{ $product->color ?? 'N/A' }}</span>
            </div>

            <!-- Size -->
            <div class="col-md-3">
                <span class="detail-label">Size</span>
                <span class="detail-value">{{ $product->size ?? 'N/A' }}</span>
            </div>

            <!-- Material -->
            <div class="col-md-3">
                <span class="detail-label">Material</span>
                <span class="detail-value">{{ $product->material ?? 'N/A' }}</span>
            </div>

            <!-- Weight -->
            <div class="col-md-3">
                <span class="detail-label">Weight</span>
                <span class="detail-value fw-semibold">{{ $product->weight ? $product->weight . ' kg' : 'N/A' }}</span>
            </div>

            <!-- Featured -->
            <div class="col-md-6 mt-3">
                <div class="form-check ps-0">
                    <span class="detail-label d-inline-block me-2">Featured Product:</span>
                    @if($product->featured)
                        <span class="badge bg-warning text-dark fw-bold">YES</span>
                    @else
                        <span class="badge bg-light text-muted border">NO</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
