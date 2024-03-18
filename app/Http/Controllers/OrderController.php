<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

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

        return redirect()->route('dashboard.orders.index')->with('success', 'Order status updated successfully!');
    }
}
