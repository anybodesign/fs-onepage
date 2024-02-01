<?php defined('ABSPATH') or die(); 

function fs_homeslides_fields() {

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group( array(
	'key' => 'group_655c90c638658',
	'title' => __( 'Slideshow', 'fs-onepage' ),
	'fields' => array(
		array(
			'key' => 'field_655c90c6b09cf',
			'label' => __( 'Slides', 'fs-onepage' ),
			'name' => 'home_slides',
			'aria-label' => '',
			'type' => 'gallery',
			'instructions' => __( 'Banner slideshow instead of a single picture', 'fs-onepage' ),
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'library' => 'all',
			'min' => '',
			'max' => '',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
			'insert' => 'append',
			'preview_size' => 'medium',
		),
		array(
			'key' => 'field_60f826919a0d5',
			'label' => __('Slides duration', 'fs-onepage'),
			'name' => 'slideshow_autospeed',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'default_value' => 1000,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_60f8224e9d3e2',
			'label' => __('Slideshow speed', 'fs-onepage'),
			'name' => 'slideshow_speed',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'default_value' => 1000,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_60f8226f9d3e3',
			'label' => __('Loop', 'fs-onepage'),
			'name' => 'slideshow_loop',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_type',
				'operator' => '==',
				'value' => 'front_page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
) );

endif;

}
add_action('acf/init', 'fs_homeslides_fields');