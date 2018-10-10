<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Blocks
 * @since 1.0
 * @version 1.0
 */
?>
					<?php while (have_posts()) : the_post(); ?>
					
					<?php if ( '' != get_the_post_thumbnail() ) { ?>
					<figure class="post-figure">
						<?php the_post_thumbnail('large'); ?>
					</figure>
					<?php } ?>
	
					<div class="post-single-content">
						
						<div class="post-single">
	
							<article <?php post_class(); ?> id="post-<?php the_ID(); ?>" data-scroll>
								
								<header class="post-header">
									<h1 class="post-title">
										<?php the_title(); ?>
									</h1>
									<?php get_template_part('template-parts/post', 'meta'); ?>							
								</header>
								
								<div class="post-content">
									<?php the_content(); ?>
								</div>
								
								<footer class="post-footer">
									<?php $posttags = get_the_tags(); if ($posttags) { ?>
									  	<div class="tag-links">
											<p><?php _e( 'Tagged with:', 'fs-blocks' ); ?></p>
											<?php the_tags('<ul><li>', '</li><li>', '</li></ul>'); ?>
									  	</div>
									<?php } ?>					
									
									<?php 
										wp_link_pages(array(
											'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fs-blocks' ),
											'after'  => '</div>',
										));
									?>
								</footer>
														
							</article>
							
							
							<?php 
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
							?>
	
	
						</div>						
						
					<?php endwhile; ?>
					
