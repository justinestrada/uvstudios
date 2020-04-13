
<div class="modal fade" id="fullScreenModal" tabindex="-1" role="dialog" aria-labelledby="fullScreenModalLabel" aria-hidden="true" style="padding-right: 0;">
  <div class="modal-dialog modal-full-screen modal-dialog-centered" role="document">
    <div class="modal-content h-100">
      <div class="modal-body">
        <div class="container d-flex justify-content-center align-items-center position-relative" style="height: 100vh;">
          <button type="button" class="btn btn-close-full-screen-menu hover-spin" data-dismiss="modal" aria-label="Close">
            <img src="{{ App\asset_path('images/icon/close.svg') }}" alt="Close" style="position: relative; top: -4px; height: 24px;" >
          </button>
          <div class="container">
            <div class="row mb-5">
              <div class="col-lg-6 text-center text-lg-left">
                @if (has_nav_menu('full_screen_nav'))
                  {!! wp_nav_menu([
                    'theme_location' => 'full_screen_nav',
                    'menu_id' => 'full-screen-nav',
                    'container' => 'div',
                    'menu_class' => 'nav',
                  ])!!}
                @endif
              </div>
              <div class="col-lg-6 text-center text-lg-left">
                <ul class="nav" >
                  <li class="sweep-to-right">
                    <a href="javascript:void(0);" title="Cart" class="btn-open-side-cart" >Cart @if (function_exists('WC') && WC()->cart->get_cart_contents_count()) <span class="cart-count">{{ WC()->cart->get_cart_contents_count() }}</span> @endif</a>
                  </li>
                  @if (function_exists('WC') && WC()->cart->get_cart_contents_count() )
                    <li class="sweep-to-right">
                      <a href="{{ get_site_url() }}/checkout" title="Checkout" >Checkout</a>
                    </li>
                  @endif
                  @if ( ! is_user_logged_in() )
                    <li class="sweep-to-right">
                      <a href="#login" title="Login" data-toggle="modal" data-target="#loginModal" >Login</a>
                    </li>
                    {{-- <li class="sweep-to-right">
                      <a href="#register" title="Register" data-toggle="modal" data-target="#registerModal" >Register</a>
                    </li> --}}
                  @else
                    <li class="sweep-to-right">
                      <a href="{{ get_site_url() }}/my-account" title="My Account" >My Account</a>
                    </li>
                  @endif
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col text-center text-lg-left">
                @include('partials.social-icons', ['color' => 'white'])
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
