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

 $one = get_theme_mod('onepage') == true;

?>
					<?php get_template_part('template-parts/page', 'frontpage-banner'); ?>				
					
					<?php if ( ! $one ) { ?>
					<div class="page-section">
						<div class="page-content" data-scroll>
							
							<?php the_content(); ?>
						
						</div>
					</div>
					<?php } ?>