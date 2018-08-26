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
?>
					<div class="page-section" id="<?php the_slug(); ?>"<?php fs_bg_img(); ?>>
							
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