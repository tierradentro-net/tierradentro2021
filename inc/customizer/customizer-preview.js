/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	//GENERAL
	wp.customize( 'tierradentro_skin_color', function( value ) {
		value.bind( function( to ) {
			$( '.btn' ).css( {
				'background': to,
				'border-color': to
			} );
			$( 'h4' ).css( {
				'color': to
			} );
		} );
	} );

	//HEADER
	wp.customize( 'tierradentro_header_background_color', function( value ) {
		value.bind( function( to ) {
			$( '.bottomShadow' ).css( {
				'background': to
			} );
		} );
	} );

	//SOCIAL
	wp.customize( 'tierradentro_social_facebook', function( value ) {
		value.bind( function( newval ) {
			if ( newval == '' ) {
				$('.social .it-facebook').css( 'display', 'none' );
			} else {
				$('.social .it-facebook').removeClass( 'customizer-hidden' );
				$('.social .it-facebook').css( 'display', 'inline-flex' );
			}
		} );
	} );
	wp.customize( 'tierradentro_social_twitter', function( value ) {
		value.bind( function( newval ) {
			if ( newval == '' ) {
				$('.social .it-twitter').css( 'display', 'none' );
			} else {
				$('.social .it-twitter').removeClass( 'customizer-hidden' );
				$('.social .it-twitter').css( 'display', 'inline-flex' );
			}
		} );
	} );
	wp.customize( 'tierradentro_social_instagram', function( value ) {
		value.bind( function( newval ) {
			if ( newval == '' ) {
				$('.social .it-instagram').css( 'display', 'none' );
			} else {
				$('.social .it-instagram').removeClass( 'customizer-hidden' );
				$('.social .it-instagram').css( 'display', 'inline-flex' );
			}
		} );
	} );
	wp.customize( 'tierradentro_social_linkedin', function( value ) {
		value.bind( function( newval ) {
			if ( newval == '' ) {
				$('.social .it-linkedin').css( 'display', 'none' );
			} else {
				$('.social .it-linkedin').removeClass( 'customizer-hidden' );
				$('.social .it-linkedin').css( 'display', 'inline-flex' );
			}
		} );
	} );
	wp.customize( 'tierradentro_social_youtube', function( value ) {
		value.bind( function( newval ) {
			if ( newval == '' ) {
				$('.social .it-youtube').css( 'display', 'none' );
			} else {
				$('.social .it-youtube').removeClass( 'customizer-hidden' );
				$('.social .it-youtube').css( 'display', 'inline-flex' );
			}
		} );
	} );
	wp.customize( 'tierradentro_social_behance', function( value ) {
		value.bind( function( newval ) {
			if ( newval == '' ) {
				$('.social .it-behance').css( 'display', 'none' );
			} else {
				$('.social .it-behance').removeClass( 'customizer-hidden' );
				$('.social .it-behance').css( 'display', 'inline-flex' );
			}
		} );
	} );
	wp.customize( 'tierradentro_social_vimeo', function( value ) {
		value.bind( function( newval ) {
			if ( newval == '' ) {
				$('.social .it-vimeo').css( 'display', 'none' );
			} else {
				$('.social .it-vimeo').removeClass( 'customizer-hidden' );
				$('.social .it-vimeo').css( 'display', 'inline-flex' );
			}
		} );
	} );
		wp.customize( 'tierradentro_social_github', function( value ) {
		value.bind( function( newval ) {
			if ( newval == '' ) {
				$('.social .it-github').css( 'display', 'none' );
			} else {
				$('.social .it-github').removeClass( 'customizer-hidden' );
				$('.social .it-github').css( 'display', 'inline-flex' );
			}
		} );
	} );

	// INTRO
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	wp.customize( 'tierradentro_intro_background_color', function( value ) {
		value.bind( function( to ) {
			$( '.intro' ).css( {
				'background': to
			} );
		} );
	} );
	wp.customize( 'tierradentro_intro_image1', function( value ) {
		value.bind( function( newval ) {
			if ( newval == '' ) {
				$('.intro-image1').parent().remove();
			} else {
				$('.intro-image1').parent().remove();
				$('.intro-image2').parent().remove();
				$('.intro-image3').parent().remove();
				$('.carousel-inner').append( "<div class='carousel-item'><img class='intro-image1 img-cover'></div>" );
				$('.intro-image1').attr( 'src', newval );
				$( '.carousel-item' ).css( {
				'display': 'contents'
			} );
			}
		} );
	} );
	wp.customize( 'tierradentro_intro_image2', function( value ) {
		value.bind( function( newval ) {
			if ( newval == '' ) {
				$('.intro-image2').parent().remove();
			} else {
				$('.intro-image1').parent().remove();
				$('.intro-image2').parent().remove();
				$('.intro-image3').parent().remove();
				$('.carousel-inner').append( "<div class='carousel-item'><img class='intro-image2 img-cover'></div>" );
				$('.intro-image2').attr( 'src', newval );
				$( '.carousel-item' ).css( {
				'display': 'contents'
			} );
			}
		} );
	} );
	wp.customize( 'tierradentro_intro_image3', function( value ) {
		value.bind( function( newval ) {
			if ( newval == '' ) {
				$('.intro-image3').parent().remove();
			} else {
				$('.intro-image1').parent().remove();
				$('.intro-image2').parent().remove();
				$('.intro-image3').parent().remove();
				$('.carousel-inner').append( "<div class='carousel-item'><img class='intro-image3 img-cover'></div>" );
				$('.intro-image3').attr( 'src', newval );
				$( '.carousel-item' ).css( {
				'display': 'contents'
			} );
			}
		} );
	} );
	wp.customize( 'tierradentro_intro_button_text', function( value ) {
		value.bind( function( to ) {
			$( '.intro-button' ).text( to );
		} );
	} );

	//ABOUT
	wp.customize( 'tierradentro_about_title', function( value ) {
		value.bind( function( newval ) {
			$('.about .about-header h3').text( newval );
		} );
	} );

	wp.customize( 'tierradentro_about_subtitle', function( value ) {
		value.bind( function( newval ) {
			$('.about .about-header h4').text( newval );
		} );
	} );
	wp.customize( 'tierradentro_about_content', function( value ) {
		value.bind( function( newval ) {
			$('.about h5').html( newval );
		} );
	} );
	wp.customize( 'tierradentro_about_image', function( value ) {
		value.bind( function( newval ) {
			if ( newval == '' ) {
				$('.about .about-image').css( 'display', 'none' );
				$('.about .col-md-7').attr( 'class', 'cold-md-12' );
			} else {
				$('.about .about-image').removeClass( 'customizer-hidden' );
				$('.about .about-image').css( 'display', 'block' );
				$('.about .col-md-12').attr( 'class', 'cold-md-7' );
				$('.about .about-image').attr( 'src', newval );
			}
		} );
	} );
	/*wp.customize( 'latte_about_name', function( value ) {
		value.bind( function( newval ) {
			$('.about h3.name').text( newval );
		} );
	} );
	wp.customize( 'latte_about_position', function( value ) {
		value.bind( function( newval ) {
			$('.about span.text-muted').text( newval );
		} );
	} );*/
	wp.customize( 'tierradentro_about_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.about').css( 'background', newval );
		} );
	} );
	wp.customize( 'tierradentro_about_button_text', function( value ) {
		value.bind( function( to ) {
			$( '.about-button' ).text( to );
		} );
	} );

	//SERVICES
	wp.customize( 'tierradentro_services_title', function( value ) {
		value.bind( function( newval ) {
			$('.services .services-header h3').text( newval );
		} );
	} );
	wp.customize( 'tierradentro_services_subtitle', function( value ) {
		value.bind( function( newval ) {
			$('.services .services-header h4').text( newval );
		} );
	} );
	wp.customize( 'tierradentro_services_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.services').css( 'background', newval );
		} );
	} );

	//PORTFOLIO
	wp.customize( 'tierradentro_portfolio_title', function( value ) {
		value.bind( function( newval ) {
			$('.portfolio .portfolio-header h3').text( newval );
		} );
	} );
	wp.customize( 'tierradentro_portfolio_subtitle', function( value ) {
		value.bind( function( newval ) {
			$('.portfolio .portfolio-header h4').text( newval );
		} );
	} );
	wp.customize( 'tierradentro_portfolio_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.portfolio').css( 'background', newval );
		} );
	} );
	wp.customize( 'tierradentro_portfolio_button_text', function( value ) {
		value.bind( function( to ) {
			$( '.portfolio-button' ).text( to );
		} );
	} );

	//SLOGAN
	wp.customize( 'tierradentro_slogan_title', function( value ) {
		value.bind( function( newval ) {
			$('.slogan .slogan-header h3').text( newval );
		} );
	} );
	wp.customize( 'tierradentro_slogan_subtitle', function( value ) {
		value.bind( function( newval ) {
			$('.slogan .slogan-header h4').text( newval );
		} );
	} );
	wp.customize( 'tierradentro_slogan_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.slogan').css( 'background', newval );
		} );
	} );
	wp.customize( 'tierradentro_slogan_content', function( value ) {
		value.bind( function( newval ) {
			$('.slogan h5').html( newval );
		} );
	} );

	//TEAM
	wp.customize( 'tierradentro_team_title', function( value ) {
		value.bind( function( newval ) {
			$('.team .team-header h3').text( newval );
		} );
	} );
	wp.customize( 'tierradentro_team_subtitle', function( value ) {
		value.bind( function( newval ) {
			$('.team .team-header h4').text( newval );
		} );
	} );
	wp.customize( 'tierradentro_team_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.team').css( 'background', newval );
		} );
	} );
	wp.customize( 'tierradentro_team_button_text', function( value ) {
		value.bind( function( to ) {
			$( '.team-button' ).text( to );
		} );
	} );

	//BLOG
	wp.customize( 'tierradentro_blog_title', function( value ) {
		value.bind( function( newval ) {
			$('.blog .blog-header h3').text( newval );
		} );
	} );
	wp.customize( 'tierradentro_blog_subtitle', function( value ) {
		value.bind( function( newval ) {
			$('.blog .blog-header h4').text( newval );
		} );
	} );
	wp.customize( 'tierradentro_blog_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.blog').css( 'background', newval );
		} );
	} );
	wp.customize( 'tierradentro_blog_button_text', function( value ) {
		value.bind( function( to ) {
			$( '.blog-button' ).text( to );
		} );
	} );

	//CONTACT
	wp.customize( 'tierradentro_contact_title', function( value ) {
		value.bind( function( newval ) {
			$('.contact .contact-header h3').text( newval );
		} );
	} );
	wp.customize( 'tierradentro_contact_subtitle', function( value ) {
		value.bind( function( newval ) {
			$('.contact .contact-header h4').text( newval );
		} );
	} );
	wp.customize( 'tierradentro_contact_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.contact').css( 'background', newval );
		} );
	} );

/*
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );*/



} )( jQuery );
