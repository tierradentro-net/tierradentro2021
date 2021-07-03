<?php
/**
 * Team Widget - Tierradentro
 */

class tierradentro_team_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'tierradentro_team_widget',
			__( 'Team Widget', 'tierradentro2021' ),
			array( 'description' => __( 'Team widget for Tierradentro theme\'s Team section.', 'tierradentro2021' ), )
		);
	}

	function form($instance) {
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Name', 'tierradentro2021'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php if( !empty($instance['title']) ): echo esc_html( $instance['title'] ); endif; ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('subtitle') ); ?>"><?php esc_html_e('Position', 'tierradentro2021'); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('subtitle') ); ?>" name="<?php echo esc_attr( $this->get_field_name('subtitle') ); ?>" type="text" value="<?php if( !empty($instance['subtitle']) ): echo esc_html( $instance['subtitle'] ); endif; ?>" />
		</p>
	    <p>
	        <label for="<?= $this->get_field_id( 'image_uri' ); ?>">Image (500x600)</label>
	        <img class="<?= $this->id ?>_img" src="<?= (!empty($instance['image_uri'])) ? $instance['image_uri'] : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
	        <input type="text" id="<?php echo esc_attr( $this->get_field_id('image_uri') ); ?>_url"  class="widefat <?= $this->id ?>_url" name="<?= $this->get_field_name( 'image_uri' ); ?>" value="<?= $instance['image_uri']; ?>" style="margin-top:5px;" />
	        <input type="button" id="<?= $this->id ?>" class="button button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;" />
	    </p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('text') ); ?>"><?php esc_html_e('Description', 'tierradentro2021'); ?></label> 
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id('text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('text') ); ?>"><?php if( !empty($instance['text']) ): echo wp_kses_post( force_balance_tags( $instance['text'] ) ); endif; ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('link') ); ?>"><?php esc_html_e('Link', 'tierradentro2021'); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link') ); ?>" type="url" value="<?php if( !empty($instance['link']) ): echo esc_url($instance['link']); endif; ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('link_text') ); ?>"><?php esc_html_e('Link text', 'tierradentro2021'); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_text') ); ?>" type="text" value="<?php if( !empty($instance['link_text']) ): echo esc_html($instance['link_text']); endif; ?>" />
		</p>
		<?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = esc_html($new_instance['title']);
		$instance['subtitle'] = esc_html($new_instance['subtitle']);
		$instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
		$instance['text'] = wp_kses_post(force_balance_tags( $new_instance['text']));
		$instance['link'] = esc_url($new_instance['link']);
		$instance['link_text'] = esc_html($new_instance['link_text']);
		return $instance;
	}
 
	function widget($args, $instance) {
		extract( $args );
		?>
			<?php echo $before_widget; ?>
					<div class="team-box">
						<div class="team-item">
							<div class="team-container">
								<?php if( !empty($instance['image_uri']) ): ?>
							 		 <img src="<?php echo esc_url($instance['image_uri']); ?>" alt="<?php echo esc_html($instance['title']); ?>" class="team-image" style="width:100%">
							 	<?php endif; ?>
							  <div class="team-middle">
							    <div class="team-text">
							    	<?php if( !empty($instance['title']) ): ?>
										<div class="team-title"><h3><?php echo esc_html($instance['title']); ?></h3></div>
									<?php endif; ?>
									<?php if( !empty($instance['subtitle']) ): ?>
										<div class="team-subtitle"><?php echo esc_html($instance['subtitle']); ?></div>
									<?php endif; ?>
									<?php if( !empty($instance['text']) ): ?>
										<div class="team-content"><?php echo wp_kses_post( force_balance_tags( $instance['text'] ) ); ?></div>
									<?php endif; ?>
									<?php if( !empty($instance['link']) ): ?>
										<div class="team-link"><a href="<?php echo esc_url($instance['link']); ?>" target="_new"><?php echo esc_html($instance['link_text']); ?></a></div>
									<?php endif; ?>
							    </div>
							  </div>
							</div>
						</div>
					</div>
			<?php echo $after_widget; ?>
		<?php
	}

}

add_action('widgets_init', create_function('', 'return register_widget("tierradentro_team_widget");'));
?>