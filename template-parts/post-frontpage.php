<?php if ( !defined('ABSPATH') ) die();
/**
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

?>
					<div class="archive-wrap<?php echo $sidebar; ?>">
		
						<?php if ( have_posts() ) : ?>
						
						<div class="archive-posts">

							<?php if ( is_active_sidebar( 'widgets_area1' ) ) {
								get_sidebar(); 
							} ?>
							
							<div class="archive-posts-content">

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