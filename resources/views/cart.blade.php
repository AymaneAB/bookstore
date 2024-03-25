@extends('layouts.main.base')

@section('content')
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
    <div class="container">
        <h2>Shopping Cart</h2>
        @if($cart)
            <div class="cart">
                @foreach($cart as $id => $details)
                    <div class="row">
                        <div class="col">{{ $details['name'] }}</div>
                        <div class="col">{{ $details['quantity'] }}</div>
                        <div class="col">{{ $details['price'] }}</div>

                        <div class="col">
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button type="submit">Remove</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div>Your cart is empty!</div>
        @endif
        <!-- Checkout form -->
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Checkout</button>
        </form>
    </div>
@endsection
