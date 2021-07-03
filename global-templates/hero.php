<?php
/**
 * Hero setup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php if ( is_active_sidebar( 'hero' ) ) : ?>

	<div class="wrapper" id="wrapper-hero">

		<?php get_template_part( 'sidebar-templates/sidebar', 'hero' ); ?>

	</div>

<?php endif; ?>
