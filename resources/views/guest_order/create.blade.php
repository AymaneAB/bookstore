@extends('layouts.main.base')

@section('content')
        <!-- breadcrumb-section -->
        <div class="breadcrumb-section breadcrumb-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="breadcrumb-text">
                            <p>Fresh and Organic</p>
                            <h1>Cart</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end breadcrumb section -->
<div class="order-guest row justify-content-center mt-150 mb-150">
    <div class="col-md-6">
        <h2>Submit Your Order</h2>

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
        <form action="{{ route('guest-order.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="guest_name">Your Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group mb-3">
                <label for="guest_email">Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group mb-3">
                <label for="guest_contact_info">phone:</label>
                <input type="tel" class="form-control" id="guest_contact_info" name="phone" required>
            </div>
            <div class="form-group mb-3">
                <label for="guest_email">Address:</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-group mb-3">
                <label for="product_requests">Order:</label>
                <textarea class="form-control" id="product_requests" name="product_requests" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Order</button>
        </form>
    </div>
</div>
@endsection
