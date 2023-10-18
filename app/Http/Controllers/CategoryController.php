<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
  
    public function index()
    {
        return Inertia::Render('Category', [
            'Category' => Category::all(),
        ]);
    }

  
    public function create()
    {
        return Inertia::Render('CategoryAdd',[
            'Category' => Category::all()
        ]);
    }

    
    public function store(Request $request)
    {
        Category::create($request->validate([
            'name' => 'required'
        ]));

        return redirect()->route('category.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
