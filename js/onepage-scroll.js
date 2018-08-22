jQuery(document).ready(function($) {
	
	// Smooth Scroll

	var $offset = 0;

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
	          scrollTop: target.offset().top-$offset
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

});