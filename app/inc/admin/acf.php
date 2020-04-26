<?php

/**
 * ACF - Only Admins & Super Admins can access ACF
 */
// add_filter('acf/settings/show_admin', function ( $show ) {
//     return false;
    // return current_user_can('manage_options');
// });

/**
 * ACF Options Page
 */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => __('Theme General Settings'),
        'menu_title'    => __('Theme Settings'),
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

/**
 * ACF Local JSON
 */
add_filter('acf/settings/save_json', function ( $path ) {
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    // return
    return $path;
});

/**
 * ACF Local JSON - Load Point
 */
add_filter('acf/settings/load_json', function ( $paths ) {
    // remove original path (optional)
    unset($paths[0]);
    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';
    // return
    return $paths;
});
