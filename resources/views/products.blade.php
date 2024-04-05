@extends('layouts.main.base')
@section('content')
    	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>What You Are Searching For</p>
						<h1>Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">

			<div class="row">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="{{empty(request('category_id')) || !request()->has('category_id') ? 'active': ''}}">
                                <a href="{{route("products")}}" style="color:black;">All</a>
                            </li>




                            @foreach ($categories as $category)
                                <li  class="{{ request('category_id') == $category->id ? 'active' : '' }}">
                                   <a href="{{route("products")}}?category_id={{$category->id}}" style="color:black;">{{$category->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

			<div class="row product-lists">

                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 text-center strawberry">
                        <div class="single-product-item">
                            @if (!empty($product->image_url))
                            <div class="product-image">
                                <a href="single-product.html"><img style="height:175px ;" src="{{ asset("images/".$product->image_url)}}" alt=""></a>
                            </div> 
                            @else
                            <div class="product-image">
                                <a href="single-product.html"><img style="height:150px ;" src="{{ asset("images/".$product->image_url)}}" alt=""></a>
                            </div> 
                            @endif
                            
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

			<div class="row">
				<div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul>
                            @if ($products->previousPageUrl())
                                <li><a href="{{ $products->previousPageUrl() }}">Prev</a></li>
                            @else
                                <li class="disabled"><span>Prev</span></li>
                            @endif

                            @foreach(range(1, $products->lastPage()) as $page)
                                @if ($page == $products->currentPage())
                                    <li><a class="active" href="#">{{ $page }}</a></li>
                                @else
                                    <li><a href="{{ $products->url($page) }}">{{ $page }}</a></li>
                                @endif
                            @endforeach

                            @if ($products->nextPageUrl())
                                <li><a href="{{ $products->nextPageUrl() }}">Next</a></li>
                            @else
                                <li class="disabled"><span>Next</span></li>
                            @endif
                        </ul>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- end products -->
@endsection
