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
        return redirect()->back()->withCookie('cart', json_encode($cart), $minutes);
    }

    private function getCartFromCookie()
    {
        $cart = Cookie::get('cart');
        return $cart ? json_decode($cart, true) : [];
    }

    public function viewCart()
    {
        $cart = $this->getCartFromCookie();
        return view('cart', compact('cart'));
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
