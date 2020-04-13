<?php

/**
 * Change the breadcrumb separator (delimiter)
 */
add_filter( 'woocommerce_breadcrumb_defaults', function ( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = '<span class="mr-1">&raquo;</span>';
	return $defaults;
} );

/**
 * Before Comment Meta
 */
// add_action( 'woocommerce_review_before_comment_meta', function ( $woocommerce_review_display_rating, $int ) {
// }, 10, 2 );

// define the woocommerce_review_before_comment_meta callback
function action_woocommerce_review_before_comment_meta() {
    // var_dump($woocommerce_review_display_rating);
};

// add the action
add_action( 'woocommerce_review_before_comment_meta', 'action_woocommerce_review_before_comment_meta', 10, 2 );
