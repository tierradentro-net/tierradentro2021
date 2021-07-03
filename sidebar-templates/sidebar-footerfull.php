<?php
/**
 * Sidebar setup for footer full.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_active_sidebar( 'footerfull' ) ) : ?>

	<!-- ******************* The Footer Full-width Widget Area ******************* -->

	<div class="wrapper" id="wrapper-footer-full">

		<div class="<?php echo esc_attr( $container ); ?>" id="footer-full-content" tabindex="-1">

				<div class="row">
						<header data-sr="ease-in-out wait 0.25s" class="footerfull-header">
							<h3>Enciende la llama</h3>
						</header>
				</div>

			<div data-sr="enter bottom wait 0.25s" class="row">
				
				<?php dynamic_sidebar( 'footerfull' ); ?>

			</div>

		</div>

	</div><!-- #wrapper-footer-full -->

<?php endif; ?>
