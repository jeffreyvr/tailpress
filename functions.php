<?php

/**
 * Enqueue scripts.
 */
function tailpress_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_script( 'jquery' );

	wp_enqueue_style( 'tailpress', tailpress_get_mix_compiled_asset_url( '/css/tailpress.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'tailpress', tailpress_get_mix_compiled_asset_url( '/js/tailpress.js' ), array( 'jquery' ), $theme->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );

/**
 * Get mix compiled asset.
 *
 * @param string $path The path to the asset.
 * @return string
 */
function tailpress_get_mix_compiled_asset_url( $path ) {
	$mix_file_path = file_get_contents( get_stylesheet_directory() . '/mix-manifest.json' );
	$manifest      = json_decode( $mix_file_path, true );
	$asset_path    = ! empty( $manifest[ $path ] ) ? $manifest[ $path ] : $path;

	return get_stylesheet_directory_uri() . '/' . $asset_path;
}

/**
 * Theme setup.
 */
function tailpress_setup() {
	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
		)
	);

	// Switch default core markup for search form, comment form, and comments
	// to output valid HTML5.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	// Adding Thumbnail basic support.
	add_theme_support( 'post-thumbnails' );

	// Block editor.
	add_theme_support( 'align-wide' );

	add_theme_support( 'wp-block-styles' );

	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'Primary', 'tailpress' ),
				'slug'  => 'primary',
				'color' => '#0EA5E9',
			),
			array(
				'name'  => __( 'Secondary', 'tailpress' ),
				'slug'  => 'secondary',
				'color' => '#14B8A6',
			),
			array(
				'name'  => __( 'Dark', 'tailpress' ),
				'slug'  => 'dark',
				'color' => '#1F2937',
			),
			array(
				'name'  => __( 'Light', 'tailpress' ),
				'slug'  => 'light',
				'color' => '#F9FAFB',
			),
		)
	);

	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => __( 'Small', 'tailpress' ),
			'size' => 14,
			'slug' => 'small'
		),
		array(
			'name' => __( 'Regular', 'tailpress' ),
			'size' => 16,
			'slug' => 'regular'
		),
		array(
			'name' => __( 'Large', 'tailpress' ),
			'size' => 18,
			'slug' => 'large'
		)
	) );
}
add_action( 'after_setup_theme', 'tailpress_setup' );

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 * @return array
 */
function tailpress_nav_menu_add_li_class( $classes, $item, $args ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 1, 3 );
