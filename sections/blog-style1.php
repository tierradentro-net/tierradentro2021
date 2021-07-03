<?php
	$tierradentro_blog_title = get_theme_mod('tierradentro_blog_title',__( 'blog', 'tierradentro2021' ));
	$tierradentro_blog_subtitle = get_theme_mod('tierradentro_blog_subtitle',__( 'My work.', 'tierradentro2021' ));
	$tierradentro_blog_button_text = get_theme_mod('tierradentro_blog_button_text', '' );
	$tierradentro_blog_button_link = get_theme_mod('tierradentro_blog_button_link', '' );
?>
		<section class="blog" id="blog">
			<div class="container">
				<?php if(!empty($tierradentro_blog_title) || !empty($tierradentro_blog_subtitle) || is_customize_preview() ) : ?>
				<div class="row">
					<header data-sr="ease-in-out wait 0.25s" class="blog-header">
					<?php if(!empty($tierradentro_blog_title) || is_customize_preview() ) : ?>
						<h3><?php echo esc_html($tierradentro_blog_title); ?></h3>
					<?php endif; ?>
					<?php if(!empty($tierradentro_blog_subtitle) || is_customize_preview() ) : ?>
						<h4><?php echo esc_html($tierradentro_blog_subtitle); ?></h4>
					<?php endif; ?>
					</header>
				</div>
				<?php endif; ?>
				<div class="row blog-box">
					<?php 
					$args = array(
				    'category_name' => 'blog',
				    'posts_per_page' => 3
					);
					$the_query = new WP_Query( $args ); ?>
					<?php if ( $the_query->have_posts() ) : ?>
					    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<div data-sr="enter bottom wait 0.25s" class="blog-item col-md-4 col-sm-6"><div class="blog-item-container">
								<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
									<a href="<?php echo esc_url( get_permalink() ); ?>">
										<?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>
									</a>
										<header class="entry-header">
											<?php
											the_title(
												sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),'</a></h4>');
											?>
										</header><!-- .entry-header -->
								</article><!-- #post-## -->
							</div></div>
					    <?php endwhile; ?>
					    <?php wp_reset_postdata(); ?>
					 
					<?php else : ?>
					    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>
					<?php /*
						if ( is_active_sidebar( 'blog-widgets' ) ) :
							dynamic_sidebar( 'blog-widgets' );
						endif;*/
					?>
				</div>
			 	<?php if( !empty($tierradentro_blog_button_text) ) { ?>
			 		<div data-sr="ease-in-out wait 0.25s" class="row">
						<div class="div-button div-button-section">
							<a href="<?php echo esc_url($tierradentro_blog_button_link); ?>">
							<button type="button" class="btn btn-primary btn-lg blog-button"><?php echo esc_html($tierradentro_blog_button_text); ?></button>
							</a>
						</div>
					</div>
				<?php } ?>
			</div>
		</section>