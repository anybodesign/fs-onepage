<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Onepage
 * @since 1.0
 * @version 1.0
 */
?>
					<?php while (have_posts()) : the_post(); ?>
					
					<div class="post-container">

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>" data-scroll>
							
							<?php if ( '' != get_the_post_thumbnail() ) { ?>
							<div class="post-banner">
								<?php the_post_thumbnail( 'post-hd' ) ?>
							</div>
							<?php } ?>
							
							<?php if ( get_theme_mod('modals') == true ) { ?>
							<header class="post-header">
								<h1 class="page-title"><?php the_title(); ?></h1>
								<?php get_template_part( 'template-parts/post', 'meta' ); ?>
							</header>
							<?php } ?>
							
							<div class="post-content">
								<?php the_content(); ?>
							</div>
							
							<footer class="post-footer">
								<?php $posttags = get_the_tags(); if ($posttags) { ?>
								  	<div class="tag-links">
										<p><?php esc_html_e( 'Tagged with:', 'fs-onepage' ); ?></p>
										<?php the_tags('<ul><li>', '</li><li>', '</li></ul>'); ?>
								  	</div>
								<?php } ?>					
								
								<?php 
									wp_link_pages(array(
										'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fs-onepage' ),
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
					
