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
            'categories' => Category::all(),
        ]);
    }

  
    public function create()
    {
        return Inertia::Render('CategoryAdd');
    }

    
    public function store(Request $request)
    {
        Category::create($request->validate([
            'name' => 'required'
        ]));

        return redirect()->route('categories.index');

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
        return Inertia::render('CategoryEdit', [
            'category' => $category
        ]); 

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route (route: 'categories.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');

    }
}
