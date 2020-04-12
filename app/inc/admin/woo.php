<?php

/**
 * @snippet       Checkbox to hide Related Products - WooCommerce
 * @compatible    WooCommerce 3.5.7
 * @original      https://businessbloomer.com/woocommerce-checkbox-to-disable-related-products-conditionally/
 */

// -----------------------------------------
// 1. Add new checkbox product edit page
add_action('woocommerce_product_options_general_product_data', function () {
    woocommerce_wp_checkbox( array(
        'id' => 'hide_related',
        'class' => '',
        'label' => 'Hide Related Products'
    ));
});

// -----------------------------------------
// 2. Save checkbox into custom field
add_action('save_post_product', function ( $product_id ) {
    global $pagenow, $typenow;
    if ( 'post.php' !== $pagenow || 'product' !== $typenow ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( isset( $_POST['hide_related'] ) ) {
        update_post_meta( $product_id, 'hide_related', $_POST['hide_related'] );
    } else {
        delete_post_meta( $product_id, 'hide_related' );
    }
});

// -----------------------------------------
// 3. Hide related products @ single product page
add_action('woocommerce_after_single_product_summary', function () {
    global $product;
    if ( ! empty ( get_post_meta( $product->get_id(), 'hide_related', true ) ) ) {
        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
    }
}, 1 );


/*
 * Gutenberg
 */
add_filter('use_block_editor_for_post_type', function ($can_edit, $post_type){
	if($post_type == 'product'){
		$can_edit = true;
	}
	return $can_edit;
}, 10, 2);
