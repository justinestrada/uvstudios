<div class="row">
  <div class="col pr-0">
    @php
    $cat = get_the_terms( $product->get_id(), 'product_cat' );
    @endphp
    @if ($cat)
      <a href="{{ get_site_url() }}/product-category/{{  $cat[0]->slug }}" class="d-block text-dark-gray mb-0">{{ $cat[0]->name }}</a>
    @endif
    <h2 class="fs-3.5x mb-0">{!! get_the_title() !!}</h2>
  </div>
  <div class="col-auto d-flex align-items-center">
    {{-- {{ $product->is_on_sale() }}
    @if ($product->is_on_sale())
      <span class="woocommerce-Price-amount amount sale-price mr-2" >
        <span class="woocommerce-Price-currencySymbol">{!! get_woocommerce_currency_symbol() !!}</span>
        {!! str_replace('.00', '', $product->get_sale_price()) !!}
      </span>
      <strike class="woocommerce-Price-amount amount regular-price" >
        <span class="woocommerce-Price-currencySymbol">{!! get_woocommerce_currency_symbol() !!}</span>
        {!! str_replace('.00', '', $product->get_regular_price()) !!}
      </strike>
    @else --}}
      <span class="woocommerce-Price-amount amount sale-price" >
        <span class="woocommerce-Price-currencySymbol">{!! get_woocommerce_currency_symbol() !!}</span>
        {!! str_replace('.00', '', $product->get_price()) !!}
      </span>
    {{-- @endif --}}
  </div>
</div>
