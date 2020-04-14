<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Onepage
 * @since 1.0
 * @version 1.0
 */
?>
					<div class="page-wrap">

						<?php if ( '' != get_the_post_thumbnail() ) { ?>
						<div class="page-banner" data-scroll>
							<?php the_post_thumbnail('large-hd'); ?>
						</div>
						<?php } ?>
						
						<div class="page-content">
							
							<h1 class="page-title">
								<?php the_title(); ?>
							</h1>

							<?php the_content(); ?>
						</div>

					</div>