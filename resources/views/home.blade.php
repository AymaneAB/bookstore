@extends('layouts.main.base')



@section('content')

	<style>
		.logo-carousel-inner {
			display: flex;
			justify-content: space-between; /* Adjust as needed */
		}

		.single-logo-item {
			flex: 1;
			text-align: center; /* Center images horizontally */
			width: 100px; /* Set a fixed width for all items */
			height: 100px; /* Set a fixed height for all items */
			overflow: hidden; /* Hide overflow if necessary */
		}

		.single-logo-item img {
			width: 100%; /* Make images fill the container */
			height: auto; /* Let the height adjust proportionally */
		}
	</style>

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->

	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Adawati</p>
							<h5>Everything You Need To Get Your Studies Comfortable Is Here</h5>
							<div class="hero-btns">
								<a href="{{ route('products') }}" class="boxed-btn">Our Products</a>
								<a href="{{ route('contact-us.index') }}" class="bordered-btn">Contact Us</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->

	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Free Shipping</h3>
							<p>When order over $75</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>24/7 Support</h3>
							<p>Get support all day</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Refund</h3>
							<p>Get refund within 3 days!</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->

	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Our</span> Products</h3>
						<p>Everything You Need To Get Your Studies Comfortable Is Here.</p>
					</div>
				</div>
			</div>

			<div class="row product-lists">

                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 text-center strawberry">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="single-product.html"><img style="height:175px ;" src="{{ asset("images/".$product->image_url)}}" alt=""></a>
                            </div>
                            <h3>{{$product->name}}</h3>
                            <p class="product-price">{{$product->price}} DH</p>
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary" style="background-color: #38419D;color:#fff;padding: 10px 20px;"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                            </form>
                        </div>
                    </div>
                @endforeach
			</div>
		</div>
	</div>
	<!-- end product section -->


	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="{{ asset('img/bic-logo.png') }}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{ asset('img/maped-logo.png') }}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{ asset('img/pilot-logo.png') }}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{ asset('img/giotto-logo.png') }}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{ asset('img/molin-logo.png') }}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->
@endsection
