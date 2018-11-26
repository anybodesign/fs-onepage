<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage FS_Blocks
 * @since 1.0
 * @version 1.0
 */

 $one = get_theme_mod('onepage') == true;

?>
					<div class="front-page-section"<?php fs_bg_img(); ?> data-scroll>
							
						<div class="front-page-content" data-scroll>
							<?php get_template_part('template-parts/header', 'brand'); ?>				
							
							<?php if ( $one ) { ?>
							<div class="front-content">
								<?php the_content(); ?>
							</div>
							<?php } ?>
							
							<?php if ( $one ) { ?>
							<button class="scroll-down" data-scroll>
								<?php _e('Scroll Down', 'fs-blocks'); ?>
							</button>
							<?php } ?>
						</div>
							
					</div>