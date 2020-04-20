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
	
	$fs_customize->add_section('fs_options_section', array(
		'title' 			=> __('Theme Options', 'fs-onepage'),
		'description' 	=> __('Theme customisation', 'fs-onepage'),
		'priority'		=> 30,
	));
	$fs_customize->add_section('fs_color_section', array(
		'title' 			=> __('Theme Colors', 'fs-onepage'),
		'description' 	=> __('Colors customisation', 'fs-onepage'),
		'priority'		=> 40,
	));
	
	
	// Theme Colors
	
	
		// Primary color
		
		$fs_customize->add_setting('primary_color', array(
			'default'			=> '303030',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'capability'		=> 'edit_theme_options',
			'type'				=> 'theme_mod',
			'transport'			=> 'refresh', 
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
			'transport'			=> 'refresh', 
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
			'transport'			=> 'refresh', 
		));
		$fs_customize->add_control( new WP_Customize_Color_control($fs_customize, 'third_color', array(
			'label'		=> __('Contrast color', 'fs-onepage'),
			'section'	=> 'colors',
			'settings'	=> 'third_color',
		)));

		
	// Theme Options
	
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
			'label'			=> __('Open your posts with Fancybox (available in a future release)', 'fs-onepage'),
			'section'		=> 'fs_options_section',
			'settings'		=> 'modals',
		));	

	
	// Theme settings


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
			'label'			=> __('Hide the tagline (in an accessible way)', 'fs-blog'),
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
			'section'		=> 'fs_options_section',
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
			'section'		=> 'fs_options_section',
			'settings'		=> 'display_wp',
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
}
add_action('customize_register', 'fs_customize_register');


// Callbacks + Sanitize

function fs_customize_partial_blogname() {
	bloginfo( 'name' );
}
function fs_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function fs_customizer_sanitize_checkbox( $input ) {
	if ( $input === true || $input === '1' ) {
		return '1';
	}
	return '';
}


// Customizer Colors Output

function fs_colors() {
	?>
	<style>
		.front-page-content::after,
		.fancybox-arrow::after,
		input[type="submit"],
		.action-btn,
		button.action-btn,
		input[type=submit].action-btn,
		thead,
		input[type="text"].focus-visible, 
		input[type="email"].focus-visible, 
		input[type="tel"].focus-visible, 
		input[type="url"].focus-visible,
		input[type="date"].focus-visible,
		input[type="password"].focus-visible,
		input[type="file"].focus-visible,
		input[type="number"].focus-visible,
		input[type="search"].focus-visible,
		textarea.focus-visible, 
		select.focus-visible,
		a.focus-visible .post-title,
		.widget-container ul li.current-cat a,
		.widget-container ul li a:hover, 
		.widget-container ul li a.focus-visible,
		.slick-dots li button:hover,
		.slick-dots li button.focus-visible,
		.skiplinks a,
		.wp-block-file a.wp-block-file__button,
		.wp-block-button .wp-block-button__link,
		.sub-menu > li a:hover, 
		.sub-menu > li a.focus-visible,
		.sub-menu > li.current-menu-item a,
		.acf-block-gallery-figure .acf-block-gallery-caption,
		.page-banner,
		.page-banner::after { 
			background-color: <?php echo get_theme_mod('primary_color', '#303030'); ?>; 
		}
		.has-primary-color-background-color {
			background-color: <?php echo get_theme_mod('primary_color', '#303030'); ?> !important; 			
		}
		
		.wp-block-gallery .blocks-gallery-image figcaption, 
		.wp-block-gallery .blocks-gallery-item figcaption { 
			background: <?php echo get_theme_mod('primary_color', '#303030'); ?>; 
		}
		legend,
		.formfield-radio input[type="radio"].focus-visible + span,
		.formfield-radio input[type="checkbox"].focus-visible + span,
		#menu-toggle span,
		#menu-toggle span::before,
		#menu-toggle span::after,
		.onepage-menu > li.current-menu-item > a,
		.slick-dots li button {
			border-color: <?php echo get_theme_mod('primary_color', '#303030'); ?>;
		}
		.onepage-menu > li > a:hover,
		.onepage-menu > li > a.focus-visible,
		.site-title a:hover,
		.site-title a.focus-visible,
		.has-text-color.has-primary-color-color,
		.comment-author-name {
			color: <?php echo get_theme_mod('primary_color', '#303030'); ?>;
		}
		
		@media only screen and (min-width: 45em) {
			
			.main-menu > li.current-menu-item > a {
				border-color: <?php echo get_theme_mod('primary_color', '#303030'); ?>;
			}
			.main-menu > li > a:hover,
			.main-menu > li > a.focus-visible {
				color: <?php echo get_theme_mod('primary_color', '#303030'); ?>;
			}
		}
		
		.formfield-radio input[type="radio"] + label::after,
		.formfield-radio input[type="radio"] + span::after,
		body::after,
		.wp-block-file a.wp-block-file__button:hover,
		.wp-block-file a.wp-block-file__button.focus-visible,
		.wp-block-button .wp-block-button__link:hover,
		.wp-block-button .wp-block-button__link.focus-visible,
		.comment-content .pending {
			background-color: <?php echo get_theme_mod('secondary_color', '#4682B4'); ?>;
		}
		.has-secondary-color-background-color {
			background-color: <?php echo get_theme_mod('secondary_color', '#4682B4'); ?> !important;
		}

		.formfield-checkbox input[type="checkbox"] + label::after,
		.formfield-checkbox input[type="checkbox"] + span::after,
		.content-area p a:not([class*="action-btn"]),
		.content-area p a:not([class*="action-btn"]):active,
		.has-text-color.has-secondary-color-color {
			color: <?php echo get_theme_mod('secondary_color', '#4682B4'); ?>
		}
		.formfield-select--container {
			border-top-color: <?php echo get_theme_mod('secondary_color', '#4682B4'); ?>;
		}
		legend,
		.content-area p a:not([class*="action-btn"]) {
			border-color: <?php echo get_theme_mod('secondary_color', '#4682B4'); ?>;
		}
		
		.has-third-color-background-color {
			background-color: <?php echo get_theme_mod('third_color', '#909090'); ?> !important; 			
		}
		.has-text-color.has-third-color-color {
			color: <?php echo get_theme_mod('third_color', '#909090'); ?> !important; 			
		}		
		
	</style>
	<?php
}
add_action('wp_head','fs_colors');
