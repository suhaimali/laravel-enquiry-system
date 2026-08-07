<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - {{ $product->name }}</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #6366f1;
            --primary-light: #818cf8;
            --secondary: #ec4899;
            --accent: #14b8a6;
            --dark: #0f172a;
            --light: #f8fafc;
            --card-bg: rgba(255, 255, 255, 0.75);
            --border: rgba(255, 255, 255, 0.4);
            --text-main: #1e293b;
            --text-muted: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background: var(--light);
            color: var(--text-main);
            min-height: 100vh;
            padding: 2rem;
            display: flex;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 900px;
        }

        /* Simple Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding: 1.5rem 2rem;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
        }

        .btn-back {
            background: rgba(255, 255, 255, 0.6);
            color: var(--text-main);
            text-decoration: none;
            padding: 0.7rem 1.2rem;
            border-radius: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            border: 1px solid var(--border);
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        /* Alerts */
        .alert-error {
            background: rgba(254, 226, 226, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid #fca5a5;
            color: #991b1b;
            padding: 1.5rem;
            border-radius: 16px;
            margin-bottom: 2rem;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.15);
            animation: slideIn 0.4s ease-out;
        }

        .alert-error ul {
            margin-left: 1.5rem;
            margin-top: 0.5rem;
        }

        @keyframes slideIn {
            from { transform: translateY(-10px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        /* Simple Form Container */
        .form-container {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 1.5rem;
        }

        .col-12 { grid-column: span 12; }
        .col-6 { grid-column: span 6; }
        .col-4 { grid-column: span 4; }
        .col-3 { grid-column: span 3; }

        @media (max-width: 768px) {
            .col-6, .col-4, .col-3 { grid-column: span 12; }
            .page-header { flex-direction: column; gap: 1rem; text-align: center; }
            .form-container { padding: 1.5rem; }
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-label {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--dark);
        }

        .form-label .required {
            color: #ef4444;
        }

        .form-control, .form-select {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid rgba(148, 163, 184, 0.3);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.6);
            font-size: 0.95rem;
            color: var(--text-main);
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-control:focus, .form-select:focus {
            outline: none;
            border-color: var(--primary-light);
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        /* Checkboxes */
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            padding-top: 1rem;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
        }

        .form-check-input {
            width: 1.2rem;
            height: 1.2rem;
            cursor: pointer;
            accent-color: var(--primary);
        }

        .form-check-label {
            font-weight: 600;
            color: var(--dark);
            cursor: pointer;
        }

        .divider {
            height: 1px;
            background: var(--border);
            margin: 2.5rem 0;
            border-radius: 1px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        .btn-submit {
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
            color: white;
            text-decoration: none;
            padding: 0.8rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
            border: none;
            cursor: pointer;
            font-family: inherit;
            font-size: 1rem;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
        }
        
        .btn-cancel {
            background: rgba(226, 232, 240, 0.8);
            color: var(--text-muted);
            text-decoration: none;
            padding: 0.8rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-cancel:hover {
            background: #cbd5e1;
            color: var(--dark);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="page-header">
        <h1 class="page-title"><i class="fa-solid fa-pen-to-square me-2"></i> Edit Product</h1>
        <a href="{{ route('products.index') }}" class="btn-back">
            <i class="fa-solid fa-arrow-left"></i> Back to List
        </a>
    </div>

    @if($errors->any())
        <div class="alert-error">
            <strong><i class="fa-solid fa-triangle-exclamation"></i> Please fix the following errors:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-container">
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <!-- Product Code -->
                <div class="col-6 form-group">
                    <label for="product_code" class="form-label">Product Code</label>
                    <input type="text" name="product_code" id="product_code" class="form-control" value="{{ old('product_code', $product->product_code) }}" placeholder="e.g. PROD-101">
                </div>

                <!-- Name -->
                <div class="col-6 form-group">
                    <label for="name" class="form-label">Product Name <span class="required">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" placeholder="e.g. Wireless Mouse" required>
                </div>

                <!-- Category -->
                <div class="col-6 form-group">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" name="category" id="category" class="form-control" value="{{ old('category', $product->category) }}" placeholder="e.g. Electronics">
                </div>

                <!-- Brand -->
                <div class="col-6 form-group">
                    <label for="brand" class="form-label">Brand</label>
                    <input type="text" name="brand" id="brand" class="form-control" value="{{ old('brand', $product->brand) }}" placeholder="e.g. Logitech">
                </div>

                <!-- Short Description -->
                <div class="col-12 form-group">
                    <label for="short_description" class="form-label">Short Description</label>
                    <input type="text" name="short_description" id="short_description" class="form-control" value="{{ old('short_description', $product->short_description) }}" placeholder="Brief summary of the product">
                </div>

                <!-- Description -->
                <div class="col-12 form-group">
                    <label for="description" class="form-label">Detailed Description</label>
                    <textarea name="description" id="description" class="form-control" placeholder="Full product specifications and details">{{ old('description', $product->description) }}</textarea>
                </div>

                <!-- Price -->
                <div class="col-4 form-group">
                    <label for="price" class="form-label">Price ($) <span class="required">*</span></label>
                    <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" placeholder="0.00" required>
                </div>

                <!-- Discount -->
                <div class="col-4 form-group">
                    <label for="discount" class="form-label">Discount (%)</label>
                    <input type="number" step="0.01" name="discount" id="discount" class="form-control" value="{{ old('discount', $product->discount) }}" placeholder="0.00">
                </div>

                <!-- Final Price -->
                <div class="col-4 form-group">
                    <label for="final_price" class="form-label">Final Price ($)</label>
                    <input type="number" step="0.01" name="final_price" id="final_price" class="form-control" value="{{ old('final_price', $product->final_price) }}" placeholder="Auto-calculated if blank">
                </div>

                <!-- Stock Quantity -->
                <div class="col-4 form-group">
                    <label for="stock_quantity" class="form-label">Stock Quantity</label>
                    <input type="number" name="stock_quantity" id="stock_quantity" class="form-control" value="{{ old('stock_quantity', $product->stock_quantity) }}">
                </div>

                <!-- Min Stock Level -->
                <div class="col-4 form-group">
                    <label for="min_stock_level" class="form-label">Min Stock Level</label>
                    <input type="number" name="min_stock_level" id="min_stock_level" class="form-control" value="{{ old('min_stock_level', $product->min_stock_level) }}">
                </div>

                <!-- Unit -->
                <div class="col-4 form-group">
                    <label for="unit" class="form-label">Unit</label>
                    <input type="text" name="unit" id="unit" class="form-control" value="{{ old('unit', $product->unit) }}" placeholder="e.g. pcs, box, kg">
                </div>

                <!-- Color -->
                <div class="col-3 form-group">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" name="color" id="color" class="form-control" value="{{ old('color', $product->color) }}" placeholder="e.g. Black">
                </div>

                <!-- Size -->
                <div class="col-3 form-group">
                    <label for="size" class="form-label">Size</label>
                    <input type="text" name="size" id="size" class="form-control" value="{{ old('size', $product->size) }}" placeholder="e.g. Medium">
                </div>

                <!-- Material -->
                <div class="col-3 form-group">
                    <label for="material" class="form-label">Material</label>
                    <input type="text" name="material" id="material" class="form-control" value="{{ old('material', $product->material) }}" placeholder="e.g. Plastic">
                </div>

                <!-- Weight -->
                <div class="col-3 form-group">
                    <label for="weight" class="form-label">Weight (kg)</label>
                    <input type="number" step="0.01" name="weight" id="weight" class="form-control" value="{{ old('weight', $product->weight) }}" placeholder="0.00">
                </div>

                <!-- Status -->
                <div class="col-6 form-group">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="active" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="draft" {{ old('status', $product->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>

                <!-- Checkboxes -->
                <div class="col-6 checkbox-group">
                    <label class="form-check">
                        <input class="form-check-input" type="checkbox" name="featured" id="featured" value="1" {{ old('featured', $product->featured) ? 'checked' : '' }}>
                        <span class="form-check-label">Featured Product</span>
                    </label>
                    
                    <label class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_available" id="is_available" value="1" {{ old('is_available', $product->is_available) ? 'checked' : '' }}>
                        <span class="form-check-label">Is Available</span>
                    </label>
                </div>
            </div>

            <div class="divider"></div>

            <div class="form-actions">
                <a href="{{ route('products.index') }}" class="btn-cancel">Cancel</a>
                <button type="submit" class="btn-submit">
                    <i class="fa-solid fa-save"></i> Update Product
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
