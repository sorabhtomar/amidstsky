<?php
/**
 * Jetpack Compatibility File.
 *
 * See: https://jetpack.me/
 *
 * @package Amidst Sky
 * @author Deepak Bansal
 * @link http://www.dbansal.com
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function amidstsky_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'amidstsky_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function amidstsky_jetpack_setup
add_action( 'after_setup_theme', 'amidstsky_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function amidstsky_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function amidstsky_infinite_scroll_render
