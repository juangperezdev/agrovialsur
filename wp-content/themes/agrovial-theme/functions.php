<?php
function agrovial_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style( 'agrovial-fonts', 'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@400;500;600;700&display=swap', array(), null );

    // Enqueue Main Styles
    wp_enqueue_style( 'agrovial-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0' );

    // Enqueue Theme Stylesheet (required by WP)
    wp_enqueue_style( 'agrovial-theme-style', get_stylesheet_uri() );

    // Enqueue Google Maps API (Async)
    wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDVcTLO9TEv0P4ZG1dwDeK0_cHsKvRwGxY&loading=async', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'agrovial_scripts' );

// Add async attribute to Google Maps script
function agrovial_add_async_attribute($tag, $handle) {
    if ('google-maps' !== $handle) {
        return $tag;
    }
    return str_replace(' src', ' async src', $tag);
}
add_filter('script_loader_tag', 'agrovial_add_async_attribute', 10, 2);

function agrovial_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'agrovial_setup' );

// Include Custom Post Types and Customizer options
require get_template_directory() . '/inc/custom-post-types.php';
require get_template_directory() . '/inc/customizer.php';
