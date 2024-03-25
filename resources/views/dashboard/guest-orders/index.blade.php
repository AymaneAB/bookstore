@extends('layouts.admin.base')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Guest Orders</h1>
    </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <form action="{{ route('dashboard.guest-orders.index') }}" method="get" class="row gx-2 gy-2 align-items-center">
        <div class="col-auto">
            <input type="text" name="name" value="{{ $name }}" placeholder="Search by name" class="form-control">
        </div>
        <div class="col-auto">
            <input type="text" name="email" value="{{ $email }}" placeholder="Search by email" class="form-control">
        </div>
        <div class="col-auto">
            <select name="status" class="form-select">
                <option value="">Select a status</option>
                <option value="all" {{ $status == 'all' ? 'selected' : '' }}>All</option>
                <option value="pending" {{ $status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="processing" {{ $status == 'processing' ? 'selected' : '' }}>Processing</option>
                <option value="completed" {{ $status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="shipped" {{ $status == 'shipped' ? 'selected' : '' }}>shipped</option>
                <option value="canceled" {{ $status == 'canceled' ? 'selected' : '' }}>Canceled</option>

            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>

    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Order Date</th>
                <th>Total Price (DH)</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guestOrders as $guestOrder)
                <tr>
                    <td>{{ $guestOrder->name }}</td>
                    <td>{{ $guestOrder->phone }}</td>
                    <td>{{ $guestOrder->order->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>{{ number_format($guestOrder->order->total_price, 2) }}</td>
                    <td>
                        <form action="{{ route('dashboard.orders.changeStatus', $guestOrder->order->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select class="form-select form-select-sm" name="status" onchange="this.form.submit()">
                                <option value="pending" {{ $guestOrder->order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ $guestOrder->order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="completed" {{ $guestOrder->order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="shipped" {{ $guestOrder->order->status == 'shipped' ? 'selected' : '' }}>shipped</option>
                                <option value="canceled" {{ $guestOrder->order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('dashboard.guest-orders.edit', $guestOrder->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="{{ route('dashboard.guest-orders.destroy', $guestOrder->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $guestOrders->appends(['name' => $name, 'email' => $email])->links() }}
@endsection

