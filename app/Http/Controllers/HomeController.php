<?php

namespace App\Http\Controllers;
use App\Models\Product; 


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::take(3)->get(); // Fetch all products from the database
        return view('home', compact('products')); // Pass the products data to the view
        //return view('home');
    }
}
