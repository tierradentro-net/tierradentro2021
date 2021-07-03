<?php
/**
 * Services Widget - Tierradentro
 */

class tierradentro_services_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'tierradentro_services_widget',
			__( 'Services Widget', 'tierradentro2021' ),
			array( 'description' => __( 'Services widget for Tierradentro theme\'s Services section.', 'tierradentro2021' ), )
		);
	}

	function form($instance) {
		include get_template_directory() . "/inc/other/font-awesome.php";
		$instance = wp_parse_args( (array) $instance, array( 'icon' => 'fa-glass' ));
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title', 'tierradentro2021'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php if( !empty($instance['title']) ): echo esc_html( $instance['title'] ); endif; ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('subtitle') ); ?>"><?php esc_html_e('Subtitle', 'tierradentro2021'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('subtitle') ); ?>" name="<?php echo esc_attr( $this->get_field_name('subtitle') ); ?>" type="text" value="<?php if( !empty($instance['subtitle']) ): echo esc_html( $instance['subtitle'] ); endif; ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('type') ); ?>"><?php esc_html_e('Icon Type', 'tierradentro2021'); ?></label>
			<select class='fa widefat' id="<?php echo esc_attr( $this->get_field_id('type') ); ?>" name="<?php echo esc_attr( $this->get_field_name('type') ); ?>">
				<option value="0" <?php if (isset($instance['type'])): if ($instance['type'] == 0): echo 'selected="selected"'; endif; endif; ?>><?php _e('Font Awesome', 'tierradentro2021'); ?></option>
				<option value="1" <?php if (isset($instance['type'])): if ($instance['type'] == 1): echo 'selected="selected"'; endif; endif; ?>><?php _e('Image', 'tierradentro2021'); ?></option>
			</select>
			<label><?php _e('Save the widget before selecting icon if you change this.', 'tierradentro2021'); ?></label>
		</p>
		<?php if( !isset($instance['type']) || $instance['type'] == 0 ): ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('icon') ); ?>"><?php esc_html_e('Icon', 'tierradentro2021'); ?></label>
			<select class='fa widefat' id="<?php echo esc_attr( $this->get_field_id('icon') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon') ); ?>">
			<?php foreach($fontawesome as $key => $value): ?>
				<option value="<?php echo esc_html($key); ?>" <?php if (isset($instance['icon'])): if ($instance['icon'] == $key): echo 'selected="selected"'; endif; endif; ?>>&#x<?php echo esc_html($value); ?> <?php echo esc_html($key); ?></option>
			<?php endforeach; ?>
			</select>
			<label><a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/"><?php _e('Click here to see a list of icons.', 'tierradentro2021'); ?></a></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('image') ); ?>" name="<?php echo esc_attr( $this->get_field_name('image') ); ?>" type="hidden" value="<?php if( !empty($instance['image']) ): echo esc_url($instance['image']); endif; ?>" />
		</p>
		<?php elseif( isset($instance['type']) && $instance['type'] == 1 ): ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('image') ); ?>"><?php esc_html_e('Image URL', 'tierradentro2021'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('image') ); ?>" name="<?php echo esc_attr( $this->get_field_name('image') ); ?>" type="url" value="<?php if( !empty($instance['image']) ): echo esc_url($instance['image']); endif; ?>" />
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon') ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon') ); ?>" type="hidden" value="<?php if( !empty($instance['icon']) ): echo esc_html($instance['icon']); endif; ?>" />
		</p>
		<?php endif; ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('link') ); ?>"><?php esc_html_e('Link', 'tierradentro2021'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link') ); ?>" type="url" value="<?php if( !empty($instance['link']) ): echo esc_url($instance['link']); endif; ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('newwindow') ); ?>"><?php esc_html_e('Open In New Window?', 'tierradentro2021'); ?></label> 
			<input type="hidden" name="<?php echo esc_attr( $this->get_field_name('newwindow') ); ?>" value="0" />
			<input id="<?php echo esc_attr( $this->get_field_id('newwindow') ); ?>" name="<?php echo esc_attr( $this->get_field_name('newwindow') ); ?>" type="checkbox" value="1" <?php if (isset($instance['newwindow'])) : if (1 == $instance['newwindow']) echo 'checked="checked"'; endif ?> />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('text') ); ?>"><?php esc_html_e('Text', 'tierradentro2021'); ?></label> 
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id('text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('text') ); ?>"><?php if( !empty($instance['text']) ): echo wp_kses_post( force_balance_tags( $instance['text'] ) ); endif; ?></textarea>
		</p>
		<?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = esc_html($new_instance['title']);
		$instance['subtitle'] = esc_html($new_instance['subtitle']);
		$instance['type'] = intval($new_instance['type']);
		$instance['icon'] = esc_html($new_instance['icon']);
		$instance['image'] = esc_url($new_instance['image']);
		$instance['link'] = esc_url($new_instance['link']);
		$instance['newwindow'] = intval($new_instance['newwindow']);
		$instance['text'] = wp_kses_post(force_balance_tags( $new_instance['text']));
		return $instance;
	}
 
	function widget($args, $instance) {
		extract( $args );
		?>
			<?php echo $before_widget; ?>
					<div data-sr="enter bottom wait 0.25s" class="col-md-4 service-box">
						<div class="flip-card">
							<div class="flip-card-inner">
								<div class="flip-card-front">
										<?php if( !empty($instance['icon']) || !empty($instance['image']) ): ?>
											<div class="service-icon">
												<a <?php if (isset($instance['newwindow'])) : if (1 == $instance['newwindow']) echo 'target="_blank"'; endif ?> <?php if( !empty($instance['link']) ): echo 'href="'.esc_url($instance['link']).'"'; endif; ?>>
												<?php if( isset($instance['type']) && $instance['type'] == 0 ): ?>
													<i class="fa <?php echo esc_html($instance['icon']); ?>"></i>
												<?php elseif( isset($instance['type']) && $instance['type'] == 1 ): ?>
													<?php if( !empty($instance['image']) ): ?>
													<img src="<?php echo esc_url($instance['image']); ?>" />
													<?php endif; ?>
												<?php endif; ?>
												</a>
											</div>
										<?php endif; ?>
										<div class="service-item">
											<?php if( !empty($instance['title']) ): ?>
												<div class="service-title"><h3><?php echo esc_html($instance['title']); ?></h3></div>
											<?php endif; ?>
											<?php if( !empty($instance['subtitle']) ): ?>
												<div class="service-subtitle"><?php echo esc_html($instance['subtitle']); ?></div>
											<?php endif; ?>
										</div>
								</div>
								<div class="flip-card-back">
											<?php if( !empty($instance['text']) ): ?>
												<div class="service-content"><?php echo wp_kses_post( force_balance_tags( $instance['text'] ) ); ?></div>
											<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
			<?php echo $after_widget; ?>
		<?php
	}

}

add_action('widgets_init', create_function('', 'return register_widget("tierradentro_services_widget");'));
?>