<?php
	$tierradentro_services_title = get_theme_mod('tierradentro_services_title',__( 'Services', 'tierradentro2021' ));
	$tierradentro_services_subtitle = get_theme_mod('tierradentro_services_subtitle',__( 'Things that I work on.', 'tierradentro2021' ));
?>

		<section class="services" id="services">
			<div class="container">
				<?php if(!empty($tierradentro_services_title) || !empty($tierradentro_services_subtitle) || is_customize_preview() ) : ?>
				<div class="row">
					<header data-sr="ease-in-out wait 0.25s" class="services-header">
					<?php if(!empty($tierradentro_services_title) || is_customize_preview() ) : ?>
						<h3><?php echo esc_html($tierradentro_services_title); ?></h3>
					<?php endif; ?>
					<?php if(!empty($tierradentro_services_subtitle) || is_customize_preview() ) : ?>
						<h4><?php echo esc_html($tierradentro_services_subtitle); ?></h4>
					<?php endif; ?>
					</header>
				</div>
				<?php endif; ?>
				<div class="row">
					<?php
						if ( is_active_sidebar( 'services-widgets' ) ) :
							dynamic_sidebar( 'services-widgets' );
						else:
							the_widget( 'tierradentro_services_widget', array(
								'title' => esc_html__('Title', 'tierradentro2021'),
								'subtitle' => esc_html__('Subtitle', 'tierradentro2021'),
								'type' => 0,
								'icon' => 'fa-html5',
								'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'tierradentro2021'),
							));
							the_widget( 'tierradentro_services_widget', array(
								'title' => esc_html__('CSS', 'tierradentro2021'),
								'subtitle' => esc_html__('Subtitle', 'tierradentro2021'),
								'type' => 0,
								'icon' => 'fa-css3',
								'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'tierradentro2021'),
							));
							the_widget( 'tierradentro_services_widget', array(
								'title' => esc_html__('WordPress', 'tierradentro2021'),
								'subtitle' => esc_html__('Subtitle', 'tierradentro2021'),
								'type' => 0,
								'icon' => 'fa-wordpress',
								'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'tierradentro2021'),
							));
						endif;
					?>
				</div>
			</div>
		</section>
