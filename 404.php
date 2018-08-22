<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage FS_Porfolio
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
					
				<div class="page-section error-404 not-found" id="<?php the_slug(); ?>"<?php fs_bg_img(); ?>>
					<div class="page-content">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found', 'fs-porfolio' ); ?></h1>
							
						<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'fs-porfolio' ); ?></p>
						<p><a class="action-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Go to Home Page', 'fs-porfolio'); ?></a></p>

					</div>		
												
				</div>

<?php get_footer(); ?>