<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $Categories= Category::orderBy('id','desc')->paginate(6);
   
    return view('admin.allCategories',compact('Categories'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addCategory');

    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $validated = $request->validate([
        'title'       => 'required',
        'description' => 'required',
        'parent_category' => 'nullable'
    ]);

    // Auto-generate slug from title
    $validated['slug'] = Str::slug($validated['title']);

    // Ensure the slug is unique
    $count = Category::where('slug', $validated['slug'])->count();
    if ($count > 0) {
        $validated['slug'] .= '-' . time(); // Append timestamp if exists
    }

    Category::create($validated);

    return redirect()->route('categories.index')->with('success', 'Category created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         // Find category or throw 404 if not found
    $category = Category::findOrFail($id);

    // Pass the category to the edit view
    return view('admin.editCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $category = Category::findOrFail($id);

    $validated = $request->validate([
        'title'           => 'required',
        'slug'            => 'required|unique:categories,slug,' . $category->id,
        'description'     => 'required',
        'parent_category' => 'nullable'
    ]);

    $category->update($validated);

    return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    // Find the category or throw 404 if not found
    $category = Category::findOrFail($id);

    // Delete the category
    $category->delete();

    // Redirect back with success message
    return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
}

}
