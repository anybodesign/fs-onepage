<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage FS_Onepage
 * @since 1.0
 * @version 1.0
 */
?>
						<div class="page-banner" data-scroll <?php fs_bg_img(); ?>>
							<h1 class="page-title">
								<?php the_title(); ?>
							</h1>
							<?php if ( is_single() ) {
								get_template_part('template-parts/post', 'meta'); 
							} ?>							
							
						</div>