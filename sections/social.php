<?php
	$tierradentro_social_facebook = get_theme_mod('tierradentro_social_facebook', 'https://www.facebook.com');
	$tierradentro_social_twitter = get_theme_mod('tierradentro_social_twitter', 'https://www.twitter.com');
	$tierradentro_social_instagram = get_theme_mod('tierradentro_social_instagram', 'https://www.instagram.com');
	$tierradentro_social_youtube = get_theme_mod('tierradentro_social_youtube', 'https://www.youtube.com');
	$tierradentro_social_linkedin = get_theme_mod('tierradentro_social_linkedin', 'https://www.linkedin.com');
	$tierradentro_social_behance = get_theme_mod('tierradentro_social_behance', 'https://www.behance.com');
	$tierradentro_social_vimeo = get_theme_mod('tierradentro_social_vimeo', 'https://www.vimeo.com');
	$tierradentro_social_github = get_theme_mod('tierradentro_social_github', 'https://www.github.com');

?>

		<section class="social" id="social">
			<!--<div class="container">-->
					<?php if(!empty($tierradentro_social_facebook)) : ?>
								<div class="icon  it-facebook"><a href="<?php echo esc_url($tierradentro_social_facebook); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
					<?php elseif(empty($tierradentro_social_facebook) && is_customize_preview()) : ?>
								<div class="icon it-facebook customizer-hidden"><a href="<?php echo esc_url($tierradentro_social_facebook); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
					<?php endif; ?>
					<?php if(!empty($tierradentro_social_instagram)) : ?>
								<div class="icon it-instagram"><a href="<?php echo esc_url($tierradentro_social_instagram); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></div>
					<?php elseif(empty($tierradentro_social_instagram) && is_customize_preview()) : ?>
								<div class="icon it-instagram customizer-hidden"><a href="<?php echo esc_url($tierradentro_social_instagram); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></div>
					<?php endif; ?>
					<?php if(!empty($tierradentro_social_twitter)) : ?>
								<div class="icon it-twitter"><a href="<?php echo esc_url($tierradentro_social_twitter); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
					<?php elseif(empty($tierradentro_social_twitter) && is_customize_preview()) : ?>
								<div class="icon it-twitter customizer-hidden"><a href="<?php echo esc_url($tierradentro_social_twitter); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
					<?php endif; ?>
					<?php if(!empty($tierradentro_social_youtube)) : ?>
								<div class="icon it-youtube"><a href="<?php echo esc_url($tierradentro_social_youtube); ?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></div>
					<?php elseif(empty($tierradentro_social_youtube) && is_customize_preview()) : ?>
								<div class="icon it-youtube customizer-hidden"><a href="<?php echo esc_url($tierradentro_social_youtube); ?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></div>
					<?php endif; ?>
					<?php if(!empty($tierradentro_social_linkedin)) : ?>
								<div class="icon it-linkedin"><a href="<?php echo esc_url($tierradentro_social_linkedin); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></div>
					<?php elseif(empty($tierradentro_social_linkedin) && is_customize_preview()) : ?>
								<div class="icon it-linkedin customizer-hidden"><a href="<?php echo esc_url($tierradentro_social_linkedin); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></div>
					<?php endif; ?>
					<?php if(!empty($tierradentro_social_behance)) : ?>
								<div class="icon it-behance"><a href="<?php echo esc_url($tierradentro_social_behance); ?>" target="_blank"><i class="fa fa-behance" aria-hidden="true"></i></a></div>
					<?php elseif(empty($tierradentro_social_behance) && is_customize_preview()) : ?>
								<div class="icon it-behance customizer-hidden"><a href="<?php echo esc_url($tierradentro_social_behance); ?>" target="_blank"><i class="fa fa-behance" aria-hidden="true"></i></a></div>
					<?php endif; ?>
					<?php if(!empty($tierradentro_social_vimeo)) : ?>
								<div class="icon it-vimeo"><a href="<?php echo esc_url($tierradentro_social_vimeo); ?>" target="_blank"><i class="fa fa-vimeo" aria-hidden="true"></i></a></div>
					<?php elseif(empty($tierradentro_social_vimeo) && is_customize_preview()) : ?>
								<div class="icon it-vimeo customizer-hidden"><a href="<?php echo esc_url($tierradentro_social_vimeo); ?>" target="_blank"><i class="fa fa-vimeo" aria-hidden="true"></i></a></div>
					<?php endif; ?>
					<?php if(!empty($tierradentro_social_github)) : ?>
								<div class="icon it-github"><a href="<?php echo esc_url($tierradentro_social_github); ?>" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a></div>
					<?php elseif(empty($tierradentro_social_github) && is_customize_preview()) : ?>
								<div class="icon it-github customizer-hidden"><a href="<?php echo esc_url($tierradentro_social_github); ?>" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a></div>
					<?php endif; ?>
			<!--</div>-->
		</section>
