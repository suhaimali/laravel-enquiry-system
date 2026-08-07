<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    
    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --bg-color: #f8fafc;
            --text-primary: #0f172a;
            --text-secondary: #64748b;
            --card-bg: #ffffff;
            --primary-grad: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            --accent-pink: #ec4899;
            --success-color: #10b981;
            --border-color: #e2e8f0;
            --font-main: 'Plus Jakarta Sans', sans-serif;
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
            padding: 2rem 1.5rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Colorful Page Header */
        header {
            margin-bottom: 2.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .header-title h1 {
            font-size: 2.25rem;
            font-weight: 800;
            background: var(--primary-grad);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.25rem;
        }

        .header-title p {
            color: var(--text-secondary);
            font-weight: 500;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--primary-grad);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.25);
            transition: all 0.3s ease;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(124, 58, 237, 0.4);
        }

        /* Products Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }

        .product-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            border-color: rgba(124, 58, 237, 0.2);
        }

        /* Image Placeholder with Nice Gradient */
        .product-image {
            height: 200px;
            background: linear-gradient(135deg, #f3e8ff 0%, #e0e7ff 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .product-image i {
            font-size: 3.5rem;
            background: var(--primary-grad);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            opacity: 0.8;
        }

        .product-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--accent-pink);
            color: white;
            padding: 0.35rem 0.75rem;
            border-radius: 99px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        /* Product Details */
        .product-info {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .product-category {
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text-secondary);
            margin-bottom: 0.5rem;
            letter-spacing: 1px;
        }

        .product-name {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.75rem;
            line-height: 1.4;
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
            height: 2.7rem;
        }

        /* Price & Actions Row */
        .product-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px solid var(--border-color);
        }

        .product-price-box {
            display: flex;
            flex-direction: column;
        }

        .product-price {
            font-size: 1.35rem;
            font-weight: 800;
            color: #1e1b4b;
        }

        .product-discount {
            font-size: 0.75rem;
            color: var(--accent-pink);
            text-decoration: line-through;
        }

        .product-stock {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--success-color);
            background: #ecfdf5;
            padding: 0.25rem 0.6rem;
            border-radius: 6px;
        }

        .product-stock.out {
            color: #ef4444;
            background: #fef2f2;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 5rem 2rem;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .empty-state i {
            font-size: 4rem;
            color: #cbd5e1;
            margin-bottom: 1.5rem;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
        }

        @media (max-width: 640px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }
            .btn-add {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <header>
            <div class="header-title">
                <h1>Product Catalog</h1>
                <p>Manage and explore your items & inventory</p>
            </div>
            <a href="#" class="btn-add">
                <i class="fa-solid fa-plus"></i>
                <span>Add Product</span>
            </a>
        </header>

        @if(isset($products) && count($products) > 0)
            <div class="products-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fa-solid fa-box-open"></i>
                            @if($product->featured)
                                <span class="product-badge">Featured</span>
                            @endif
                        </div>
                        <div class="product-info">
                            <span class="product-category">{{ $product->category ?? 'General' }}</span>
                            <h2 class="product-name">{{ $product->name }}</h2>
                            <p class="product-desc">{{ $product->short_description ?? 'No description available for this product.' }}</p>
                            
                            <div class="product-meta">
                                <div class="product-price-box">
                                    <span class="product-price">${{ number_format($product->final_price, 2) }}</span>
                                    @if($product->discount > 0)
                                        <span class="product-discount">${{ number_format($product->price, 2) }}</span>
                                    @endif
                                </div>
                                <span class="product-stock {{ $product->stock_quantity <= 0 ? 'out' : '' }}">
                                    {{ $product->stock_quantity > 0 ? $product->stock_quantity . ' in stock' : 'Out of stock' }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="empty-state">
                <i class="fa-solid fa-folder-open"></i>
                <h3>No Products Found</h3>
                <p>Get started by adding your first product to the catalog.</p>
                <a href="#" class="btn-add">
                    <i class="fa-solid fa-plus"></i>
                    <span>Add Product</span>
                </a>
            </div>
        @endif
    </div>

</body>
</html>
