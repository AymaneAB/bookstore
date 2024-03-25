@extends('layouts.admin.base')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Edit Guest Order</h2>
    </div>
    <form action="{{ route('dashboard.guest-orders.update', $guestOrder->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $guestOrder->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $guestOrder->email }}">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $guestOrder->phone }}">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <textarea class="form-control" id="address" name="address" required>{{ $guestOrder->address }}</textarea>
        </div>

        <div class="mb-3">
            <label for="product_requests" class="form-label">Product Requests:</label>
            <textarea class="form-control" id="product_requests" name="product_requests" required>{{ $guestOrder->product_requests }}</textarea>
        </div>
        <div class="mb-3">
            <label for="total_price" class="form-label">Total Price: (DH)</label>
            <input type="number" class="form-control" id="total_price" name="total_price" value="{{ $guestOrder->order->total_price }}" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select class="form-select" id="status" name="status" required>
                <option value="">Choose status...</option>
                <option value="pending" {{ $guestOrder->order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="processing" {{ $guestOrder->order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                <option value="completed" {{ $guestOrder->order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="shipped" {{ $guestOrder->order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                <option value="canceled" {{ $guestOrder->order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Guest Order</button>
    </form>
@endsection
