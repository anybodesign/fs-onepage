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
		select.focus-visible  { 
			background-color: <?php echo get_theme_mod('primary_color', '#303030'); ?>; 
		}
		input[type="submit"]:hover {
			background-color: lighten(<?php echo get_theme_mod('primary_color', '#303030'); ?>, 15%); 
		}
		legend,
		.formfield-radio input[type="radio"].focus-visible + span,
		.formfield-radio input[type="checkbox"].focus-visible + span,
		#menu-toggle span,
		#menu-toggle span::before,
		#menu-toggle span::after {
			border-color: <?php echo get_theme_mod('primary_color', '#303030'); ?>;
		}

		.onepage-menu > li.current-menu-item > a {
			border-color: <?php echo get_theme_mod('primary_color', '#303030'); ?>;
		}
		.onepage-menu > li > a:hover,
		.onepage-menu > li > a.focus-visible {
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
		body::after {
			background-color: <?php echo get_theme_mod('secondary_color', '#4682B4'); ?>;
		}
		.formfield-checkbox input[type="checkbox"] + label::after,
		.formfield-checkbox input[type="checkbox"] + span::after,
		.content-area p a:not([class*="action-btn"]),
		.content-area p a:not([class*="action-btn"]):active {
			color: <?php echo get_theme_mod('secondary_color', '#4682B4'); ?>
		}
		.formfield-select--container {
			border-top-color: <?php echo get_theme_mod('secondary_color', '#4682B4'); ?>;
		}
		legend,
		.content-area p a:not([class*="action-btn"]) {
			border-color: <?php echo get_theme_mod('secondary_color', '#4682B4'); ?>;
		}
	</style>
	<?php
}
add_action('wp_head','fs_colors');
