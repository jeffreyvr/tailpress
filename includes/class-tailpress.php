<?php

class TailPress {
	/**
	 * @var null
	 */
	private static $instance = null;

	/**
	 * Instance of the class.
	 *
	 * @return TailPress|null
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof TailPress ) ) {
			self::$instance = new TailPress();
		}

		return self::$instance;
	}

	/**
	 * TailPress constructor.
	 */
	private function __construct() {
		foreach ( $this->get_template_types() as $type ) {
			add_filter( "{$type}_template_hierarchy", array( $this, 'append_templates' ) );
		}
	}

	/**
	 * Get the comments template. Looks in the /theme subfolder first.
	 *
	 * @param  string  $file
	 * @param  bool  $separate_comments
	 */
	public static function comments_template( $file = '/theme/comments.php', $separate_comments = false ) {
		comments_template( $file, $separate_comments );
	}

	/**
	 * Get header. Looks in /theme subfolder first.
	 *
	 * @param  null  $name
	 * @param  array  $args
	 */
	public static function get_header( $name = null, $args = array() ) {
		do_action( 'get_header', $name, $args );

		$templates = array();
		$name      = (string) $name;
		if ( '' !== $name ) {
			$templates[] = "theme/header-{$name}.php";
		}

		$templates[] = 'theme/header.php';

		if ( ! locate_template( $templates, true, true, $args ) ) {
			get_header( $name, $args );
		}
	}

	/**
	 * Get footer. Looks in /theme subfolder first.
	 *
	 * @param  null  $name
	 * @param  array  $args
	 */
	public static function get_footer( $name = null, $args = array() ) {
		do_action( 'get_footer', $name, $args );

		$templates = array();
		$name      = (string) $name;
		if ( '' !== $name ) {
			$templates[] = "theme/footer-{$name}.php";
		}

		$templates[] = 'theme/footer.php';

		if ( ! locate_template( $templates, true, true, $args ) ) {
			get_footer( $name, $args );
		}
	}

	/**
	 * Gets template part from theme folder, falls back to regular `get_template_part` on fail.
	 *
	 * @param $slug
	 * @param  null  $name
	 * @param  array  $args
	 */
	public static function get_template_part( $slug, $name = null, $args = array() ) {
		if ( ! get_template_part( "theme/$slug", $name, $args ) ) {
			get_template_part( $slug, $name, $args );
		}
	}

	/**
	 * Appends /theme path to templates hierarchy.
	 *
	 * @param $templates
	 *
	 * @return array
	 */
	public function append_templates( $templates ) {
		$tailpress_templates = array_map( function ( $template ) {
			return "theme/" . $template;
		}, $templates );

		return array_merge( $tailpress_templates, $templates );
	}

	/**
	 * Template types.
	 *
	 * @see https://developer.wordpress.org/reference/hooks/type_template_hierarchy/
	 * @return string[]
	 */
	public function get_template_types() {
		return array(
			'404',
			'archive',
			'attachment',
			'author',
			'category',
			'date',
			'embed',
			'frontpage',
			'home',
			'index',
			'page',
			'paged',
			'privacypolicy',
			'search',
			'single',
			'singular',
			'tag',
			'taxonomy'
		);
	}

	/**
	 * Get mix compiled asset.
	 *
	 * @param  string  $path  The path to the asset.
	 *
	 * @return string
	 */
	public static function mix( $path ) {
		$path                = '/' . $path;
		$stylesheet_dir_uri  = get_stylesheet_directory_uri();
		$stylesheet_dir_path = get_stylesheet_directory();

		if ( ! file_exists( $stylesheet_dir_path . '/mix-manifest.json' ) ) {
			return $stylesheet_dir_uri . $path;
		}

		$mix_file_path = file_get_contents( $stylesheet_dir_path . '/mix-manifest.json' );
		$manifest      = json_decode( $mix_file_path, true );
		$asset_path    = ! empty( $manifest[ $path ] ) ? $manifest[ $path ] : $path;

		return $stylesheet_dir_uri . $asset_path;
	}
}
