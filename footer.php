<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Amidst Sky
 * @author Deepak Bansal
 * @link http://deepak.tech
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php get_sidebar( 'footer' ); ?>
		<div class="site-info">
			<span class="footer-message"><?php echo esc_attr( get_theme_mod( 'amidstsky_footer_message' ) ); ?></span>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Designed by %1$s.', 'amidst-sky' ), '<a href="https://www.codes.cafe" rel="designer">Deepak Bansal</a>' ); ?>
		</div><!-- .site-info -->
		<nav class="social-networks">
			<?php wp_nav_menu( array( 
					'theme_location' => 'social',
					'depth'          => 1,
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>',
				) ); ?>
		</nav>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
