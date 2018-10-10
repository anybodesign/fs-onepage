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

					<?php 
						get_template_part( 'template-parts/post-content', get_post_format() ); 
						get_sidebar();
					?>
					
					</div> <?php // End single-content ?>
					
				</div>
				
<?php get_footer(); ?>