<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying page wrap.
 *
 * @package WordPress
 * @subpackage FS_Blocks
 * @since 1.0
 * @version 1.0
 */
 
 	if ( is_page_template('pagecustom-image.php') ) {
		$template = ' animated-image';
	} else {
		$template = null;
	}
?>
				
				
				<div class="row<?php echo $template; ?>">
		
					<?php while ( have_posts() ) : the_post(); ?>
		
						<?php get_template_part( 'template-parts/page', 'content' ); ?>
		
					<?php endwhile; ?>
	
				</div>