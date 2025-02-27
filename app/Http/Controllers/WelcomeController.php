<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Node;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){

        $products = Product::query()->orderBy('created_at', 'desc')->paginate();

        return view('admin.admin', compact('products'));
    }

    public function indexUser(){

        $products = Product::query()->orderBy('created_at', 'desc')->paginate();

        return view('customer.user', compact('products'));
    }

    public function indexVisitor(){

        $products = Product::query()->orderBy('created_at', 'desc')->paginate();

        return view('welcome', compact('products'));
    }

    
    public function getTotal() {
        $orders = Order::all(); 
        $products  = Product::all(); 
        $categories  = Category::all(); 
        return view('admin.admin', compact('orders', 'products', 'categories'));
    }
}
