<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-color: #f8fafc;
            --card-bg: #ffffff;
            --text-color: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --primary-color: #3b82f6;
            --primary-hover: #2563eb;
            --success-color: #16a34a;
            --danger-color: #dc2626;
            --warning-color: #d97706;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            padding: 2rem 1.5rem;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 2.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        header {
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #0f172a;
        }

        /* Table Styling */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.95rem;
        }

        th {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: 600;
            padding: 0.75rem 1rem;
            border-bottom: 2px solid var(--border-color);
        }

        td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-color);
        }

        tr:hover td {
            background-color: #f8fafc;
        }

        /* Status Badges */
        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-available {
            background-color: #f0fdf4;
            color: var(--success-color);
        }

        .status-unavailable {
            background-color: #fef2f2;
            color: var(--danger-color);
        }

        .status-low-stock {
            background-color: #fffbeb;
            color: var(--warning-color);
        }

        /* Empty state */
        .no-data {
            text-align: center;
            padding: 3rem 1rem;
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        .price-text {
            font-weight: 600;
        }
    </style>
</head>
<body>

    <div class="container">
        <header>
            <h1>Products List</h1>
        </header>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($products) && count($products) > 0)
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->product_code ?? 'N/A' }}</td>
                                <td><strong>{{ $product->name }}</strong></td>
                                <td>{{ $product->category ?? 'N/A' }}</td>
                                <td>{{ $product->brand ?? 'N/A' }}</td>
                                <td class="price-text">${{ number_format($product->final_price ?? $product->price, 2) }}</td>
                                <td>{{ $product->stock_quantity }} {{ $product->unit ?? 'pcs' }}</td>
                                <td>
                                    @if(!$product->is_available || $product->stock_quantity == 0)
                                        <span class="status-badge status-unavailable">Unavailable</span>
                                    @elseif($product->stock_quantity <= $product->min_stock_level)
                                        <span class="status-badge status-low-stock">Low Stock</span>
                                    @else
                                        <span class="status-badge status-available">Available</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="no-data">No products found in the database.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
