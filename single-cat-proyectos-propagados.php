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

<div class="wrapper single-portfolio" id="single-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<main class="site-main" id="main">
				<?php while ( have_posts() ) : the_post(); ?>

					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header><!-- .entry-header -->
						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->
						<?php the_post_thumbnail( 'full', ['class' => 'img-responsive responsive--full'] ); ?>
					</article><!-- #post-## -->

					<?php understrap_post_nav(); ?>
				<?php endwhile; // end of the loop. ?>
			</main><!-- #main -->
		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php get_footer(); ?>
