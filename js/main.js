jQuery(document).ready(function($) {
	
	
	// Smooth Scroll
	
	var $offset = 50;
	
	$('a[href*="#"]')
	  .not('[href="#"]')
	  .not('[href="#0"]')	  
	  
	  .click(function(event) {
	    if ( location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname ) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

	      if (target.length) {
	        event.preventDefault();
	        
	        $('html, body').animate({
	          scrollTop: target.offset().top
	        }, 1000, function() {
	          var $target = $(target);
	          $target.focus();
	          
	          if ($target.is(":focus")) { // Checking if the target was focused
	            return false;
	          } else {
	            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
	            $target.focus(); // Set focus again
	          }
	        });
	      }
	    }
	  });	


	// Menu Class on Scroll
	
		
	function onScroll() {
		
	    var scrollPos = $(document).scrollTop();
	    
	    $('.onepage-menu a').each(function () {
	        
	        var currLink = $(this);
	        var refElement = $(currLink.attr("href"));
	        
	        if (refElement.position().top-$offset <= scrollPos && refElement.position().top-$offset + refElement.height() > scrollPos) {
	           
	            $('.onepage-menu a').parent().removeClass("current-menu-item");
	            currLink.parent().addClass("current-menu-item");
	            //window.location.hash = this.hash;
	        
	        } else {
	           
	            currLink.parent().removeClass("active");
	            
	        }
	    });
	}
    $(document).on("scroll", onScroll);	
	
	
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
	    //var head = $('#site_head').height();

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