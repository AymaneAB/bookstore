@extends('layouts.admin.base')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Products</h1>
</div>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
    <form class="row gx-2 gy-2 align-items-center" action="{{ route('dashboard.products.index') }}" method="GET">
        <div class="col-auto">
            <select name="category_id" class="form-select">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" name="search" placeholder="Search by name" value="{{ request('search') }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </form>
    <div class="mb-3">
        <a href="{{ route('dashboard.products.create') }}" class="btn btn-success">Create Product</a>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price (DH)</th>
            <th>Category</th>
            <th>Actions</th>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price, 2) }}</td>
                <td>{{ $product->category->name ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination Links -->
<div class="d-flex justify-content-center">
    {!! $products->appends(request()->input())->links() !!}
</div>

@endsection
