<?php
defined( 'ABSPATH' ) || exit;

// Theme class setup and initialization
class WP_THEME {
    function __construct() {
        // Theme support features
        add_action( 'after_setup_theme', [ $this, 'theme_supports' ] );

        // Initialize theme customizations
        add_action( 'init', [ $this, 'init' ] );
    }

    function theme_supports() {
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'custom-logo' );
        add_theme_support( 'html5' , [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
        add_theme_support( 'woocommerce', [
            'thumbnail_image_width' => 512,
            'single_image_width' => 1024,
            'gallery_thumbnail_image_width' => 150,
            'product_grid' => [
                'default_columns' => 3,
                'default_rows' => 4,
                'min_columns' => 2,
                'max_columns' => 3,
            ],
        ] );
    }

    function init() {
        // Navigation menus
        register_nav_menus( [
            'quick' => 'Quick Menu',
            'default' => 'Default Menu',
            'about' => 'About Menu',
            'service' => 'Service Menu',
        ] );

        // Sidebar(s)
        register_sidebar( [
            'id' => 'woo',
            'name' => 'Woo',
            'before_sidebar' => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'after_sidebar' => '',
        ] );

        // Important template parts
        add_action( 'wp_head', fn() => get_template_part( 'template-parts/head' ) );
        add_action( 'wp_body_open', fn() => get_template_part( 'template-parts/header' ) );
        add_action( 'wp_footer', fn() => get_template_part( 'template-parts/footer' ) );

        // WooCommerce Customizations
        add_action( 'woocommerce_init', [ $this, 'woocommerce_init' ] );
    }

    function woocommerce_init() {
        // Remove default WooCommerce styles on non-shop and non-category pages
        add_filter( 'woocommerce_enqueue_styles', fn( $styles ) => ( ! is_shop() && ! is_product_category() ) ? $styles : [] );

        // Customize WooCommerce pagination text
        add_filter( 'woocommerce_pagination_args', fn( $args ) => array_merge( $args, [ 'prev_text' => 'Previous', 'next_text' => 'Next' ] ) );
    }
}

$WP_THEME = new WP_THEME();
