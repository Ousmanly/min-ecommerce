<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Order_details;
use App\Models\Product;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function showByCategory($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)->get();

        return view('visitor.product.categories', compact('category', 'products'));
    }

    public function showByCategoryU($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)->get();

        return view('customer.product.categories', compact('category', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('customer.order.create', compact('product'));
    }
    public function createVisitor(Product $product)
    {
        return view('visitor.order.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'email' => 'nullable|email',
            'phone_number' => 'required|string',
        ]);

        $order = Order::create();

        Order_details::create([
            'order_id' => $order->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('user')->with('success', 'Commande passée avec succès !');
    }

    public function storeVisitor(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'email' => 'nullable|email',
            'phone_number' => 'required|string',
        ]);

        $order = Order::create();

        Order_details::create([
            'order_id' => $order->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('welcome')->with('success', 'Commande passée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
