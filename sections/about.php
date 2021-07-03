<?php
	$tierradentro_about_title = get_theme_mod('tierradentro_about_title',__( 'About Me', 'tierradentro2021' ));
	$tierradentro_about_subtitle = get_theme_mod('tierradentro_about_subtitle',__( 'More info .', 'tierradentro2021' ));
	$tierradentro_about_image = get_theme_mod('tierradentro_about_image', '');
	$tierradentro_about_embed = get_theme_mod('tierradentro_about_embed', '');
	/*$tierradentro_about_name = get_theme_mod('tierradentro_about_name',__( 'John Doe', 'tierradentro2021' ));
	$tierradentro_about_position = get_theme_mod('tierradentro_about_position',__( 'Web Designer', 'tierradentro2021' ));*/
	$tierradentro_about_content = get_theme_mod('tierradentro_about_content',__( 'Theme Tierradentro 2021. Customizable One Page and Sections.', 'tierradentro2021' ));
	$tierradentro_about_button_text = get_theme_mod('tierradentro_about_button_text', '' );
	$tierradentro_about_button_link = get_theme_mod('tierradentro_about_button_link', '' );
?>

		<section class="about" id="about">
			<div class="container">
				<div class="row">
					<?php if(!empty($tierradentro_about_title) || !empty($tierradentro_about_subtitle) || is_customize_preview()) : ?>
						<header data-sr="ease-in-out wait 0.25s" class="about-header">
						<?php if(!empty($tierradentro_about_title) || is_customize_preview()) : ?>
							<h3><?php echo esc_html($tierradentro_about_title); ?></h3>
						<?php endif; ?>
						<?php if(!empty($tierradentro_about_subtitle) || is_customize_preview()) : ?>
							<h4><?php echo esc_html($tierradentro_about_subtitle); ?></h4>
						<?php endif; ?>
						</header>
					<?php endif; ?>
				</div>
				<div class="row about-content">		
					<?php if(!empty($tierradentro_about_image)) : ?>
						<div data-sr="enter left wait 0.25s" class="col-md-8 about-video">
							<img src="<?php echo esc_url($tierradentro_about_image); ?>" class="about-image img-responsive"/>
								<?php if(!empty($tierradentro_about_embed)) : ?>
									<i class="fa fa-play-circle-o about-play" aria-hidden="true" data-toggle="modal" data-target="#aboutVideoModal">
									</i><div class=about-play-text>DALE PLAY</div>
									<!-- Modal -->
									<div class="modal fade" id="aboutVideoModal" tabindex="-1" role="dialog" aria-labelledby="aboutVideoModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
											<?php echo wp_oembed_get( $tierradentro_about_embed );  ?>
										</div>
									  </div>
									</div>
							<?php endif; ?>
						</div>
					<?php elseif(empty($tierradentro_about_image) && is_customize_preview()) : ?>
						<div data-sr="enter left wait 0.25s" class="col-md-8">
							<img src="<?php echo esc_url($tierradentro_about_image); ?>" class="about-image img-responsive customizer-hidden"/>
						</div>
					<?php endif; ?>

					<?php if(!empty($tierradentro_about_embed) || !empty($tierradentro_about_image)) : ?>
						<div data-sr="enter right wait 0.25s" class="col-md-4">
					<?php else: ?>
						<div data-sr="enter top wait 0.25s" class="col-md-12">
					<?php endif; ?>
							<!--<?php if(!empty($tierradentro_about_name) || is_customize_preview()) : ?>
								<h3 class="name"><?php echo esc_html($tierradentro_about_name); ?></h3>
							<?php endif; ?>
							<?php if(!empty($tierradentro_about_position) || is_customize_preview()) : ?>
								<span class="text-muted"><?php echo esc_html($tierradentro_about_position); ?></span>
							<?php endif; ?>-->
							<?php if(!empty($tierradentro_about_content) || is_customize_preview()) : ?>
								<h5><?php echo wp_kses_post($tierradentro_about_content); ?></h5>
							<?php endif; ?>
						 	<?php if( !empty($tierradentro_about_button_text) ) { ?>
									<div class="div-button div-button-section">
										<a href="<?php echo esc_url($tierradentro_about_button_link); ?>">
										<button type="button" class="btn btn-primary btn-lg about-button"><?php echo esc_html($tierradentro_about_button_text); ?></button>
										</a>
									</div>
							<?php } ?>
						</div>
				</div>
			</div>
		</section>