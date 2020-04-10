<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Onepage
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

					<div class="archive-wrap has-sidebar">
		
						<?php if ( have_posts() ) : ?>
						
						<div class="archive-posts">

							<?php get_sidebar(); ?>
							
							<div class="archive-posts-content">
							
								<header class="page-header">
									<?php if ( is_archive() ) { 
										the_archive_title( '<h1 class="page-title">', '</h1>' ); 
										the_archive_description( '<div class="taxonomy-desc">', '</div>' ); 
									} else { 
										single_post_title('<h1>','</h1>'); 
									} ?>
								</header>				
	
								<div class="the-regular-posts">
									<div class="the-posts">
									
									<?php while (have_posts()) : the_post();
										
										get_template_part( 'template-parts/post', 'block' );
									
									endwhile; wp_reset_postdata(); ?>
	
									</div>
								</div>
					
								<?php the_posts_navigation(); ?>
								
							</div>
							
						</div>
						
						<?php else : ?>
						
						<div class="archive-posts">
							<?php get_template_part( 'template-parts/nothing' ); ?>
						</div>
						
						<?php endif; ?>	
											
					</div>
					
				
<?php get_footer(); ?>