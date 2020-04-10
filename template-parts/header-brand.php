<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for the site brand.
 *
 * @package WordPress
 * @subpackage FS_Onepage
 * @since 1.0
 * @version 1.0
 */
?>

			<div class="site-brand">
				<?php if ( is_front_page() ) { ?>
				<h1 class="site-title">
					<?php get_template_part('template-parts/header', 'logo'); ?>
				</h1>
				<?php } else { ?>
				<p class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php _e('Go to Home Page', 'fs-onepage'); ?>">
					<?php get_template_part('template-parts/header', 'logo'); ?>
					</a>
				</p>
				<?php } ?>
	
				<?php 
					$site_desc = get_bloginfo( 'description', 'display' );
					if ( $site_desc || is_customize_preview() ) { ?>
					<p class="site-desc"><?php echo $site_desc; ?></p>
				<?php } ?>
							
			</div>