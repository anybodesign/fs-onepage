<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage FS_Onepage
 * @since 1.0
 * @version 1.0
 */
 
 if ( is_active_sidebar( 'widgets_area1' ) ) { 
	$sidebar = ' has-sidebar';	 
 } else {
	 $sidebar = null;
 }
get_header(); ?>
					
				<div class="single-wrap<?php echo $sidebar; ?>">

					<?php get_template_part( 'template-parts/page', 'banner' ); ?>

					<div class="post-single-content">
						<?php 
							get_sidebar();
							get_template_part( 'template-parts/post-content', get_post_format() ); 
						?>
					</div>
					
				</div>
				
<?php get_footer(); ?>