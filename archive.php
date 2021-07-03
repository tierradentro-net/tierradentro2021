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
$tierradentro_subscribe_form = get_theme_mod('tierradentro_subscribe_form',__( '', 'tierradentro2021' ));
$tierradentro_subscribe_subtitle = get_theme_mod('tierradentro_subscribe_subtitle',__( 'Send me a message.', 'tierradentro2021' ));

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
				<div class="row blog">
					<div class="row blog-box">
					<?php $postCount = 0; ?>
					<?php if ( have_posts() ) : ?>
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php $postCount++; ?>
							 <?php if(is_category( array( 'blog' ) ) && $postCount == 1) { ?>
							 	<?php if(!empty($tierradentro_subscribe_form)){ ?>
								 	<div class="archive-item col-sm-8">
								 		<?php get_template_part( 'loop-templates/content', 'one' ); ?>
								 	</div>
								 	<div class="archive-item subscribe-item col-sm-4">
								 		<?php if(!empty($tierradentro_subscribe_subtitle) || is_customize_preview()) : ?>
											<h4><?php echo esc_html($tierradentro_subscribe_subtitle); ?></h4>
										<?php endif; ?>
										<?php echo do_shortcode($tierradentro_subscribe_form); ?>
							 		</div>
							 	<?php }else{ ?>
							 		<div class="archive-item col-sm-12">
								 		<?php get_template_part( 'loop-templates/content', 'one' ); ?>
								 	</div>
							 	<?php } ?>
							 <?php }else{ ?>
							 	<div data-sr="enter bottom wait 0.25s" class="blog-item col-md-4 col-sm-6">
							 		<div class="blog-item-container">
										<?php get_template_part( 'loop-templates/content', get_post_format() ); ?>
									</div>
								</div>
							<?php } ?>
						<?php endwhile; ?>
					<?php else : ?>
						<?php get_template_part( 'loop-templates/content', 'none' ); ?>
					<?php endif; ?>
				</div>
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
