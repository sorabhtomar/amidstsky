/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );

	wp.customize( 'amidstsky_site_bg', function ( value ) {
		value.bind( function( to ) {
			console.log(to);
			$( '.site' ).css( {
				'background' : to
			} );
		} );
	} );

	wp.customize( 'amidstsky_accent_color', function ( value ) {
		value.bind( function( to ) {
			$( 'a' ).css( {
				'color': to
			} );
			$( 'button, input[type="button"], input[type="reset"], input[type="submit"], .comment-navigation a, .posts-navigation a' ).css( {
				'background': to
			} );
		} );
	} );

	wp.customize( 'amidstsky_entry_title_link', function ( value ) {
		value.bind( function( to ) {
			$( '.entry-title a' ).css( {
				'color': to
			} );
		} );
	} );

	wp.customize( 'amidstsky_menu_hover_bg', function ( value ) {
		value.bind( function( to ) {
			$( '.main-navigation li:hover > a, .main-navigation li.focus > a' ).css( {
				'background': to
			} );
		} );
	} );

	wp.customize( 'amidstsky_text_color', function ( value ) {
		value.bind( function( to ) {
			$( 'body, input, textarea' ).css( {
				'color': to
			} );
		} );
	} );

	wp.customize( 'amidstsky_entry_content', function ( value ) {
		value.bind( function( to ) {
			$( '.page-content, .entry-content, .entry-summary ' ).css( {
				'color': to
			} );
		} );
	} );

	wp.customize( 'amidstsky_menu_link', function ( value ) {
		value.bind( function( to ) {
			$( '.main-navigation a' ).css( {
				'color': to
			} );
		} );
	} );

	wp.customize( 'amidstsky_submenu_bg', function ( value ) {
		value.bind( function( to ) {
			$( '.main-navigation ul ul' ).css( {
				'background': to
			} );
		} );
	} );

	wp.customize( 'amidstsky_footer_message', function( value ) {
		value.bind( function( to ) {
			$( '.footer-message' ).text( to );
		} );
	} );

} )( jQuery );
