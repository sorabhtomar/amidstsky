<?php
/**
 * Amidst Sky functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @package WordPress
 * @subpackage Amidst Sky
 * @since Amidst Sky 1.0
 */

/**
 * Set up the content width value based on the theme's design
 *
 * @since Amidst Sky 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1000;
}

if ( ! function_exists( 'amidstsky_setup' ) ) :
/**
 * Amidst Sky setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Amidst Sky 1.0
 */
function amidstsky_setup() {

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'amidstsky' ),
		'secondary' => __( 'Bottom secondary menu', 'amidstsky' ),
	) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'amidstsky_custom_background_args', array(
		'default-color' => 'ffffff',
	) ) );

}
endif; // amidstsky_setup
add_action( 'after_setup_theme', 'amidstsky_setup' );

function amidstsky_widgets_init() {
	
	// Right Sidebar Widget Area
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'amidstsky' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears in the right side of main content.', 'amidstsky' ),
	) );
}
add_action( 'widgets_init', 'amidstsky_widgets_init' );

/**
 * Return the Google font stylesheet URL, if available.
 */
 
function amidstsky_fonts_url() {
	$fonts_url = '';
	$font_families = array();
	$font_families[] = 'Quicksand';
	$font_families[] = 'Open Sans:400,600,300,400italic';
	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);
	$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	return $fonts_url;
}
	
/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function amidstsky_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'amidstsky' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'amidstsky_wp_title', 10, 2 );

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Amidst Sky 1.0
 *
 * @return void
 */
function amidstsky_scripts_styles() {
	// Adds JavaScript to pages with the comment form to support sites with
	// threaded comments (when in use).
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	
	// Add Quicksand and Open Sans fonts, used in the main stylesheet.
	wp_enqueue_style( 'amidstsky-fonts', amidstsky_fonts_url(), array(), null );
	
	// Loads our main stylesheet.
	wp_enqueue_style( 'amidstsky-style', get_stylesheet_uri(), array(), '2013-12-31' );
}
add_action( 'wp_enqueue_scripts', 'amidstsky_scripts_styles' );
 
/**
 * Prints Copyright Information
 *
 * Prints Developers Name
 *
 * @since Amidst Sky 1.0
 *
 */
function amidstsky_copyright() {
	global $wpdb;
	$copyright_dates = $wpdb->get_results("
	SELECT
		YEAR(min(post_date_gmt)) AS firstdate,
		YEAR(max(post_date_gmt)) AS lastdate
	FROM
		$wpdb->posts
	WHERE
		post_status = 'publish'
	");
	$output = '';
	if($copyright_dates) {
		$copyright = "&copy; " . $copyright_dates[0]->firstdate;
		if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
		$copyright .= '-' . $copyright_dates[0]->lastdate;
		}
	$output = $copyright;
	}
return $output;
}
//Credits to Developer
function amidstsky_credits() {
	 return 'Designed by <a href="http://amidstsky.com/">Deepak Bansal</a>';
}

/**
 * Show only excerpt on home page
 *
 * @since Amidst Sky 1.0
 *
 */
function custom_excerpt_length( $length ) { //excerpt length
	return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) { //style for read more link
	return ' <a class="excerpt-more" href="'. get_permalink( get_the_ID() ) . '">Read More &rarr;</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

if ( ! function_exists( 'amidstsky_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Amidst Sky 1.0
 *
 * @return void
 */
function amidstsky_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="post-nav" role="navigation">
	
			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-link nav-next"><?php next_posts_link( __( '&larr; Older posts', 'amidstsky' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-link nav-previous"><?php previous_posts_link( __( 'Newer posts &rarr;', 'amidstsky' ) ); ?></div>
			<?php endif; ?>

	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'amidstsky_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @since Amidst Sky 1.0
 *
 * @return void
 */
function amidstsky_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="post-nav" role="navigation">

			<div class="nav-link nav-next">
				<?php previous_post_link( '%link', _x( '&larr; %title', 'Previous post link', 'amidstsky' ) ); ?>
			</div>
			<div class="nav-link nav-previous">
				<?php next_post_link( '%link', _x( '%title &rarr;', 'Next post link', 'amidstsky' ) ); ?>
			</div>

	</nav><!-- .navigation -->
	<?php
}
endif;