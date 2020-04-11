@php
defined( 'ABSPATH' ) || exit;

global $product;
$attributes = $product->get_attributes();
$available_variations = $product->get_available_variations();
$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$default_variation_id = App\giftoflifecbd_product_get_default_variation_id($product);

@endphp
@if ( empty( $available_variations ) && false !== $available_variations )
  <p class="stock out-of-stock">{!! esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ) !!}</p>
@else
  <form action="{{ get_the_permalink() }}" method="POST" class="cart row" >
    <div class="variations col-auto">
      <div class="row">
        @foreach ( $attributes as $attribute_name => $options )
          <div class="col-md mb-3">
            <div class="dropdown">
              <button class="btn btn-outline-secondary btn-rounded dropdown-toggle" type="button" id="{{ wc_attribute_label( $attribute_name ) }}Button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ wc_attribute_label( $attribute_name ) }}
              </button>
              <div class="dropdown-menu" aria-labelby="{{ wc_attribute_label( $attribute_name ) }}Button">
                <p class="dropdown-item text-white mb-0" style="opacity: 0.75;" >Select {{ wc_attribute_label( $attribute_name ) }}</p>
                @foreach( $options['options'] as $key => $option )
                  <label for="{{ $option }}" class="dropdown-item" >
                    <input type="radio" name="attribute_{{ esc_attr( sanitize_title( $attribute_name ) ) }}" id="{{ $option }}"
                      value="{{ $option }}" variation_id="{{ App\get_attribute_variation_id( $product, $attribute_name, $option) }}" {{ $key === 0 ? 'checked' : '' }} class="attribute-input" />
                    {{ $option }}
                  </label>
                @endforeach
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <div class="col-auto">
      <div class="btn-group btn-group-quantity btn-rounded mb-3" role="group">
        {{-- TODO: Make the quantity max the in stock limit --}}
        <button type="button" class="btn btn-minus btn-outline-black" >
          <img src="{{ App\asset_path('images/icon/minus.svg') }}" alt="Minus" style="height: 1.25rem; margin-top: -6px;"/>
        </button>
        <input type="number" name="quantity" value="1" step="1" min="1" max="{{ ($stock_quantity = $product->get_stock_quantity()) ? $stock_quantity : 99 }}" />
        <button type="button" class="btn btn-plus btn-outline-black" >
          <img src="{{ App\asset_path('images/icon/plus.svg') }}" alt="Plus" style="height: 1.25rem; margin-top: -6px;"/>
        </button>
      </div>
    </div>
    <div class="col-auto">
      <input type="hidden" name="variation_id" class="variation_id" value="{{ $default_variation_id }}"/>
      <input type="hidden" name="product_id" value="{{ $product->get_ID() }}"/>
      <input type="hidden" name="add-to-cart" value="{{ $product->get_ID() }}"/>
      <button type="submit" class="d-block single_add_to_cart_button quick-view-cart btn btn-primary btn-rounded" >Add To Cart</button>
    </div>
  </form>
@endif
