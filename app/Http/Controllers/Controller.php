<?php

namespace App\Http\Controllers;

abstract class Controller
{
    use App\Models\Product;
use App\Http\Requests\ProductRequest;

public function create()
{
    return view('products.create');
}

public function store(ProductRequest $request)
{
    Product::create($request->validated());

    return redirect()->back()->with('success', 'Product saved successfully.');
}
}