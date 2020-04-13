@php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$post_id = get_the_ID();

$rating = $product->get_average_rating();
@endphp
<div <?php wc_product_class( 'card product-card z-depth-1', $product ); ?>>
  <div class="view overlay" style="background-image: url('{{ wp_get_attachment_url( get_post_thumbnail_id($post_id) ) }}')">
    @if (!is_product())
      <div class="mask mask-black d-flex justify-content-center align-items-center" >
        <button type="button" class="btn btn-primary btn-rounded btn-card-overlay" data-toggle="modal" data-target="#quickViewModal" data-post-id="{{ $post_id }}" >Quick View</button>
      </div>
    @endif
  </div>
  <div class="card-body">
    <a href="{{ get_permalink($post_id) }}" title="{{ $product->get_title() }}" class="d-block h3 text-black mb-3" >{{ $product->get_title() }}</a>
    {{-- <div class="star-rating text-yellow mb-3" title="Rating" style="float: none;" >
      <span style="width: {{ ( $rating / 5 ) * 100 }}%;">
        <strong itemprop="ratingValue" class="rating">{{ $rating }}</strong> out of 5
      </span>
    </div> --}}
    <div class="mb-3">
      @for ($i = 0; $i < $rating; $i++)
        @if ($i !== (int)$rating)
          <i class="fa fa-star fs-1.25x text-yellow"></i>
        @else
          <i class="fa fa-star-half-o fs-1.25x text-yellow"></i>
        @endif
      @endfor
    </div>
    <hr>
    <div class="row">
      <div class="col-auto d-flex  align-items-center">
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
        @endif
      </div>
      <div class="col text-right">
        <a href="{{ get_permalink($post_id) }}" class="btn btn-outline-black btn-rounded" title="View More" >View More</a>
      </div>
    </div>

  </div>
</div>
