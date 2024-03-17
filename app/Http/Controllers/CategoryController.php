<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $categories = Category::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.categories.index', compact('categories', 'search'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:categories',
            'description' => 'required',
        ]);

        Category::create($validated);

        return redirect()->route('dashboard.categories.create')
            ->with('success', 'Category created successfully!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => '',
        ]);

        $category = Category::findOrFail($id);
        $category->update($validated);

        return redirect()->route('dashboard.categories.index')->with('success', 'catagory updated successfully!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        // Redirect back to the same page with a success message
        return redirect()->route('dashboard.categories.index')->with('success', 'Product deleted successfully!');
    }


}
