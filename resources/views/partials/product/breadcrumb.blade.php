
@php
global $post;
@endphp
<section id="breadcrumb" class="bg-light-gray py-2">
  <div class="container">
    <div class="row">
      <div class="col-md mb-1 mb-md-0">
        {{-- {!! woocommerce_breadcrumb() !!} --}}
        <nav class="woocommerce-breadcrumb">
          <a href="{{ home_url('/') }}">Home</a>
          <span class="mr-1">»</span>
          <a href="{{ get_site_url() }}/shop/">Shop</a>
          {{-- <span class="mr-1">»</span>
          <a href="/product-category/uncategorized/">Uncategorized</a> --}}
          <span class="mr-1">»</span>{!! get_the_title() !!}
        </nav>
      </div>
      <div class="col-md-auto text-md-right">
        <ul id="social-shares" class="p-0 m-0">
          <li class="text-dark-gray">Share:</li>
          <li>
            <a href="{{ App\social_shares('linkedin', $post) }}" title="Share" target="_blank" class="text-dark-gray px-2">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
              <span class="sr-only">LinkedIn</span>
            </a>
          </li>
          <li>
            <a href="{{ App\social_shares('twitter', $post) }}" title="Share" target="_blank" class="text-dark-gray px-2">
              <i class="fa fa-twitter" aria-hidden="true"></i>
              <span class="sr-only">Twitter</span>
            </a>
          </li>
          <li>
            <a href="{{ App\social_shares('facebook', $post) }}" title="Share" target="_blank" class="text-dark-gray px-2">
              <i class="fa fa-facebook" aria-hidden="true"></i>
              <span class="sr-only">Facebook</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
