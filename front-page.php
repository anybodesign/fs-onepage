<?php if ( !defined('ABSPATH') ) die();
/**
 * The front page template file.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Onepage
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
				
			<?php // Full banner 
			
			if ( is_home() ) { // Case latest posts

				get_template_part('template-parts/page', 'frontpage-banner');
				get_template_part( 'template-parts/post', 'frontpage' );
			
			} else { // Case frontpage
			
				while ( have_posts() ) : the_post();
					get_template_part('template-parts/page', 'frontpage-banner');
				endwhile;
			?>
				
			<?php // Frontpage sections
				
				$frontpage = get_the_id();
				
				$pageargs = array(
					'posts_per_page' 	=> -1,
					'post_type' 		=> 'page',
					'post__not_in'		=> array($frontpage),
					'meta_query'		=> array(
						'relation' 		=> 'OR',
						array(
							'key'		=> '_wp_page_template',
							'value'		=> 'pagecustom-standalone.php',
							'compare'	=> '!=',
						),
					    array(
					        'key'       => '_wp_page_template',
					        'compare'   => 'NOT EXISTS',
					    ),
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
									
<?php get_footer(); ?>