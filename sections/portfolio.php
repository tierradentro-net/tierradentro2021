<?php
	$tierradentro_portfolio_title = get_theme_mod('tierradentro_portfolio_title',__( 'Portfolio', 'tierradentro2021' ));
	$tierradentro_portfolio_subtitle = get_theme_mod('tierradentro_portfolio_subtitle',__( 'My work.', 'tierradentro2021' ));
	$tierradentro_portfolio_button_text = get_theme_mod('tierradentro_portfolio_button_text', '' );
	$tierradentro_portfolio_button_link = get_theme_mod('tierradentro_portfolio_button_link', '' );
?>

		<section class="portfolio" id="portfolio">
			<div class="container">
				<?php if(!empty($tierradentro_portfolio_title) || !empty($tierradentro_portfolio_subtitle) || is_customize_preview() ) : ?>
				<div class="row">
					<header data-sr="ease-in-out wait 0.25s" class="portfolio-header">
					<?php if(!empty($tierradentro_portfolio_title) || is_customize_preview() ) : ?>
						<h3><?php echo esc_html($tierradentro_portfolio_title); ?></h3>
					<?php endif; ?>
					<?php if(!empty($tierradentro_portfolio_subtitle) || is_customize_preview() ) : ?>
						<h4><?php echo esc_html($tierradentro_portfolio_subtitle); ?></h4>
					<?php endif; ?>
					</header>
				</div>
				<?php endif; ?>

				<div data-sr="enter bottom wait 0.25s" class="slider portfolio-slide">
					<?php 
					$args = array(
					'category_name' => 'proyectos-propagados',
					//'post__in'      => get_option( 'sticky_posts' ),
					);
					$the_query = new WP_Query( $args ); ?>
					<?php if ( $the_query->have_posts() ) : ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<div class="portfolio-slider-box">
								<div class="portfolio-item">
									<div class="portfolio-container">
										<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
											<?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>
											<div class="portfolio-middle"><div class="portfolio-text">
												<header class="entry-header portfolio-title">
													<?php
													the_title(
														sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),'</a></h4>');
													?>
												</header>
											</div></div>
										</article>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php else : ?>
					   <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>
				</div><!-- slider -->

			 	<?php if( !empty($tierradentro_portfolio_button_text) ) { ?>
			 		<div data-sr="ease-in-out wait 0.25s" class="row">
						<div class="div-button div-button-section">
							<a href="<?php echo esc_url($tierradentro_portfolio_button_link); ?>">
							<button type="button" class="btn btn-primary btn-lg portfolio-button"><?php echo esc_html($tierradentro_portfolio_button_text); ?></button>
							</a>
						</div>
					</div>
				<?php } ?>
			</div>
		</section>