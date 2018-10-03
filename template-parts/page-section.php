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
?>
					<div class="page-section" id="<?php the_slug(); ?>"<?php fs_bg_img(); ?> data-scroll>
							
						<?php if ( get_theme_mod('onepage') == true ) {
							$h = 'h2';
						} else {
							$h = 'h1';	
						} ?>
						
						<<?php echo $h; ?> class="page-title" data-scroll><?php the_title(); ?></<?php echo $h; ?>>

						<div class="page-content" data-scroll>
							<?php the_content(); ?>
							
							<?php
								
								// Check if it is the page for posts
								
								$id_page = get_the_id();	
								$id_news = get_option('page_for_posts');
								
								if ( $id_page == $id_news ) { ?>
							
							<?php				
								// Posts Loop 
								
								$args = array(
									'posts_per_page' 	=> -1,
									'post_type' 		=> 'post'
								);
								$query = new WP_Query($args);
							?>						
					
							<?php if ($query->have_posts()) : ?>								
							
							<div class="the-posts">
								
								<?php while ($query->have_posts()) : $query->the_post(); ?>
									
								<div class="post">
									<?php the_title(); ?>	
								</div>
									
								<?php endwhile; wp_reset_postdata(); ?>
		
							<?php endif; ?>
	
							</div>
							
							<?php } ?>		
							
						</div>

					</div>