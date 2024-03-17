<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::all();
        $query = Product::query();

        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->orderBy('created_at', 'desc')->paginate(10); // You can change the number of items per page

        return view('dashboard.products.index', compact('products', 'categories'));
    }
    public function create()
    {
        $categories = Category::all(); // Make sure to add use App\Models\Category; at the top
        return view('dashboard.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|integer|exists:categories,id'
        ]);


        Product::create($validated);

        return redirect()->route('dashboard.products.create')->with('success', 'Product added successfully!');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // Assuming you have categories to select from

        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => '',
            'price' => 'required|numeric',
            'category_id' => 'required|integer|exists:categories,id',
            'quantity' => 'required|integer|min:0'
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);

        return redirect()->route('dashboard.products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        // Redirect back to the same page with a success message
        return redirect()->route('dashboard.products.index')->with('success', 'Product deleted successfully!');
    }
}
