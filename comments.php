<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying comments
 *
 * @package WordPress
 * @subpackage FS_Onepage
 * @since 1.0
 * @version 1.0
 */

if ( post_password_required() ) {
	return;
}
?>

					<div class="post-comments" id="comments" data-scroll>

					<?php if ( have_comments() ) : ?>
						<h3 class="comments-title"><?php _e('They talk about it','fs-onepage'); ?></h3>
				
						<ol class="comment-list">
							<?php
								wp_list_comments( array(
								    'callback' => 'fs_custom_comments',
								));
							?>
						</ol>
						
						<div>
							<?php paginate_comments_links(); ?>
						</div>
				
					<?php endif;?>
				
					<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
						<p class="no-comments"><?php _e( 'Comments are closed.', 'fs-onepage' ); ?></p>
					<?php endif; ?>
					
					<?php
						$comments_args = array(
					        'title_reply' => __('Do we talk about it?', 'fs-onepage'),
					        'label_submit' => __('Add my comment!', 'fs-onepage')
						);
						comment_form($comments_args);
					?>
				
					</div>