<style>
    :root {
        --primary-grad: linear-gradient(135deg, #ff007f 0%, #7f00ff 50%, #00f0ff 100%);
        --bg-color: #0b071e;
        --card-bg: rgba(255, 255, 255, 0.04);
        --card-border: rgba(255, 255, 255, 0.08);
        --text-primary: #ffffff;
        --text-secondary: #b5b2c9;
        --input-bg: rgba(255, 255, 255, 0.05);
        --input-border: rgba(255, 255, 255, 0.1);
        --input-focus: #00f0ff;
        --success-color: #00ff88;
        --error-color: #ff3b30;
        --accent-glow: rgba(0, 240, 255, 0.15);
    }

    .colorful-card {
        background: var(--card-bg) !important;
        border: 1px solid var(--card-border) !important;
        border-radius: 20px !important;
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3) !important;
        color: var(--text-primary) !important;
        padding: 1.5rem;
    }

    .colorful-title {
        background: var(--primary-grad);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 800;
        letter-spacing: -0.5px;
    }

    .colorful-label {
        font-weight: 600 !important;
        font-size: 0.85rem !important;
        color: var(--text-secondary) !important;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .colorful-input {
        background: var(--input-bg) !important;
        border: 1px solid var(--input-border) !important;
        color: var(--text-primary) !important;
        border-radius: 10px !important;
        padding: 0.75rem 1rem !important;
        transition: all 0.3s ease !important;
    }

    .colorful-input:focus {
        background: rgba(255, 255, 255, 0.08) !important;
        border-color: transparent !important;
        box-shadow: 0 0 0 2px var(--input-focus), 0 8px 20px var(--accent-glow) !important;
        outline: none !important;
    }

    .colorful-input::placeholder {
        color: rgba(255, 255, 255, 0.25) !important;
    }

    .colorful-inputoption {
        background-color: var(--bg-color) !important;
        color: var(--text-primary) !important;
    }

    .btn-colorful-primary {
        background: var(--primary-grad) !important;
        color: #ffffff !important;
        border: none !important;
        font-weight: 700 !important;
        padding: 0.8rem 2rem !important;
        border-radius: 10px !important;
        box-shadow: 0 4px 15px rgba(127, 0, 255, 0.3) !important;
        transition: all 0.3s ease !important;
    }

    .btn-colorful-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(127, 0, 255, 0.45) !important;
    }

    .btn-colorful-secondary {
        background: rgba(255, 255, 255, 0.08) !important;
        color: var(--text-primary) !important;
        border: 1px solid var(--card-border) !important;
        font-weight: 600 !important;
        padding: 0.8rem 2rem !important;
        border-radius: 10px !important;
        transition: all 0.3s ease !important;
    }

    .btn-colorful-secondary:hover {
        background: rgba(255, 255, 255, 0.12) !important;
        color: #ffffff !important;
    }

    .form-check-input {
        background-color: var(--input-bg) !important;
        border-color: var(--input-border) !important;
    }

    .form-check-input:checked {
        background-image: var(--primary-grad) !important;
        border-color: transparent !important;
    }
</style>

<div class="card colorful-card mx-auto" style="max-width: 800px;">
    <div class="card-header bg-transparent border-0 py-3">
        <h1 class="h3 mb-0 colorful-title">Edit Product: {{ $product->name }}</h1>
    </div>
    
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger bg-danger-subtle border-danger text-danger-emphasis rounded-3">
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
                    <label for="product_code" class="form-label colorful-label">Product Code</label>
                    <input type="text" name="product_code" id="product_code" class="form-control colorful-input" value="{{ old('product_code', $product->product_code) }}" placeholder="e.g. PROD-101">
                </div>

                <!-- Name -->
                <div class="col-md-6">
                    <label for="name" class="form-label colorful-label">Product Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control colorful-input" value="{{ old('name', $product->name) }}" placeholder="e.g. Wireless Mouse" required>
                </div>

                <!-- Category -->
                <div class="col-md-6">
                    <label for="category" class="form-label colorful-label">Category</label>
                    <input type="text" name="category" id="category" class="form-control colorful-input" value="{{ old('category', $product->category) }}" placeholder="e.g. Electronics">
                </div>

                <!-- Brand -->
                <div class="col-md-6">
                    <label for="brand" class="form-label colorful-label">Brand</label>
                    <input type="text" name="brand" id="brand" class="form-control colorful-input" value="{{ old('brand', $product->brand) }}" placeholder="e.g. Logitech">
                </div>

                <!-- Short Description -->
                <div class="col-12">
                    <label for="short_description" class="form-label colorful-label">Short Description</label>
                    <input type="text" name="short_description" id="short_description" class="form-control colorful-input" value="{{ old('short_description', $product->short_description) }}" placeholder="Brief summary of the product">
                </div>

                <!-- Description -->
                <div class="col-12">
                    <label for="description" class="form-label colorful-label">Detailed Description</label>
                    <textarea name="description" id="description" class="form-control colorful-input" rows="3" placeholder="Full product specifications and details">{{ old('description', $product->description) }}</textarea>
                </div>

                <!-- Price -->
                <div class="col-md-4">
                    <label for="price" class="form-label colorful-label">Price ($) <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" name="price" id="price" class="form-control colorful-input" value="{{ old('price', $product->price) }}" placeholder="0.00" required>
                </div>

                <!-- Discount -->
                <div class="col-md-4">
                    <label for="discount" class="form-label colorful-label">Discount (%)</label>
                    <input type="number" step="0.01" name="discount" id="discount" class="form-control colorful-input" value="{{ old('discount', $product->discount) }}" placeholder="0.00">
                </div>

                <!-- Final Price -->
                <div class="col-md-4">
                    <label for="final_price" class="form-label colorful-label">Final Price ($)</label>
                    <input type="number" step="0.01" name="final_price" id="final_price" class="form-control colorful-input" value="{{ old('final_price', $product->final_price) }}" placeholder="Leave blank to auto-calculate">
                </div>

                <!-- Stock Quantity -->
                <div class="col-md-4">
                    <label for="stock_quantity" class="form-label colorful-label">Stock Quantity</label>
                    <input type="number" name="stock_quantity" id="stock_quantity" class="form-control colorful-input" value="{{ old('stock_quantity', $product->stock_quantity) }}">
                </div>

                <!-- Min Stock Level -->
                <div class="col-md-4">
                    <label for="min_stock_level" class="form-label colorful-label">Min Stock Level</label>
                    <input type="number" name="min_stock_level" id="min_stock_level" class="form-control colorful-input" value="{{ old('min_stock_level', $product->min_stock_level) }}">
                </div>

                <!-- Unit -->
                <div class="col-md-4">
                    <label for="unit" class="form-label colorful-label">Unit</label>
                    <input type="text" name="unit" id="unit" class="form-control colorful-input" value="{{ old('unit', $product->unit) }}" placeholder="e.g. pcs, box, kg">
                </div>

                <!-- Color -->
                <div class="col-md-3">
                    <label for="color" class="form-label colorful-label">Color</label>
                    <input type="text" name="color" id="color" class="form-control colorful-input" value="{{ old('color', $product->color) }}" placeholder="e.g. Black">
                </div>

                <!-- Size -->
                <div class="col-md-3">
                    <label for="size" class="form-label colorful-label">Size</label>
                    <input type="text" name="size" id="size" class="form-control colorful-input" value="{{ old('size', $product->size) }}" placeholder="e.g. Medium, 14 inch">
                </div>

                <!-- Material -->
                <div class="col-md-3">
                    <label for="material" class="form-label colorful-label">Material</label>
                    <input type="text" name="material" id="material" class="form-control colorful-input" value="{{ old('material', $product->material) }}" placeholder="e.g. Plastic">
                </div>

                <!-- Weight -->
                <div class="col-md-3">
                    <label for="weight" class="form-label colorful-label">Weight (kg)</label>
                    <input type="number" step="0.01" name="weight" id="weight" class="form-control colorful-input" value="{{ old('weight', $product->weight) }}" placeholder="0.00">
                </div>

                <!-- Status -->
                <div class="col-md-6">
                    <label for="status" class="form-label colorful-label">Status</label>
                    <select name="status" id="status" class="form-select colorful-input">
                        <option value="active" class="colorful-inputoption" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" class="colorful-inputoption" {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="draft" class="colorful-inputoption" {{ old('status', $product->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>

                <!-- Checkboxes (Featured & Available) -->
                <div class="col-md-6 d-flex align-items-end pb-2">
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" name="featured" id="featured" value="1" {{ old('featured', $product->featured) ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold text-light" for="featured">
                            Featured
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_available" id="is_available" value="1" {{ old('is_available', $product->is_available) ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold text-light" for="is_available">
                            Available
                        </label>
                    </div>
                </div>
            </div>

            <hr class="my-4 border-secondary opacity-25">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('products.index') }}" class="btn btn-colorful-secondary">Cancel</a>
                <button type="submit" class="btn btn-colorful-primary">Update Product</button>
            </div>
        </form>
    </div>
</div>
