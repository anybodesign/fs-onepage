<?php if ( !defined('ABSPATH') ) die();
/**
 * The header for our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage FS_Blocks
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

	<?php if ( get_theme_mod('onepage') == true && ! is_404()) { ?>
	
	<?php // The Skiplinks ?>
	
	<div class="skiplinks">
		<a href="#site_content"><?php _e('Go to main content', 'fs-blocks'); ?></a>
		<?php if ( has_nav_menu( 'main_menu' ) ) { ?>
		<a href="#site_nav"><?php _e('Go to main menu', 'fs-blocks'); ?></a>
		<?php } ?>
	</div>
	
	
	<header role="banner" id="site_head">
		
		<div class="row inner x-between">
			
			<?php // The Logo & Site Titles ?>
			
			<?php if (! is_front_page() ) { 
				get_template_part('template-parts/header', 'brand'); 
			} ?>
			
			<?php // The main menu location ?>

			<nav class="site-nav<?php if ( get_theme_mod('onepage') == true ) { echo ' onepage-nav'; } ?>" role="navigation" aria-label="<?php _e('Main menu', 'fs-blocks'); ?>">

				<?php 
					
					if ( get_theme_mod('onepage') == true ) { 
						
						$frontpage = get_the_id();
						
						$pageargs = array(
							'posts_per_page' 	=> -1,
							'post_type' 		=> 'page',
							'post__not_in'		=> array($frontpage),
							'meta_query'		=> array(
								array(
									'key'		=> '_wp_page_template',
									'value'		=> 'pagecustom-standalone.php',
									'compare'	=> '!='
								)
							),							
						);
						$onepage = new WP_Query($pageargs);
			
						if ($onepage->have_posts()) : ?>
						
						<ul class="onepage-menu">
						<?php while ($onepage->have_posts()) : $onepage->the_post(); ?>
					
							<li><a href="#<?php the_slug(); ?>"><?php the_title(); ?></a></li>
	
						<?php endwhile; wp_reset_postdata(); ?>
						</ul>
						
						<?php endif; ?>
							
					<?php 
							
					} else { ?>

				<button id="menu-toggle" type="button"><?php _e('Menu', 'fs-blocks'); ?><span></span></button>
						<?php if ( has_nav_menu( 'main_menu' ) ) {
							wp_nav_menu( array(
								'theme_location'	=> 	'main_menu',
								'menu_class'		=>	'main-menu',
								'container'			=>	false,
								'walker'			=>	new fs_subnav_walker()
							));
						}
					}
				?>
				
			</nav>
		</div>

	</header>
	
	<?php } ?>	
	
		<main class="content-area" role="main" id="site_content">