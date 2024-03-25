<?php

namespace App\Http\Controllers;

use App\Models\GuestOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class GuestOrderController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name', '');
        $email = $request->input('email', '');
        $status = $request->input('status', '');

        $guestOrders = GuestOrder::query()
            ->whereHas('order', function ($query) use ($status) {
                $query->whereNull('user_id');
                if (!empty ($status) && $status != 'all') {
                    $query->where('status', $status);
                }
            })
            ->when($name, function ($query, $name) {
                return $query->where('name', 'like', "%{$name}%");
            })
            ->when($email, function ($query, $email) {
                return $query->where('email', 'like', "%{$email}%");
            })
            ->paginate(10);

        return view('dashboard.guest-orders.index', compact('guestOrders', 'name', 'email', 'status'));
    }
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


    public function edit($id)
    {
        $guestOrder = GuestOrder::findOrFail($id);
        return view('dashboard.guest-orders.edit', compact('guestOrder'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'required|string',
            'product_requests' => 'required|string',
            'status' => 'required|in:pending,processing,completed,shipped,canceled',
            'total_price' => 'required|numeric|min:0'
        ]);

        $guestOrder = GuestOrder::findOrFail($id);

        $guestOrder->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'product_requests' => $validated['product_requests'],
        ]);

        if ($guestOrder->order) {
            $guestOrder->order->update(['status' => $validated['status'], 'total_price' => $validated['total_price']]);
        }

        return redirect()->route('dashboard.guest-orders.index')->with('success', 'Guest order updated successfully!');
    }



}
