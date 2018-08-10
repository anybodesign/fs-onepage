<?php if ( !defined('ABSPATH') ) die();
/**
 * The header for our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage FS_Porfolio
 * @since 1.0
 * @version 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper">


	<?php // The Skiplinks ?>
	
	<div class="skiplinks">
		<a href="#site_content"><?php _e('Go to main content', 'fs-porfolio'); ?></a>
		<a href="#site_nav"><?php _e('Go to main menu', 'fs-porfolio'); ?></a>
	</div>
	
	
	<header role="banner" id="site_head">
		
		<div class="row inner x-between">
			
			<?php // The Logo & Site Titles ?>
			
			<?php if (! is_front_page() ) { 
				get_template_part('template-parts/header', 'brand'); 
			} ?>
			
			<?php // The main menu location ?>
			
			<?php if ( has_nav_menu( 'main_menu' ) ) : ?>
			<nav class="site-nav" role="navigation" aria-label="<?php _e('Main menu', 'fs-porfolio'); ?>">
				<button id="menu-toggle" type="button"><?php _e('Menu', 'fs-porfolio'); ?><span></span></button>
				<?php wp_nav_menu( array(
					'theme_location'	=> 	'main_menu',
					'menu_class'		=>	'main-menu',
					'container'			=>	false,
					'walker'			=>	new fs_subnav_walker()
					));
				?>
			</nav>
			<?php endif; ?>

		</div>

	</header>
	
	
	
		<main class="content-area" role="main" id="site_content">