<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying posts blocks.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Onepage
 * @since 1.0
 * @version 1.0
 */
?>
					<div class="post-container">
						
						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>" data-scroll>
							
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php if ( '' != get_the_post_thumbnail() ) { ?>
								<div class="post-figure">
									<?php the_post_thumbnail('large'); ?>
								</div>
								<?php } ?>
								
								<header class="post-header">
									<h3 class="post-title h4-like">
										<?php the_title(); ?>
									</h3>
								</header>
							</a>
							
							<div class="post-content">
								<?php the_excerpt(); ?>
							</div>
							
						</article>

					</div>					