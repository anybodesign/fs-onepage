jQuery(document).ready(function($) {
	
	var sliderbtn = '<img src="'+theme_path+'/img/icon-arrow-slick.svg" alt="">';
	
	$('.the-carousel-posts .the-posts').slick({
		autoplay: true,
		autoplaySpeed: 1500,
		speed: 2000,
  		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		dots: true,
		infinite: true,
		pauseOnHover: true,
		nextArrow: '<button type="button" class="slick-next slick-arrow" aria-label="Panneau suivant">'+sliderbtn+'</button>',
		prevArrow: '<button type="button" class="slick-prev slick-arrow" aria-label="Panneau précédent">'+sliderbtn+'</button>',
		mobileFirst: true,
		responsive: [
		    {
		      breakpoint: 640,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2,
		      }
		    },
		    {
		      breakpoint: 960,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 3
		      }
		    }
		]
	});	

	
	
	// A11Y Dots
	
	$('.slick-dots li button').prepend("Panneau ");


	// Tab Index
	/*
	$(window).on('load',function() {
		$('.slick-slide').removeAttr('tabindex');
	});
	
	$(window).on('resize',function() {
		if ($(window).width() > 960) {
			$('.slick-slide').removeAttr('tabindex');
		}
	});	
	*/
});