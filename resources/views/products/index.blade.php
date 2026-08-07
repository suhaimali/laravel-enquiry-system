<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Dashboard</title>
    
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
            --card-bg: rgba(255, 255, 255, 0.7);
            --border: rgba(255, 255, 255, 0.3);
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
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
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
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
        }

        .btn-add {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
            text-decoration: none;
            padding: 0.8rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
            border: none;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4);
        }

        /* Alert styling */
        .alert {
            background: rgba(167, 243, 208, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid #34d399;
            color: #065f46;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            animation: slideIn 0.4s ease-out;
            box-shadow: 0 4px 15px rgba(52, 211, 153, 0.2);
        }

        @keyframes slideIn {
            from { transform: translateY(-10px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        /* Simple Table Container */
        .table-container {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 0.5rem;
        }

        th {
            text-align: left;
            padding: 1rem 1.5rem;
            color: var(--text-muted);
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        td {
            padding: 1.2rem 1.5rem;
            background: rgba(255, 255, 255, 0.6);
            transition: all 0.3s ease;
            vertical-align: middle;
        }

        tr td:first-child {
            border-top-left-radius: 16px;
            border-bottom-left-radius: 16px;
        }
        tr td:last-child {
            border-top-right-radius: 16px;
            border-bottom-right-radius: 16px;
        }

        tbody tr {
            transition: all 0.3s ease;
        }

        tbody tr:hover td {
            background: rgba(255, 255, 255, 0.9);
            transform: scale(1.01);
            box-shadow: 0 5px 15px rgba(0,0,0,0.03);
            z-index: 10;
        }

        .product-name {
            font-weight: 600;
            color: var(--dark);
            font-size: 1.05rem;
        }

        .product-code {
            font-size: 0.85rem;
            color: var(--primary);
            background: rgba(99, 102, 241, 0.1);
            padding: 0.2rem 0.6rem;
            border-radius: 6px;
            font-weight: 500;
        }

        .price-final {
            font-weight: 700;
            color: var(--secondary);
            font-size: 1.1rem;
        }
        
        .price-old {
            font-size: 0.8rem;
            color: var(--text-muted);
            text-decoration: line-through;
            margin-right: 0.5rem;
        }

        /* Badges */
        .status-badge {
            padding: 0.4rem 0.8rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .status-available {
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
        }

        .status-low {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
        }

        .status-unavailable {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
        }

        /* Action Buttons */
        .actions-group {
            display: flex;
            gap: 0.5rem;
            justify-content: flex-end;
        }

        .btn-action {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            border: none;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: all 0.2s ease;
            color: white;
            text-decoration: none;
        }

        .btn-view { background: linear-gradient(135deg, #38bdf8, #0ea5e9); box-shadow: 0 4px 10px rgba(14, 165, 233, 0.2); }
        .btn-edit { background: linear-gradient(135deg, #fbbf24, #f59e0b); box-shadow: 0 4px 10px rgba(245, 158, 11, 0.2); }
        .btn-delete { background: linear-gradient(135deg, #f87171, #ef4444); box-shadow: 0 4px 10px rgba(239, 68, 68, 0.2); }

        .btn-action:hover {
            transform: translateY(-2px);
            filter: brightness(1.1);
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--text-muted);
        }

        .empty-state i {
            font-size: 3rem;
            color: var(--primary-light);
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        @media (max-width: 768px) {
            body { padding: 1rem; }
            .page-header { flex-direction: column; gap: 1rem; text-align: center; }
            th { display: none; }
            td { display: block; width: 100%; text-align: left !important; padding: 0.8rem 1.5rem; border-radius: 0 !important; background: transparent !important; }
            tr { display: block; background: rgba(255, 255, 255, 0.6); border-radius: 16px; margin-bottom: 1rem; padding: 1rem 0; box-shadow: 0 4px 10px rgba(0,0,0,0.02); }
            tr td:first-child { border-top-left-radius: 0; border-bottom-left-radius: 0; }
            tr td:last-child { border-top-right-radius: 0; border-bottom-right-radius: 0; }
            td::before { content: attr(data-label); font-weight: 600; display: inline-block; width: 120px; color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase; }
            .actions-group { justify-content: flex-start; margin-top: 1rem; }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="page-header">
        <h1 class="page-title"><i class="fa-solid fa-boxes-stacked me-2"></i> Products Dashboard</h1>
        <a href="{{ route('products.create') }}" class="btn-add">
            <i class="fa-solid fa-plus"></i> Add New Product
        </a>
    </div>

    @if(session('success'))
        <div class="alert" id="successAlert">
            <i class="fa-solid fa-circle-check"></i>
            <span>{{ session('success') }}</span>
        </div>
        <script>
            setTimeout(() => {
                const alert = document.getElementById('successAlert');
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 400);
            }, 3000);
        </script>
    @endif

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Product Details</th>
                    <th>Category / Brand</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($products) && count($products) > 0)
                    @foreach($products as $product)
                        <tr>
                            <td data-label="Code">
                                <span class="product-code">{{ $product->product_code ?? 'N/A' }}</span>
                            </td>
                            <td data-label="Product">
                                <div class="product-name">{{ $product->name }}</div>
                            </td>
                            <td data-label="Category">
                                <div>{{ $product->category ?? 'N/A' }}</div>
                                <div style="font-size: 0.8rem; color: var(--text-muted);">{{ $product->brand ?? 'N/A' }}</div>
                            </td>
                            <td data-label="Price">
                                <div>
                                    @if($product->discount > 0)
                                        <span class="price-old">${{ number_format($product->price, 2) }}</span>
                                    @endif
                                    <span class="price-final">${{ number_format($product->final_price, 2) }}</span>
                                </div>
                            </td>
                            <td data-label="Stock">
                                <strong>{{ $product->stock_quantity }}</strong> <span style="font-size: 0.85rem; color: var(--text-muted);">{{ $product->unit ?? 'pcs' }}</span>
                            </td>
                            <td data-label="Status">
                                @if(!$product->is_available)
                                    <span class="status-badge status-unavailable"><i class="fa-solid fa-circle-xmark"></i> Unavailable</span>
                                @elseif($product->stock_quantity <= $product->min_stock_level)
                                    <span class="status-badge status-low"><i class="fa-solid fa-triangle-exclamation"></i> Low Stock</span>
                                @else
                                    <span class="status-badge status-available"><i class="fa-solid fa-circle-check"></i> Available</span>
                                @endif
                            </td>
                            <td data-label="Actions">
                                <div class="actions-group">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn-action btn-view" title="View Details">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn-action btn-edit" title="Edit Product">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete" title="Delete Product">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">
                            <div class="empty-state">
                                <i class="fa-solid fa-box-open"></i>
                                <h3>No products found</h3>
                                <p>Get started by adding a new product to your inventory.</p>
                            </div>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
