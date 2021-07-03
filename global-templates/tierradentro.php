<?php
/**
 * Template Name: Homepage
 * The main template file.
 *
 * @package tierradentro2021
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

	//HEADER
	get_header();

	$tierradentro_intro_display = get_theme_mod('tierradentro_intro_display',0);
	$tierradentro_about_display = get_theme_mod('tierradentro_about_display',0); //2 video/image-text column
	$tierradentro_services_display = get_theme_mod('tierradentro_services_display',0); //3 text column
	$tierradentro_portfolio_display = get_theme_mod('tierradentro_portfolio_display',0); //3+  category image/text grid column
	$tierradentro_slogan_display = get_theme_mod('tierradentro_slogan_display',0); //1 text column
	$tierradentro_team_display = get_theme_mod('tierradentro_team_display',0); //4+  image/text grid column slide
	$tierradentro_blog_display = get_theme_mod('tierradentro_blog_display',0); //3+ category  image/text grid column 
	$tierradentro_contact_display = get_theme_mod('tierradentro_contact_display',0); //1 form column	
	$tierradentro_subscribe_display = get_theme_mod('tierradentro_subscribe_display',0); //1 form column	

	//INTRO SECTION
	if( isset($tierradentro_intro_display) && $tierradentro_intro_display != 1 ):
		do_action( 'tierradentro_intro_before' );
		get_template_part( 'sections/intro' );
		do_action( 'tierradentro_intro_after' );
	endif;

	//ABOUT SECTION
	if( isset($tierradentro_about_display) && $tierradentro_about_display != 1 ):
		do_action( 'tierradentro_intro_before' );
		get_template_part( 'sections/about' );
		do_action( 'tierradentro_intro_after' );
	endif;

	//SERVICES SECTION
	if( isset($tierradentro_services_display) && $tierradentro_services_display != 1 ):
		do_action( 'tierradentro_intro_before' );
		get_template_part( 'sections/services' );
		do_action( 'tierradentro_intro_after' );
	endif;

	//PORTFOLIO SECTION
	if( isset($tierradentro_portfolio_display) && $tierradentro_portfolio_display != 1 ):
		do_action( 'tierradentro_intro_before' );
		get_template_part( 'sections/portfolio' );
		do_action( 'tierradentro_intro_after' );
	endif;

	//SLOGAN SECTION
	if( isset($tierradentro_slogan_display) && $tierradentro_slogan_display != 1 ):
		do_action( 'tierradentro_intro_before' );
		get_template_part( 'sections/slogan' );
		do_action( 'tierradentro_intro_after' );
	endif;

	//TEAM SECTION
	if( isset($tierradentro_team_display) && $tierradentro_team_display != 1 ):
		do_action( 'tierradentro_intro_before' );
		get_template_part( 'sections/team' );
		do_action( 'tierradentro_intro_after' );
	endif;

	//BLOG SECTION
	if( isset($tierradentro_blog_display) && $tierradentro_blog_display != 1 ):
		do_action( 'tierradentro_intro_before' );
		get_template_part( 'sections/blog' );
		do_action( 'tierradentro_intro_after' );
	endif;
	
	//CONTACT SECTION
	if( isset($tierradentro_contact_display) && $tierradentro_contact_display != 1 ):
		do_action( 'tierradentro_intro_before' );
		get_template_part( 'sections/contact' );
		do_action( 'tierradentro_intro_after' );
	endif;

	//SUBSCRIBE SECTION
	if( isset($tierradentro_subscribe_display) && $tierradentro_subscribe_display != 1 ):
		do_action( 'tierradentro_intro_before' );
		get_template_part( 'sections/subscribe' );
		do_action( 'tierradentro_intro_after' );
	endif;

	//FOOTER
	get_footer(); 
?>