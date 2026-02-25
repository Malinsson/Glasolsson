<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::All();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products|min:3|max:100',
            'color' => 'required|min:3|max:50',
            'material' => 'required|min:2|max:100',
            'price' => 'required|numeric|min:0',
            'description' => 'required|min:10|max:300',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->color = $request->input('color');
        $product->material = $request->input('material');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        $product->save();

        return redirect('products')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|min:3|max:100|unique:products,name,' . $product->id,
            'color' => 'required|min:3|max:50',
            'material' => 'required|min:2|max:100',
            'price' => 'required|numeric|min:0',
            'description' => 'required|min:10|max:300',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->name = $request->name;
        $product->color = $request->color;
        $product->material = $request->material;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect('products')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('products')->with('success', 'Product deleted successfully!');
    }
}
