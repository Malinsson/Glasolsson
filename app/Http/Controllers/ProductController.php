<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $colors    = Product::select('color')->distinct()->pluck('color');
        $materials = Product::select('material')->distinct()->pluck('material');

        /** products filter query **/
        $products = Product::query()
            ->when($request->categories, function ($query) use ($request) {
                $query->whereIn('category_id', $request->categories);
            })
            ->when($request->colors, function ($query) use ($request) {
                $query->whereIn('color', $request->colors);
            })
            ->when($request->materials, function ($query) use ($request) {
                $query->whereIn('material', $request->materials);
            })
            ->when($request->max_price && $request->max_price < 3500, function ($query) use ($request) {
                $query->where('price', '<=', $request->max_price);
            })
            ->with('category')
            ->paginate(10)
            ->withQueryString();

        return view('products.index', compact('products', 'categories', 'colors', 'materials'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('products.create', compact('categories', 'products'));
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
            'image' => 'nullable|file|mimetypes:image/jpeg,image/png,image/webp,image/avif|max:2048',
        ], [
            'image.file' => 'The image must be a valid file.',
            'image.mimetypes' => 'The image must be a JPEG, PNG, WebP, or AVIF file.',
            'image.max' => 'The image may not be greater than 2 MB.',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->color = $request->input('color');
        $product->material = $request->input('material');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        $product->image = 'images/stock/no-default-thumbnail.png';

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/products', 'public');
            $product->image = $imagePath;
        }

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
        $products = Product::all();
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories', 'products'));
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
            'image' => 'nullable|file|mimetypes:image/jpeg,image/png,image/webp,image/avif|max:2048',
        ], [
            'image.file' => 'Bilden måste vara en giltig fil.',
            'image.mimetypes' => 'Bilden måste vara en JPEG, PNG, WebP, eller AVIF fil.',
            'image.max' => 'Bilden får inte vara större än 2 MB.',
        ]);

        $product->name = $request->name;
        $product->color = $request->color;
        $product->material = $request->material;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            if ($product->image && !str_starts_with($product->image, 'images/stock/')) {
                Storage::disk('public')->delete($product->image);
            }

            $imagePath = $request->file('image')->store('images/products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect('products')->with('succe', 'Produkten har uppdaterats!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('products')->with('succe', 'Produkten har tagits bort!');
    }
}
