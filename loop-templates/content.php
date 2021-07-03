<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<div class="overlay"><div class="text">
			<header class="entry-header">
				<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>'); ?>
			</header><!-- .entry-header -->
			<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta">
					<?php understrap_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
			<footer class="entry-footer">
				<?php /*understrap_entry_footer(); */?>
			</footer><!-- .entry-footer -->
		</div></div>
		<?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>
	</article><!-- #post-## -->