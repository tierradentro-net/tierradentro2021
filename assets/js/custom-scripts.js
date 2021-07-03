jQuery(window).load(function() {

	console.log("entro ");

	if( tierradentro_script_var.tierradentro_preloader_display != 1 ) {
		/* Preloader */
		jQuery(".status").fadeOut();
		jQuery(".preloader").delay(500).fadeOut("slow");
	}

	if( tierradentro_script_var.tierradentro_animations_display != 1 ) {
		/* scrollReval */
		window.sr = new scrollReveal();
	}

});

jQuery(document).ready(function(){
  jQuery('.team-slide').slick({
	  dots: true,
	  infinite: true,
	  speed: 300,
	  slidesToShow: 4,
	  slidesToScroll: 1,
	  autoplay: true,
	  autoplaySpeed: 3000,
	  responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 1,
	        infinite: true,
	        dots: true
	      }
	    },
	    {
	      breakpoint: 600,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	  ]
  });

  jQuery('.portfolio-slide').slick({
	  dots: true,
	  infinite: true,
	  speed: 300,
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  autoplay: true,
	  autoplaySpeed: 3000,
	  responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 1,
	        infinite: true,
	        dots: true
	      }
	    },
	    {
	      breakpoint: 600,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	  ]
  });


  jQuery('#searchsubmit').replaceWith('<button class="search-submit" type="submit"><i class="fa fa-search"></i></button>');
  if (window.matchMedia("(max-width: 767px)").matches) {
	  jQuery( "#main-menu" ).append( jQuery('#searchform') );
	  jQuery( ".search-menu-button" ).hide();
  }
  jQuery(".search-menu-button").click(function(){ 
  	jQuery(".search-menu-button-form").toggle("slow"); 
  }); 

});


/*
jQuery(document).ready(function($) {
	if( tierradentro_script_var.tierradentro_is_homepage != 1 ) {
		// Smooth Scroll 
		jQuery('a[href*="#"]').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				var target = jQuery(this.hash);
				target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					jQuery('html,body').animate({
						scrollTop: target.offset().top
					}, 1200);
					return false;
				}
			}
		});
		if( tierradentro_script_var.tierradentro_parallax_background != '' ) {
			// Parallax 
			$('.site-wrapper').parallax({imageSrc: tierradentro_script_var.tierradentro_parallax_background, bleed: '10', androidFix: 'false'});
		}
	}


});*/
