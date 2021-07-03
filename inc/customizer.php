<?php
/**
 * Understrap Theme Customizer
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

require_once( trailingslashit( get_template_directory() ) . '/inc/customizer/alpha-control/alpha-control.php' );
/*
function latte_customizer_live_preview() {
	wp_enqueue_script( 'latte_customizer_preview', get_template_directory_uri().'/inc/customizer/customizer-preview.js', array( 'jquery','customize-preview' ), '', true );
}
add_action( 'customize_preview_init', 'latte_customizer_live_preview' );
*/

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function tierradentro_sanitize_text( $input ) {
	return $input;
}

function tierradentro_sanitize_textbox( $textbox ) {
	return wp_kses_post( force_balance_tags( $textbox ) );
}

function tierradentro_sanitize_checkbox( $input ) {
	if ( $input ) {
		$output = '1';
	} else {
		$output = false;
	}
	return $output;
}

function tierradentro_sanitize_choices( $input, $setting ) {
	global $wp_customize;

	$control = $wp_customize->get_control( $setting->id );
	
	if ( array_key_exists( $input, $control->choices ) ) {
		return $input;
	} else {
		return $setting->default;
	}
}


if ( ! function_exists( 'understrap_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function understrap_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';



	}
}
add_action( 'customize_register', 'understrap_customize_register' );


if ( ! function_exists( 'understrap_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function understrap_theme_customize_register( $wp_customize ) {



			//CONFIGURE HOMEPAGE
			class Tierradentro_Required_Area extends WP_Customize_Control {
				public function render_content() {
					echo __('In order to use the homepage of Tierradentro 2021, you need to create a new page from Pages > Add New, in your WordPress Dashboard.<br/><br/>In the page editing screen, choose the \'Homepage\' from the Page templates. After that, set it as your homepage from Settings > Reading settings or Appearance > Customize > Homepage Settings.<br/><br/>And you are ready to comeback to customize! ','tierradentro2021');
				}
			}
			if ('posts' == get_option( 'show_on_front' )):
				$wp_customize->add_section( 'tierradentro_required_action', array(
					'priority' => 5,
					'title' => __('Configure Your Homepage', 'tierradentro2021')
				));
			endif;
			$wp_customize->add_setting( 'tierradentro_required_info', array(
				'sanitize_callback' => 'tierradentro_sanitize_text'
			));
			$wp_customize->add_control( new Tierradentro_Required_Area( $wp_customize, 'tierradentro_required_info', array(
				'section' => 'tierradentro_required_action'
			)));



			//HOMEPAGE SETTINGS
			$wp_customize->get_section( 'static_front_page' )->priority = 10;



			//GENERAL SETTINGS
			$wp_customize->add_panel( 'tierradentro_general_settings', array(
				'priority'	   => 15,
				'capability'	 => 'edit_theme_options',
				'title'		  => __('General Settings', 'tierradentro2021'),
				'description'	=> __('This section allows you to configure general settings.', 'tierradentro2021')
			));
			$wp_customize->get_section( 'title_tagline' )->panel = 'tierradentro_general_settings';
			$wp_customize->get_section( 'colors' )->panel = 'tierradentro_general_settings';
			$wp_customize->add_setting( 'tierradentro_skin_color', array(
				'default' => '#FF0070',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'tierradentro_skin_color', array(
				'label' => __('Skin Color', 'tierradentro2021'),
				'section' => 'colors',
				'default' => '#FF0070',
				'priority' => 10,
				'settings' => 'tierradentro_skin_color'
			)));
			$wp_customize->remove_section( 'background_image');
			$wp_customize->add_section( 'tierradentro_general_animations', array(
				'priority' => 50,
				'title' => __('Animations', 'tierradentro2021'),
				'panel'  => 'tierradentro_general_settings'
			));
			$wp_customize->add_setting( 'tierradentro_preloader_display', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'tierradentro_sanitize_checkbox'
			));
			$wp_customize->add_control( 'tierradentro_preloader_display',array(
				'type' => 'checkbox',
				'label' => __('Disable Preloader','tierradentro2021'),
				'section' => 'tierradentro_general_animations',
				'priority' => 5
			));
			$wp_customize->add_setting( 'tierradentro_animations_display', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'tierradentro_sanitize_checkbox'
			));
			$wp_customize->add_control( 'tierradentro_animations_display',array(
				'type' => 'checkbox',
				'label' => __('Disable Scroll Animations','tierradentro2021'),
				'section' => 'tierradentro_general_animations',
				'priority' => 10
			));
			/*$wp_customize->add_setting( 'tierradentro_parallax_background', array(
				'default' => get_template_directory_uri().'/assets/images/background.jpg',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'tierradentro_parallax_background', array(
				'label' => __('Parallax Background', 'tierradentro2021'),
				'section' => 'tierradentro_general_background',
				'priority' => 5,
				'settings' => 'tierradentro_parallax_background'
			)));*/
			$wp_customize->add_section(
				'understrap_theme_layout_options',
				array(
					'title'       => __( 'Theme Layout Settings', 'understrap' ),
					'capability'  => 'edit_theme_options',
					'description' => __( 'Container width and sidebar defaults', 'understrap' ),
					'priority'    => 60,
					'panel'     => 'tierradentro_general_settings',
				)
			);
			function understrap_theme_slug_sanitize_select( $input, $setting ) {
				// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
				$input = sanitize_key( $input );
				// Get the list of possible select options.
				$choices = $setting->manager->get_control( $setting->id )->choices;
					// If the input is a valid key, return it; otherwise, return the default.
					return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
			}
			$wp_customize->add_setting(
				'understrap_container_type',
				array(
					'default'           => 'container',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'understrap_container_type',
					array(
						'label'       => __( 'Container Width', 'understrap' ),
						'description' => __( 'Choose between Bootstrap\'s container and container-fluid', 'understrap' ),
						'section'     => 'understrap_theme_layout_options',
						'settings'    => 'understrap_container_type',
						'type'        => 'select',
						'choices'     => array(
							'container'       => __( 'Fixed width container', 'understrap' ),
							'container-fluid' => __( 'Full width container', 'understrap' ),
						),
						'priority'    => '10',
					)
				)
			);
			$wp_customize->add_setting(
				'understrap_sidebar_position',
				array(
					'default'           => 'right',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'sanitize_text_field',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'understrap_sidebar_position',
					array(
						'label'             => __( 'Sidebar Positioning', 'understrap' ),
						'description'       => __(
							'Set sidebar\'s default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.',
							'understrap'
						),
						'section'           => 'understrap_theme_layout_options',
						'settings'          => 'understrap_sidebar_position',
						'type'              => 'select',
						'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
						'choices'           => array(
							'right' => __( 'Right sidebar', 'understrap' ),
							'left'  => __( 'Left sidebar', 'understrap' ),
							'both'  => __( 'Left & Right sidebars', 'understrap' ),
							'none'  => __( 'No sidebar', 'understrap' ),
						),
						'priority'          => '20',
					)
				)
			);



			//HEADER SETTINGS
			$wp_customize->add_section( 'tierradentro_header_settings', array(
				'priority'	   => 20,
				'capability'	 => 'edit_theme_options',
				'title'		  => __('Header Settings', 'tierradentro2021'),
				'description'	=> __('This section allows you to configure header settings.', 'tierradentro2021')
			));
			$wp_customize->add_setting( 'tierradentro_header_fixed', array(
				'capability' => 'edit_theme_options',
				'default' => '1',
				'sanitize_callback' => 'tierradentro_sanitize_checkbox'
			));
			$wp_customize->add_control( 'tierradentro_header_fixed',array(
				'type' => 'checkbox',
				'label' => __('Header fixed','tierradentro2021'),
				'section' => 'tierradentro_header_settings',
				'priority' => 5
			));
			$wp_customize->add_setting( 'tierradentro_header_menu_crunch', array(
				'capability' => 'edit_theme_options',
				'default' => '1',
				'sanitize_callback' => 'tierradentro_sanitize_checkbox'
			));
			$wp_customize->add_control( 'tierradentro_header_menu_crunch',array(
				'type' => 'checkbox',
				'label' => __('Crunch Menu','tierradentro2021'),
				'section' => 'tierradentro_header_settings',
				'priority' => 10
			));
			$wp_customize->add_setting( 'tierradentro_social_header', array(
				'capability' => 'edit_theme_options',
				'default' => '1',
				'sanitize_callback' => 'tierradentro_sanitize_checkbox'
			));
			$wp_customize->add_control( 'tierradentro_social_header',array(
				'type' => 'checkbox',
				'label' => __('Header Social Section','tierradentro2021'),
				'section' => 'tierradentro_header_settings',
				'priority' => 15
			));
			$wp_customize->add_setting( 'tierradentro_header_background_color', array(
				'default' => 'rgba(0,0,0,1)',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'tierradentro_header_background_color', array(
				'label' => __('Header Background Color', 'tierradentro2021'),
				'section' => 'tierradentro_header_settings',
				'default' => 'rgba(0,0,0,1)',
				'priority' => 20,
				'settings' => 'tierradentro_header_background_color'
			)));



			//SOCIAL SECTION
			$wp_customize->add_section( 'tierradentro_social_settings', array(
				'priority'	   => 25,
				'capability'	 => 'edit_theme_options',
				'title'		  => __('Social Section', 'tierradentro2021'),
				'description'	=> __('This section allows you to configure Social section.', 'tierradentro2021')
			));
			$wp_customize->add_setting( 'tierradentro_social_facebook', array(
				'default' => 'https://www.facebook.com',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_social_facebook', array(
				'label' => __('1. Facebook URL', 'tierradentro2021'),
				'section' => 'tierradentro_social_settings',
				'priority' => 15,
				'settings' => 'tierradentro_social_facebook'
			));
			$wp_customize->add_setting( 'tierradentro_social_twitter', array(
				'default' => 'https://www.twitter.com',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_social_twitter', array(
				'label' => __('2. Twitter URL', 'tierradentro2021'),
				'section' => 'tierradentro_social_settings',
				'priority' => 20,
				'settings' => 'tierradentro_social_twitter'
			));
			$wp_customize->add_setting( 'tierradentro_social_instagram', array(
				'default' => 'https://www.instagram.com',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_social_instagram', array(
				'label' => __('3. Instagram URL', 'tierradentro2021'),
				'section' => 'tierradentro_social_settings',
				'priority' => 25,
				'settings' => 'tierradentro_social_instagram'
			));
			$wp_customize->add_setting( 'tierradentro_social_youtube', array(
				'default' => 'https://www.youtube.com',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_social_youtube', array(
				'label' => __('4. Youtube URL', 'tierradentro2021'),
				'section' => 'tierradentro_social_settings',
				'priority' => 30,
				'settings' => 'tierradentro_social_youtube'
			));
			$wp_customize->add_setting( 'tierradentro_social_linkedin', array(
				'default' => 'https://www.linkedin.com',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_social_linkedin', array(
				'label' => __('5. Linkedin URL', 'tierradentro2021'),
				'section' => 'tierradentro_social_settings',
				'priority' => 35,
				'settings' => 'tierradentro_social_linkedin'
			));
			$wp_customize->add_setting( 'tierradentro_social_behance', array(
				'default' => 'https://www.behance.com',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_social_behance', array(
				'label' => __('6. Behance URL', 'tierradentro2021'),
				'section' => 'tierradentro_social_settings',
				'priority' => 40,
				'settings' => 'tierradentro_social_behance'
			));
			$wp_customize->add_setting( 'tierradentro_social_vimeo', array(
				'default' => 'https://www.vimeo.com',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_social_vimeo', array(
				'label' => __('7. Vimeo URL', 'tierradentro2021'),
				'section' => 'tierradentro_social_settings',
				'priority' => 45,
				'settings' => 'tierradentro_social_vimeo'
			));
			$wp_customize->add_setting( 'tierradentro_social_github', array(
				'default' => 'https://www.github.com',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_social_github', array(
				'label' => __('8. Github URL', 'tierradentro2021'),
				'section' => 'tierradentro_social_settings',
				'priority' => 50,
				'settings' => 'tierradentro_social_github'
			));



			//INTRO SECTION
			$wp_customize->add_section( 'tierradentro_intro_settings', array(
				'priority'	   => 30,
				'capability'	 => 'edit_theme_options',
				'title'		  => __('Intro Section', 'tierradentro2021'),
				'description'	=> __('This section allows you to configure Intro section.', 'tierradentro2021')
			));
			/*$wp_customize->add_setting( 'tierradentro_intro_display', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'tierradentro_sanitize_checkbox'
			));
			$wp_customize->add_control( 'tierradentro_intro_display',array(
				'type' => 'checkbox',
				'label' => __('Disable Intro Section','tierradentro2021'),
				'section' => 'tierradentro_intro_settings',
				'priority' => 5
			));*/
			$wp_customize->add_setting( 'tierradentro_intro_logo', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'tierradentro_sanitize_checkbox'
			));
			$wp_customize->add_control( 'tierradentro_intro_logo',array(
				'type' => 'checkbox',
				'label' => __('Show Logo','tierradentro2021'),
				'section' => 'tierradentro_intro_settings',
				'priority' => 6
			));
			$wp_customize->add_setting(
				'tierradentro_intro_align',
				array(
					'default'           => 'lefttop',
					'type'              => 'theme_mod',
					'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'tierradentro_intro_align',
					array(
						'label'       => __( 'Align Text', 'tierradentro2021' ),
						'section'     => 'tierradentro_intro_settings',
						'settings'    => 'tierradentro_intro_align',
						'type'        => 'select',
						'choices'     => array(
							'lefttop'       => __( 'Left Top', 'understrap' ),
							'leftbottom'       => __( 'Left Bottom', 'understrap' ),
							'center' => __( 'Center', 'understrap' ),
							'righttop' => __( 'Right Top', 'understrap' ),
							'rightbottom' => __( 'Right Bottom', 'understrap' ),
						),
						'priority'    => '7',
					)
				)
			);
			$wp_customize->add_setting( 'tierradentro_intro_image1', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'tierradentro_intro_image1', array(
				'label' => __('Image 1 (1600x1000)', 'tierradentro2021'),
				'section' => 'tierradentro_intro_settings',
				'priority' => 10,
				'settings' => 'tierradentro_intro_image1'
			)));
			$wp_customize->add_setting( 'tierradentro_intro_image2', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'tierradentro_intro_image2', array(
				'label' => __('Image 2 (1600x1000)', 'tierradentro2021'),
				'section' => 'tierradentro_intro_settings',
				'priority' => 15,
				'settings' => 'tierradentro_intro_image2'
			)));
			$wp_customize->add_setting( 'tierradentro_intro_image3', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'tierradentro_intro_image3', array(
				'label' => __('Image 3 (1600x1000)', 'tierradentro2021'),
				'section' => 'tierradentro_intro_settings',
				'priority' => 20,
				'settings' => 'tierradentro_intro_image3'
			)));
			$wp_customize->add_setting( 'tierradentro_intro_background_color', array(
				'default' => 'rgba(0, 0, 0, 1)',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'tierradentro_intro_background_color', array(
				'label' => __('Background Color', 'tierradentro2021'),
				'section' => 'tierradentro_intro_settings',
				'default' => 'rgba(0, 0, 0, 1)',
				'priority' => 25,
				'settings' => 'tierradentro_intro_background_color'
			)));
			$wp_customize->add_setting( 'tierradentro_intro_button_text', array(
				'default' => 'Contáctanos',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_intro_button_text', array(
				'label' => __('Button Text', 'tierradentro2021'),
				'description' => __('Leave empty to disappear button', 'tierradentro2021'),
				'section' => 'tierradentro_intro_settings',
				'priority' => 30,
				'settings' => 'tierradentro_intro_button_text'
			));
			$wp_customize->add_setting( 'tierradentro_intro_button_link', array(
				'default' => '#contact',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_intro_button_link', array(
				'label' => __('Button Link', 'tierradentro2021'),
				'description' => __('Link sections: #about #services #portfolio #slogan #team #blog #contact', 'tierradentro2021'),
				'section' => 'tierradentro_intro_settings',
				'priority' => 35,
				'settings' => 'tierradentro_intro_button_link'
			));



			//ABOUT SECTION
			$wp_customize->add_section( 'tierradentro_about_settings', array(
				'priority'	   => 35,
				'capability'	 => 'edit_theme_options',
				'title'		  => __('About Section', 'tierradentro2021'),
				'description'	=> __('This section allows you to configure About section.', 'tierradentro2021')
			));
			$wp_customize->add_setting( 'tierradentro_about_display', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'tierradentro_sanitize_checkbox'
			));
			$wp_customize->add_control( 'tierradentro_about_display',array(
				'type' => 'checkbox',
				'label' => __('Disable About Section','tierradentro2021'),
				'section' => 'tierradentro_about_settings',
				'priority' => 5
			));
			$wp_customize->add_setting( 'tierradentro_about_title', array(
				'default' => esc_html__('About', 'tierradentro2021'),
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_about_title', array(
				'label' => __('Section Title', 'tierradentro2021'),
				'section' => 'tierradentro_about_settings',
				'priority' => 10,
				'settings' => 'tierradentro_about_title'
			));
			$wp_customize->add_setting( 'tierradentro_about_subtitle', array(
				'default' => esc_html__('More info about.', 'tierradentro2021'),
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_about_subtitle', array(
				'label' => __('Section Subtitle', 'tierradentro2021'),
				'section' => 'tierradentro_about_settings',
				'priority' => 15,
				'settings' => 'tierradentro_about_subtitle'
			));
			$wp_customize->add_setting( 'tierradentro_about_embed', array(
				//'default' => esc_html__('', 'tierradentro2021'),
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_about_embed', array(
				'label' => __('Video URL', 'tierradentro2021'),
				'section' => 'tierradentro_about_settings',
				'priority' => 20,
				'settings' => 'tierradentro_about_embed'
			));
			$wp_customize->add_setting( 'tierradentro_about_image', array(
				//'default' => get_template_directory_uri().'/assets/images/383x383.png',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'tierradentro_about_image', array(
				'label' => __('Image', 'tierradentro2021'),
				'section' => 'tierradentro_about_settings',
				'priority' => 25,
				'settings' => 'tierradentro_about_image'
			)));
			/*$wp_customize->add_setting( 'tierradentro_about_name', array(
				'default' => esc_html__('John Doe', 'latte'),
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_about_name', array(
				'label' => __('Name', 'latte'),
				'section' => 'tierradentro_about_settings',
				'priority' => 30,
				'settings' => 'tierradentro_about_name'
			));
			$wp_customize->add_setting( 'tierradentro_about_position', array(
				'default' => esc_html__('Web Designer', 'latte'),
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_about_position', array(
				'label' => __('Position', 'latte'),
				'section' => 'tierradentro_about_settings',
				'priority' => 35,
				'settings' => 'tierradentro_about_position'
			));*/
			$wp_customize->add_setting( 'tierradentro_about_content', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'tierradentro_sanitize_textbox',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_about_content', array(
				'label' => __('Content', 'tierradentro2021'),
				'section' => 'tierradentro_about_settings',
				'priority' => 40,
				'type' => 'textarea',
				'settings' => 'tierradentro_about_content'
			));
			$wp_customize->add_setting( 'tierradentro_about_button_text', array(
				'default' => 'Ver más',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_about_button_text', array(
				'label' => __('Button Text', 'tierradentro2021'),
				'description' => __('Leave empty to disappear button', 'tierradentro2021'),
				'section' => 'tierradentro_about_settings',
				'priority' => 45,
				'settings' => 'tierradentro_about_button_text'
			));
			$wp_customize->add_setting( 'tierradentro_about_button_link', array(
				'default' => '',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_about_button_link', array(
				'label' => __('Button Link', 'tierradentro2021'),
				'description' => __('', 'tierradentro2021'),
				'section' => 'tierradentro_about_settings',
				'priority' => 50,
				'settings' => 'tierradentro_about_button_link'
			));
			$wp_customize->add_setting( 'tierradentro_about_background_color', array(
				'default' => '#fff',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'tierradentro_about_background_color', array(
				'label' => __('Background Color', 'tierradentro2021'),
				'section' => 'tierradentro_about_settings',
				'default' => '#fff',
				'priority' => 55,
				'settings' => 'tierradentro_about_background_color'
			)));



			//SERVICES SECTION
			$wp_customize->add_panel( 'tierradentro_services_section', array(
				'priority'	   => 40,
				'capability'	 => 'edit_theme_options',
				'title'		  => __('Services Section', 'tierradentro2021'),
				'description'	=> __('This section allows you to configure services section.', 'tierradentro2021')
			));
			$wp_customize->add_section( 'tierradentro_services_settings', array(
				'priority' => 5,
				'title' => __('Services Settings', 'tierradentro2021'),
				'panel'  => 'tierradentro_services_section'
			));
			$wp_customize->add_setting( 'tierradentro_services_display', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'tierradentro_sanitize_checkbox'
			));
			$wp_customize->add_control( 'tierradentro_services_display',array(
				'type' => 'checkbox',
				'label' => __('Disable Services Section','tierradentro2021'),
				'section' => 'tierradentro_services_settings',
				'priority' => 5
			));
			$wp_customize->add_setting( 'tierradentro_services_title', array(
				'default' => esc_html__('Services', 'tierradentro2021'),
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_services_title', array(
				'label' => __('Section Title', 'tierradentro2021'),
				'section' => 'tierradentro_services_settings',
				'priority' => 10,
				'settings' => 'tierradentro_services_title'
			));
			$wp_customize->add_setting( 'tierradentro_services_subtitle', array(
				'default' => esc_html__('More info services.', 'tierradentro2021'),
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_services_subtitle', array(
				'label' => __('Section Subtitle', 'tierradentro2021'),
				'section' => 'tierradentro_services_settings',
				'priority' => 15,
				'settings' => 'tierradentro_services_subtitle'
			));
			$wp_customize->add_setting( 'tierradentro_services_background_color', array(
				'default' => '#fff',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'tierradentro_services_background_color', array(
				'label' => __('Background Color', 'tierradentro2021'),
				'section' => 'tierradentro_services_settings',
				'default' => '#fff',
				'priority' => 20,
				'settings' => 'tierradentro_services_background_color'
			)));



			//PORTFOLIO SECTION
			$wp_customize->add_section( 'tierradentro_portfolio_settings', array(
				'priority'	   => 45,
				'capability'	 => 'edit_theme_options',
				'title'		  => __('Portfolio Section', 'tierradentro2021'),
				'description'	=> __('This section allows you to configure Portfolio section.', 'tierradentro2021')
			));
			$wp_customize->add_setting( 'tierradentro_portfolio_display', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'tierradentro_sanitize_checkbox'
			));
			$wp_customize->add_control( 'tierradentro_portfolio_display',array(
				'type' => 'checkbox',
				'label' => __('Disable Portfolio Section','tierradentro2021'),
				'section' => 'tierradentro_portfolio_settings',
				'priority' => 5
			));
			$wp_customize->add_setting( 'tierradentro_portfolio_title', array(
				'default' => esc_html__('Portfolio', 'tierradentro2021'),
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_portfolio_title', array(
				'label' => __('Section Title', 'tierradentro2021'),
				'section' => 'tierradentro_portfolio_settings',
				'priority' => 10,
				'settings' => 'tierradentro_portfolio_title'
			));
			$wp_customize->add_setting( 'tierradentro_portfolio_subtitle', array(
				'default' => esc_html__('More info portfolio.', 'tierradentro2021'),
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_portfolio_subtitle', array(
				'label' => __('Section Subtitle', 'tierradentro2021'),
				'section' => 'tierradentro_portfolio_settings',
				'priority' => 15,
				'settings' => 'tierradentro_portfolio_subtitle'
			));
			$wp_customize->add_setting( 'tierradentro_portfolio_background_color', array(
				'default' => '#fff',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'tierradentro_portfolio_background_color', array(
				'label' => __('Background Color', 'tierradentro2021'),
				'section' => 'tierradentro_portfolio_settings',
				'default' => '#fff',
				'priority' => 20,
				'settings' => 'tierradentro_portfolio_background_color'
			)));
			$wp_customize->add_setting( 'tierradentro_portfolio_button_text', array(
				'default' => 'Ver más',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_portfolio_button_text', array(
				'label' => __('Button Text', 'tierradentro2021'),
				'description' => __('Leave empty to disappear button', 'tierradentro2021'),
				'section' => 'tierradentro_portfolio_settings',
				'priority' => 30,
				'settings' => 'tierradentro_portfolio_button_text'
			));
			$wp_customize->add_setting( 'tierradentro_portfolio_button_link', array(
				'default' => '',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_portfolio_button_link', array(
				'label' => __('Button Link', 'tierradentro2021'),
				'description' => __('', 'tierradentro2021'),
				'section' => 'tierradentro_portfolio_settings',
				'priority' => 35,
				'settings' => 'tierradentro_portfolio_button_link'
			));



			//SLOGAN SECTION
			$wp_customize->add_section( 'tierradentro_slogan_settings', array(
				'priority'	   => 50,
				'capability'	 => 'edit_theme_options',
				'title'		  => __('Slogan Section', 'tierradentro2021'),
				'description'	=> __('This section allows you to configure slogan section.', 'tierradentro2021')
			));
			$wp_customize->add_setting( 'tierradentro_slogan_display', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'tierradentro_sanitize_checkbox'
			));
			$wp_customize->add_control( 'tierradentro_slogan_display',array(
				'type' => 'checkbox',
				'label' => __('Disable Slogan Section','tierradentro2021'),
				'section' => 'tierradentro_slogan_settings',
				'priority' => 5
			));
			$wp_customize->add_setting( 'tierradentro_slogan_title', array(
				'default' => esc_html__('Slogan', 'tierradentro2021'),
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_slogan_title', array(
				'label' => __('Section Title', 'tierradentro2021'),
				'section' => 'tierradentro_slogan_settings',
				'priority' => 10,
				'settings' => 'tierradentro_slogan_title'
			));
			$wp_customize->add_setting( 'tierradentro_slogan_subtitle', array(
				'default' => esc_html__('More info slogan.', 'tierradentro2021'),
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_slogan_subtitle', array(
				'label' => __('Section Subtitle', 'tierradentro2021'),
				'section' => 'tierradentro_slogan_settings',
				'priority' => 15,
				'settings' => 'tierradentro_slogan_subtitle'
			));
			$wp_customize->add_setting( 'tierradentro_slogan_content', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'tierradentro_sanitize_textbox',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_slogan_content', array(
				'label' => __('Content', 'tierradentro2021'),
				'section' => 'tierradentro_slogan_settings',
				'priority' => 20,
				'type' => 'textarea',
				'settings' => 'tierradentro_slogan_content'
			));
			$wp_customize->add_setting( 'tierradentro_slogan_background_color', array(
				'default' => '#fff',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'tierradentro_slogan_background_color', array(
				'label' => __('Background Color', 'tierradentro2021'),
				'section' => 'tierradentro_slogan_settings',
				'default' => '#fff',
				'priority' => 25,
				'settings' => 'tierradentro_slogan_background_color'
			)));



			//TEAM SECTION
			$wp_customize->add_panel( 'tierradentro_team_section', array(
				'priority'	   => 55,
				'capability'	 => 'edit_theme_options',
				'title'		  => __('Team Section', 'tierradentro2021'),
				'description'	=> __('This section allows you to configure team section.', 'tierradentro2021')
			));
			$wp_customize->add_section( 'tierradentro_team_settings', array(
				'priority' => 5,
				'title' => __('Team Settings', 'tierradentro2021'),
				'panel'  => 'tierradentro_team_section'
			));
			$wp_customize->add_setting( 'tierradentro_team_display', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'tierradentro_sanitize_checkbox'
			));
			$wp_customize->add_control( 'tierradentro_team_display',array(
				'type' => 'checkbox',
				'label' => __('Disable Team Section','tierradentro2021'),
				'section' => 'tierradentro_team_settings',
				'priority' => 5
			));
			$wp_customize->add_setting( 'tierradentro_team_title', array(
				'default' => esc_html__('Team', 'tierradentro2021'),
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_team_title', array(
				'label' => __('Section Title', 'tierradentro2021'),
				'section' => 'tierradentro_team_settings',
				'priority' => 10,
				'settings' => 'tierradentro_team_title'
			));
			$wp_customize->add_setting( 'tierradentro_team_subtitle', array(
				'default' => esc_html__('More info team.', 'tierradentro2021'),
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_team_subtitle', array(
				'label' => __('Section Subtitle', 'tierradentro2021'),
				'section' => 'tierradentro_team_settings',
				'priority' => 15,
				'settings' => 'tierradentro_team_subtitle'
			));
			$wp_customize->add_setting( 'tierradentro_team_background_color', array(
				'default' => '#fff',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'tierradentro_team_background_color', array(
				'label' => __('Background Color', 'tierradentro2021'),
				'section' => 'tierradentro_team_settings',
				'default' => '#fff',
				'priority' => 20,
				'settings' => 'tierradentro_team_background_color'
			)));
			$wp_customize->add_setting( 'tierradentro_team_button_text', array(
				'default' => 'Ver más',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_team_button_text', array(
				'label' => __('Button Text', 'tierradentro2021'),
				'description' => __('Leave empty to disappear button', 'tierradentro2021'),
				'section' => 'tierradentro_team_settings',
				'priority' => 30,
				'settings' => 'tierradentro_team_button_text'
			));
			$wp_customize->add_setting( 'tierradentro_team_button_link', array(
				'default' => '',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_team_button_link', array(
				'label' => __('Button Link', 'tierradentro2021'),
				'description' => __('', 'tierradentro2021'),
				'section' => 'tierradentro_team_settings',
				'priority' => 35,
				'settings' => 'tierradentro_team_button_link'
			));



			//BLOG SECTION
			$wp_customize->add_section( 'tierradentro_blog_settings', array(
				'priority'	   => 56,
				'capability'	 => 'edit_theme_options',
				'title'		  => __('Blog Section', 'tierradentro2021'),
				'description'	=> __('This section allows you to configure Blog section.', 'tierradentro2021')
			));
			$wp_customize->add_setting( 'tierradentro_blog_display', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'tierradentro_sanitize_checkbox'
			));
			$wp_customize->add_control( 'tierradentro_blog_display',array(
				'type' => 'checkbox',
				'label' => __('Disable blog Section','tierradentro2021'),
				'section' => 'tierradentro_blog_settings',
				'priority' => 5
			));
			$wp_customize->add_setting( 'tierradentro_blog_title', array(
				'default' => esc_html__('blog', 'tierradentro2021'),
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_blog_title', array(
				'label' => __('Section Title', 'tierradentro2021'),
				'section' => 'tierradentro_blog_settings',
				'priority' => 10,
				'settings' => 'tierradentro_blog_title'
			));
			$wp_customize->add_setting( 'tierradentro_blog_subtitle', array(
				'default' => esc_html__('More info blog.', 'tierradentro2021'),
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_blog_subtitle', array(
				'label' => __('Section Subtitle', 'tierradentro2021'),
				'section' => 'tierradentro_blog_settings',
				'priority' => 15,
				'settings' => 'tierradentro_blog_subtitle'
			));
			$wp_customize->add_setting( 'tierradentro_blog_background_color', array(
				'default' => '#fff',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'tierradentro_blog_background_color', array(
				'label' => __('Background Color', 'tierradentro2021'),
				'section' => 'tierradentro_blog_settings',
				'default' => '#fff',
				'priority' => 20,
				'settings' => 'tierradentro_blog_background_color'
			)));
			$wp_customize->add_setting( 'tierradentro_blog_button_text', array(
				'default' => 'Ver más',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_blog_button_text', array(
				'label' => __('Button Text', 'tierradentro2021'),
				'description' => __('Leave empty to disappear button', 'tierradentro2021'),
				'section' => 'tierradentro_blog_settings',
				'priority' => 30,
				'settings' => 'tierradentro_blog_button_text'
			));
			$wp_customize->add_setting( 'tierradentro_blog_button_link', array(
				'default' => '',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_blog_button_link', array(
				'label' => __('Button Link', 'tierradentro2021'),
				'description' => __('', 'tierradentro2021'),
				'section' => 'tierradentro_blog_settings',
				'priority' => 35,
				'settings' => 'tierradentro_blog_button_link'
			));



			//CONTACT SECTION
			$wp_customize->add_section( 'tierradentro_contact_settings', array(
				'priority'	   => 60,
				'capability'	 => 'edit_theme_options',
				'title'		  => __('Contact Section', 'tierradentro2021'),
				'description'	=> __('This section allows you to configure contact section.', 'tierradentro2021')
			));
			$wp_customize->add_setting( 'tierradentro_contact_display', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'tierradentro_sanitize_checkbox'
			));
			$wp_customize->add_control( 'tierradentro_contact_display',array(
				'type' => 'checkbox',
				'label' => __('Disable contact Section','tierradentro2021'),
				'section' => 'tierradentro_contact_settings',
				'priority' => 5
			));
			$wp_customize->add_setting( 'tierradentro_contact_title', array(
				'default' => esc_html__('contact', 'tierradentro2021'),
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_contact_title', array(
				'label' => __('Section Title', 'tierradentro2021'),
				'section' => 'tierradentro_contact_settings',
				'priority' => 10,
				'settings' => 'tierradentro_contact_title'
			));
			$wp_customize->add_setting( 'tierradentro_contact_subtitle', array(
				'default' => esc_html__('More info contact.', 'tierradentro2021'),
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_contact_subtitle', array(
				'label' => __('Section Subtitle', 'tierradentro2021'),
				'section' => 'tierradentro_contact_settings',
				'priority' => 15,
				'settings' => 'tierradentro_contact_subtitle'
			));
			$wp_customize->add_setting( 'tierradentro_contact_form', array(
				'default' => '',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_contact_form', array(
				'label' => __('Form', 'tierradentro2021'),
				'description' => __('Shortcode form', 'tierradentro2021'),
				'section' => 'tierradentro_contact_settings',
				'priority' => 20,
				'settings' => 'tierradentro_contact_form'
			));
			$wp_customize->add_setting( 'tierradentro_contact_whatsapp', array(
				'default' => '',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_contact_whatsapp', array(
				'label' => __('Whatsapp', 'tierradentro2021'),
				'section' => 'tierradentro_contact_settings',
				'priority' => 25,
				'settings' => 'tierradentro_contact_whatsapp'
			));
			$wp_customize->add_setting( 'tierradentro_contact_background_color', array(
				'default' => '#fff',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'tierradentro_contact_background_color', array(
				'label' => __('Background Color', 'tierradentro2021'),
				'section' => 'tierradentro_contact_settings',
				'default' => '#fff',
				'priority' => 30,
				'settings' => 'tierradentro_contact_background_color'
			)));


			//SUBSCRIBE SECTION
			$wp_customize->add_section( 'tierradentro_subscribe_settings', array(
				'priority'	   => 60,
				'capability'	 => 'edit_theme_options',
				'title'		  => __('Subscribe Section', 'tierradentro2021'),
				'description'	=> __('This section allows you to configure subscribe section.', 'tierradentro2021')
			));
			$wp_customize->add_setting( 'tierradentro_subscribe_display', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'tierradentro_sanitize_checkbox'
			));
			$wp_customize->add_control( 'tierradentro_subscribe_display',array(
				'type' => 'checkbox',
				'label' => __('Disable subscribe Section','tierradentro2021'),
				'section' => 'tierradentro_subscribe_settings',
				'priority' => 5
			));
			$wp_customize->add_setting( 'tierradentro_subscribe_title', array(
				'default' => esc_html__('subscribe', 'tierradentro2021'),
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_subscribe_title', array(
				'label' => __('Section Title', 'tierradentro2021'),
				'section' => 'tierradentro_subscribe_settings',
				'priority' => 10,
				'settings' => 'tierradentro_subscribe_title'
			));
			$wp_customize->add_setting( 'tierradentro_subscribe_subtitle', array(
				'default' => esc_html__('More info subscribe.', 'tierradentro2021'),
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_subscribe_subtitle', array(
				'label' => __('Section Subtitle', 'tierradentro2021'),
				'section' => 'tierradentro_subscribe_settings',
				'priority' => 15,
				'settings' => 'tierradentro_subscribe_subtitle'
			));
			$wp_customize->add_setting( 'tierradentro_subscribe_form', array(
				'default' => '',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control( 'tierradentro_subscribe_form', array(
				'label' => __('Form', 'tierradentro2021'),
				'description' => __('Shortcode form', 'tierradentro2021'),
				'section' => 'tierradentro_subscribe_settings',
				'priority' => 20,
				'settings' => 'tierradentro_subscribe_form'
			));
			$wp_customize->add_setting( 'tierradentro_subscribe_background_color', array(
				'default' => '#fff',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'tierradentro_subscribe_background_color', array(
				'label' => __('Background Color', 'tierradentro2021'),
				'section' => 'tierradentro_subscribe_settings',
				'default' => '#fff',
				'priority' => 30,
				'settings' => 'tierradentro_subscribe_background_color'
			)));



			//FOOTER SETTINGS
			$wp_customize->add_panel( 'tierradentro_footer_section', array(
				'priority'	   => 65,
				'capability'	 => 'edit_theme_options',
				'title'		  => __('Footer Section', 'tierradentro2021'),
				'description'	=> __('This section allows you to configure footer section.', 'tierradentro2021')
			));
			$wp_customize->add_section( 'tierradentro_footer_settings', array(
				'priority' => 5,
				'title' => __('Footer Settings', 'tierradentro2021'),
				'panel'  => 'tierradentro_footer_section'
			));
			$wp_customize->add_setting( 'tierradentro_social_footer', array(
				'capability' => 'edit_theme_options',
				'default' => '1',
				'sanitize_callback' => 'tierradentro_sanitize_checkbox'
			));
			$wp_customize->add_control( 'tierradentro_social_footer',array(
				'type' => 'checkbox',
				'label' => __('Footer Social Section','tierradentro2021'),
				'section' => 'tierradentro_footer_settings',
				'priority' => 10
			));
			$wp_customize->add_setting( 'tierradentro_footer_background_color', array(
				'default' => '#131313',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control(new Latte_Customize_Alpha_Color_Control($wp_customize, 'tierradentro_footer_background_color', array(
				'label' => __('Footer Background Color', 'tierradentro2021'),
				'section' => 'tierradentro_footer_settings',
				'default' => '#131313',
				'priority' => 30,
				'settings' => 'tierradentro_footer_background_color'
			)));



			//LANDING PAGES
			$wp_customize->add_section( 'tierradentro_landing_settings', array(
				'priority'	   => 70,
				'capability'	 => 'edit_theme_options',
				'title'		  => __('Landing Pages', 'tierradentro2021'),
				'description'	=> __('This section allows you to configure Landing pages.', 'tierradentro2021')
			));
			$wp_customize->add_setting( 'tierradentro_landing_header_image', array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
				'transport' => 'postMessage'
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'tierradentro_landing_header_image', array(
				'label' => __('Header Image (1600x700)', 'tierradentro2021'),
				'section' => 'tierradentro_landing_settings',
				'priority' => 10,
				'settings' => 'tierradentro_landing_header_image'
			)));



	}
} // endif function_exists( 'understrap_theme_customize_register' ).
add_action( 'customize_register', 'understrap_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'understrap_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function understrap_customize_preview_js() {
		wp_enqueue_script(
			'understrap_customizer',
			get_template_directory_uri() . '/inc/customizer/customizer-preview.js',
			array( 'customize-preview' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_preview_init', 'understrap_customize_preview_js' );

// Registering and enqueuing scripts/stylesheets for admin panel.
function tierradentro_admin_scripts($hook) {
	if ( 'widgets.php' != $hook ) {
	return;
	}

	wp_enqueue_style( 'tierradentro_font_awesome', get_template_directory_uri().'/inc/other/font-awesome/css/font-awesome.min.css' );
}

add_action( 'admin_enqueue_scripts', 'tierradentro_admin_scripts' );

// Registering and enqueuing scripts/stylesheets for Customizer controls.
function tierradentro_customizer_js() {
	wp_enqueue_script( 'tierradentro_customizer_js', get_template_directory_uri() . '/inc/customizer/customizer-admin.js', array("jquery"), '20120206', true  );
}

add_action( 'customize_controls_enqueue_scripts', 'tierradentro_customizer_js' );

// Registering and enqueuing scripts/stylesheets for Customizer controls.
function tierradentro_customizer_css() {
	wp_enqueue_style( 'tierradentro_font_awesome', get_template_directory_uri().'/inc/other/font-awesome/css/font-awesome.min.css' );
}

add_action( 'customize_controls_print_styles', 'tierradentro_customizer_css' );