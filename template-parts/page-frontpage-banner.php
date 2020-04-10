<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage FS_Onepage
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
							<button class="scroll-down" data-scroll>
								<?php _e('Scroll Down', 'fs-onepage'); ?>
							</button>
						</div>
							
					</div>