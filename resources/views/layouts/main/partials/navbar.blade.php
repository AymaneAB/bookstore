	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="{{asset ('img/logo.png')}}" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="{{ request()->routeIs('home') ? 'current-list-item' : '' }}"><a href="{{route("home")}}">Home</a></li>
                                <li class="{{ request()->routeIs('products') ? 'current-list-item' : '' }}"><a href="{{route("products")}}">Products</a></li>
								<li><a href="{{ route('contact') }}">Contact</a></li>
                                <li class="{{ request()->routeIs('guest-order.create') ? 'current-list-item' : '' }}"><a href="{{route("guest-order.create")}}">Order</a></li>
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
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
