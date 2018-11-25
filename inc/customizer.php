<?php defined('ABSPATH') or die();
/**
 * FS Blocks Customizer functionality
 *
 * @package WordPress
 * @subpackage FS_Blocks
 * @since 1.0
 * @version 1.0
 */
 
 
 // Customizer Settings
 
function fs_customize_register($wp_customize) {
	 
	// Create Some Sections
	
	$wp_customize->add_section('fs_options_section', array(
		'title' 		=> __('Theme Options', 'fs-blocks'),
		'description' 	=> __('Theme customisation', 'fs-blocks'),
		'priority'		=> 30,
	));
	$wp_customize->add_section('fs_color_section', array(
		'title' 		=> __('Theme Colors', 'fs-blocks'),
		'description' 	=> __('Colors customisation', 'fs-blocks'),
		'priority'		=> 40,
	));
	
	// Primary color
	
	$wp_customize->add_setting('primary_color', array(
		'default'			=> '303030',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'capability'		=> 'edit_theme_options',
		'type'				=> 'theme_mod',
		'transport'			=> 'refresh', 
	));
	$wp_customize->add_control( new WP_Customize_Color_control($wp_customize, 'primary_color_ctrl', array(
		'label'		=> __('Primary color', 'fs-blocks'),
		'section'	=> 'colors',
		'settings'	=> 'primary_color',
	)));
	
	// Secondary color
	
	$wp_customize->add_setting('secondary_color', array(
		'default'			=> '4682B4',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'capability'		=> 'edit_theme_options',
		'type'				=> 'theme_mod',
		'transport'			=> 'refresh', 
	));
	$wp_customize->add_control( new WP_Customize_Color_control($wp_customize, 'secondary_color_ctrl', array(
		'label'		=> __('Secondary color', 'fs-blocks'),
		'section'	=> 'colors',
		'settings'	=> 'secondary_color',
	)));
	
	// Contrast color
	
	$wp_customize->add_setting('third_color', array(
		'default'			=> '909090',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'capability'		=> 'edit_theme_options',
		'type'				=> 'theme_mod',
		'transport'			=> 'refresh', 
	));
	$wp_customize->add_control( new WP_Customize_Color_control($wp_customize, 'third_color_ctrl', array(
		'label'		=> __('Contrast color', 'fs-blocks'),
		'section'	=> 'colors',
		'settings'	=> 'third_color',
	)));

		
	// Site logo
	
	$wp_customize->add_setting('site_logo', array(
		'default'				=> '',
		'sanitize_callback'		=> 'esc_url_raw'
	));
	
	$wp_customize->add_control( new WP_Customize_Image_control($wp_customize, 'site_logo_ctrl', array(
		'label'			=> __('Site Logo', 'fs-blocks'),
		'section'		=> 'title_tagline',
		'settings'		=> 'site_logo',
	)));	

	// One Page Style
	
	$wp_customize->add_setting('onepage', array(
		'default'	=> false,
		'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',				
	));
	$wp_customize->add_control('onepage_ctrl', array(
		'type'			=> 'checkbox',
		'label'			=> __('Make your website a one-page', 'fs-blocks'),
		'section'		=> 'fs_options_section',
		'settings'		=> 'onepage',
	));
	
	// Carousel for Posts
	
	$wp_customize->add_setting('carousel_posts', array(
		'default'	=> false,
		'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',				
	));
	$wp_customize->add_control('carousel_posts_ctrl', array(
		'type'			=> 'checkbox',
		'label'			=> __('Display your posts like a carousel', 'fs-blocks'),
		'section'		=> 'fs_options_section',
		'settings'		=> 'carousel_posts',
	));	

	// Open News in Modals
	
	$wp_customize->add_setting('modals', array(
		'default'	=> false,
		'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',				
	));
	$wp_customize->add_control('modals_ctrl', array(
		'type'			=> 'checkbox',
		'label'			=> __('Open your posts with Fancybox', 'fs-blocks'),
		'section'		=> 'fs_options_section',
		'settings'		=> 'modals',
	));	
	
	// Footer text
	
	$wp_customize->add_setting('footer_text', array(
		'default'				=> '',
		'sanitize_callback'		=> 'sanitize_text_field'
	));
	$wp_customize->add_control('footer_text_ctrl', array(
		'label'			=> __('Custom footer text', 'fs-blocks'),
		'description'	=> __('Add a custom text instead of the year and blog name.', 'fs-blocks'),
		'section'		=> 'fs_options_section',
		'settings'		=> 'footer_text',
	));	
	
	// WP Credits
	
	$wp_customize->add_setting('display_wp', array(
		'default'			=> false,
		'sanitize_callback'	=> 'fs_customizer_sanitize_checkbox',		
	));
	
	$wp_customize->add_control('display_wp_ctrl', array(
		'type'			=> 'checkbox',
		'label'			=> __('Display WordPress Link', 'fs-blocks'),
		'section'		=> 'fs_options_section',
		'settings'		=> 'display_wp',
	));


	 
}
add_action('customize_register', 'fs_customize_register');


// Sanitize

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
		.widget_categories ul li.current-cat a,
		.widget_categories ul li a:hover, 
		.widget_categories ul li a.focus-visible,
		.widget_nav_menu ul li.current-cat a,
		.widget_nav_menu ul li a:hover, 
		.widget_nav_menu ul li a.focus-visible,
		.slick-dots li button:hover,
		.slick-dots li button.focus-visible,
		.skiplinks a,
		.wp-block-file a.wp-block-file__button,
		.wp-block-button .wp-block-button__link { 
			background-color: <?php echo get_theme_mod('primary_color', '#303030'); ?>; 
		}
		.has-primary-color-background-color {
			background-color: <?php echo get_theme_mod('primary_color', '#303030'); ?> !important; 			
		}
		
		.wp-block-gallery .blocks-gallery-image figcaption, 
		.wp-block-gallery .blocks-gallery-item figcaption  { 
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
		.has-text-color.has-primary-color-color {
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
		
		.action-btn:hover,
		button.action-btn:hover,
		input[type=submit].action-btn:hover,
		.action-btn.focus-visible,
		button.action-btn.focus-visible,
		input[type=submit].action-btn.focus-visible,
		.formfield-radio input[type="radio"] + label::after,
		.formfield-radio input[type="radio"] + span::after,
		body::after,
		input[type="submit"]:hover,
		.wp-block-file a.wp-block-file__button:hover,
		.wp-block-file a.wp-block-file__button.focus-visible,
		.wp-block-button .wp-block-button__link:hover,
		.wp-block-button .wp-block-button__link.focus-visible {
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
