	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="{{route("home")}}">
								<img src="{{asset ('img/logo.png')}}" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="{{ request()->routeIs('home') ? 'current-list-item' : '' }}"><a href="{{route("home")}}">Home</a></li>
                                <li class="{{ request()->routeIs('products') ? 'current-list-item' : '' }}"><a href="{{route("products")}}">Products</a></li>
								<li><a href="{{ route('contact-us.index') }}">Contact</a></li>
                                <li class="{{ request()->routeIs('guest-order.create') ? 'current-list-item' : '' }}"><a href="{{route("guest-order.create")}}">Order</a></li>
								<li>
									<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
									<div class="mobile-menu"></div>
								</li>
								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="{{route("cart.view")}}"><i class="fas fa-shopping-cart"></i></a>
                                        @if (auth()->check())
                                              <div class="dropdown" style="display: inline-block">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{ auth()->user()->name }}
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li class="dropdown-item">
                                                        <form action="{{route("logout")}}" method="post">
                                                            @csrf
                                                                <button type="submit" class="btn btn-danger btn-block">Logout</button>
                                                        </form>
                                                    </li>

                                                </ul>
                                              </div>
                                        @else
                                            <a href="{{ route('login') }}">Login</a>
                                            <a href="{{route("register")}}">Register</a>
                                        @endif
									</div>
								</li>
							</ul>
						</nav>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<form action="{{ route('products.search') }}" method="GET">
                            	<input type="text" name="query" placeholder="Keywords">
                            	<button type="submit">Search <i class="fas fa-search"></i></button>
                        	</form>

							<!-- Display search results -->
							@if(isset($products))
								@foreach($products as $product)
									{{ $product->name }} <!-- Display other product details as needed -->
								@endforeach
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->
