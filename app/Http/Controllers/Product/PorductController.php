<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PorductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->orderBy('created_at', 'desc')->get();

        return view('admin.product.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:products|max:255',
            'description' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'required|numeric',
            'image' => 'required|image|max:10048',
            'user_id' => 'nullable|exists:users,id'
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'image' => $imagePath,
            'user_id' => Auth::id()
        ]);

        return to_route('product.index')->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validate_data = $request->validate([
            'title' => 'required|max:255|unique:products,title,' . $product->id,
            'description' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'required|numeric',
        ]);


        $product->update($validate_data);

        return to_route('product.index', $product)->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('product.index', $product)->with('success', 'Product deleted successfully');
    }
}
