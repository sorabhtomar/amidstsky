<?php
/**
 * Amidst Sky Theme Customizer.
 *
 * @package Amidst Sky
 * @author Deepak Bansal
 * @link http://deepak.tech
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function amidstsky_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Setting - Site Main Background Color
	$wp_customize->add_setting(
		'amidstsky_site_bg',
		array(
			'default'		=> '#ffffff',
			'transport'		=> 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control - Site Main Background Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'amidstsky_site_bg',
			array (
				'label'		=> __( 'Site Content Background', 'amidstsky' ),
				'section'	=> 'colors',
				'settings'	=> 'amidstsky_site_bg',
				'priority'	=> 1
			)
		)
	);

	// Setting - Accent Color
	$wp_customize->add_setting(
		'amidstsky_accent_color',
		array(
			'default'		=> '#D32F2F',
			'transport'		=> 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control - Accent Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'amidstsky_accent_color',
			array (
				'label'		=> __( 'Accent Color', 'amidstsky' ),
				'section'	=> 'colors',
				'settings'	=> 'amidstsky_accent_color',
				'priority'	=> 1
			)
		)
	);

	// Setting - Entry Content Color
	$wp_customize->add_setting(
		'amidstsky_entry_title_link',
		array(
			'default'		=> '#ffffff',
			'transport'		=> 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control - Accent Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'amidstsky_entry_title_link',
			array (
				'label'		=> __( 'Entry Title Link', 'amidstsky' ),
				'section'	=> 'colors',
				'settings'	=> 'amidstsky_entry_title_link',
				'priority'	=> 1
			)
		)
	);

	// Setting - Accent Color
	$wp_customize->add_setting(
		'amidstsky_text_color',
		array(
			'default'		=> '#4b4b4b',
			'transport'		=> 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control - Accent Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'amidstsky_text_color',
			array (
				'label'		=> __( 'Text Color', 'amidstsky' ),
				'section'	=> 'colors',
				'settings'	=> 'amidstsky_text_color',
				'priority'	=> 1
			)
		)
	);

	// Setting - Entry Content Color
	$wp_customize->add_setting(
		'amidstsky_entry_content',
		array(
			'default'		=> '#000000',
			'transport'		=> 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control - Accent Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'amidstsky_entry_content',
			array (
				'label'		=> __( 'Entry Content', 'amidstsky' ),
				'section'	=> 'colors',
				'settings'	=> 'amidstsky_entry_content',
				'priority'	=> 1
			)
		)
	);

	// Setting - Entry Content Color
	$wp_customize->add_setting(
		'amidstsky_menu_link',
		array(
			'default'		=> '#4b4b4b',
			'transport'		=> 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control - Accent Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'amidstsky_menu_link',
			array (
				'label'		=> __( 'Navigation Links', 'amidstsky' ),
				'section'	=> 'colors',
				'settings'	=> 'amidstsky_menu_link',
				'priority'	=> 1
			)
		)
	);

	// Setting - Entry Content Color
	$wp_customize->add_setting(
		'amidstsky_menu_hover_bg',
		array(
			'default'		=> '#eeeeee',
			'transport'		=> 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control - Accent Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'amidstsky_menu_hover_bg',
			array (
				'label'		=> __( 'Menu Item Hover Background', 'amidstsky' ),
				'section'	=> 'colors',
				'settings'	=> 'amidstsky_menu_hover_bg',
				'priority'	=> 1
			)
		)
	);

	// Setting - Entry Content Color
	$wp_customize->add_setting(
		'amidstsky_submenu_bg',
		array(
			'default'		=> '#ffffff',
			'transport'		=> 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control - Accent Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'amidstsky_submenu_bg',
			array (
				'label'		=> __( 'Sub Menu Background', 'amidstsky' ),
				'section'	=> 'colors',
				'settings'	=> 'amidstsky_submenu_bg',
				'priority'	=> 1
			)
		)
	);

	/*------------------------------------------
	# Theme Options
	------------------------------------------*/

	// Section
	$wp_customize->add_section(
		'amidstsky_theme_options',
		array (
			'title'			=> __( 'Theme Options', 'amidstsky' ),
			'description'	=> __('More options.', 'amidstsky' ),
			'priority'		=> 500
		)
	);

	// Setting - Copyright Message
	$wp_customize->add_setting(
		'amidstsky_footer_message',
		array(
			'default'		=> 'Copyright 2015 All rights reserved.',
			'transport'		=> 'postMessage',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	// Control - Copyright Message
	$wp_customize->add_control(
		'amidstsky_footer_message',
		array(
			'section'		=> 'amidstsky_theme_options',
			'label'			=> __( 'Footer Message', 'amidstsky' ),
			'type'			=> 'text'
		)
	);

}
add_action( 'customize_register', 'amidstsky_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function amidstsky_customize_preview() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'amidstsky_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'jquery', 'customize-preview' ), '20150816', true );
}
add_action( 'customize_preview_init', 'amidstsky_customize_preview' );

function amidstsky_customize_css() {
	?>
	<style type="text/css">

	.site {
		background: <?php echo esc_attr( get_theme_mod( 'amidstsky_site_bg' ) ); ?>; 
	}

	a,
	.site-title {
		color: <?php echo esc_attr( get_theme_mod( 'amidstsky_accent_color' ) ); ?>;
	}

	.site-title {
		color: <?php echo esc_attr( get_theme_mod( 'amidstsky_accent_color' ) ); ?> !important;
	}

	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.comment-navigation a,
	.posts-navigation a {
		background: <?php echo esc_attr( get_theme_mod( 'amidstsky_accent_color' ) ); ?>;
	}

	.entry-title a {
		color: <?php echo esc_attr( get_theme_mod( 'amidstsky_entry_title_link' ) ); ?>;
	}

	.main-navigation a {
		color: <?php echo esc_attr( get_theme_mod( 'amidstsky_menu_link' ) ); ?>;
	}

	body,
	input,
	textarea {
		color: <?php echo esc_attr( get_theme_mod( 'amidstsky_text_color' ) ); ?>;
	}

	.page-content,
	.entry-content,
	.entry-summary {
		color: <?php echo esc_attr( get_theme_mod( 'amidstsky_entry_content' ) ); ?>;
	}

	.main-navigation ul ul {
		background: <?php echo esc_attr( get_theme_mod( 'amidstsky_submenu_bg' ) ); ?> !important;
	}

	.main-navigation li:hover > a,
	.main-navigation li.focus > a {
		background: <?php echo esc_attr( get_theme_mod( 'amidstsky_menu_hover_bg' ) ); ?>;
	}

	</style>

<?php 
}
add_action( 'wp_head', 'amidstsky_customize_css' );