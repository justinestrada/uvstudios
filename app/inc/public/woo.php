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
 * Product Get Rating HTML
 */
add_filter( 'woocommerce_product_get_rating_html', function ( $rating_html, $rating ) {
    $rating_html = '<div class="d-inline-block">';
    for ($i = 0; $i < $rating; $i++) {
        if ($i !== (int)$rating) {
            $rating_html .= '<i class="fa fa-star text-yellow"></i>';
        } else {
            $rating_html .= '<i class="fa fa-star-half-o text-yellow"></i>';
        }
    }
    $rating_html .= '</div>';
    return $rating_html;
}, 10, 2 );
