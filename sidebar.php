<?php if ( !defined('ABSPATH') ) die();
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * 
 * @package WordPress
 * @subpackage FS_Onepage
 * @since 1.0
 * @version 1.0
 */
?>
				<?php if ( is_active_sidebar( 'widgets_area1' ) ) { ?>
				<aside class="post-sidebar" role="complementary" data-scroll>
					<div class="sidebar-content">
					<?php dynamic_sidebar( 'widgets_area1' ); ?>
					</div>
				</aside>
				<?php } ?>