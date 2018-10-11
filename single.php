<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage FS_Blocks
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>
					
				<div class="single-wrap">

					<?php if ( '' != get_the_post_thumbnail() ) { ?>
					<figure class="post-figure">
						<?php the_post_thumbnail('large'); ?>
					</figure>
					<?php } ?>

					<div class="post-single-content">
	
						<?php 
							get_sidebar();
							get_template_part( 'template-parts/post-content', get_post_format() ); 
						?>
					
					</div>
					
				</div>
				
<?php get_footer(); ?>