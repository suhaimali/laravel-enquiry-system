<style>
    .form-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f8fafc;
        padding: 2rem 1rem;
        font-family: 'Inter', sans-serif;
    }
    .simple-card {
        width: 100%;
        max-width: 800px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
    }
</style>

<div class="form-wrapper">
    <div class="card simple-card p-4">
        <div class="card-header bg-transparent border-0 ps-0 pb-3">
            <h1 class="h3 mb-0 text-dark fw-bold">Edit Product: {{ $product->name }}</h1>
        </div>
        
        <div class="card-body px-0 pb-0">
            @if($errors->any())
                <div class="alert alert-danger py-2 px-3 rounded-3 mb-4">
                    <ul class="mb-0 small">
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
                        <label for="product_code" class="form-label text-secondary fw-semibold small">Product Code</label>
                        <input type="text" name="product_code" id="product_code" class="form-control border-secondary-subtle" value="{{ old('product_code', $product->product_code) }}" placeholder="e.g. PROD-101">
                    </div>

                    <!-- Name -->
                    <div class="col-md-6">
                        <label for="name" class="form-label text-secondary fw-semibold small">Product Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control border-secondary-subtle" value="{{ old('name', $product->name) }}" placeholder="e.g. Wireless Mouse" required>
                    </div>

                    <!-- Category -->
                    <div class="col-md-6">
                        <label for="category" class="form-label text-secondary fw-semibold small">Category</label>
                        <input type="text" name="category" id="category" class="form-control border-secondary-subtle" value="{{ old('category', $product->category) }}" placeholder="e.g. Electronics">
                    </div>

                    <!-- Brand -->
                    <div class="col-md-6">
                        <label for="brand" class="form-label text-secondary fw-semibold small">Brand</label>
                        <input type="text" name="brand" id="brand" class="form-control border-secondary-subtle" value="{{ old('brand', $product->brand) }}" placeholder="e.g. Logitech">
                    </div>

                    <!-- Short Description -->
                    <div class="col-12">
                        <label for="short_description" class="form-label text-secondary fw-semibold small">Short Description</label>
                        <input type="text" name="short_description" id="short_description" class="form-control border-secondary-subtle" value="{{ old('short_description', $product->short_description) }}" placeholder="Brief summary of the product">
                    </div>

                    <!-- Description -->
                    <div class="col-12">
                        <label for="description" class="form-label text-secondary fw-semibold small">Detailed Description</label>
                        <textarea name="description" id="description" class="form-control border-secondary-subtle" rows="3" placeholder="Full product specifications and details">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <!-- Price -->
                    <div class="col-md-4">
                        <label for="price" class="form-label text-secondary fw-semibold small">Price ($) <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" name="price" id="price" class="form-control border-secondary-subtle" value="{{ old('price', $product->price) }}" placeholder="0.00" required>
                    </div>

                    <!-- Discount -->
                    <div class="col-md-4">
                        <label for="discount" class="form-label text-secondary fw-semibold small">Discount (%)</label>
                        <input type="number" step="0.01" name="discount" id="discount" class="form-control border-secondary-subtle" value="{{ old('discount', $product->discount) }}" placeholder="0.00">
                    </div>

                    <!-- Final Price -->
                    <div class="col-md-4">
                        <label for="final_price" class="form-label text-secondary fw-semibold small">Final Price ($)</label>
                        <input type="number" step="0.01" name="final_price" id="final_price" class="form-control border-secondary-subtle" value="{{ old('final_price', $product->final_price) }}" placeholder="Leave blank to auto-calculate">
                    </div>

                    <!-- Stock Quantity -->
                    <div class="col-md-4">
                        <label for="stock_quantity" class="form-label text-secondary fw-semibold small">Stock Quantity</label>
                        <input type="number" name="stock_quantity" id="stock_quantity" class="form-control border-secondary-subtle" value="{{ old('stock_quantity', $product->stock_quantity) }}">
                    </div>

                    <!-- Min Stock Level -->
                    <div class="col-md-4">
                        <label for="min_stock_level" class="form-label text-secondary fw-semibold small">Min Stock Level</label>
                        <input type="number" name="min_stock_level" id="min_stock_level" class="form-control border-secondary-subtle" value="{{ old('min_stock_level', $product->min_stock_level) }}">
                    </div>

                    <!-- Unit -->
                    <div class="col-md-4">
                        <label for="unit" class="form-label text-secondary fw-semibold small">Unit</label>
                        <input type="text" name="unit" id="unit" class="form-control border-secondary-subtle" value="{{ old('unit', $product->unit) }}" placeholder="e.g. pcs, box, kg">
                    </div>

                    <!-- Color -->
                    <div class="col-md-3">
                        <label for="color" class="form-label text-secondary fw-semibold small">Color</label>
                        <input type="text" name="color" id="color" class="form-control border-secondary-subtle" value="{{ old('color', $product->color) }}" placeholder="e.g. Black">
                    </div>

                    <!-- Size -->
                    <div class="col-md-3">
                        <label for="size" class="form-label text-secondary fw-semibold small">Size</label>
                        <input type="text" name="size" id="size" class="form-control border-secondary-subtle" value="{{ old('size', $product->size) }}" placeholder="e.g. Medium, 14 inch">
                    </div>

                    <!-- Material -->
                    <div class="col-md-3">
                        <label for="material" class="form-label text-secondary fw-semibold small">Material</label>
                        <input type="text" name="material" id="material" class="form-control border-secondary-subtle" value="{{ old('material', $product->material) }}" placeholder="e.g. Plastic">
                    </div>

                    <!-- Weight -->
                    <div class="col-md-3">
                        <label for="weight" class="form-label text-secondary fw-semibold small">Weight (kg)</label>
                        <input type="number" step="0.01" name="weight" id="weight" class="form-control border-secondary-subtle" value="{{ old('weight', $product->weight) }}" placeholder="0.00">
                    </div>

                    <!-- Status -->
                    <div class="col-md-6">
                        <label for="status" class="form-label text-secondary fw-semibold small">Status</label>
                        <select name="status" id="status" class="form-select border-secondary-subtle">
                            <option value="active" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="draft" {{ old('status', $product->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>

                    <!-- Checkboxes (Featured & Available) -->
                    <div class="col-md-6 d-flex align-items-end pb-2">
                        <div class="form-check me-4">
                            <input class="form-check-input border-secondary-subtle" type="checkbox" name="featured" id="featured" value="1" {{ old('featured', $product->featured) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold text-secondary small" for="featured">
                                Featured
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input border-secondary-subtle" type="checkbox" name="is_available" id="is_available" value="1" {{ old('is_available', $product->is_available) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold text-secondary small" for="is_available">
                                Available
                            </label>
                        </div>
                    </div>
                </div>

                <hr class="my-4 text-secondary-subtle">

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                    <button type="submit" class="btn btn-warning text-dark fw-semibold px-4">Update Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
