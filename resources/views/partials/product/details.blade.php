

<section id="details" class="container mb-5">
  <div class="row">
    <div class="col-lg-6 col-xl-5 mb-3 mb-lg-0">
      @include('partials.product.details.images')
    </div>
    <div class="col-lg-6 col-xl-7">
      @include('partials.product.details.categories')
      <h2 class="text-uppercase mb-3">{{ get_the_title() }}</h2>
      <hr class="mb-3"/>
      @include( 'partials.product.details.rating' )
      <div class="mb-3">{!! get_the_excerpt(get_the_ID()) !!} <a href="#content" title="Read More" class="text-black smooth-scroll"><u>Read more...</u></a></div>
      @include( 'partials.product.details.add-to-cart' )
      <hr class="mb-3"/>
      @include('partials.product.details.price')
      @include('partials.product.details.tags')
      @if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) )
        <span class="sku_wrapper">
          {{ esc_html_e( 'SKU:', 'woocommerce' ) }}
          <span class="sku">{{ ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ) }}</span>
        </span>
      @endif
    </div>
  </div>
</section>
