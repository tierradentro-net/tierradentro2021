<?php
/**
 * The template for displaying all single posts.
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
					<h1 class="cover-heading">
					<?php the_category('<h1 class="cover-heading">','</h1>'); ?>
					</h1>
				</div>
			</div>
		</header>

<div class="wrapper" id="single-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">
				<div class="row">
					<div class="archive-item col-lg-8">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'loop-templates/content', 'single' ); ?>
						<?php understrap_post_nav(); ?>

					</div>
					<div class="archive-item col-lg-4">
						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) : ?>
							<div>
							<?php comments_template(); ?>
							</div>
						<?php endif;
						?>
						<?php if(!empty($tierradentro_subscribe_form)){ ?>
							<div class="subscribe-item">
								<?php if(!empty($tierradentro_subscribe_subtitle) || is_customize_preview()) : ?>
									<h4><?php echo esc_html($tierradentro_subscribe_subtitle); ?></h4>
								<?php endif; ?>
								<?php echo do_shortcode($tierradentro_subscribe_form); ?>
							</div>
						<?php } ?>
					</div>
					<?php endwhile; // end of the loop. ?>
				</div><!-- .row -->
			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #single-wrapper -->
<?php get_footer(); ?>
