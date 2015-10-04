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

	// Setting - Add Logo

	$wp_customize->add_setting(
		'amidstsky_logo',
		array(
			'transport'		=> 'refresh',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	// Control - Add Logo
    $wp_customize->add_control( 
    	new WP_Customize_Image_Control( $wp_customize, 'amidstsky_logo', 
    	array(
	        'label'    => __( 'Site Logo (replaces text)', 'amidst-sky' ),
	        'section'  => 'title_tagline',
	        'settings' => 'amidstsky_logo',
    ) ) );

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
				'label'		=> __( 'Site Content Background', 'amidst-sky' ),
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
			'transport'		=> 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control - Accent Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'amidstsky_accent_color',
			array (
				'label'		=> __( 'Accent Color', 'amidst-sky' ),
				'section'	=> 'colors',
				'settings'	=> 'amidstsky_accent_color',
				'priority'	=> 1
			)
		)
	);

	// Setting - Entry Title Link Color
	$wp_customize->add_setting(
		'amidstsky_entry_title_link',
		array(
			'default'		=> '#ffffff',
			'transport'		=> 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control - Entry Title Link Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'amidstsky_entry_title_link',
			array (
				'label'		=> __( 'Entry Title Link', 'amidst-sky' ),
				'section'	=> 'colors',
				'settings'	=> 'amidstsky_entry_title_link',
				'priority'	=> 1
			)
		)
	);

	// Setting - Sticky Post Background Color
	$wp_customize->add_setting(
		'amidstsky_sticky_post_bg',
		array(
			'default'		=> '#ccc',
			'transport'		=> 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control - Sticky Post Background Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'amidstsky_sticky_post_bg',
			array (
				'label'		=> __( 'Sticky Post Background', 'amidst-sky' ),
				'section'	=> 'colors',
				'settings'	=> 'amidstsky_sticky_post_bg',
				'priority'	=> 1
			)
		)
	);

	// Setting - Text Color
	$wp_customize->add_setting(
		'amidstsky_text_color',
		array(
			'default'		=> '#4b4b4b',
			'transport'		=> 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control - Text Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'amidstsky_text_color',
			array (
				'label'		=> __( 'Text Color', 'amidst-sky' ),
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

	// Control - Entry Content Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'amidstsky_entry_content',
			array (
				'label'		=> __( 'Entry Content', 'amidst-sky' ),
				'section'	=> 'colors',
				'settings'	=> 'amidstsky_entry_content',
				'priority'	=> 1
			)
		)
	);

	// Setting - Menu Link Color
	$wp_customize->add_setting(
		'amidstsky_menu_link',
		array(
			'default'		=> '#4b4b4b',
			'transport'		=> 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control - Menu Link Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'amidstsky_menu_link',
			array (
				'label'		=> __( 'Navigation Links', 'amidst-sky' ),
				'section'	=> 'colors',
				'settings'	=> 'amidstsky_menu_link',
				'priority'	=> 1
			)
		)
	);

	// Setting - Menu Hover Background Color
	$wp_customize->add_setting(
		'amidstsky_menu_hover_bg',
		array(
			'default'		=> '#eeeeee',
			'transport'		=> 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control - Accent Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'amidstsky_menu_hover_bg',
			array (
				'label'		=> __( 'Menu Item Hover Background', 'amidst-sky' ),
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
			'transport'		=> 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control - Accent Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'amidstsky_submenu_bg',
			array (
				'label'		=> __( 'Sub Menu Background', 'amidst-sky' ),
				'section'	=> 'colors',
				'settings'	=> 'amidstsky_submenu_bg',
				'priority'	=> 1
			)
		)
	);

	// Setting - Entry Content Color
	$wp_customize->add_setting(
		'amidstsky_footer_bg',
		array(
			'default'		=> '#eeeeee',
			'transport'		=> 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Control - Accent Color
	$wp_customize->add_control(
		new WP_Customize_Color_Control (
			$wp_customize, 'amidstsky_footer_bg',
			array (
				'label'		=> __( 'Site Footer Background', 'amidst-sky' ),
				'section'	=> 'colors',
				'settings'	=> 'amidstsky_footer_bg',
				'priority'	=> 10
			)
		)
	);

	/*------------------------------------------
	# Layout
	------------------------------------------*/

	// Section
	$wp_customize->add_section(
		'amidstsky_layout',
		array (
			'title'			=> __( 'Layout', 'amidst-sky' ),
			'priority'		=> 400
		)
	);

	$wp_customize->add_setting(
		'amidstsky_site_layout',
		array(
			'default'	=> true,
			'transport'	=> 'refresh',
			'sanitize_callback' => 'amidstsky_sanitize', // function in extras.php
		)
	);

	$wp_customize->add_control(
		'amidstsky_site_layout',
		array(
			'section'	=> 'amidstsky_layout',
			'label'		=> __( 'Boxed Layout', 'amidst-sky' ),
			'setting'	=> 'amidstsky_site_layout',
			'type'		=> 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'amidstsky_blog_layout',
		array(
			'default'	=> 'content_sidebar',
			'transport'	=> 'refresh',
			'sanitize_callback' => 'amidstsky_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'amidstsky_blog_layout',
		array(
			'section'	=> 'amidstsky_layout',
			'label'		=> __( 'Choose Layout', 'amidst-sky' ),
			'setting'	=> 'amidstsky_blog_layout',
			'type'		=> 'radio',
			'choices'	=> $layout = array(
								'content_sidebar' => __( 'Content-Sidebar', 'amidst-sky' ), 
								'sidebar_content' => __( 'Sidebar-Content', 'amidst-sky' ),
								'no_sidebar' => __( 'No Sidebar', 'amidst-sky' ),
							)
		)
	);

	/*------------------------------------------
	# Google Fonts
	------------------------------------------*/

	// Section
	$wp_customize->add_section(
		'amidstsky_fonts',
		array (
			'title'			=> __( 'Google Fonts', 'amidst-sky' ),
			'priority'		=> 400
		)
	);

	$wp_customize->add_setting(
		'amidstsky_google_fonts',
		array(
			'default'	=> true,
			'transport'	=> 'refresh',
			'sanitize_callback' => 'amidstsky_sanitize'
		)
	);

	$wp_customize->add_control(
		'amidstsky_google_fonts',
		array(
			'section'	=> 'amidstsky_fonts',
			'label'		=> __( 'Use Google Fonts', 'amidst-sky' ),
			'setting'	=> 'amidstsky_google_fonts',
			'type'		=> 'checkbox'
		)
	);


	$wp_customize->add_setting(
		'amidstsky_body_font',
		array(
			'default'	=> 'Lora',
			'transport'	=> 'refresh',
			'sanitize_callback' => 'amidstsky_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'amidstsky_body_font',
		array(
			'section'	=> 'amidstsky_fonts',
			'label'		=> __( 'Choose Body Font', 'amidst-sky' ),
			'setting'	=> 'amidstsky_body_font',
			'type'		=> 'select',
			'choices'	=> $fonts = array(
								'Open Sans' => 'Open Sans',
								'Roboto' => 'Roboto',
								'Lato' => 'Lato',
								'Lora' => 'Lora',
								'PT Serif' => 'PT Serif',
								'Droid Serif' => 'Droid Serif',
								'Cardo' => 'Cardo',
								'Crimson Text' => 'Crimson Text',
							)
		)
	);

	$wp_customize->add_setting(
		'amidstsky_heading_font',
		array(
			'default'	=> 'Montserrat',
			'transport'	=> 'refresh',
			'sanitize_callback' => 'amidstsky_sanitize'
		)
	);

	$wp_customize->add_control(
		'amidstsky_heading_font',
		array(
			'section'	=> 'amidstsky_fonts',
			'label'		=> __( 'Choose Headings Font', 'amidst-sky' ),
			'setting'	=> 'amidstsky_heading_font',
			'type'		=> 'select',
			'choices'	=> $fonts = array(
								'Montserrat' => 'Montserrat',
								'Oswald' => 'Oswald',
								'Open Sans' => 'Open Sans',
								'Roboto' => 'Roboto',
								'Lato' => 'Lato',
								'Lora' => 'Lora',
								'PT Sans' => 'PT Sans',
								'Droid Sans' => 'Droid Sans',
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
			'title'			=> __( 'Theme Options', 'amidst-sky' ),
			'description'	=> __('More options.', 'amidst-sky' ),
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
			'label'			=> __( 'Footer Message', 'amidst-sky' ),
			'type'			=> 'text'
		)
	);

}
add_action( 'customize_register', 'amidstsky_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function amidstsky_customize_preview() {
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

	<?php 
	
	if( ! get_theme_mod( 'amidstsky_google_fonts' ) == '' ) { ?>

		body,
		input,
		textarea {
			font-family: "<?php echo esc_attr( get_theme_mod( 'amidstsky_body_font' ) ); ?>";
		}

		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			font-family: "<?php echo esc_attr( get_theme_mod( 'amidstsky_heading_font' ) ); ?>";
		}

	<?php }
	
	?>

	.page-content,
	.entry-content,
	.entry-summary {
		color: <?php echo esc_attr( get_theme_mod( 'amidstsky_entry_content' ) ); ?>;
	}

	.sticky {
		background: <?php echo esc_attr( get_theme_mod( 'amidstsky_sticky_post_bg' ) ); ?>;
		border-color: <?php echo esc_attr( get_theme_mod( 'amidstsky_sticky_post_bg' ) ); ?>;
	}

	blockquote {
		border-color: <?php echo esc_attr( get_theme_mod( 'amidstsky_sticky_post_bg' ) ); ?>;
	}

	.main-navigation ul ul {
		background: <?php echo esc_attr( get_theme_mod( 'amidstsky_submenu_bg' ) ); ?> !important;
	}

	.main-navigation li:hover > a,
	.main-navigation li.focus > a {
		background: <?php echo esc_attr( get_theme_mod( 'amidstsky_menu_hover_bg' ) ); ?>;
	}

	<?php if(esc_attr( get_theme_mod( 'amidstsky_blog_layout' ) == 'sidebar_content' )) { ?>

		.content-area {
			float: right;
		}

		#secondary {
			float: left;
		}

	<?php } elseif ( esc_attr(get_theme_mod( 'amidstsky_blog_layout' ) == 'no_sidebar') ) { ?>

		.content-area {
			margin: 0 auto;
			float: none;
		}
		
	<?php } ?>

	<?php if( ! esc_attr(get_theme_mod( 'amidstsky_site_layout' ) == '' ) ) { ?>
		
		@media screen and (min-width: 769px) {

			.site {
				width: 90%;
				margin-top: 4%;
				margin-bottom: 4%;
			}

		}


	<?php } ?>

	.site-footer {
		background: <?php echo esc_attr( get_theme_mod( 'amidstsky_footer_bg' ) ); ?>;
	}

	</style>

<?php 
}
add_action( 'wp_head', 'amidstsky_customize_css' );