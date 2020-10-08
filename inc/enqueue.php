<?php
/**
 * UnderStrap enqueue scripts
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );
		wp_enqueue_style( 'animation-css', get_template_directory_uri() . '/css/animate.min.css', array(), $css_version );
		wp_enqueue_style( 'raleway', 'https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;700&display=swap');
		wp_enqueue_style( 'montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap');
		wp_enqueue_style( 'oswald', 'https://fonts.googleapis.com/css2?family=Oswald&display=swap');

		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
		wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.min.js', array(), true );
		wp_enqueue_script( 'stick-js', get_template_directory_uri() . '/js/site.js', array(), true );
			wp_enqueue_script( 'typed-js', get_template_directory_uri() . '/js/lib/typed.min.js', array(), true );
			wp_enqueue_script( 'site-js', get_template_directory_uri() . '/js/jquery.sticky.js', array(), true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );
