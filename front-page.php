<?php if ( !defined('ABSPATH') ) die();
/**
 * The front page template file.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Porfolio
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

				<div class="row">
					
					<div class="inner">
	
					<?php 
						while ( have_posts() ) : the_post();
						
							get_template_part( 'template-parts/page', 'frontpage' ); 
		
						endwhile;
					?>
					
					</div>
					
					
					<?php 
						$pageargs = array(
							'posts_per_page' 	=> -1,
							'post_type' 		=> 'page'
						);
						$onepage = new WP_Query($pageargs);
					?>						
				
					<?php if ($onepage->have_posts()) : ?>
					
					<div class="inner">
										
						<?php 
							while ($onepage->have_posts()) : $onepage->the_post(); 
					
							get_template_part( 'template-parts/page', 'section' );

							endwhile; 
							wp_reset_postdata(); 
						?>
					</div>
					
					<?php endif; ?>
									
				</div>

<?php get_footer(); ?>