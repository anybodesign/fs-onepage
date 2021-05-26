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
							<?php 	
								if ( is_home() && ! is_front_page() ) {
									single_post_title();
								} else if ( is_archive() ) {
									the_archive_title();
								} else if ( is_search() ) {
									printf( esc_html__( 'Search Results for: %s', 'fs-onepage' ), '<span class="search-term">' . get_search_query() . '</span>' );
								} else if ( is_404() ) {
									esc_html_e( 'Oops! That page can&rsquo;t be found', 'fs-onepage' );
								} else {
									the_title(); 
								}
							?>
							</h1>
							<?php 
								if ( is_single() ) {
									get_template_part('template-parts/post', 'meta'); 
								}
								if ( is_page_template( 'pagecustom-maintenance.php' ) ) {
									the_content();
								} 
							?>							
							
						</div>
						
						<?php if ( function_exists('bcn_display') && ! is_page_template( 'pagecustom-maintenance.php' ) ) { ?>
						<div class="breadcrumbs-nav">
							<nav class="inner">
								<?php bcn_display(); ?>					
							</nav>
						</div>
						<?php } ?>