<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProductController extends Controller
{

    public function index()
    {
        return Inertia::render('Product', [
            'products' => Product::with('category')->get(),
        ]); 
    }

    public function create()
    {
        return Inertia::render('ProductAdd', [
            'categories' => Category::all()
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image_path' => 'required|image',
        ]);

        $path = Storage::putFile('products', $request->file('image_path'));

        Product::create([
            'category_id' => $request['category_id'],
            'name' => $request['name'],
            'description' => $request['description'],
            'price' => $request['price'],
            'image_path' => $path,
        ]);

        return redirect()->route('products.index');
    }


    public function show(string $id)
    {
        //
    }

    public function edit(Product $product)
    {
        return Inertia::render('ProductEdit', [
            'product' => $product,
            'categories' => Category::all()
        ]); 
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image_path' => 'required|image',
        ]);
        
        Storage::delete($product->image_path);
        $path = Storage::putFile('products', $request->file('image_path'));

        $product->update([
            'category_id' => $request['category_id'],
            'name' => $request['name'],
            'description' => $request['description'],
            'price' => $request['price'],
            'image_path' => $path,
        ]);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        Storage::delete($product->image_path);
        $product->delete();
        return redirect()->route('products.index');
    }
}