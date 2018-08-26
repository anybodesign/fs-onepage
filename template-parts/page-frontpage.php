<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Porfolio
 * @since 1.0
 * @version 1.0
 */
?>
					<div class="front-page-section"<?php fs_bg_img(); ?>>
							
						<div class="front-page-content">
							<?php get_template_part('template-parts/header', 'brand'); ?>				
							
							<div class="front-content">
								<?php the_content(); ?>
							</div>

							<button class="scroll-down">
								<?php _e('Scroll Down', 'fs-blocks'); ?>
							</button>
						</div>
							
					</div>