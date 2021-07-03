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
		<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>'); ?>
		</header><!-- .entry-header -->
		<footer class="entry-footer">
			<?php understrap_entry_footer(); ?>
		</footer><!-- .entry-footer -->
			<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta">
					<?php understrap_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
	</article><!-- #post-## -->