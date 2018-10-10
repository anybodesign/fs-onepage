<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Blocks
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

					<div class="archive-wrap">
						
		
						<?php if ( have_posts() ) : ?>
				
							<header class="page-header">
								<?php
									the_archive_title( '<h1 class="page-title">', '</h1>' );
									the_archive_description( '<div class="taxonomy-desc">', '</div>' );
								?>
							</header>				
				

								<div class="the-regular-posts">
									<div class="the-posts">
									
									<?php while (have_posts()) : the_post();
										
										get_template_part( 'template-parts/post', 'block' );
									
									endwhile; wp_reset_postdata(); ?>
	
									</div>
								</div>


				
							<?php the_posts_navigation(); ?>
				
						<?php else : ?>
		
							<?php get_template_part( 'template-parts/nothing' ); ?>
					
						<?php endif; ?>	

											
					</div>
				
<?php get_footer(); ?>