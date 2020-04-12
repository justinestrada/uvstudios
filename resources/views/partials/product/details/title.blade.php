<div class="row mb-3">
  <div class="col">
    {{--
    @php
    $type = get_the_terms( $product->get_id(), 'type' );
    @endphp
    @if ($type)
      <a href="{{ get_site_url() }}/type/{{  $type[0]->slug }}" class="d-block text-gray mb-0">{{ $type[0]->name }}</a>
    @endif
    --}}
    <h2 class="fs-3.5x mb-0">{!! get_the_title() !!}</h2>
  </div>
  <div class="col-auto">
    @if ( $product->is_on_sale() )
      <span class="woocommerce-Price-amount amount sale-price mr-2" >
        <span class="woocommerce-Price-currencySymbol">{!! get_woocommerce_currency_symbol() !!}</span>
        {!! str_replace('.00', '', $product->get_sale_price()) !!}
      </span>
      <strike class="woocommerce-Price-amount amount regular-price" >
        <span class="woocommerce-Price-currencySymbol">{!! get_woocommerce_currency_symbol() !!}</span>
        {!! str_replace('.00', '', $product->get_regular_price()) !!}
      </strike>
    @else
      <span class="woocommerce-Price-amount amount sale-price" >
        <span class="woocommerce-Price-currencySymbol">{!! get_woocommerce_currency_symbol() !!}</span>
        {!! str_replace('.00', '', $product->get_price()) !!}
      </span>
    @endif
  </div>
</div>
