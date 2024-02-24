<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
   

    public function index()
    {
        $products =Product::All();
        return view('home',compact('products'));  
    }
    public function create()
    {
        $products =Product::All();
        return view('admin.products.create',compact('products'));
    }

    
     public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            
        ]);

        //dd($validatedData['name']);
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->save();
        session()->flash('success', 'Product created successfully!');
        return redirect()->route('products.create');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.create')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.create')->with('success', 'Product deleted successfully!');
    }
}
