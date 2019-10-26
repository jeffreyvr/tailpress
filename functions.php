<?php

/**
 * Constants
 *
 * @since 1.0.0
 */
if ( ! defined( 'TAILPRESS_VERSION' ) ) {
    define( 'TAILPRESS_VERSION', '1.0.0' );
}

/**
 * Enqueue scripts
 */
function tailpress_enqueue_scripts() {
    wp_enqueue_style( 'tailpress', get_theme_file_uri( 'assets/css/tailpress.css' ), array(), TAILPRESS_VERSION );
}
add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );