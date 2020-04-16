<?php if ( !defined('ABSPATH') ) die();
/**
 * The main template file.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Onepage
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>
			
				<div class="page-wrap">
				<?php 
					get_template_part( 'template-parts/page', 'banner' ); 
					get_template_part( 'template-parts/post', 'archive' ); 
				?>
				</div>
								
<?php get_footer(); ?>