<?php
/**
 * Intro section setup.
 *
 * @package tierradentro2021
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$tierradentro_intro_logo = get_theme_mod('tierradentro_intro_logo');
$tierradentro_intro_align = get_theme_mod('tierradentro_intro_align');
$tierradentro_intro_image1 = get_theme_mod('tierradentro_intro_image1', '' );
$tierradentro_intro_image2 = get_theme_mod('tierradentro_intro_image2', '' );
$tierradentro_intro_image3 = get_theme_mod('tierradentro_intro_image3', '' );
$tierradentro_intro_background_color = get_theme_mod('tierradentro_intro_background_color', '' );
$tierradentro_intro_button_text = get_theme_mod('tierradentro_intro_button_text', '' );
$tierradentro_intro_button_link = get_theme_mod('tierradentro_intro_button_link', '' );

?>

		<section class="intro" id="intro">
			<div class="container-fluid">
				<div class="row color-overlay">
					<div class="col-md-12">
						<?php if(!empty($tierradentro_intro_image1) || !empty($tierradentro_intro_image2) || !empty($tierradentro_intro_image3)) : ?>
							<!-- CAROUSEL -->
							<div id="carouselExampleControls" class="carousel slide fullwidth" data-ride="carousel"  data-interval="4000">
								<div class="carousel-inner" role="listbox">
											<?php if(!empty($tierradentro_intro_image1)) : ?>
												<div class="carousel-item"><img src="<?php echo esc_url($tierradentro_intro_image1); ?>');" class="intro-image1 img-cover"></div>
											<?php endif; ?>
											<?php if(!empty($tierradentro_intro_image2)) : ?>
												<div class="carousel-item"><img src="<?php echo esc_url($tierradentro_intro_image2); ?>');" class="intro-image2 img-cover"></div>
											<?php endif; ?>
											<?php if(!empty($tierradentro_intro_image3)) : ?>
												<div class="carousel-item"><img src="<?php echo esc_url($tierradentro_intro_image3); ?>');" class="intro-image3 img-cover"></div>
											<?php endif; ?>
								</div>
								<!--<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only"><?php esc_html_e( 'Previous', 'understrap' ); ?></span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only"><?php esc_html_e( 'Next', 'understrap' ); ?></span>
								</a>-->
							</div><!-- .carousel -->
							<script>
								jQuery( ".carousel-item" ).first().addClass( "active" );
							</script>
						<?php endif; ?>
						<!-- CABEZA Y DESCRIPCIÓN -->
						<div class="cover-container cover-<?php echo esc_html($tierradentro_intro_align); ?>">
							<div class="container">
								<div class=" cover-width-<?php echo esc_html($tierradentro_intro_align); ?>">
			 					<!-- LOGO -->
			 					<?php if( isset($tierradentro_intro_logo) && $tierradentro_intro_logo == 1 ) {
									if ( function_exists( 'the_custom_logo' ) ) { ?>
										<div class="div-custom-logo">
									 		<?php the_custom_logo(); ?>
									 </div>
								<?php } 
								}else{ ?>
										<h1 class="site-description"><?php bloginfo( 'title' ); ?>
								<?php } ?>
								<h2 class="site-description"><?php bloginfo( 'description' ); ?> de <span class="animated-text"></span></h2>
			 					<?php if( !empty($tierradentro_intro_button_text) ) { ?>
										<div class="div-button">
											<a href="<?php echo esc_url($tierradentro_intro_button_link); ?>">
									 		<button type="button" class="btn btn-primary btn-lg intro-button"><?php echo esc_html($tierradentro_intro_button_text); ?></button></a>
									 </div>
								<?php } ?>
								</div>
						 	</div>
						</div>

					</div>
				</div>
			</div>
		</section>