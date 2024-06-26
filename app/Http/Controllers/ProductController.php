<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\URL;

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

        $products = $query->orderBy('created_at', 'desc')->paginate(10);
        $currentPath = $request->path();
        $view = 'products';

        if (str_contains($currentPath, 'dashboard/products')) {
            $view = 'dashboard.products.index';
        }

        return view($view, compact('products', 'categories'));
        ;
    }
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required|integer|exists:categories,id',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload image
        $imageName = time().'.'.$request->image_url->extension();  
        $request->image_url->move(public_path('images'), $imageName);

        // Create product
        $product = new Product;
        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];
        $product->quantity = $validated['quantity'];
        $product->category_id = $validated['category_id'];
        $product->image_url = $imageName;
        $product->save();
        //Product::create($validated);

        return redirect()->route('dashboard.products.create')->with('success', 'Product added successfully!');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

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


        return redirect()->route('dashboard.products.index')->with('success', 'Product deleted successfully!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $categories = Category::all();
        
        $products = Product::where('name', 'LIKE', '%' . $query . '%')
                    ->orWhere('description', 'LIKE', '%' . $query . '%')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);

        return view('products', compact('products', 'categories'));
    }
}
