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

	<div class="wrapper archive-portfolio" id="archive-wrapper">
		<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
			<main class="site-main" id="main">
				<?php if ( have_posts() ) : ?>
					<div class="row portfolio-box">
						<?php while ( have_posts() ) : the_post(); ?>
							<div data-sr="enter bottom wait 0.25s" class="portfolio-item col-md-4 col-sm-6"><div class="portfolio-item-container">
								<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
									<div class="overlay"><div class="text">
										<header class="entry-header">
											<?php
											the_title(
												sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),'</a></h4>');
											?>
										</header><!-- .entry-header -->
									</div></div>
									<?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>
								</article><!-- #post-## -->
							</div></div>
						<?php endwhile; ?>
					</div>
				<?php else : ?>
					<?php get_template_part( 'loop-templates/content', 'none' ); ?>
				<?php endif; ?>
			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

	</div><!-- #content -->
	</div><!-- #archive-wrapper -->

<?php get_footer(); ?>
