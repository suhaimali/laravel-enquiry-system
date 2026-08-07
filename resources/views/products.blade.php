<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --bg-color: #f8fafc;
            --card-bg: #ffffff;
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --text-muted: #94a3b8;
            --border-color: #e2e8f0;
            --primary-color: #2563eb;
            --primary-hover: #1d4ed8;
            --accent-color: #f59e0b;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --font-main: 'Inter', sans-serif;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--font-main);
            background-color: var(--bg-color);
            color: var(--text-primary);
            min-height: 100vh;
            padding: 3rem 1.5rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        header {
            text-align: center;
            margin-bottom: 3rem;
        }

        header h1 {
            font-size: 2.25rem;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            letter-spacing: -0.025em;
        }

        header p {
            color: var(--text-secondary);
            font-size: 1.1rem;
        }

        /* Products Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }

        /* Product Card */
        .product-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }

        /* Product Badge */
        .badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            padding: 0.35rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #ffffff;
            z-index: 10;
        }

        .badge-featured {
            background-color: var(--accent-color);
        }

        .badge-discount {
            background-color: var(--danger-color);
            right: 1rem;
            left: auto;
        }

        /* Product Image placeholder */
        .product-img-container {
            width: 100%;
            height: 200px;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-size: 3.5rem;
            border-bottom: 1px solid var(--border-color);
            position: relative;
        }

        /* Product Info */
        .product-details {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .product-category {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            letter-spacing: 0.05em;
        }

        .product-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .product-brand {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-bottom: 0.75rem;
        }

        .product-desc {
            font-size: 0.9rem;
            color: var(--text-secondary);
            margin-bottom: 1.25rem;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Stock Status */
        .stock-status {
            display: flex;
            align-items: center;
            gap: 0.35rem;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .stock-in {
            color: var(--success-color);
        }

        .stock-out {
            color: var(--danger-color);
        }

        .stock-low {
            color: var(--accent-color);
        }

        /* Price & Actions */
        .product-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px solid var(--border-color);
        }

        .price-container {
            display: flex;
            flex-direction: column;
        }

        .original-price {
            font-size: 0.85rem;
            text-decoration: line-through;
            color: var(--text-muted);
        }

        .final-price {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--text-primary);
        }

        .btn-view {
            background-color: var(--primary-color);
            color: #ffffff;
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: background-color 0.2s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-view:hover {
            background-color: var(--primary-hover);
        }

        /* Empty state styling */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            color: var(--text-secondary);
        }

        .empty-state i {
            font-size: 3rem;
            color: var(--text-muted);
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        @media (max-width: 640px) {
            body {
                padding: 2rem 1rem;
            }
            header h1 {
                font-size: 1.75rem;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <header>
            <h1>Discover Products</h1>
            <p>Browse our catalog of premium products and accessories.</p>
        </header>

        @if(isset($products) && count($products) > 0)
            <div class="products-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <!-- Badges -->
                        @if($product->featured)
                            <span class="badge badge-featured">Featured</span>
                        @endif
                        @if($product->discount > 0)
                            <span class="badge badge-discount">-{{ number_format($product->discount) }}% Off</span>
                        @endif

                        <!-- Image Container -->
                        <div class="product-img-container">
                            <i class="fa-solid fa-box-open"></i>
                        </div>

                        <!-- Details -->
                        <div class="product-details">
                            @if($product->category)
                                <span class="product-category">{{ $product->category }}</span>
                            @endif
                            <h3 class="product-title">{{ $product->name }}</h3>
                            @if($product->brand)
                                <span class="product-brand">by {{ $product->brand }}</span>
                            @endif
                            
                            <p class="product-desc">
                                {{ $product->short_description ?? $product->description }}
                            </p>

                            <!-- Stock -->
                            <div class="stock-status">
                                @if(!$product->is_available || $product->stock_quantity == 0)
                                    <span class="stock-out"><i class="fa-solid fa-circle-xmark"></i> Out of Stock</span>
                                @elseif($product->stock_quantity <= $product->min_stock_level)
                                    <span class="stock-low"><i class="fa-solid fa-triangle-exclamation"></i> Low Stock ({{ $product->stock_quantity }} left)</span>
                                @else
                                    <span class="stock-in"><i class="fa-solid fa-circle-check"></i> In Stock</span>
                                @endif
                            </div>

                            <!-- Footer -->
                            <div class="product-footer">
                                <div class="price-container">
                                    @if($product->discount > 0)
                                        <span class="original-price">${{ number_format($product->price, 2) }}</span>
                                    @endif
                                    <span class="final-price">
                                        ${{ number_format($product->final_price ?? ($product->price - ($product->price * ($product->discount / 100))), 2) }}
                                    </span>
                                </div>
                                <button class="btn-view">
                                    <span>View details</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Demo Default Catalog if Database is empty -->
            <div class="products-grid">
                <!-- Product 1 -->
                <div class="product-card">
                    <span class="badge badge-featured">Featured</span>
                    <div class="product-img-container">
                        <i class="fa-solid fa-laptop"></i>
                    </div>
                    <div class="product-details">
                        <span class="product-category">Electronics</span>
                        <h3 class="product-title">Pro Latitude Laptop 14"</h3>
                        <span class="product-brand">by TechCorp</span>
                        <p class="product-desc">High performance laptop with octacore processor and UHD graphics display.</p>
                        <div class="stock-status">
                            <span class="stock-in"><i class="fa-solid fa-circle-check"></i> In Stock</span>
                        </div>
                        <div class="product-footer">
                            <div class="price-container">
                                <span class="final-price">$1,299.99</span>
                            </div>
                            <button class="btn-view">
                                <span>View details</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="product-card">
                    <span class="badge badge-discount">-15% Off</span>
                    <div class="product-img-container">
                        <i class="fa-solid fa-headphones"></i>
                    </div>
                    <div class="product-details">
                        <span class="product-category">Audio</span>
                        <h3 class="product-title">BassSync ANC Headphones</h3>
                        <span class="product-brand">by BeatStudio</span>
                        <p class="product-desc">Active noise cancelling over-ear headphones with 40-hour long playback battery life.</p>
                        <div class="stock-status">
                            <span class="stock-low"><i class="fa-solid fa-triangle-exclamation"></i> Low Stock (3 left)</span>
                        </div>
                        <div class="product-footer">
                            <div class="price-container">
                                <span class="original-price">$199.99</span>
                                <span class="final-price">$169.99</span>
                            </div>
                            <button class="btn-view">
                                <span>View details</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="product-card">
                    <div class="product-img-container">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <div class="product-details">
                        <span class="product-category">Wearables</span>
                        <h3 class="product-title">Aura Smart Watch Series 3</h3>
                        <span class="product-brand">by Chronos</span>
                        <p class="product-desc">Sleek fitness tracking smartwatch with oxygen levels tracking and dynamic widget faces.</p>
                        <div class="stock-status">
                            <span class="stock-in"><i class="fa-solid fa-circle-check"></i> In Stock</span>
                        </div>
                        <div class="product-footer">
                            <div class="price-container">
                                <span class="final-price">$249.00</span>
                            </div>
                            <button class="btn-view">
                                <span>View details</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

</body>
</html>
