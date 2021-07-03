<?php
/**
 * Template Name: Landing Page About
 *
 * @package tierradentro2021
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

		<header class="archive-header">
			<div class="cover-container row">
				<div class="inner cover col-md-12">
					<?php the_title( '<h1 class="cover-heading">', '</h1>' ); ?>
				</div>
			</div>
		</header>

<div class="wrapper page-about" id="page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
			<main class="site-main" id="main">
				<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'loop-templates/content', 'page' ); ?>
				<?php endwhile; // end of the loop. ?>
			</main><!-- #main -->
		</div><!-- .row -->
	</div><!-- #content -->

	<?php get_template_part( 'sections/team' ); ?>

	<?php /*get_template_part( 'sections/about' );*/ ?>

</div><!-- #page-wrapper -->

<?php get_footer(); ?>