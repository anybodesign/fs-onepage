<?php if ( !defined('ABSPATH') ) die();


define( 'FS_THEME_VER', '2.2.1' );
define( 'FS_THEME_DIR', get_template_directory() );
define( 'FS_THEME_URL', get_template_directory_uri() );
define( 'FS_HOME', esc_url( home_url( '/' ) ) );


// ------------------------
// Theme Setup
// ------------------------

if ( ! isset( $content_width ) )
	$content_width = 2048;


if ( ! function_exists( 'fs_setup' ) ) :

function fs_setup() {
	
	
	// I18n
	
	load_theme_textdomain( 'fs-onepage', FS_THEME_DIR . '/languages' );
	
	
	// Theme Support

	add_editor_style( array('css/editor-style.css') );
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );
	

	// Gutenberg support 
	
	add_theme_support( 'align-wide' );
	
	add_theme_support( 'editor-color-palette', array(
	    array(
	        'name' => esc_html__( 'Primary color', 'fs-onepage' ),
	        'slug' => 'primary-color',
	        'color' => get_theme_mod('primary_color', '#303030'),
	    ),
	    array(
	        'name' => esc_html__( 'Secondary color', 'fs-onepage' ),
	        'slug' => 'secondary-color',
	        'color' => get_theme_mod('secondary_color', '#4682B4'),
	    ),
	    array(
	        'name' => esc_html__( 'Contrast color', 'fs-onepage' ),
	        'slug' => 'third-color',
	        'color' => get_theme_mod('third_color', '#909090'),
	    ),
	    array(
	        'name' => esc_html__( 'White', 'fs-onepage' ),
	        'slug' => 'white-color',
	        'color' => '#ffffff',
	    ),
	    array(
	        'name' => esc_html__( 'Black', 'fs-onepage' ),
	        'slug' => 'black-color',
	        'color' => '#303030',
	    ),
	));	
	
	add_theme_support( 'disable-custom-colors' );
	
	
	add_theme_support( 'editor-font-sizes', array(
	    array(
	        'name' => __( 'Small', 'fs-onepage' ),
	        'shortName' => __( 'S', 'fs-onepage' ),
	        'size' => 14,
	        'slug' => 'small'
	    ),
	    array(
	        'name' => __( 'Large', 'fs-onepage' ),
	        'shortName' => __( 'L', 'fs-onepage' ),
	        'size' => 22,
	        'slug' => 'large'
	    ),
	));
	
	add_theme_support('disable-custom-font-sizes');
	
	add_theme_support( 'responsive-embeds' );

}
endif;
add_action( 'after_setup_theme', 'fs_setup' );


// Gutenberg editor styles

function fs_block_editor_styles() {
    wp_enqueue_style( 
    	'block_editor_styles',
    	FS_THEME_URL . '/css/block-editor-style.css', 
    	false, 
    	'1.0', 
    	'screen'
    );
}
add_action( 'enqueue_block_editor_assets', 'fs_block_editor_styles' );

//	Admin style and script

add_action('admin_print_styles', 'fs_acf_admin_css', 11 );
function fs_acf_admin_css() {
	wp_enqueue_style( 'admin-css', FS_THEME_URL . '/css/admin.css' );
}

// ------------------------
// Enqueue JS & CSS
// ------------------------

function fs_scripts_load() {
    if (!is_admin()) {

		
		// JS 
		
		wp_enqueue_script( 'jquery' );

	    if ( get_theme_mod('load_ias') == true && is_home() || is_archive() || is_search() ) {
			wp_enqueue_script(
			    	'ias', 
			    	FS_THEME_URL . '/js/infinite-ajax-scroll.min.js',
			    	array(), 
			    	'3.0', 
			    	true
		    	);
		    	wp_enqueue_script(
			    	'ias-init', 
			    	FS_THEME_URL . '/js/infinite-ajax-scroll-init.js',
			    	array('ias'), 
			    	false, 
			    	true
		    	);
	    }
		
		if ( get_theme_mod('carousel_posts') == true ) {
			wp_enqueue_script(
				'slick', 
				FS_THEME_URL . '/js/slick.min.js', 
				array('jquery'), 
				false, 
				true
			);
			wp_enqueue_script(
				'slick-init', 
				FS_THEME_URL . '/js/slick-init.js', 
				array('slick'), 
				false, 
				true
			);
		}

		
		// Fancybox
		
		if ( get_theme_mod('fancy_open') == true || get_theme_mod('modals') == true ) {
			wp_enqueue_script(
				'fancybox', 
				FS_THEME_URL . '/js/jquery.fancybox.min.js', 
				array('jquery'), 
				false, 
				true
			);
		}
		if ( get_theme_mod('fancy_open') == true ) {
			wp_enqueue_script(
				'fancybox-init', 
				FS_THEME_URL . '/js/fancybox-init.js', 
				array('fancybox'), 
				false, 
				true
			);
		}
		if ( get_theme_mod('modals') == true ) {
			wp_enqueue_script(
				'fancybox-modals', 
				FS_THEME_URL . '/js/fancybox-modals.js', 
				array('fancybox'), 
				false, 
				true
			);
		}		

		
		// Scroll-Out
		
		if ( get_theme_mod('animations') != false ) {
			wp_enqueue_script(
				'scrollout', 
				FS_THEME_URL . '/js/scroll-out.min.js', 
				array(), 
				'2.2.3', 
				true
			);
	
			function fs_scrollout_js() {
				print '
				<script>
					ScrollOut({
					  
					});
				</script>
				';
			}
			add_action('wp_footer', 'fs_scrollout_js', 100);
		}	
		
		// Main
		
		wp_enqueue_script(
			'focus-visible', 
			FS_THEME_URL . '/js/focus-visible.js', 
			array(), 
			false, 
			true
		);
		
		wp_enqueue_script(
			'fs-onepage-skip-link-focus-fix', 
			FS_THEME_URL . '/js/skip-link-focus-fix.js', 
			array(), 
			false, 
			true
		);
		
	    wp_enqueue_script( 
		    	'main', 
		    	FS_THEME_URL . '/js/main.js',
		    	array('jquery'), 
		    	'1.0', 
		    	true
	    );
	    
	    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		
		// CSS
		
		wp_enqueue_style( 
			'fancybox', 
			FS_THEME_URL . '/css/jquery.fancybox.min.css',
			array(), 
			false, 
			'screen' 
		);
		

		if ( get_theme_mod('carousel_posts') == true ) {
			
			wp_enqueue_style( 
				'slick-css', 
				FS_THEME_URL . '/css/slick.css',
				array(), 
				false, 
				'screen' 
			);
			
		}
		
		
		// Main stylesheet
		
		wp_enqueue_style( 'fs-onepage-style', get_stylesheet_uri() );

	}
}    
add_action( 'wp_enqueue_scripts', 'fs_scripts_load' );


// ------------------------
// Theme Stuff
// ------------------------


// Customizer

require FS_THEME_DIR . '/inc/customizer.php';


// Menus

function fs_custom_nav_menus() {

	$locations = array(
		'footer_menu' => esc_html__( 'Footer Menu', 'fs-onepage' )
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'fs_custom_nav_menus' );


// Extended Search

include_once( dirname( __FILE__ ) . '/inc/fs-extended-search.php' );


// Excerpt

function fs_custom_excerpt( $length ) {
    return 12;
}
add_filter( 'excerpt_length', 'fs_custom_excerpt', 999 );

function fs_excerpt_more( $more ) {
	
	if ( get_theme_mod( 'modals' ) && is_front_page() ) {
		return '…';
	} else {
		return '… <br><a href="'. get_permalink( get_the_ID() ) . '">' . __('Continue reading', 'fs-onepage') . '</a>';
	}
}
add_filter( 'excerpt_more', 'fs_excerpt_more' );


// Bg image

function fs_bg_img() {

	$img_blog = get_theme_mod('blog_picture');
	$img_404 = get_theme_mod('error_picture');

	if ( is_home() && $img_blog && ! is_front_page() || is_archive() && $img_blog ) {
		$bg = ' style="background-image: url('.get_theme_mod('blog_picture', 'none').')"';
	}
	else if ( is_404() && $img_404 ) {
		$bg = ' style="background-image: url('.get_theme_mod('error_picture', 'none').')"';
	}
	else if ( '' != get_the_post_thumbnail() ) {
		$img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large-hd' );
		$bg = ' style="background-image: url('.$img_url[0].')"';
	} else {
		$bg = null;	
	}
	
	echo $bg;
}

// The slug

function fs_slug($echo=true) {
  
  $slug = basename(get_permalink());
  	do_action('before_slug', $slug);
  
  $slug = apply_filters('slug_filter', $slug);
  	
  	if( $echo ) echo $slug;
  		do_action('after_slug', $slug);
  	
  return $slug;
}

// Image Sizes

add_image_size( 'thumbnail-hd', 320, 320, true );
add_image_size( 'medium-hd', 640, 640, false );
add_image_size( 'large-hd', 2048, 2048, false );
add_image_size( 'post-md', 512, 340, true );
add_image_size( 'post-hd', 1024, 680, true );

add_filter( 'image_size_names_choose', 'fs_custom_sizes' );
function fs_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'thumbnail-hd'	=> __( 'Thumbnail High', 'fs-onepage' ),
        'medium-hd'		=> __( 'Medium High', 'fs-onepage' ),
        'large-hd'		=> __( 'Large High', 'fs-onepage' ),
        'post-md'		=> __( 'Post Medium', 'fs-onepage' ),
        'post-hd'		=> __( 'Post High', 'fs-onepage' ),
    ) );
}

// Widgets

function fs_widgets_init() {
	register_sidebar(array(
		'name'			=>	esc_html__( 'Categories Widgets Area', 'fs-onepage' ),
		'id'			=>	'widgets_area1',
		'description' 	=> 	'',
		'before_widget' => 	'<div id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> 	'</div>',
		'before_title' 	=> 	'<p class="widget-title">',
		'after_title' 	=> 	'</p>',
	));
	register_sidebar(array(
		'name'			=>	esc_html__( 'Footer Widgets Area', 'fs-onepage' ),
		'id'			=>	'widgets_area2',
		'description' 	=> 	'',
		'before_widget' => 	'<div id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> 	'</div>',
		'before_title' 	=> 	'<p class="widget-title">',
		'after_title' 	=> 	'</p>',
	));
}
add_action( 'widgets_init', 'fs_widgets_init' );


// Tinymce class

function fs_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'fs_mce_buttons_2');

function fs_tiny_formats($init_array) {

    $style_formats = array(

        array(
            'title' => 'Texte intro',
            'selector' => 'p',
            'classes' => 'text-intro',
            'wrapper' => true,
        ),
        array(
            'title' => 'Texte mentions',
            'selector' => 'p',
            'classes' => 'text-mentions',
            'wrapper' => true,
        ),
        array(
            'title' => 'Bouton d’action',
            'selector' => 'a',
            'classes' => 'action-btn',
        )
    );
    $init_array['style_formats'] = json_encode($style_formats);

    return $init_array;

}
add_filter('tiny_mce_before_init', 'fs_tiny_formats');


// Custom search form

function fs_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
    <input type="search" placeholder="' . __( 'Keywords' ) . '" value="' . get_search_query() . '" name="s" id="s">
    <input type="submit" class="action-btn" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'">
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'fs_search_form' );


// Custom comment HTML

function fs_custom_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-author avatar">
				<?php
					echo get_avatar( $comment, 192 );
				?>
			</div>

			<div class="comment-content">
				<div class="comment-author-name">
					<?php 
						printf( '<span class="fn">%s</span>', get_comment_author_link() );
					?>
				</div>
				<div class="comment-date">
					<?php 
						printf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
							esc_url( get_comment_link( $comment->comment_ID ) ),
							get_comment_time( 'c' ),
							sprintf( __( '%1$s at %2$s' ), get_comment_date(), get_comment_time() )
						);
					?>
				</div>
				<div class="comment-author-text">
					<?php if ($comment->comment_approved == '0') : ?>
						<em class="pending"><?php _e('Your comment is awaiting moderation.') ?></em>
					<?php endif; ?>
					
					<?php comment_text(); ?>
				</div>
			</div>

			<div class="reply">
				<?php comment_reply_link( array_merge($args, array(
				    'reply_text' => __('Reply'),
				    'depth'      => $depth,
				    'max_depth'  => $args['max_depth']
				    )
				)); ?>
			</div>
			<?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>

		</article>
		
<?php }


// ------------------------
// Auto-Updater
// ------------------------

require 'inc/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/anybodesign/fs-onepage',
	__FILE__,
	'fs-onepage'
);
$myUpdateChecker->setBranch('master');