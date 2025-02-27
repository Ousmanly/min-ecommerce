<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()->orderBy('created_at', 'desc')->get();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'name'=>"required|string|max:50",
            'image' => 'nullable|image|max:10048',
            'user_id' => "nullable|exists:users,id"
        ]);

        $imagePath = $request->file('image')->store('categories', 'public');

        Category::create([
            'name'=>$request->name,
            'image'=>$imagePath,
            'user_id'=> Auth::id(),
        ]);
        

        return to_route('category.index')->with('success', 'Category was added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.category.show', ['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validate_data = $request->validate([
            'name'=>'required|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update($validate_data);
        

        return to_route('category.index', $category)->with('success', 'Category was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('category.index', $category)->with('success', 'Category was deleted successfully');
    }
}
