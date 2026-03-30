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
    }
}

$WP_THEME = new WP_THEME();
