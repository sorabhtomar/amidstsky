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
		<div class="site-info">
			<span class="footer-message"><?php echo esc_attr( get_theme_mod( 'amidstsky_footer_message' ) ); ?></span> <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'amidstsky' ) ); ?>"><?php printf( esc_html__( 'Powered by %s', 'amidstsky' ), '<span class="genericon genericon-wordpress"></span>WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Designed by %1$s.', 'amidstsky' ), '<a href="http://deepak.tech" rel="designer">Deepak Bansal</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
