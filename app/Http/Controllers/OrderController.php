<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $status = $request->input('status', '');


        $query = Order::whereNotNull('user_id');

        if (!empty ($search)) {
            $query->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            });
        }

        if (!empty ($status) && $status != 'all') {
            $query->where('status', $status);
        }

        $orders = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard.orders.index', compact('orders', 'search', 'status'));
    }

    public function show($id)
    {
        // Assuming there is a 'products' relation on the Order model
        // This will load the order along with its associated products
        $order = Order::findOrFail($id);
        $order->load('products');

        return view('dashboard.orders.show', compact('order'));
    }

    public function changeStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,canceled,shipped', // Add or change statuses according to your needs
        ]);

        $order = Order::findOrFail($id);

        $order->update(['status' => $request->status]);

        $referrer = URL::previous(); // This gets the URL of the previous request
        $redirectRoute = 'dashboard.orders.index'; // Default redirect

        if (str_contains($referrer, 'dashboard/guest-orders')) {
            $redirectRoute = 'dashboard.guest-orders.index';
        }

        return redirect()->route($redirectRoute)->with('success', 'Order status updated successfully!');
    }

    public function store(Request $request)
    {
        $cart = Cookie::get('cart');
        $cart = $cart ? json_decode($cart, true) : [];
//dd($cart);
        // Check if cart is not empty
        if ($cart) {
            // Create new order
            $totalPrice = 0;
foreach ($cart as $item) {
    $totalPrice += $item['price'] * $item['quantity'];
}

            $order = new Order();
            $order->user_id = Auth::id(); // or null if guest
            $order->order_date = now();
            $order->total_price = $totalPrice;
            $order->status = 'pending'; // default status
            $order->save();

            // Create order items
            foreach ($cart as $productId => $details) {
                $item = new OrderItem();
                $item->order_id = $order->id;
                $item->product_id = $productId;
                $item->quantity = $details['quantity'];
                $item->price_at_purchase = $details['price']; // Assuming this is the total price for all units of this product
                $item->save();
                // Update product stock quantity
                $product = Product::find($productId);
                if ($product) {
                    $product->quantity -= $details['quantity'];
                    $product->save();
                }
            }

            // Clear the cart
            // Prepare a response to clear the cart
            $response = redirect()->route('cart.view')->with('success', 'Order placed successfully!');
            // Attach a cookie removal to that response
            $cookie = Cookie::forget('cart');
            return $response->withCookie($cookie);
        }

        // Redirect back if the cart is empty
        return back()->with('error', 'Your cart is empty.');
    }
}
