jQuery(document).ready(function($) {
	
	
	// Responsive Main Menu

	$('#menu-toggle').click(function() {
		$('body').toggleClass('menu-visible');
		$(this).toggleClass('menu-opened');
			
			if ($(this).hasClass('menu-opened')) {
				$(this).attr('aria-expanded','true');
				$('.main-menu').attr('aria-hidden','false');
			} else {
				$(this).attr('aria-expanded','false');
				$('.main-menu').attr('aria-hidden','true');
			}
			
		return false;
	});

		$(window).resize(function() {
			if ($(window).width() > 720) {
		    	$('.main-menu').show().removeAttr('style').removeAttr('aria-hidden');
		    	$('.sub-menu').show().removeAttr('style');
		    	$('#menu-toggle').removeClass('menu-opened').removeAttr('aria-expanded');
			}
		});
	
	
	// Sub-Menus Toggle Button
	
	$('.sub-menu-unfold').click(function() {
		
	    if($(this).hasClass('sub-menu-opened')) {
	        $(this).removeClass('sub-menu-opened').attr('aria-expanded','false');
			$(this).next('.sub-menu').slideUp().attr('aria-hidden','true');
	    
	    } else {

			$(this).parent().parent().find('.sub-menu-opened').removeClass('sub-menu-opened');
			$('.sub-menu').slideUp();
	        $(this).addClass('sub-menu-opened').attr('aria-expanded','true');
	        $(this).next('.sub-menu').slideDown().attr('aria-hidden','false');
	    }
	});
	
	
	// A11y active label on nav items
	
	var $el = 'li.current-menu-item a, li.current-page-ancestor a, li.current_page_item a, li.current_page_parent a, li.current-cat a';
	var $lang = 'Active';
	
	if ( $('html').attr('lang') === 'fr-FR' ) {
		$lang = 'Actif';
	}
	
	$($el).append('<span class="screen-reader-text"> - '+$lang+'</span>');


	// Toggle class focus on <li>

	$('.menu-item > a').on('focus', function () {
		$(this).parent().next().removeClass('focus');
		$(this).parent().prev().removeClass('focus');
		$(this).parent().addClass('focus');
	});
	
	$('.sub-menu > li > a').on('focus', function () {
		$(this).parent().parent().parent().addClass('focus');
	});	
	
	$('.menu-item:first-child > a').on('focusout', function () {
		$(this).parent().removeClass('focus');
	});
	

	// Scroll Down
	
	$('.scroll-down').on('click', function () {
		var $height = $('html, body').height();
		$('html, body').animate({scrollTop: $height}, 800);
	});	
		

	// Sticky Menu
	
	$(window).scroll( function() {
	    
	    var topscreen = $(this).scrollTop();
	    var screenheight = $(this).height();

	    if ( topscreen >= screenheight ) {
	        
			$('body').addClass('fixed-nav');
							
	    } else {
	        
	        $('body').removeClass('fixed-nav');
	    }
	    
	});

			

	// Responsive Video Players (Youtube, Vimeo)
			
	function resizevid(){

		$("iframe").each(function() {
			
			if($(this).is("[src*=youtube], [src*=vimeo]")) {
				var yt_width = $(this).width();
				$( this ).attr('style','height: '+yt_width/1.77+'px');
			}
		});
	}
				
	$(window).on('load',function() {		
		resizevid();
	});	

	$(window).on('resize',function() {
		resizevid();
	});	
	
	

});