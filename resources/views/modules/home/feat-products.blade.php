@php
$feat_products = get_field('products');
@endphp
@if ($feat_products)
<style>
section#feat-product::before {
  content: "";
  display: block;
  position: absolute;
  top: 0;
  right: 0;
  height: 100%;
  width: 100%;
  /* background-image: url("{{ App\asset_path('images/leaves-top-right.png') }}"); */
  background-size: contain;
  background-size: contain;
  background-repeat: no-repeat;
  background-position: right;
}
</style>
  <section id="feat-product" class="bg-primary position-relative py-5">
    <div class="container container-bg">
      <div class="row justify-content-center">
        @foreach ($feat_products as $product)
          <div class="col-lg-4 mb-3 mb-lg-0">
            @php
            $product_id = $product['product']->ID;
            $product = wc_get_product($product_id);
            @endphp
            <div class="product product-card bg-white rounded z-depth-1 p-3">
              <div class="product-img rounded mb-3" style="background-image: url({{ get_the_post_thumbnail_url( $product_id, 'full' ) }})" ></div>
              <div class="text-center">
                <a href="{{ get_the_permalink($product_id) }}" title="{{ get_the_title($product_id) }}" class="text-black" >
                  <h4 class="text-uppercase">{{ get_the_title($product_id) }}</h4>
                </a>
                <p class="text-uppercase text-dark-gray font-weight-bold" >
                  @if ( $product->is_on_sale() )
                    <span class="woocommerce-Price-amount amount sale-price mr-2" >
                      <span class="woocommerce-Price-currencySymbol mr-1">{!! get_woocommerce_currency_symbol() !!}</span>{!! str_replace('.00', '', $product->get_sale_price()) !!}
                    </span>
                    <strike class="woocommerce-Price-amount amount regular-price" >
                      <span class="woocommerce-Price-currencySymbol mr-1">{!! get_woocommerce_currency_symbol() !!}</span>{!! str_replace('.00', '', $product->get_regular_price()) !!}
                    </strike>
                  @else
                    <span class="woocommerce-Price-amount amount sale-price" >
                      <span class="woocommerce-Price-currencySymbol mr-1">{!! get_woocommerce_currency_symbol() !!}</span>{!! str_replace('.00', '', $product->get_price()) !!}
                    </span>
                  @endif                </p>
                <a href="{{ get_the_permalink($product_id) }}" class="btn btn-outline-black btn-rounded" title="Show Now" >Shop Now</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif
