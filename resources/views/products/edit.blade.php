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

    .form-control:focus, .form-select:focus {
        border-color: #a855f7;
        box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.15);
    }

    .btn-update-product {
        background: linear-gradient(135deg, #f59e0b, #ec4899);
        color: #ffffff;
        border: none;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(245, 158, 11, 0.2);
    }

    .btn-update-product:hover {
        background: linear-gradient(135deg, #d97706, #db2777);
        color: #ffffff;
        transform: translateY(-1px);
        box-shadow: 0 6px 15px rgba(245, 158, 11, 0.3);
    }
</style>

<div class="card product-card mx-auto" style="max-width: 800px;">
    <div class="card-header product-header-gradient">
        <h1 class="h3 mb-0">Edit Product: {{ $product->name }}</h1>
    </div>
    
    <div class="card-body p-4">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <!-- Product Code -->
                <div class="col-md-6">
                    <label for="product_code" class="form-label fw-semibold">Product Code</label>
                    <input type="text" name="product_code" id="product_code" class="form-control" value="{{ old('product_code', $product->product_code) }}" placeholder="e.g. PROD-101">
                </div>

                <!-- Name -->
                <div class="col-md-6">
                    <label for="name" class="form-label fw-semibold">Product Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" placeholder="e.g. Wireless Mouse" required>
                </div>

                <!-- Category -->
                <div class="col-md-6">
                    <label for="category" class="form-label fw-semibold">Category</label>
                    <input type="text" name="category" id="category" class="form-control" value="{{ old('category', $product->category) }}" placeholder="e.g. Electronics">
                </div>

                <!-- Brand -->
                <div class="col-md-6">
                    <label for="brand" class="form-label fw-semibold">Brand</label>
                    <input type="text" name="brand" id="brand" class="form-control" value="{{ old('brand', $product->brand) }}" placeholder="e.g. Logitech">
                </div>

                <!-- Short Description -->
                <div class="col-12">
                    <label for="short_description" class="form-label fw-semibold">Short Description</label>
                    <input type="text" name="short_description" id="short_description" class="form-control" value="{{ old('short_description', $product->short_description) }}" placeholder="Brief summary of the product">
                </div>

                <!-- Description -->
                <div class="col-12">
                    <label for="description" class="form-label fw-semibold">Detailed Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3" placeholder="Full product specifications and details">{{ old('description', $product->description) }}</textarea>
                </div>

                <!-- Price -->
                <div class="col-md-4">
                    <label for="price" class="form-label fw-semibold">Price ($) <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" placeholder="0.00" required>
                </div>

                <!-- Discount -->
                <div class="col-md-4">
                    <label for="discount" class="form-label fw-semibold">Discount (%)</label>
                    <input type="number" step="0.01" name="discount" id="discount" class="form-control" value="{{ old('discount', $product->discount) }}" placeholder="0.00">
                </div>

                <!-- Final Price -->
                <div class="col-md-4">
                    <label for="final_price" class="form-label fw-semibold">Final Price ($)</label>
                    <input type="number" step="0.01" name="final_price" id="final_price" class="form-control" value="{{ old('final_price', $product->final_price) }}" placeholder="Leave blank to auto-calculate">
                </div>

                <!-- Stock Quantity -->
                <div class="col-md-4">
                    <label for="stock_quantity" class="form-label fw-semibold">Stock Quantity</label>
                    <input type="number" name="stock_quantity" id="stock_quantity" class="form-control" value="{{ old('stock_quantity', $product->stock_quantity) }}">
                </div>

                <!-- Min Stock Level -->
                <div class="col-md-4">
                    <label for="min_stock_level" class="form-label fw-semibold">Min Stock Level</label>
                    <input type="number" name="min_stock_level" id="min_stock_level" class="form-control" value="{{ old('min_stock_level', $product->min_stock_level) }}">
                </div>

                <!-- Unit -->
                <div class="col-md-4">
                    <label for="unit" class="form-label fw-semibold">Unit</label>
                    <input type="text" name="unit" id="unit" class="form-control" value="{{ old('unit', $product->unit) }}" placeholder="e.g. pcs, box, kg">
                </div>

                <!-- Color -->
                <div class="col-md-3">
                    <label for="color" class="form-label fw-semibold">Color</label>
                    <input type="text" name="color" id="color" class="form-control" value="{{ old('color', $product->color) }}" placeholder="e.g. Black">
                </div>

                <!-- Size -->
                <div class="col-md-3">
                    <label for="size" class="form-label fw-semibold">Size</label>
                    <input type="text" name="size" id="size" class="form-control" value="{{ old('size', $product->size) }}" placeholder="e.g. Medium, 14 inch">
                </div>

                <!-- Material -->
                <div class="col-md-3">
                    <label for="material" class="form-label fw-semibold">Material</label>
                    <input type="text" name="material" id="material" class="form-control" value="{{ old('material', $product->material) }}" placeholder="e.g. Plastic">
                </div>

                <!-- Weight -->
                <div class="col-md-3">
                    <label for="weight" class="form-label fw-semibold">Weight (kg)</label>
                    <input type="number" step="0.01" name="weight" id="weight" class="form-control" value="{{ old('weight', $product->weight) }}" placeholder="0.00">
                </div>

                <!-- Status -->
                <div class="col-md-6">
                    <label for="status" class="form-label fw-semibold">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="active" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="draft" {{ old('status', $product->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>

                <!-- Checkboxes (Featured & Available) -->
                <div class="col-md-6 d-flex align-items-end pb-2">
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" name="featured" id="featured" value="1" {{ old('featured', $product->featured) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold text-dark" for="featured">
                            Featured Product
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_available" id="is_available" value="1" {{ old('is_available', $product->is_available) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold text-dark" for="is_available">
                            Is Available
                        </label>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-update-product">Update Product</button>
            </div>
        </form>
    </div>
</div>
