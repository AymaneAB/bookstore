@extends('layouts.main.base')

@section('content')
    	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Your Orders</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
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
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
                    @if($cart)
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-remove"></th>
                                {{-- <th class="product-image">Product Image</th> --}}
                                <th class="product-name">Name</th>
                                <th class="product-price">Price (DH)</th>
                                <th class="product-quantity">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $id => $details)
                            <tr class="table-body-row">
                                <td>
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">remove</button>
                                    </form>
                                </td>
{{--<td class="product-image"><img src="assets/img/products/product-img-1.jpg" alt=""></td> --}}
                                <td class="product-name">{{ $details['name'] }}</td>
                                <td class="product-price">{{ $details['price'] }}</td>
                                <td class="product-quantity">
                                    <form action="{{ route('cart.update', $id) }}" method="POST">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $details['quantity'] }}">
                                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach 

                        </tbody>
                    </table>
                    @else
                        <div>Your cart is empty!</div>
                    @endif


					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>{{$totalPrice}} DH</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
                            <form action="{{ route('orders.store') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-lg" style="background-color: #38419D;border-color:#38419D">Checkout</button>
                            </form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->
@endsection
