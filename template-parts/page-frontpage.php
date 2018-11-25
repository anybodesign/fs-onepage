<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Blocks
 * @since 1.0
 * @version 1.0
 */
?>
					<div class="front-page-section"<?php fs_bg_img(); ?> data-scroll>
							
						<div class="front-page-content" data-scroll>
							<?php get_template_part('template-parts/header', 'brand'); ?>				
							
							<div class="front-content">
								<?php the_content(); ?>
							</div>
							
							<?php if ( get_theme_mod('onepage') == true ) { ?>
							<button class="scroll-down" data-scroll>
								<?php _e('Scroll Down', 'fs-blocks'); ?>
							</button>
							<?php } ?>
						</div>
							
					</div>