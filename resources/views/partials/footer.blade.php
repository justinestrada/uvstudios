
@php
$site_url = get_site_url();
@endphp
@include('partials.footer.social')
<footer id="footer" class="py-5">
  <div class="container">
    <div class="row mb-3">
      <div class="col-6 col-lg-3 mb-3 mb-lg-0">
        <h4 class="text-uppercase tk-soleil mb-3">Shop</h4>
        @if ( has_nav_menu('footer_menu_1') )
          {!! wp_nav_menu([
            'theme_location' => 'footer_menu_1',
            'menu_id' => 'footer_menu_1-menu',
            'container' => 'div',
            'container_class' => 'footer_menu_1',
            'container_id' => 'footer_menu_1',
            'menu_class' => 'nav list-group list-group-flush',
            'depth' => 2
          ])!!}
        @else
          <div class="alert alert-info">
            <a href="{{ admin_url('nav-menus.php') }}" class="d-block text-info">Setup Footer Menu 1</a>
          </div>
        @endif
      </div>
      <div class="col-6 col-lg-3 mb-3 mb-lg-0">
        <h4 class="text-uppercase tk-soleil mb-3" >Learn</h4>
        @if ( has_nav_menu('footer_menu_2') )
          {!! wp_nav_menu([
            'theme_location' => 'footer_menu_2',
            'menu_id' => 'footer_menu_2-menu',
            'container' => 'div',
            'container_class' => 'footer_menu_2',
            'container_id' => 'footer_menu_2',
            'menu_class' => 'nav list-group list-group-flush',
            'depth' => 2
          ])!!}
        @else
          <div class="alert alert-info">
            <a href="{{ admin_url('nav-menus.php') }}" class="d-block text-info">Setup Footer Menu 2</a>
          </div>
        @endif
      </div>
      <div class="col-6 col-lg-3 mb-3 mb-lg-0">
        <h4 class="text-uppercase tk-soleil mb-3">Support</h4>
        @if ( has_nav_menu('footer_menu_3') )
          {!! wp_nav_menu([
            'theme_location' => 'footer_menu_3',
            'menu_id' => 'footer_menu_3-menu',
            'container' => 'div',
            'container_class' => 'footer_menu_3',
            'container_id' => 'footer_menu_3',
            'menu_class' => 'nav list-group list-group-flush',
            'depth' => 2
          ])!!}
        @else
          <div class="alert alert-info">
            <a href="{{ admin_url('nav-menus.php') }}" class="d-block text-info">Setup Footer Menu 3</a>
          </div>
        @endif
      </div>
      <div class="col-lg-3 footer-logo-col text-center text-lg-right">
        <a href="{{ home_url('/') }}" title="{{ bloginfo('name') }}" class="d-block mb-3" >
          <img src="{{ App\asset_path('images/logo/uv-studios.svg') }}" alt="{{ bloginfo('name') }}" class="w-100" style="max-width: 256px;"/>
        </a>
        @include('partials.social-icons', ['color' => 'black'])
      </div>
    </div>
    <div class="footer-copyright row py-3">
      <div class="col-lg-6 mb-3 mb-lg-0">
        <p class="text-center text-lg-left mb-0">
          <i class="fa fa-cc-visa fs-1.25x mr-3"></i>
          <i class="fa fa-cc-amex fs-1.25x mr-3"></i>
          <i class="fa fa-cc-mastercard fs-1.25x mr-3"></i>
          <i class="fa fa-cc-discover fs-1.25x"></i>
        </p>
        <p class="text-center text-lg-left mb-0"><i>"Stay safe stay healthy," <br class="d-none d-lg-block"/> ~ UV Studios Team</i></p>
      </div>
      <div class="col-lg-6 text-center text-lg-right">
        <p class="mb-2">
          <a href="{{ $site_url }}/terms-of-service" title="Terms & Conditions" class="footer-link" >Terms of Service</a> | <a href="{{ $site_url }}/privacy-policy" title="Privacy Policy" class="footer-link" >Privacy Policy</a>
        </p>
        <p>&copy; {{ date('Y') }} {{ bloginfo('name') }}. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>
