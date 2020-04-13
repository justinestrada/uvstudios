<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

define('THEME_VERSION', '0.2.0');

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('typekit', 'https://use.typekit.net/lwk8vxe.css', false, null);
    wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css?ver=4.4', false, null);

    if (is_product()) {
        wp_enqueue_style('lightgallery', get_template_directory_uri() . '/assets/styles/lib/lightgallery.min.css', false, null);
    }

    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, THEME_VERSION);
    // wp_enqueue_style('sage/main.css', 'https://giftoflifecbd.com/wp-content/themes/giftoflifecbd/dist/styles/main.css', false, null);

    wp_enqueue_script('recaptcha', 'https://www.google.com/recaptcha/api.js', [], null, true);

    if (is_product()) {
        wp_enqueue_script('lightgallery', get_template_directory_uri() . '/assets/scripts/lib/lightgallery.min.js', [], null, true);
        // wp_enqueue_script('lg-zoom', get_template_directory_uri() . '/assets/scripts/lib/lg-zoom.js', [], null, true);
        // lg-thumbnail.min.js
    }

    $THEME_VARS = array(
        'site_url' => get_site_url(),
        'rest_url' => get_rest_url(null, 'wp/v2'),
        'is_logged_in' => is_user_logged_in(),
        'admin_ajax_url' => admin_url('admin-ajax.php'),
        'posts_per_page' => get_option('posts_per_page')
    );

    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], THEME_VERSION, true);
    // wp_enqueue_script('sage/main.js', 'https://giftoflifecbd.com/wp-content/themes/giftoflifecbd/dist/scripts/main.js', ['jquery'], null, true);

    wp_localize_script( 'sage/main.js', 'THEME_VARS', $THEME_VARS );

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'full_screen_nav' => __('Full Screen Nav', 'sage'),
        'footer_menu_1' => __('Footer Menu 1', 'sage'),
        'footer_menu_2' => __('Footer Menu 2', 'sage'),
        'footer_menu_3' => __('Footer Menu 3', 'sage'),
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));

    /**
    * Declare Theme Supports WooCommerce
    */
   add_theme_support('woocommerce');
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

/**
 * Public WooCommerce
 */
require_once( get_template_directory() . '/../app/inc/public/woo.php' );

/**
 * Google reCaptcha Keys
 */
require_once( get_template_directory() . '/../app/inc/public/google-recaptcha.php' );

/**
 * Login Processing
 */
require_once( get_template_directory() . '/../app/inc/public/login.php' );
