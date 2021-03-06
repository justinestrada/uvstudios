
@if (!is_page_template('views/template-splash.blade.php'))
  @include('partials.modal.full-screen-menu')
  @include('partials.header.announcement')
  @if ($header = get_field('header', 'option'))
    <header id="header" class="bg-white py-3 z-depth-1">
      <div class="container">
        <div class="row">
          @if ($header['button']['enable'])
            <div class="col-lg-4 d-none d-lg-flex align-items-center">
              <a href="{{ $header['button']['link']['url'] }}" title="{{ $header['button']['link']['title'] }}" class="btn btn-outline-black btn-rounded">
                {{ $header['button']['text'] }}
              </a>
            </div>
          @endif
          <div class="col-6 col-lg-4 d-flex align-items-center justify-content-start justify-content-lg-center pr-0">
            <a href="{{ home_url('/') }}" title="{{ bloginfo('name') }}" class="d-block text-black" >
              {{-- <img src="{{ App\asset_path('images/logo/uv.svg') }}" alt="{{ bloginfo('name') }}" class="logo d-lg-none" /> --}}
              <img src="{{ App\asset_path('images/logo/uv-studios.svg') }}" alt="{{ bloginfo('name') }}" class="logo" />
              <h1 class="site-name d-none">{{ bloginfo('name') }}</h1>
            </a>
          </div>
          <div class="col-6 col-lg-4 text-right pl-0">
            <div class="d-inline-block position-relative mr-1 mr-lg-3">
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
            <div class="d-inline-block position-relative mr-1 mr-lg-3">
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
  @endif
  @include('partials.header.left-sticky-menu')
@endif
