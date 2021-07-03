<?php
	$tierradentro_subscribe_title = get_theme_mod('tierradentro_subscribe_title',__( 'subscribe', 'tierradentro2021' ));
	$tierradentro_subscribe_subtitle = get_theme_mod('tierradentro_subscribe_subtitle',__( 'Send me a message.', 'tierradentro2021' ));
	$tierradentro_subscribe_form = get_theme_mod('tierradentro_subscribe_form',__( '', 'tierradentro2021' ));
?>

		<section class="subscribe" id="subscribe">
			<div class="container">
				<div class="row">
					<?php if(!empty($tierradentro_subscribe_title) || !empty($tierradentro_subscribe_subtitle) || is_customize_preview()) : ?>
						<header data-sr="ease-in-out wait 0.25s" class="subscribe-header">
						<?php if(!empty($tierradentro_subscribe_title) || is_customize_preview()) : ?>
							<h3><?php echo esc_html($tierradentro_subscribe_title); ?></h3>
						<?php endif; ?>
						<?php if(!empty($tierradentro_subscribe_subtitle) || is_customize_preview()) : ?>
							<h4><?php echo esc_html($tierradentro_subscribe_subtitle); ?></h4>
						<?php endif; ?>
						</header>
					<?php endif; ?>
				</div>
				<div class="row subscribe-content">		
						<div data-sr="enter top wait 0.25s" class="col-md-12">
							<?php if(!empty($tierradentro_subscribe_form)): ?>
								<?php echo do_shortcode($tierradentro_subscribe_form); ?>
							<?php endif; ?>
						</div>
				</div>
			</div>
		</section>