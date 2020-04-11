<?php

function giftoflifecbd_product_get_default_variation_id($product) {
    if ( $product->get_type() == 'variable' ) {
      $attributes = $product->get_available_variations();
      return $attributes[0]['variation_id'];
    }
    return false;
}

add_action('rest_api_init', function() {
    register_rest_field( 'product', 'theme_meta', [
        'get_callback'    => 'giftoflifecbd_api_theme_meta',
        'update_callback' => null,
        'schema'          => null,
      ]
    );
});

function giftoflifecbd_api_theme_meta($arr, $field_name, $request) {
    $array_data = [];
    $array_data['thumbnail'] = get_the_post_thumbnail_url( $arr['id'], 'full' );
    $_product = wc_get_product( $arr['id'] );
    $array_data['price'] = $_product->get_price();
    $array_data['default_variation_id'] = giftoflifecbd_product_get_default_variation_id( $_product );
    return $array_data;
}
