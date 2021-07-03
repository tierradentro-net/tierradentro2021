<?php
/**
 * Understrap enqueue scripts
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
		$tierradentro_animations_display = get_theme_mod('tierradentro_animations_display');

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );
		wp_enqueue_style( 'slick-styles', get_template_directory_uri() . '/js/slick/slick.css', '' );
		wp_enqueue_style( 'slick-theme-styles', get_template_directory_uri() . '/js/slick/slick-theme.css', array(), '' );
		//wp_enqueue_style( 'tierradentro_font_awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css');
		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		if( isset($tierradentro_animations_display) && $tierradentro_animations_display != 1 )wp_enqueue_script( 'tierradentro_scrollreveal', get_template_directory_uri() . '/js/scrollReveal.min.js', array( 'jquery' ),'',true);

		wp_enqueue_script( 'tierradentro_scripts_js', get_template_directory_uri() . '/assets/js/custom-scripts.js', array( 'jquery' ),'',true);
		wp_enqueue_script( 'tierradentro_slick_js', get_template_directory_uri() . '/js/slick/slick.js', array( 'jquery' ),'',true);
		
		if( is_page_template( 'trierradentro.php' ) ) :
			$tierradentro_is_homepage = 0;
		else:
			$tierradentro_is_homepage = 1;
		endif;

		wp_localize_script( 'tierradentro_scripts_js', 'tierradentro_script_var', array(
			'tierradentro_preloader_display' => get_theme_mod('tierradentro_preloader_display'),
			'tierradentro_animations_display' => get_theme_mod('tierradentro_animations_display'),
			'tierradentro_is_homepage' => $tierradentro_is_homepage
			//'tierradentro_parallax_background' => get_theme_mod('tierradentro_parallax_background', get_template_directory_uri().'/assets/images/background.jpg' ),
			//'tierradentro_skills_display' => get_theme_mod('tierradentro_skills_display'),
			//'tierradentro_services_display' => get_theme_mod('tierradentro_services_display'),
			//'tierradentro_blogposts_display' => get_theme_mod('tierradentro_blogposts_display')
		));

	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );