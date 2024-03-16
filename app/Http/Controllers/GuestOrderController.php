<?php

namespace App\Http\Controllers;

use App\Models\GuestOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class GuestOrderController extends Controller
{
    public function create()
    {
        return view('guest_order.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'email',
            'phone' => 'required',
            'address' => 'required',
            'product_requests' => 'required',
        ]);


        $order = Order::create([
            "order_date" => now(),
        ]);

        $validated["order_id"] = $order->id;

        GuestOrder::create($validated);

        return redirect()->route('guest-order.create')->with('success', 'Your order has been submitted successfully!');
    }
}
