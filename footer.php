<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage FS_Onepage
 * @since 1.0
 * @version 1.0
 */
?>
		</main> <?php // END content ?>
		
		<?php if ( ! is_page_template( 'pagecustom-maintenance.php' ) ) { ?>
		<footer role="contentinfo" id="site_foot">
			<div class="footer-wrap">
				
				<?php if ( is_active_sidebar( 'widgets_area2' ) ) { ?>
				<div class="footer-widget-container">
					<?php dynamic_sidebar( 'widgets_area2' ); ?>
				</div>
				<?php } ?>

				
				<div class="footer-content">				
					
					<?php // The credit/copyright line, settings in the Customizer ?>
					
					<p class="footer-copyright">
						<?php if(get_theme_mod('footer_text')) {
							echo get_theme_mod('footer_text', ''); 
						} else {
							echo '&copy;'; echo date(' Y '); echo esc_url(bloginfo('name')).'.'; 	
						} ?>
						
						<?php if(get_theme_mod('display_wp') == true) { ?>
						<a href="//wordpress.org" class="wp-love"><?php _e('Powered by WordPress!', 'fs-onepage'); ?></a>
						<?php } ?>
					</p>
					
					<?php // The footer menu location ?>
					
					<?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
					<nav class="footer-nav" aria-label="<?php _e('Footer menu', 'fs-onepage'); ?>">
					<?php wp_nav_menu( array(
							'theme_location'	=> 	'footer_menu',
							'menu_class'		=>	'footer-menu',
							'container'			=>	false
							));
					?>
					</nav>
					<?php endif; ?>
					
				</div>
			</div>
			
		</footer>
		<?php } ?>

		
</div> <?php // END wrapper ?>

<?php wp_footer(); ?>

</body>
</html>
