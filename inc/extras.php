<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Amidst Sky
 * @author Deepak Bansal
 * @link http://deepak.tech
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function amidstsky_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'amidstsky_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function amidstsky_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name.
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary.
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( esc_html__( 'Page %s', 'amidst-sky' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'amidstsky_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function amidstsky_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'amidstsky_render_title' );
endif;

/**
 * Calls Google fonts
 *
 * Enqueued in functions.php
 */
function amidstsky_fonts() {
    $fonts_url = '';
	$font_families = array();

	$font_families[] = get_theme_mod( 'amidstsky_body_font' ) . ':400,400italic,700';
	$font_families[] = get_theme_mod( 'amidstsky_heading_font' ) . ':700';

	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);

	$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $fonts_url;
}

/**
 * Custom Santize for customizer settings like checkbox, radio, select
 * 
 */

function amidstsky_sanitize( $input, $setting ) {
    global $wp_customize;
 
    $control = $wp_customize->get_control( $setting->id );
 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;		
    }
}

function amidstsky_sanitize_checkbox( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}