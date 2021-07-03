<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

		<header class="archive-header">
			<div class="cover-container row">
				<div class="inner cover col-md-12">
					<?php the_archive_title( '<h1 class="cover-heading">', '</h1>' ); ?>
				</div>
			</div>
		</header>

<div class="wrapper" id="archive-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>
			<main class="site-main" id="main">
				<div class="row">
					<?php if ( is_active_sidebar( 'herocanvas' ) ) :
						dynamic_sidebar( 'herocanvas' );
					endif; ?>
				</div>
				<div class="row">
					<?php $postCount = 0; ?>
					<?php if ( have_posts() ) : ?>
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php $postCount++; ?>
							 <?php if(is_category( array( 'blog' ) ) && $postCount == 1) { ?>
							 	<div class="archive-item col-sm-12">
							 		<?php get_template_part( 'loop-templates/content', 'one' ); ?>
							 	</div>
							 <?php }else{ ?>
							 	<div data-sr="enter bottom wait 0.25s" class="archive-item col-md-4 col-sm-6">
										<?php get_template_part( 'loop-templates/content', get_post_format() ); ?>
								</div>
							<?php } ?>
						<?php endwhile; ?>
					<?php else : ?>
						<?php get_template_part( 'loop-templates/content', 'none' ); ?>
					<?php endif; ?>
				</div> <!-- .row -->
			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
		</div> <!-- .row -->
	</div><!-- #content -->
	</div><!-- #archive-wrapper -->

<?php get_footer(); ?>
