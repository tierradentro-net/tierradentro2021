<?php
	$tierradentro_contact_title = get_theme_mod('tierradentro_contact_title',__( 'Contact', 'tierradentro2021' ));
	$tierradentro_contact_subtitle = get_theme_mod('tierradentro_contact_subtitle',__( 'Send me a message.', 'tierradentro2021' ));
	$tierradentro_contact_form = get_theme_mod('tierradentro_contact_form',__( '', 'tierradentro2021' ));
?>

		<section class="contact" id="contact">
			<div class="container">
				<div class="row">
					<?php if(!empty($tierradentro_contact_title) || !empty($tierradentro_contact_subtitle) || is_customize_preview()) : ?>
						<header data-sr="ease-in-out wait 0.25s" class="contact-header">
						<?php if(!empty($tierradentro_contact_title) || is_customize_preview()) : ?>
							<h3><?php echo esc_html($tierradentro_contact_title); ?></h3>
						<?php endif; ?>
						<?php if(!empty($tierradentro_contact_subtitle) || is_customize_preview()) : ?>
							<h4><?php echo esc_html($tierradentro_contact_subtitle); ?></h4>
						<?php endif; ?>
						</header>
					<?php endif; ?>
				</div>
				<div class="row contact-content">		
						<div data-sr="enter top wait 0.25s" class="col-md-12">
							<?php if(!empty($tierradentro_contact_form)): ?>
								<?php echo do_shortcode($tierradentro_contact_form); ?>
							<?php endif; ?>
						</div>
				</div>
			</div>
		</section>