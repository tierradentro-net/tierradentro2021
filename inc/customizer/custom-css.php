<?php
/**
 * Custom CSS for wp_head
 */
function latte_custom_css() {
	$tierradentro_header_background_color = get_theme_mod('tierradentro_header_background_color','rgba(0,0,0,1)');
	$tierradentro_skin_color = get_theme_mod('tierradentro_skin_color','#FF0070');
	$tierradentro_footer_background_color = get_theme_mod('tierradentro_footer_background_color','#131313');
	$tierradentro_intro_display = get_theme_mod('tierradentro_intro_display');
	$tierradentro_intro_background_color = get_theme_mod('tierradentro_intro_background_color', 'rgba(0, 0, 0, 1)' );
	$tierradentro_about_display = get_theme_mod('tierradentro_about_display');
	$tierradentro_about_background_color = get_theme_mod('tierradentro_about_background_color', '#fff' );
	$tierradentro_services_display = get_theme_mod('tierradentro_services_display');
	$tierradentro_services_background_color = get_theme_mod('tierradentro_services_background_color', '#fff' );
	$tierradentro_portfolio_display = get_theme_mod('tierradentro_portfolio_display');
	$tierradentro_portfolio_background_color = get_theme_mod('tierradentro_portfolio_background_color', '#fff' );
	$tierradentro_slogan_display = get_theme_mod('tierradentro_slogan_display');
	$tierradentro_slogan_background_color = get_theme_mod('tierradentro_slogan_background_color', '#fff' );
	$tierradentro_team_display = get_theme_mod('tierradentro_team_display');
	$tierradentro_team_background_color = get_theme_mod('tierradentro_team_background_color', '#fff' );
	$tierradentro_blog_display = get_theme_mod('tierradentro_blog_display');
	$tierradentro_blog_background_color = get_theme_mod('tierradentro_blog_background_color', '#fff' );
	$tierradentro_contact_display = get_theme_mod('tierradentro_contact_display');
	$tierradentro_contact_background_color = get_theme_mod('tierradentro_contact_background_color', '#fff' );
	$tierradentro_subscribe_display = get_theme_mod('tierradentro_subscribe_display');
	$tierradentro_subscribe_background_color = get_theme_mod('tierradentro_subscribe_background_color', '#fff' );
	$tierradentro_landing_header_image = get_theme_mod('tierradentro_landing_header_image');
?>
<style>
	<?php if(!empty($tierradentro_header_background_color)) : ?>
		.bottomShadow {
			background: <?php echo esc_html($tierradentro_header_background_color);?>;
		}
		.btn-primary{
			background:  <?php echo esc_html($tierradentro_header_background_color);?> !important;
			border-color:  <?php echo esc_html($tierradentro_header_background_color);?> !important;
		}
	<?php endif; ?>
	<?php if(!empty($tierradentro_skin_color)) : ?>
		a:hover, button.navbar-toggler:hover, .contact-whatsapp a, #wrapper-footer-full{
				color: <?php echo esc_html($tierradentro_skin_color); ?> !important;
		}
		.btn-primary:hover, .contact .wpcf7 input[type=submit]:hover, #mc4wp-form-1 input[type=submit]:hover{
			background: <?php echo esc_html($tierradentro_skin_color);?> !important;
			border-color: <?php echo esc_html($tierradentro_skin_color); ?> !important;
		}
		h4, .animated-text, .about-play, .service-icon, .subir{
			color: <?php echo esc_html($tierradentro_skin_color); ?> !important;
		}
		.flip-card-back, .portfolio .overlay,.blog .overlay .archive-portfolio .overlay{
			background: <?php echo esc_html($tierradentro_skin_color);?> !important;
		}
	<?php endif; ?>

	<?php if (  is_front_page() || is_home() ) : ?>
		<?php if( isset($tierradentro_intro_display) && $tierradentro_intro_display != 1 ): ?>
		<?php if(!empty($tierradentro_intro_background_color)) : ?>
		.intro {
			background: <?php echo esc_html($tierradentro_intro_background_color); ?>;
		}
		<?php endif; ?>
		<?php endif; ?>
		<?php if( isset($tierradentro_about_display) && $tierradentro_about_display != 1 ): ?>
		<?php if(!empty($tierradentro_about_background_color)) : ?>
		.about {
			background: <?php echo esc_html($tierradentro_about_background_color); ?>;
		}
		<?php endif; ?>
		<?php endif; ?>
		<?php if( isset($tierradentro_services_display) && $tierradentro_services_display != 1 ): ?>
		<?php if(!empty($tierradentro_services_background_color)) : ?>
		.services {
			background: <?php echo esc_html($tierradentro_services_background_color); ?>;
		}
		<?php endif; ?>
		<?php endif; ?>
		<?php if( isset($tierradentro_portfolio_display) && $tierradentro_portfolio_display != 1 ): ?>
		<?php if(!empty($tierradentro_portfolio_background_color)) : ?>
		.portfolio{
			background: <?php echo esc_html($tierradentro_portfolio_background_color); ?>;
		}
		<?php endif; ?>
		<?php endif; ?>
		<?php if( isset($tierradentro_slogan_display) && $tierradentro_slogan_display != 1 ): ?>
		<?php if(!empty($tierradentro_slogan_background_color)) : ?>
		.slogan {
			background-color: <?php echo esc_html($tierradentro_slogan_background_color); ?>;
		}
		<?php endif; ?>
		<?php endif; ?>
		<?php if( isset($tierradentro_team_display) && $tierradentro_team_display != 1 ): ?>
		<?php if(!empty($tierradentro_team_background_color)) : ?>
		.team {
			background: <?php echo esc_html($tierradentro_team_background_color); ?>;
		}
		<?php endif; ?>
		<?php endif; ?>
		<?php if( isset($tierradentro_contact_display) && $tierradentro_contact_display != 1 ): ?>
		<?php if(!empty($tierradentro_contact_background_color)) : ?>
		.contact {
			background: <?php echo esc_html($tierradentro_contact_background_color); ?>;
		}
		<?php endif; ?>
		<?php endif; ?>
		<?php if( isset($tierradentro_subscribe_display) && $tierradentro_subscribe_display != 1 ): ?>
		<?php if(!empty($tierradentro_subscribe_background_color)) : ?>
		.subscribe {
			background: <?php echo esc_html($tierradentro_subscribe_background_color); ?>;
		}
		<?php endif; ?>
		<?php endif; ?>
		<?php if( isset($tierradentro_blog_display) && $tierradentro_blog_display != 1 ): ?>
		<?php if(!empty($tierradentro_blog_background_color)) : ?>
		.blog{
			background: <?php echo esc_html($tierradentro_blog_background_color); ?>;
		}
		<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>
	<?php if(!empty($tierradentro_footer_background_color)) : ?>
		#wrapper-footer-full{
			background: <?php echo esc_html($tierradentro_footer_background_color); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($tierradentro_landing_header_image)) : ?>
	.archive-header {
		background: transparent url("<?php echo esc_html($tierradentro_landing_header_image); ?>") repeat scroll center center / cover;
	}
	<?php else: ?>
	.archive-header {
		background: <?php echo esc_html($tierradentro_header_background_color);?> !important;
	}
	<?php endif; ?>


</style>
<?php
}

add_action('wp_head', 'latte_custom_css');

?>
