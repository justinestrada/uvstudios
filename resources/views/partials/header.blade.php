
@if (!is_page_template('views/template-splash.blade.php'))
  @include('partials.modal.full-screen-menu')
  @include('partials.header.announcement')
  <header id="header" class="bg-white py-3 z-depth-1">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 d-none d-lg-flex align-items-center">
          <a href="{{ get_site_url() }}/shop" title="Shop Now" class="btn btn-outline-black btn-rounded">
            Shop Now
          </a>
        </div>
        <div class="col-auto col-lg-4 d-flex justify-content-center">
          <a href="{{ home_url('/') }}" title="{{ bloginfo('name') }}" class="text-black" >
            <img src="{{ App\asset_path('images/logo/uv.svg') }}" alt="{{ bloginfo('name') }}" class="logo d-lg-none" />
            <img src="{{ App\asset_path('images/logo/uv-studios.svg') }}" alt="{{ bloginfo('name') }}" class="logo d-none d-lg-block" />
            {{-- <h1 class="site-name text-uppercase m-0">Gift of Life CBD</h1> --}}
          </a>
        </div>
        <div class="col text-right">
          <div class="d-inline-block position-relative mr-3">
            @if (is_user_logged_in())
              <a href="{{ get_site_url() }}/my-account" class="btn btn-circle" title="My Account" >
                <img src="{{ App\asset_path('images/icon/avatar.svg') }}" alt="User" class="btn-img-default" />
                <img src="{{ App\asset_path('images/icon/avatar-white.svg') }}" alt="User" class="btn-img-hover" />
              </a>
            @else
              <button type="button" class="btn btn-circle" data-toggle="modal" data-target="#loginModal" aria-label="Login" >
                <img src="{{ App\asset_path('images/icon/avatar.svg') }}" alt="User" class="btn-img-default"/>
                <img src="{{ App\asset_path('images/icon/avatar-white.svg') }}" alt="User" class="btn-img-hover"/>
              </button>
            @endif
          </div>
          <div class="d-inline-block position-relative mr-3">
            <button type="button" class="btn btn-circle btn-open-side-cart" aria-label="Open Cart" >
              <img src="{{ App\asset_path('images/icon/cart.svg') }}" alt="Cart" class="btn-img-default"/>
              <img src="{{ App\asset_path('images/icon/cart-white.svg') }}" alt="Cart" class="btn-img-hover"/>
            </button>
            @if (function_exists('WC') && WC()->cart->get_cart_contents_count() )
              <span class="cart-count">{{ WC()->cart->get_cart_contents_count() }}</span>
            @endif
          </div>
          <button type="button" class="btn btn-circle" aria-label="Open Menu" style="position: relative; top: -2px;" data-toggle="modal" data-target="#fullScreenModal">
            <img src="{{ App\asset_path('images/icon/menu-bars.svg') }}" alt="Menu Bars" class="btn-img-default"/>
            <img src="{{ App\asset_path('images/icon/menu-bars-white.svg') }}" alt="Menu Bars" class="btn-img-hover"/>
          </button>
        </div>
      </div>
    </div>
  </header>
  @include('partials.header.left-sticky-menu')
@endif
