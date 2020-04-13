@php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
@endphp
<div class="woocommerce-variation-add-to-cart variations_button">
	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	@php
	do_action( 'woocommerce_before_add_to_cart_quantity' );

	woocommerce_quantity_input( array(
		'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
		'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
		'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
	) );

	do_action( 'woocommerce_after_add_to_cart_quantity' );
	@endphp

  <div id="sticky-add-to-cart" class="bg-white bg-lg-transparent py-1" style="box-shadow: 0 -2px 5px 0 rgba(0,0,0,0.16),0 -2px 10px 0 rgba(0,0,0,0.12) !important;">
    <div class="container">
      <div class="row">
        <div class="col-auto d-lg-none d-flex align-items-center">
          <div class="text-black">
            @include('partials.product.details.price', ['class' => 'mb-0'])
          </div>
        </div>
        <div class="col p-md-0">
          <button type="submit" class="single_add_to_cart_button button alt w-100"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
        </div>
      </div>
    </div>
  </div>

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>
