<?php

/**
 * Constants
 *
 * @since 1.0.0
 */
if (!defined('TAILPRESS_VERSION')) {
    define('TAILPRESS_VERSION', '1.0.0');
}

/**
 * Enqueue scripts
 */
function tailpress_enqueue_scripts() {
    wp_enqueue_script( 'jquery' );

    wp_enqueue_style('tailpress', get_theme_file_uri('css/tailpress.css'), array(), TAILPRESS_VERSION);
    wp_enqueue_script('tailpress', get_theme_file_uri('js/tailpress.js'), array( 'jquery' ), TAILPRESS_VERSION);
}
add_action('wp_enqueue_scripts', 'tailpress_enqueue_scripts');

/**
 * Theme setup
 */
function tailpress_setup() {
    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'tailpress'),
    ));

    // Switch default core markup for search form, comment form, and comments
    // to output valid HTML5.
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Adding Thumbnail basic support
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'tailpress_setup');
