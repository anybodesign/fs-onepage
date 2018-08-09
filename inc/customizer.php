<?php defined('ABSPATH') or die();
/**
 * FS Porfolio Customizer functionality
 *
 * @package WordPress
 * @subpackage FS_Porfolio
 * @since 1.0
 * @version 1.0
 */
 
 
 // Customizer Settings
 
function fs_customize_register($wp_customize) {
	 
	// Create Some Sections
	
	$wp_customize->add_section('fs_color_section', array(
		'title' 		=> __('Theme Colors', 'fs-porfolio'),
		'description' 	=> __('Colors customisation', 'fs-porfolio'),
		'priority'		=> 40,
	));
	$wp_customize->add_section('fs_options_section', array(
		'title' 		=> __('Theme Options', 'fs-porfolio'),
		'description' 	=> __('Theme customisation', 'fs-porfolio'),
		'priority'		=> 30,
	));
	
	
	// Primary color
	
	$wp_customize->add_setting('primary_color', array(
		'default'			=> '9c0',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'capability'		=> 'edit_theme_options',
		'type'				=> 'theme_mod',
		'transport'			=> 'refresh', 
	));
	$wp_customize->add_control( new WP_Customize_Color_control($wp_customize, 'primary_color_ctrl', array(
		'label'		=> __('Primary color', 'fs-porfolio'),
		'section'	=> 'colors',
		'settings'	=> 'primary_color',
	)));
	
	// Secondary color
	
	$wp_customize->add_setting('secondary_color', array(
		'default'			=> '606060',
		'sanitize_callback'	=> 'sanitize_hex_color',
		'capability'		=> 'edit_theme_options',
		'type'				=> 'theme_mod',
		'transport'			=> 'refresh', 
	));
	$wp_customize->add_control( new WP_Customize_Color_control($wp_customize, 'secondary_color_ctrl', array(
		'label'		=> __('Secondary color', 'fs-porfolio'),
		'section'	=> 'colors',
		'settings'	=> 'secondary_color',
	)));

		
	// Site logo
	
	$wp_customize->add_setting('site_logo', array(
		'default'				=> '',
		'sanitize_callback'		=> 'esc_url_raw'
	));
	
	$wp_customize->add_control( new WP_Customize_Image_control($wp_customize, 'site_logo_ctrl', array(
		'label'			=> __('Site Logo', 'fs-porfolio'),
		'section'		=> 'title_tagline',
		'settings'		=> 'site_logo',
	)));	

	// One Page Style
	
	$wp_customize->add_setting('onepage', array(
		'default'	=> true,
		'sanitize_callback'	=> 'fsc_customizer_sanitize_checkbox',				
	));
	$wp_customize->add_control('onepage_ctrl', array(
		'type'			=> 'checkbox',
		'label'			=> __('Make your website a one-page', 'fs-portfolio'),
		'section'		=> 'fs_options_section',
		'settings'		=> 'onepage',
	));	

	// Open News in Modals
	
	$wp_customize->add_setting('modals', array(
		'default'	=> true,
		'sanitize_callback'	=> 'fsc_customizer_sanitize_checkbox',				
	));
	$wp_customize->add_control('modals_ctrl', array(
		'type'			=> 'checkbox',
		'label'			=> __('Open your posts with Fancybox', 'fs-portfolio'),
		'section'		=> 'fs_options_section',
		'settings'		=> 'modals',
	));	
	
	// Footer text
	
	$wp_customize->add_setting('footer_text', array(
		'default'				=> '',
		'sanitize_callback'		=> 'sanitize_text_field'
	));
	$wp_customize->add_control('footer_text_ctrl', array(
		'label'			=> __('Custom footer text', 'fs-porfolio'),
		'description'	=> __('Add a custom text instead of the year and blog name.', 'fs-porfolio'),
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
		'label'			=> __('Display WordPress Link', 'fs-porfolio'),
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
		.something { 
			background-color: <?php echo get_theme_mod('primary_color', '#9c0'); ?> 
		}
		
		.something { 
			color: <?php echo get_theme_mod('primary_color', '#9c0'); ?> 
		}
		
		.something {
			background-color: <?php echo get_theme_mod('secondary_color', '#606060'); ?>
		}
		.something {
			color: <?php echo get_theme_mod('secondary_color', '#606060'); ?>
		}
	</style>
	<?php
}
add_action('wp_head','fs_colors');
