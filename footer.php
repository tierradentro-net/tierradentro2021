<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
$tierradentro_social_footer = get_theme_mod('tierradentro_social_footer');


?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="footer-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div data-sr="ease-in-out wait 0.25s"  class="row">
			<div class="col-md-4"><h3><?php bloginfo( 'name' ); ?></h3></div>
			<div class="col-md-4">

				<footer class="site-footer" id="colophon">

						<?php
						if( isset($tierradentro_social_footer) && $tierradentro_social_footer == 1 ):
							do_action( 'tierradentro_intro_before' );
							get_template_part( 'sections/social' );
							do_action( 'tierradentro_intro_after' );
						endif;
						?>

					<div class="site-info">

						<?php /*understrap_site_info();*/ ?>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->
			<div class="col-md-4 credits"><?php echo date("Y"); ?> Todos los derechos reservados.</div>

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- footer-wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

