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

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-scroll>
						
						<?php if ( '' != get_the_post_thumbnail() ) { ?>
						<figure class="post-figure">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
						</figure>
						<?php } ?>
						
						<header class="post-header">
							<?php if ( is_single() ) { ?>
								<h1 class="post-title"><?php the_title(); ?></h1>
							<?php } else { ?>
								<h3 class="post-title"><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a></h3>
							<?php } ?>
							
							<?php if ( is_single() ) { get_template_part('template-parts/post', 'meta'); } ?>							
						</header>
						
						<div class="post-content">
							<?php if ( is_single() ) { ?>
								<?php the_content(); ?>
							<?php } else { ?>
								<?php the_excerpt(); ?>
							<?php } ?>
						</div>
						
						<?php if ( is_single() ) { ?>
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
						<?php } ?>
												
					</article>