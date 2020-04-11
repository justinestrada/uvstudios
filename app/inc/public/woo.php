<?php

/**
 * Change the breadcrumb separator (delimiter)
 */
add_filter( 'woocommerce_breadcrumb_defaults', function ( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = '<span class="mr-1">&raquo;</span>';
	return $defaults;
} );
