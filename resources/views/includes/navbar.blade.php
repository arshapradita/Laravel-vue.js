<nav
      class="
        navbar navbar-expand-lg navbar-light navbar-store
        fixed-top
        navbar-fixed-top
      "
      data-aos="fade-down"
    >
      <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
          <img src="/images/logo.svg" alt="logo" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('categories') }}" class="nav-link">Category</a>
            </li>
            <li class="nav-item">
              <a href="https://wa.me/+6287819354700?text=Hallo%20Admin%2C%20%0ASaya%20mau%20tanya%20..." class="nav-link">Contact</a>
            </li>
            @guest
                <li class="nav-item">
              <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
            </li>
            <li class="nav-item">
              <a
                href="{{ route('login') }}"
                class="btn btn-success nav-link px-4 text-white"
                >Sign In</a
              >
            </li>
            @endguest
          </ul>

          @auth
          <ul class="navbar-nav d-none d-lg-flex">
            <li class="nav-item dropdown">
              <a
                href="#"
                class="nav-link"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
              >
                <img
                  src="/images/icon-user.png"
                  alt=""
                  class="rounded-circle mr-2 profile-picture"
                />
                Hi, {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu">
                <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                <a href="{{ route('dashboard-settings-account') }}" class="dropdown-item"
                  >Setting</a
                >
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                >Log out</a>
              </div>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
              </form>
            </li>
            <li class="nav-item">
              <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                @php
                    $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                @endphp
                @if($carts > 0)
                    <img src="/images/icon-cart-filled.svg" alt="" />
                    <div class="card-badge">{{ $carts }}</div>
                @else
                    <img src="/images/icon-cart-empty.svg" alt="" />
                @endif
              </a>
            </li>
          </ul>

          <ul class="navbar-nav d-block d-lg-none">
            <li class="nav-item">
              <a href="{{ route('dashboard') }}" class="nav-link"> Hi, {{ Auth::user()->name }} </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('cart') }}" class="nav-link d-inline-block"> Cart </a>
            </li>
          </ul>
          @endauth
        </div>
      </div>
    </nav>