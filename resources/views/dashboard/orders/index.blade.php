@extends('layouts.admin.base')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Orders</h1>
</div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form class="row gx-2 gy-2 align-items-center" action="{{ route('dashboard.orders.index')}}" method="GET">
        <div class="col-auto">
            <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search by user name">
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
                <th>Order ID</th>
                <th>User Name</th>
                <th>Total</th>
                <th>Date</th>
                <th>Status</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td> {{-- Adjust according to your database structure --}}
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td>
                        <form action="{{ route('dashboard.orders.changeStatus', $order->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select class="form-select form-select-sm" name="status" onchange="this.form.submit()">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>shipped</option>
                                <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                            </select>
                        </form>
                    </td>
                    <td><a href="{{ route('dashboard.orders.show', $order->id) }}" class="btn btn-info btn-sm">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $orders->appends(['search' => $search])->links() }}
@endsection
