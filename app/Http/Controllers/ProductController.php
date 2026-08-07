<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index()
    {
        $products = Product::latest()->get();

        return view('products.index', compact('products'));
    }


    /**
     * Show create product form.
     */
    public function create()
    {
        return view('products.create');
    }


    /**
     * Store new product.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required|unique:products,product_code',
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $data = $request->all();
        $data['featured'] = $request->has('featured');
        $data['is_available'] = $request->has('is_available');
        $data['discount'] = $request->discount ?: 0;
        $data['stock_quantity'] = $request->stock_quantity ?: 0;
        $data['min_stock_level'] = $request->min_stock_level ?: 0;

        if (empty($data['final_price'])) {
            $data['final_price'] = $data['price'] - ($data['price'] * ($data['discount'] / 100));
        }

        Product::create($data);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product created successfully');
    }


    /**
     * Display single product.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }


    /**
     * Show edit product form.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }


    /**
     * Update product.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_code' => 'required|unique:products,product_code,' . $product->id,
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $data = $request->all();
        $data['featured'] = $request->has('featured');
        $data['is_available'] = $request->has('is_available');
        $data['discount'] = $request->discount ?: 0;
        $data['stock_quantity'] = $request->stock_quantity ?: 0;
        $data['min_stock_level'] = $request->min_stock_level ?: 0;

        if (empty($data['final_price'])) {
            $data['final_price'] = $data['price'] - ($data['price'] * ($data['discount'] / 100));
        }

        $product->update($data);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully');
    }


    /**
     * Delete product.
     */
    public function destroy(Product $product)
    {
        $product->delete();


        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}