jQuery(document).ready(function($) {
	
	$('.blocks-gallery-item a, .wp-block-image a, .fancyzoom').fancybox({
		loop: true,
		buttons : [
			'close'
		],
		beforeShow: function(){
			$("body").css({'overflow-y':'hidden'});
		},
		afterClose: function(){
			$("body").css({'overflow-y':'visible'});
		}
	});
	
	$('.blocks-gallery-item a, .wp-block-image a').attr('data-fancybox','gallery');
	
});