<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage FS_Onepage
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

				<div class="page-wrap">
					
					<?php get_template_part( 'template-parts/page', 'banner' ); ?>

					<div class="page-content error-404 not-found">
						<div class="page-content">
							<p class="text-intro"><?php esc_html_e( 'It looks like nothing was found at this location.', 'fs-onepage' ); ?></p>
							<p><a class="action-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Go to Home Page', 'fs-onepage'); ?></a></p>
						</div>		
					</div>

				</div>					

<?php get_footer(); ?>