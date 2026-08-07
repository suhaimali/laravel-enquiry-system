<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - {{ $product->name }}</title>
    
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
            --text-main: #1e293b;
            --text-muted: #64748b;
            --danger: #ef4444;
            --success: #10b981;
            --warning: #f59e0b;
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
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

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
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .page-title i {
            color: var(--primary);
        }

        .header-actions {
            display: flex;
            gap: 1rem;
        }

        .btn {
            text-decoration: none;
            padding: 0.8rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 0.95rem;
        }

        .btn-back {
            background: #f1f5f9;
            color: var(--text-main);
            border: 1px solid #e2e8f0;
        }

        .btn-back:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
        }

        .btn-edit {
            background: linear-gradient(135deg, var(--warning), #fbbf24);
            color: #fff;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
        }

        .details-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
        }
        
        .details-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }

        .product-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 2px dashed #e2e8f0;
            padding-bottom: 1.5rem;
            margin-bottom: 2rem;
        }

        .product-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .badge {
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .badge-success {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }
        
        .badge-danger {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
            border: 1px solid rgba(239, 68, 68, 0.2);
        }
        
        .badge-primary {
            background: rgba(99, 102, 241, 0.1);
            color: var(--primary);
            border: 1px solid rgba(99, 102, 241, 0.2);
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .detail-item {
            background: #f8fafc;
            padding: 1.5rem;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }
        
        .detail-item:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transform: translateY(-2px);
            border-color: var(--primary-light);
        }

        .detail-label {
            font-size: 0.85rem;
            color: var(--text-muted);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .detail-label i {
            color: var(--primary);
            font-size: 1rem;
        }

        .detail-value {
            font-size: 1.1rem;
            color: var(--text-main);
            font-weight: 600;
        }

        .full-width {
            grid-column: 1 / -1;
        }
        
        .price-section {
            display: flex;
            gap: 1.5rem;
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            padding: 1.5rem;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            margin-bottom: 2rem;
            align-items: center;
        }
        
        .price-block {
            flex: 1;
        }
        
        .price-label {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-bottom: 0.3rem;
            text-transform: uppercase;
            font-weight: 600;
        }
        
        .price-original {
            font-size: 1.2rem;
            color: var(--text-muted);
            text-decoration: line-through;
            font-weight: 500;
        }
        
        .price-discount {
            font-size: 1.2rem;
            color: var(--warning);
            font-weight: 600;
        }
        
        .price-final {
            font-size: 2rem;
            color: var(--primary);
            font-weight: 700;
        }
        
        .divider {
            height: 1px;
            background: #e2e8f0;
            margin: 2rem 0;
        }

        .description-box {
            background: #f8fafc;
            padding: 1.5rem;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            margin-bottom: 2rem;
        }
        
        .description-box p {
            line-height: 1.7;
            color: var(--text-main);
        }

        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
            .product-header {
                flex-direction: column;
                gap: 1rem;
            }
            .price-section {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="page-header">
            <h1 class="page-title">
                <i class="fa-solid fa-box-open"></i> Product Details
            </h1>
            <div class="header-actions">
                <a href="{{ route('products.index') }}" class="btn btn-back">
                    <i class="fa-solid fa-arrow-left"></i> Back to List
                </a>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-edit">
                    <i class="fa-solid fa-pen"></i> Edit Product
                </a>
            </div>
        </div>

        <!-- Details Card -->
        <div class="details-card">
            <div class="product-header">
                <div>
                    <h2 class="product-title">{{ $product->name }}</h2>
                    <p class="text-muted" style="color: var(--text-muted);">
                        <i class="fa-solid fa-barcode me-1"></i> {{ $product->product_code ?? 'No Code' }}
                    </p>
                </div>
                <div>
                    @if(!$product->is_available)
                        <span class="badge badge-danger"><i class="fa-solid fa-circle-xmark"></i> Unavailable</span>
                    @else
                        <span class="badge badge-success"><i class="fa-solid fa-circle-check"></i> Available</span>
                    @endif
                    
                    @if($product->featured)
                        <span class="badge badge-primary" style="margin-left: 5px;"><i class="fa-solid fa-star"></i> Featured</span>
                    @endif
                </div>
            </div>

            <!-- Price Info -->
            <div class="price-section">
                <div class="price-block">
                    <div class="price-label">Original Price</div>
                    <div class="price-original">${{ number_format($product->price, 2) }}</div>
                </div>
                <div class="price-block">
                    <div class="price-label">Discount</div>
                    <div class="price-discount">{{ number_format($product->discount, 2) }}% OFF</div>
                </div>
                <div class="price-block">
                    <div class="price-label">Final Price</div>
                    <div class="price-final">${{ number_format($product->final_price, 2) }}</div>
                </div>
            </div>

            <div class="details-grid">
                <!-- Basic Info -->
                <div class="detail-item">
                    <div class="detail-label"><i class="fa-solid fa-tags"></i> Category</div>
                    <div class="detail-value">{{ $product->category ?? 'N/A' }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label"><i class="fa-solid fa-copyright"></i> Brand</div>
                    <div class="detail-value">{{ $product->brand ?? 'N/A' }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label"><i class="fa-solid fa-signal"></i> Status</div>
                    <div class="detail-value" style="text-transform: capitalize;">{{ $product->status ?? 'N/A' }}</div>
                </div>
                
                <!-- Stock Info -->
                <div class="detail-item">
                    <div class="detail-label"><i class="fa-solid fa-cubes"></i> Stock Quantity</div>
                    <div class="detail-value">{{ $product->stock_quantity }} {{ $product->unit ?? 'pcs' }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label"><i class="fa-solid fa-triangle-exclamation"></i> Min Stock Level</div>
                    <div class="detail-value">{{ $product->min_stock_level }} {{ $product->unit ?? 'pcs' }}</div>
                </div>

                <!-- Attributes -->
                <div class="detail-item">
                    <div class="detail-label"><i class="fa-solid fa-palette"></i> Color</div>
                    <div class="detail-value">{{ $product->color ?? 'N/A' }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label"><i class="fa-solid fa-ruler"></i> Size</div>
                    <div class="detail-value">{{ $product->size ?? 'N/A' }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label"><i class="fa-solid fa-gem"></i> Material</div>
                    <div class="detail-value">{{ $product->material ?? 'N/A' }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label"><i class="fa-solid fa-weight-scale"></i> Weight</div>
                    <div class="detail-value">{{ $product->weight ? $product->weight . ' kg' : 'N/A' }}</div>
                </div>
            </div>

            <!-- Descriptions -->
            <div class="description-box">
                <div class="detail-label"><i class="fa-solid fa-align-left"></i> Short Description</div>
                <p>{{ $product->short_description ?? 'No short description provided.' }}</p>
            </div>

            <div class="description-box mb-0">
                <div class="detail-label"><i class="fa-solid fa-align-justify"></i> Detailed Description</div>
                <p style="white-space: pre-line;">{{ $product->description ?? 'No detailed description provided.' }}</p>
            </div>

        </div>
    </div>
</body>
</html>
