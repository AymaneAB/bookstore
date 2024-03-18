@extends('layouts.admin.base')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Order</h1>
</div>
<p><strong>Order ID:</strong> {{ $order->id }}</p>
<p><strong>Status:</strong> {{ $order->status }}</p>
<p><strong>Order Date:</strong> {{ $order->created_at->toFormattedDateString() }}</p>
<p><strong>Customer Name:</strong> {{ $order->user->name ?? 'N/A' }}</p> {{-- Check if there is a user relationship --}}
<h4>Products in this Order:</h4>
<table class="table">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price (DH)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->quantity }}</td> {{-- Adjust according to your pivot table fields --}}
                <td>{{ number_format($product->pivot->price_at_purchase, 2) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('dashboard.orders.index') }}" class="btn btn-secondary">Back to orders</a>
@endsection
