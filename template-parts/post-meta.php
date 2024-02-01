<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying the post meta.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Onepage
 * @since 1.0
 * @version 1.0
 */
?>

							<div class="post-meta">
								<p class="meta-infos">
									<?php esc_html_e( 'Posted on&nbsp;', 'fs-onepage' ); ?><?php echo the_time( get_option('date_format') ); ?>
									<?php if ( get_theme_mod('meta_author') != false ) {
										esc_html_e( 'by&nbsp;', 'fs-onepage' ); the_author(); 
									} ?>
									<?php if ( get_theme_mod('meta_category') != false ) {
										esc_html_e( 'in&nbsp;', 'fs-onepage' ); the_category(', '); 
									} ?>
								</p>
								
								<?php $comment = get_comments_number(); if ( $comment > 0 ) : ?>
								<p class="meta-comments">
									<a href="<?php the_permalink() ?>#comments">
										<?php printf( _n( '%s comment', '%s comments', $comment, 'fs-onepage' ), $comment ); ?>
									</a>
								</p>
								<?php endif; ?>
							</div>