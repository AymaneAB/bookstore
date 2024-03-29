<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('dashboard.statistic.*') ? 'active' : '' }}" href="{{ route('dashboard.statistic.index') }}">
            <span data-feather="file"></span>
            Statistic</a>
      </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard.orders.*') ? 'active' : '' }}" href="{{ route('dashboard.orders.index') }}">
              <span data-feather="file"></span>
              Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard.guest-orders.*') ? 'active' : '' }}" href="{{ route('dashboard.guest-orders.index') }}">
              <span data-feather="file-text"></span>
              guest orders</a>
          </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard.categories.*') ? 'active' : '' }}" href="{{ route('dashboard.categories.index') }}">
              <span data-feather="list"></span>
              Categories</a>
          </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('dashboard.products.*') ? 'active' : '' }}" href="{{ route('dashboard.products.index') }}">
            <span data-feather="shopping-cart"></span>
            Products</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="users"></span>
            Customers
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="bar-chart-2"></span>
            Reports
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="layers"></span>
            Integrations
          </a>
        </li> --}}
      </ul>

      {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Saved reports</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle"></span>
        </a>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Current month
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Last quarter
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Social engagement
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Year-end sale
          </a>
        </li> --}}
      </ul>
    </div>
  </nav>
