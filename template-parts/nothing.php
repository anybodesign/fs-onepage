<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Porfolio
 * @since 1.0
 * @version 1.0
 */
?>

					<h2><?php esc_html_e( 'Nothing Found', 'fs-portfolio' ); ?></h2>
			
					<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			
						<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'fs-portfolio' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
			
					<?php elseif ( is_search() ) : ?>
			
						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'fs-portfolio' ); ?></p>
						
						<?php get_search_form(); ?>
			
					<?php else : ?>
			
						<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'fs-portfolio' ); ?></p>
						
						<?php get_search_form(); ?>
			
					<?php endif; ?>