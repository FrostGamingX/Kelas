<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        
        $query = Product::with('category');
        
        if ($category) {
            $query->whereHas('category', function($q) use ($category) {
                $q->where('name', $category);
            });
        }
        
        $products = $query->get();
        $categories = Category::all();
        
        return view('products.index', compact('products', 'categories', 'category'));
    }
    
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('products.show', compact('product'));
    }
    
    // Admin methods
    public function admin()
    {
        $products = Product::with('category')->get();
        return view('admin.index', compact('products'));
    }
    
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.edit', compact('product', 'categories'));
    }
    
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }
        
        $product->update($validated);
        
        return redirect()->route('admin')->with('success', 'Product updated successfully');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }
        
        Product::create($validated);
        
        return redirect()->route('admin')->with('success', 'Product created successfully');
    }
    
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        
        return redirect()->route('admin')->with('success', 'Product deleted successfully');
    }
}