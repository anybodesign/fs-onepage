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
 
	if ( get_theme_mod('onepage') == true ) {
		$h = 'h2';
	} else {
		$h = 'h1';	
	}
	
	$tpl = get_page_template_slug( $post->ID );
	
	if ( $tpl == 'pagecustom-image.php' ) {
		$animated = ' animated-image';
	} else if ( $tpl == 'pagecustom-image-reverse.php' ) {
		$animated = ' animated-image reverse';
	} else {
		$animated = null;
	}
		
?>
					<div class="page-section<?php echo $animated; ?>" id="<?php the_slug(); ?>"<?php if (! $animated) { fs_bg_img(); } ?>>
							
						<<?php echo $h; ?> class="page-title" data-scroll>
							<?php the_title(); ?>
						</<?php echo $h; ?>>


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
							
								<?php if ( get_theme_mod('carousel_posts') == true ) { 
									$carousel = 'the-carousel-posts';
								} else {
									$carousel = 'the-regular-posts';
								} ?>
								
								<div class="<?php echo $carousel; ?>">
									<div class="the-posts">
									
									<?php while ($query->have_posts()) : $query->the_post();
										
										get_template_part( 'template-parts/post', 'block' );
									
									endwhile; wp_reset_postdata(); ?>
	
									</div>
								</div>
							
							<?php endif; ?>
	
							<?php } ?>		
							
						</div>
						
						<?php if ($animated) { ?> 
							<?php if ( '' != get_the_post_thumbnail() ) { ?>
							<figure class="page-figure" data-scroll>
								<?php the_post_thumbnail('large-hd'); ?>
							</figure>
							<?php } ?>
						<?php } ?>

					</div>