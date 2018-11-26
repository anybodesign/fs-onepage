<?php if ( !defined('ABSPATH') ) die();
/**
 * The front page template file.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Blocks
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
				
			<?php if ( is_home() ) {

				get_template_part('template-parts/page', 'frontpage-banner');
				get_template_part( 'template-parts/post', 'frontpage' );
				
			} else { ?>
				
				<?php // Banner output
					
					while ( have_posts() ) : the_post();
					
						get_template_part( 'template-parts/page', 'frontpage' ); 
					
					endwhile;
				?>
				
				
				<?php // One-page output
					
					if ( get_theme_mod('onepage') == true ) { 

						$frontpage = get_the_id();
						
						$pageargs = array(
							'posts_per_page' 	=> -1,
							'post_type' 		=> 'page',
							'post__not_in'		=> array($frontpage),
							'meta_query'		=> array(
								array(
									'key'		=> '_wp_page_template',
									'value'		=> 'pagecustom-standalone.php',
									'compare'	=> '!='
								)
							),
						);
						$onepage = new WP_Query($pageargs);
			
			
					if ($onepage->have_posts()) :
					while ($onepage->have_posts()) : $onepage->the_post(); 
				
						get_template_part( 'template-parts/page', 'section' );

					endwhile; 
					wp_reset_postdata(); 
					endif;
				
				} ?>


			<?php } ?>
									
<?php get_footer(); ?>