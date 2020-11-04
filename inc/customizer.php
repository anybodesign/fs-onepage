<?php defined('ABSPATH') or die();
/**
 * FS Onepage Customizer functionality
 *
 * @package WordPress
 * @subpackage FS_Onepage
 * @since 1.0
 * @version 1.0
 */
 
// Customizer JS

add_action( 'customize_preview_init', 'fs_customizer_scripts' );
function fs_customizer_scripts() {
	wp_enqueue_script(
		'fs-customizer',
	    	FS_THEME_URL . '/js/customizer.js',
	    	array( 'customize-preview' ), 
	    	false, 
	    	true
	);
}

// Customizer Settings
 
function fs_customize_register($fs_customize) {
	 
	// Title and Description
	// -
	// + + + + + + + + + + 
	
	$fs_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$fs_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $fs_customize->selective_refresh ) ) {
		$fs_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => array('.site-title', '.site-title a'),
			'render_callback' => 'fs_customize_partial_blogname',
		) );
		$fs_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-desc',
			'render_callback' => 'fs_customize_partial_blogdescription',
		) );
	}	 
	 
	 
	// Create Some Sections
	
	$fs_customize->add_section(
		'fs_options_section', 
		array(
			'title' 			=> __('Theme Options', 'fs-onepage'),
			'description' 	=> __('Theme customisation', 'fs-onepage'),
			'priority'		=> 30,
		)
	);
	$fs_customize->add_section(
		'fs_color_section', 
		array(
			'title' 			=> __('Theme Colors', 'fs-onepage'),
			'description' 	=> __('Colors customisation', 'fs-onepage'),
			'priority'		=> 40,
		)
	);
	$fs_customize->add_section(
		'fs_layout_section', 
		array(
			'title' 		=> __('Layout Options', 'fs-onepage'),
			'description' 	=> __('Choose the layout of the home page banner.', 'fs-onepage'),
			'priority'		=> 40,
		)
	);
	
	
	// Theme Colors
	// -
	// + + + + + + + + + + 	
	
		// Primary color
		
		$fs_customize->add_setting('primary_color', array(
			'default'			=> '303030',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'capability'		=> 'edit_theme_options',
			'type'				=> 'theme_mod',
			'transport'			=> 'postMessage', 
		));
		$fs_customize->add_control( new WP_Customize_Color_control($fs_customize, 'primary_color', array(
			'label'		=> __('Primary color', 'fs-onepage'),
			'section'	=> 'colors',
			'settings'	=> 'primary_color',
		)));
		
		// Secondary color
		
		$fs_customize->add_setting('secondary_color', array(
			'default'			=> '4682B4',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'capability'		=> 'edit_theme_options',
			'type'				=> 'theme_mod',
			'transport'			=> 'postMessage', 
		));
		$fs_customize->add_control( new WP_Customize_Color_control($fs_customize, 'secondary_color', array(
			'label'		=> __('Secondary color', 'fs-onepage'),
			'section'	=> 'colors',
			'settings'	=> 'secondary_color',
		)));
		
		// Contrast color
		
		$fs_customize->add_setting('third_color', array(
			'default'			=> '909090',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'capability'		=> 'edit_theme_options',
			'type'				=> 'theme_mod',
			'transport'			=> 'postMessage', 
		));
		$fs_customize->add_control( new WP_Customize_Color_control($fs_customize, 'third_color', array(
			'label'		=> __('Contrast color', 'fs-onepage'),
			'section'	=> 'colors',
			'settings'	=> 'third_color',
		)));
		
		
	// Theme Options
	// -
	// + + + + + + + + + + 
		
		// Number of posts
		
		$fs_customize->add_setting('posts_nb', array(
			'default'				=> 6,
			'sanitize_callback'		=> 'sanitize_text_field'
		));
		$fs_customize->add_control('posts_nb', array(
			'type'			=> 'number',
			'label'			=> __('Number of posts to show on the front page', 'fs-onepage'),
			'section'		=> 'fs_options_section',
			'settings'		=> 'posts_nb',
		));	

		// Show all button
		
		$fs_customize->add_setting('show_all', array(
			'default'			=> false,
			'transport'			=> 'postMessage',
			'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
		));
		$fs_customize->add_control('show_all', array(
			'type'			=> 'checkbox',
			'label'			=> __('Display Show All Posts button', 'fs-onepage'),
			'section'		=> 'fs_options_section',
			'settings'		=> 'show_all',
		));
				
		// Carousel for Posts
		
		$fs_customize->add_setting('carousel_posts', array(
			'default'			=> false,
			//'transport'			=> 'postMessage',
			'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',				
		));
		$fs_customize->add_control('carousel_posts', array(
			'type'			=> 'checkbox',
			'label'			=> __('Display your posts like a carousel', 'fs-onepage'),
			'section'		=> 'fs_options_section',
			'settings'		=> 'carousel_posts',
		));	
	
		// Open News in Modals
		
		$fs_customize->add_setting('modals', array(
			'default'			=> false,
			'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',				
		));
		$fs_customize->add_control('modals', array(
			'type'			=> 'checkbox',
			'label'			=> __('Open your posts with Fancybox', 'fs-onepage'),
			'section'		=> 'fs_options_section',
			'settings'		=> 'modals',
		));	
		
		// Load posts on scroll
		
		$fs_customize->add_setting('load_ias', array(
			'default'			=> false,
			'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',				
		));
		$fs_customize->add_control('load_ias', array(
			'type'			=> 'checkbox',
			'label'			=> __('Load posts on scroll', 'fs-onepage'),
			'section'		=> 'fs_options_section',
			'settings'		=> 'load_ias',
		));	
		
		// Fancybox
		
		$fs_customize->add_setting('fancy_open', array(
			'default'			=> false,
			'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
		));
		$fs_customize->add_control('fancy_open', array(
			'type'			=> 'checkbox',
			'label'			=> __('Enlarge pictures with Fancybox', 'fs-onepage'),
			'section'		=> 'fs_options_section',
			'settings'		=> 'fancy_open',
		));
		
		// Toggle animations
		
		$fs_customize->add_setting('animations', array(
			'default'			=> true,
			'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
		));
		$fs_customize->add_control('animations', array(
			'type'			=> 'checkbox',
			'label'			=> __('Toggle animations', 'fs-onepage'),
			'section'		=> 'fs_options_section',
			'settings'		=> 'animations',
		));
		
		// Blog picture
		
		$fs_customize->add_setting('blog_picture', array(
			'default'				=> '',
			'sanitize_callback'		=> 'esc_url_raw'
		));
		$fs_customize->add_control( new WP_Customize_Image_control($fs_customize, 'blog_picture', array(
			'label'			=> __('Page for posts banner picture', 'fs-onepage'),
			'section'		=> 'fs_options_section',
			'settings'		=> 'blog_picture',
		)));
		
		// 404 picture
		
		$fs_customize->add_setting('error_picture', array(
			'default'				=> '',
			'sanitize_callback'		=> 'esc_url_raw'
		));
		$fs_customize->add_control( new WP_Customize_Image_control($fs_customize, 'error_picture', array(
			'label'			=> __('404 banner picture', 'fs-onepage'),
			'section'		=> 'fs_options_section',
			'settings'		=> 'error_picture',
		)));
			
		
	// Theme Layout
	// -
	// + + + + + + + + + + 

		// Header & Main nav

		$fs_customize->add_setting(
			'layout_option', 
			array(
				'default' 			=> 'version1',
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'fs_customizer_sanitize_radio_layout',
			)
		);
		$fs_customize->add_control(
			'layout_option', 
			array(
				'type' => 'radio',
				'label' => __( 'Home page banner version', 'fs-onepage' ),
				'section' => 'fs_layout_section',
				'choices' => array(
					'version1' => __( 'Version 1', 'fs-onepage' ),
					'version2' => __( 'Version 2', 'fs-onepage' ),
				),
			)
		);
		
		$fs_customize->add_setting(
			'layout_sidebar', 
			array(
				'default' 			=> 'sidebar',
				'transport'			=> 'postMessage',
				'sanitize_callback' => 'fs_customizer_sanitize_radio_sidebar',
			)
		);
		$fs_customize->add_control(
			'layout_sidebar', 
			array(
				'type' => 'radio',
				'label' => __( 'Posts Sidebar or Topbar', 'fs-onepage' ),
				'section' => 'fs_layout_section',
				'choices' => array(
					'sidebar' => __( 'Sidebar', 'fs-onepage' ),
					'topbar' => __( 'Topbar', 'fs-onepage' ),
				),
			)
		);
		
			
	// Site Identity
	// -
	// + + + + + + + + + + 
	
		// Site logo
		
		$fs_customize->add_setting('site_logo', array(
			'default'				=> '',
			'sanitize_callback'		=> 'esc_url_raw'
		));
		$fs_customize->add_control( new WP_Customize_Image_control($fs_customize, 'site_logo', array(
			'label'			=> __('Site Logo', 'fs-onepage'),
			'section'		=> 'title_tagline',
			'settings'		=> 'site_logo',
		)));	

		// Site logo white
		
		$fs_customize->add_setting('site_logo_white', array(
			'default'				=> '',
			'sanitize_callback'		=> 'esc_url_raw'
		));
		$fs_customize->add_control( new WP_Customize_Image_control($fs_customize, 'site_logo_white', array(
			'label'			=> __('Site White Logo', 'fs-onepage'),
			'description'	=> __('White version of your logo for the home page.', 'fs-onepage'),		
			'section'		=> 'title_tagline',
			'settings'		=> 'site_logo_white',
		)));		

		// Hide/Show Baseline
		
		$fs_customize->add_setting('wp_baseline', array(
			'default'			=> false,
			'transport'			=> 'postMessage',
			'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
		));
		
		$fs_customize->add_control('wp_baseline', array(
			'type'			=> 'checkbox',
			'label'			=> __('Hide the tagline (in an accessible way)', 'fs-onepage'),
			'section'		=> 'title_tagline',
			'settings'		=> 'wp_baseline',
		));
		
		// Footer text
		
		$fs_customize->add_setting('footer_text', array(
			'default'				=> '',
			'transport'				=> 'postMessage',
			'sanitize_callback'		=> 'sanitize_text_field'
		));
		$fs_customize->add_control('footer_text', array(
			'label'			=> __('Custom footer text', 'fs-onepage'),
			'description'	=> __('Add a custom text instead of the year and blog name.', 'fs-onepage'),
			'section'		=> 'title_tagline',
			'settings'		=> 'footer_text',
		));	
		
		// WP Credits
		
		$fs_customize->add_setting('display_wp', array(
			'default'			=> false,
			'transport'			=> 'postMessage',
			'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
		));
		$fs_customize->add_control('display_wp', array(
			'type'			=> 'checkbox',
			'label'			=> __('Display WordPress Link', 'fs-onepage'),
			'section'		=> 'title_tagline',
			'settings'		=> 'display_wp',
		));
			 
}
add_action('customize_register', 'fs_customize_register');


// Callbacks + Sanitize

function fs_customize_partial_blogname() {
	bloginfo( 'name' );
}
function fs_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function fs_customizer_sanitize_radio_layout( $input ) {
    if( !in_array( $input, array( 'version1', 'version2' ) ) ) {
        $input = 'version1';
    }
    return $input;
}
function fs_customizer_sanitize_radio_sidebar( $input ) {
    if( !in_array( $input, array( 'sidebar', 'topbar' ) ) ) {
        $input = 'sidebar';
    }
    return $input;
}
function fs_customizer_sanitize_checkbox( $input ) {
	if ( $input === true || $input === '1' ) {
		return '1';
	}
	return '';
}


// Customizer Colors Output

function fs_colors() { ?>

	<style>
		:root {
			--primary_color: <?php echo get_theme_mod('primary_color', '#303030'); ?>; 
			--secondary_color: <?php echo get_theme_mod('secondary_color', '#4682B4'); ?>;
			--third_color: <?php echo get_theme_mod('third_color', '#909090'); ?>;
		}
	</style>
<?php }
add_action('wp_head','fs_colors');
