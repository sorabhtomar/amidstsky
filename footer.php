</div>
	<?php wp_nav_menu(array(
		'sort_column' => 'menu_order',
		'theme_location' => 'secondary',
		'container_class' => 'menu',
		));
	?>

	<div id="footer">
		<a class="footer-title" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
		
		<?php echo amidstsky_copyright(); ?> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> &#183; <?php echo amidstsky_credits(); ?> &#183; Created with <a href="http://wordpress.org/">WordPress</a>
	</div><!-- #footer -->

<?php wp_footer(); ?>
</body>
</html>