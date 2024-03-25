@extends('layouts.main.base')

@section('content')
<div class="container">
    <h1>Products</h1>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4">
                <h2>{{ $product->name }}</h2>
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                <p>{{ $product->description }}</p>
                <p>${{ number_format($product->price, 2) }}</p>
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
