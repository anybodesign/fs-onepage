<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for the Logo.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Onepage
 * @since 1.0
 * @version 1.0
 */
?>

					<?php if ( get_theme_mod('site_logo_white') && is_front_page() ) { ?>
						
						<img class="logo-white" src="<?php echo(get_theme_mod('site_logo_white', 'none')); ?>" alt="<?php echo esc_url(bloginfo('name')); ?>">
					
					<?php } else if ( get_theme_mod('site_logo') && ! is_front_page() ) { ?>
						
						<img class="logo" src="<?php echo(get_theme_mod('site_logo', 'none')); ?>" alt="<?php echo esc_url(bloginfo('name')); ?>">
					
					<?php } else {
						
						echo esc_url(bloginfo('name'));
					
					} ?>
					