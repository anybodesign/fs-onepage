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
					
						<?php 
							if ( is_active_sidebar( 'widgets_area1' ) ) {
								get_sidebar(); 
							} 
						?>
						
						<div class="post-container">

							<div class="the-regular-posts">
								<div class="the-posts" id="posts_list">
								
								<?php 
									while (have_posts()) : the_post();
										get_template_part( 'template-parts/post', 'block' );
									endwhile;
									wp_reset_postdata();
								?>

								</div>
								
								<?php if ( get_theme_mod('load_ias') == true ) { ?>
								<?php 
									$pages = get_the_posts_pagination();
									if (! empty( $pages) ) {
								?>
								<div class="spinner">
									<img src="<?php echo FS_THEME_URL; ?>/img/spinner.svg" alt="">
								</div>
								<div class="trigger">
									<button id="post_trigger" class="action-btn"><?php _e('Load more', 'fs-onepage'); ?></button>
								</div>
								<div class="no-more">
									<p class="text-intro">
										<?php _e('No more posts', 'fs-onepage'); ?>
									</p>
								</div>
								<?php } ?>
								<?php } ?>
							</div>
							
							<div class="post-navigation" id="posts_nav">
							<?php
								if ( function_exists('wp_pagenavi') ) {
									wp_pagenavi();
								} else {
									the_posts_pagination(array(
										'prev_text'          => __( 'Previous page', 'fs-onepage' ),
										'next_text'          => __( 'Next page', 'fs-onepage' ),
										'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'fs-onepage' ) . ' </span>',
									));
								}
							?>
							</div>
							
						</div>

					
					<?php else : ?>
					
						<?php get_template_part( 'template-parts/nothing' ); ?>
					
					<?php endif; ?>	
										
					</div>