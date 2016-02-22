<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Amidst Sky
 * @author Deepak Bansal
 * @link http://www.dbansal.com
 */

if ( ! is_active_sidebar( 'sidebar-1' ) || esc_attr(get_theme_mod( 'amidstsky_blog_layout' )) == 'no_sidebar' ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
