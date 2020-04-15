<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying page wrap.
 *
 * @package WordPress
 * @subpackage FS_Onepage
 * @since 1.0
 * @version 1.0
 */
?>

				<?php while ( have_posts() ) : the_post(); ?>
	
					<?php get_template_part( 'template-parts/page', 'content' ); ?>
	
				<?php endwhile; ?>