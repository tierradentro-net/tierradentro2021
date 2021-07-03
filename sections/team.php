<?php
	$tierradentro_team_title = get_theme_mod('tierradentro_team_title',__( 'team', 'tierradentro2021' ));
	$tierradentro_team_subtitle = get_theme_mod('tierradentro_team_subtitle',__( 'My work.', 'tierradentro2021' ));
	$tierradentro_team_button_text = get_theme_mod('tierradentro_team_button_text', '' );
	$tierradentro_team_button_link = get_theme_mod('tierradentro_team_button_link', '' );
?>

		<section class="team" id="team">
			<div class="container">
				<?php if(!empty($tierradentro_team_title) || !empty($tierradentro_team_subtitle) || is_customize_preview() ) : ?>
				<div class="row">
					<header data-sr="ease-in-out wait 0.25s" class="team-header">
					<?php if(!empty($tierradentro_team_title) || is_customize_preview() ) : ?>
						<h3><?php echo esc_html($tierradentro_team_title); ?></h3>
					<?php endif; ?>
					<?php if(!empty($tierradentro_team_subtitle) || is_customize_preview() ) : ?>
						<h4><?php echo esc_html($tierradentro_team_subtitle); ?></h4>
					<?php endif; ?>
					</header>
				</div>
				<?php endif; ?>
				<!--<div class="row">-->
					<div data-sr="enter bottom wait 0.25s" class="slider team-slide">
					<?php
						if ( is_active_sidebar( 'team-widgets' ) ) :
							dynamic_sidebar( 'team-widgets' );
						endif;
					?>
					</div><!-- slider -->
				<!--</div>-->
			 	<?php if( !empty($tierradentro_team_button_text) ) { ?>
			 		<div data-sr="ease-in-out wait 0.25s" class="row">
						<div class="div-button div-button-section">
							<a href="<?php echo esc_url($tierradentro_team_button_link); ?>">
							<button type="button" class="btn btn-primary btn-lg team-button"><?php echo esc_html($tierradentro_team_button_text); ?></button>
							</a>
						</div>
					</div>
				<?php } ?>
			</div>
		</section>