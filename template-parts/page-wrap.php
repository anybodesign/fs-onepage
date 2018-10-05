<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying page wrap.
 *
 * @package WordPress
 * @subpackage FS_Blocks
 * @since 1.0
 * @version 1.0
 */
?>
				<div class="row">
		
					<?php while ( have_posts() ) : the_post(); ?>
		
						<?php get_template_part( 'template-parts/page', 'content' ); ?>
		
					<?php endwhile; ?>
	
				</div>
				
				<?php //get_template_part('template-parts/acf/builder'); ?>	