jQuery(document).ready(function($) {
	/* Move widgets to their respective sections */
	wp.customize.section( 'sidebar-widgets-services-widgets' ).panel( 'tierradentro_services_section' );
	wp.customize.section( 'sidebar-widgets-services-widgets' ).priority( '10' );
	//wp.customize.section( 'sidebar-widgets-portfolio-widgets' ).panel( 'tierradentro_portfolio_section' );
	//wp.customize.section( 'sidebar-widgets-portfolio-widgets' ).priority( '10' );
	wp.customize.section( 'sidebar-widgets-team-widgets' ).panel( 'tierradentro_team_section' );
	wp.customize.section( 'sidebar-widgets-team-widgets' ).priority( '10' );
	wp.customize.section( 'sidebar-widgets-footerfull' ).panel( 'tierradentro_footer_section' );
	wp.customize.section( 'sidebar-widgets-footerfull' ).priority( '10' );
	//wp.customize.section( 'sidebar-widgets-subscribe-widgets' ).panel( 'latte_subscribe_settings' );
	//wp.customize.section( 'sidebar-widgets-subscribe-widgets' ).priority( '15' );

	function media_upload(button_selector) {
	    var _custom_media = true,
	        _orig_send_attachment = wp.media.editor.send.attachment;
	    $('body').on('click', button_selector, function () {
	      var button_id = $(this).attr('id');
	      wp.media.editor.send.attachment = function (props, attachment) {
	        if (_custom_media) {
	          $('.' + button_id + '_img').attr('src', attachment.url);
	          $('.' + button_id + '_url').val(attachment.url).trigger('change');
	        } else {
	          return _orig_send_attachment.apply($('#' + button_id), [props, attachment]);
	        }
	      }
	      wp.media.editor.open($('#' + button_id));
	      return false;
	    });
	}
	media_upload('.js_custom_upload_media');

});
