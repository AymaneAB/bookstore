<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {

        $product = Product::findOrFail($productId);
        $cart = $this->getCartFromCookie();
        if (isset ($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
            ];
        }
        $minutes = 7 * 24 * 60;
        //return redirect()->back()->withCookie('cart', json_encode($cart), $minutes);
        return redirect()->back()
            ->withCookie('cart', json_encode($cart), $minutes)
            ->with('success', 'Cart updated successfully.');
    }

    private function getCartFromCookie()
    {
        $cart = Cookie::get('cart');
        return $cart ? json_decode($cart, true) : [];
    }

    public function viewCart()
    {
        $cart = $this->getCartFromCookie();

        // Initialize total price variable
        $totalPrice = 0;

        // Check if cart is not empty
        if (!empty ($cart)) {
            // Iterate over each item in the cart
            foreach ($cart as $item) {
                // Add the price of each item to the total price
                $totalPrice += $item['price'] * $item['quantity'];
            }
        }
        return view('cart', compact('cart', 'totalPrice'));
    }

    public function removeFromCart(Request $request, $productId)
    {
        $cart = $this->getCartFromCookie();

        if (isset ($cart[$productId])) {
            unset($cart[$productId]);
            $minutes = 7 * 24 * 60;
            return redirect()->back()->withCookie('cart', json_encode($cart), $minutes);
        }

        return redirect()->back();
    }
}
