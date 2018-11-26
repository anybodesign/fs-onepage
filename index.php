<?php if ( !defined('ABSPATH') ) die();
/**
 * The main template file.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Blocks
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>

					<?php get_template_part( 'template-parts/post', 'frontpage' ); ?>

<?php get_footer(); ?>