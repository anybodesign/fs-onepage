<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Porfolio
 * @since 1.0
 * @version 1.0
 */
?>
		<?php if ( '' != get_the_post_thumbnail() ) {
			$img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large-hd' );
			$bg = ' style="background-image: url('.$img_url[0].')"';
		} else {
			$bg = null;	
		} ?>

					<div class="page-section"<?php echo $bg; ?>>
						
						<div class="inner">
							
							<?php if ( get_theme_mod('onepage') == true ) {
								$h = 'h2';
							} else {
								$h = 'h1';	
							} ?>
							
							<<?php echo $h; ?> class="page-title"><?php the_title(); ?></<?php echo $h; ?>>

							<div class="page-content">
								<?php the_content(); ?>
							</div>
							
						</div>

					</div>