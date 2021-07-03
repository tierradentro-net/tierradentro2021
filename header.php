<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
$tierradentro_intro_logo = get_theme_mod('tierradentro_intro_logo',0);
$tierradentro_header_menu_crunch = get_theme_mod('tierradentro_header_menu_crunch',1);
$tierradentro_header_fixed = get_theme_mod('tierradentro_header_fixed',1);
$tierradentro_social_header = get_theme_mod('tierradentro_social_header',1);
$tierradentro_preloader_display = get_theme_mod('tierradentro_preloader_display',0);
$tierradentro_contact_whatsapp = get_theme_mod('tierradentro_contact_whatsapp', '');

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="google-site-verification" content="jW77kaHEVkzO3RwHpQDiyzsfb_kiH5RylSAky--LSLo" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-191738942-1">
	</script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-191738942-1');
	</script>
</head>

<body <?php body_class(); ?>>

<?php if( isset($tierradentro_preloader_display) && $tierradentro_preloader_display != 1 ): ?>
	<div class="preloader"><div class="status">&nbsp;</div></div>
<?php endif; ?>

<?php do_action( 'wp_body_open' ); ?>
<div class="site-wrapper" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<?php if( isset($tierradentro_header_fixed) && $tierradentro_header_fixed == 1 ) { ?>
		<div id="navbar-wrapper" itemscope itemtype="http://schema.org/WebSite" class="fixed">
	<?php }else{ ?>
		<div id="navbar-wrapper" itemscope itemtype="http://schema.org/WebSite">
	<?php } ?>
		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav class="navbar navbar-expand-md navbar-dark">

		<?php if ( 'container' == $container ) : ?>
			<?php if( isset($tierradentro_header_menu_crunch) && $tierradentro_header_menu_crunch == 1 ) { ?>
				<div class="container crunch-container">
			<?php }else{ ?>	
			<div class="container">
			<?php } ?>
		<?php endif; ?>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>
						<?php if ( is_front_page() || is_home() ) : ?>
							<h1 class="navbar-brand mb-0 site-title crunch-brand"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<a class="navbar-brand site-title crunch-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
						<?php endif; ?>
					<?php } else {
						if ( is_front_page() || is_home() ) :
							if( isset($tierradentro_intro_logo) && $tierradentro_intro_logo == 1 ) { ?>
								<h1 class="navbar-brand mb-0 site-title crunch-brand"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
							<?php }else{ ?>
								<div class="crunch-brand">
								<?php the_custom_logo(); ?>
								</div>
							<?php } 
						else: ?>
							<div class="crunch-brand">
							<?php the_custom_logo(); ?>
							</div>
						<?php endif;
					} ?><!-- end custom logo -->



				<!-- CRUNCH -->
				<?php if( isset($tierradentro_header_menu_crunch) && $tierradentro_header_menu_crunch == 1 ) { ?>
					<div class="crunch-div-toggler">
						<?php
						if( isset($tierradentro_social_header) && $tierradentro_social_header == 1 ):
							do_action( 'tierradentro_intro_before' );
							get_template_part( 'sections/social' );
							do_action( 'tierradentro_intro_after' );
						endif;
						?>
						<button class="navbar-toggler crunch-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</button>
						<?php
							get_search_form();
						?>
					</div>
					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse crunch-navbar-container',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto crunch-navbar',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
				<?php }else{ ?>
				<!-- EXPANDED -->
						<?php
						if( isset($tierradentro_social_header) && $tierradentro_social_header == 1 ):
							do_action( 'tierradentro_intro_before' );
							get_template_part( 'sections/social' );
							do_action( 'tierradentro_intro_after' );
						endif;
						?>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</button>

					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>

					<div  class="search-menu-button-form">
						<?php
							get_search_form();
						?>	
					</div>
					<button class="search-menu-button"><i class="fa fa-search"></i></button>

				<?php } ?>



			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #navbar-wrapper end -->

						<?php if(!empty($tierradentro_contact_whatsapp)) : ?>
							<!-- whatsapp -->
							<div class="contact-whatsapp"><a href="https://api.whatsapp.com/send?phone=<?php echo esc_html($tierradentro_contact_whatsapp); ?>" target="_blank"><i class="fa fa-whatsapp fa-4x" aria-hidden="true"></i></a></div>
						<?php endif; ?>
						<!-- subir -->
						<div class="subir" style="display: none;"><i class="fa fa-chevron-circle-up fa-3x" aria-hidden="true"></i></div>