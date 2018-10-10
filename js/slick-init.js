jQuery(document).ready(function($) {

	$('.slicky-slider').slick({
		autoplay: true,
		autoplaySpeed: 1500,
		speed: 2000,
  		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		dots: false,
		infinite: true,
		pauseOnHover: true,
		fade: true,
		nextArrow: '<button type="button" class="slick-next slick-arrow" aria-label="Panneau suivant"> › </button>',
		prevArrow: '<button type="button" class="slick-prev slick-arrow" aria-label="Panneau précédent"> ‹ </button>',
		mobileFirst: true
	});	


	// Play/Pause
	
	$('.slicky-pause').on('click',function() {
		var parent = $(this).closest('.slicky-options');
		var target = parent.data('target');
		
		$('.' + target).slick('slickPause');
		$(this).hide();
		parent.find('.slicky-play').show();
	});
	$('.slicky-play').on('click',function() {
		var parent = $(this).closest('.slicky-options');
		var target = parent.data('target');
		
		$('.' + target).slick('slickPlay');
		$(this).hide();
		parent.find('.slicky-pause').show();
	});
	
	
	// A11Y Dots
	
	$('.slick-dots li button').prepend("Panneau ");


	// Tab Index

	$(window).on('load',function() {
		$('.slick-slide').removeAttr('tabindex');
	});
	
	$(window).on('resize',function() {
		if ($(window).width() > 720) {
			$('.slick-slide').removeAttr('tabindex');
		}
	});	

});