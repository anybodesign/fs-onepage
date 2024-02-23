<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage FS_Onepage
 * @since 1.0
 * @version 1.0
 */
 	if (function_exists('acf_add_local_field_group')) {
		$slides = get_field('home_slides');
		$s_speed = get_field('slideshow_speed');
		$s_autospeed = get_field('slideshow_autospeed');
		$s_loop = get_field('slideshow_loop');
		if ($s_loop == false) {
			$infinite = 'false';
		} else {
			$infinite = 'true';
		}
	} else {
		$slides = null;
	}
?>
					<div class="front-page-section"<?php if (! $slides ) { fs_bg_img(); } ?> data-scroll>
						
						<?php if ( $slides && function_exists('acf_add_local_field_group') ) { ?>
							<div class="banner-slideshow">
							<?php foreach( $slides as $slide ): ?>
								<div class="slick-item">
									<img src="<?php echo esc_url($slide); ?>" alt="" />
								</div>
							<?php endforeach; ?>				
							</div>
							<?php if (!is_admin()) { 
								wp_enqueue_script('slick');
								wp_enqueue_script('slick-init');
								wp_enqueue_style('slick-css');	
							?>
							<script>
								jQuery(document).ready(function($) {
									var slideshow = $('.banner-slideshow').slick({
										autoplay: true,
										speed: <?php echo $s_speed; ?>,
										autoplaySpeed: <?php echo $s_autospeed; ?>,
										infinite: <?php echo $infinite; ?>,
										slidesToShow: 1,
										slidesToScroll: 1,
										fade: true,
										arrows: false,
										dots: false,
										draggable: false,
										swipe: false,
										touchMove: false
									});
								});
							</script>
							<?php } ?>
						<?php } ?>
						
						<div class="front-page-content" data-scroll>
							<?php get_template_part('template-parts/header', 'brand'); ?>				
							
							<div class="front-content">
								<?php the_content(); ?>
							</div>							
							<button class="scroll-down" data-scroll>
								<?php esc_html_e('Scroll Down', 'fs-onepage'); ?>
							</button>
						</div>
						
					</div>