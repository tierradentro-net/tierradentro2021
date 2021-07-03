<?php
	$tierradentro_slogan_title = get_theme_mod('tierradentro_slogan_title',__( 'Slogan', 'tierradentro2021' ));
	$tierradentro_slogan_subtitle = get_theme_mod('tierradentro_slogan_subtitle',__( 'More info .', 'tierradentro2021' ));
	$tierradentro_slogan_content = get_theme_mod('tierradentro_slogan_content',__( 'One strong phrase.', 'tierradentro2021' ));
?>

		<section class="slogan" id="slogan">
			<div class="container">
				<div class="row">
					<?php if(!empty($tierradentro_slogan_title) || !empty($tierradentro_slogan_subtitle) || is_customize_preview()) : ?>
						<header data-sr="ease-in-out wait 0.25s" class="slogan-header">
						<?php if(!empty($tierradentro_slogan_title) || is_customize_preview()) : ?>
							<h3><?php echo esc_html($tierradentro_slogan_title); ?></h3>
						<?php endif; ?>
						<?php if(!empty($tierradentro_slogan_subtitle) || is_customize_preview()) : ?>
							<h4><?php echo esc_html($tierradentro_slogan_subtitle); ?></h4>
						<?php endif; ?>
						</header>
					<?php endif; ?>
				</div>
				<div class="row slogan-content">		
						<div data-sr="enter top wait 0.25s" class="col-md-12">
						<?php if(!empty($tierradentro_slogan_content) || is_customize_preview()) : ?>
							<h5><?php echo wp_kses_post($tierradentro_slogan_content); ?></h5>
						<?php endif; ?>
						</div>
				</div>
			</div>
		</section>