(function($){
    
	// Site title and description
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a', '.site-title' ).text( to );
		});
	});
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-desc' ).text( to );
		});
	});

	// Tagline
    wp.customize('wp_baseline', function( value ) {
        value.bind( function( to ) {
            if( to ) {
                $( '.site-desc' ).hide();
            }
            else {
                $( '.site-desc' ).show().removeClass('screen-reader-text');
            }
        });
    });

    // Colors
	var rootCustomProperty = function( setting ) {
		var bStyle = document.createElement( 'style' );
		document.head.appendChild( bStyle );
		setting.bind( function( newval ) {
			bStyle.innerHTML = ':root { --' + setting.id + ': ' + newval + ' }';
		} );
	};
    wp.customize( 'primary_color', rootCustomProperty );
    wp.customize( 'secondary_color', rootCustomProperty );
    wp.customize( 'third_color', rootCustomProperty );
	 

    // WP Credits
    wp.customize('display_wp', function( value ) {
        value.bind( function( to ) {
            if( to ) {
                $( '.wp-love' ).show();
            }
            else {
                $( '.wp-love' ).hide();
            }
        });
    });
    
    // Footer text
    wp.customize('footer_text', function(value) {
        value.bind( function( text ) {
            $('.footer-copyright').text( text );
        });
    });

    // Other stuff
    wp.customize('show_all', function( value ) {
        value.bind( function( to ) {
            if( to ) {
                $( '.the-posts-link a' ).show();
            }
            else {
                $( '.the-posts-link a' ).hide();
            }
        });
    });    
    
    
})(jQuery);