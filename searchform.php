<?php
/**
 * The template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Amidst Sky
 * @since Amidst Sky 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="search" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'amidstsky' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'amidstsky' ); ?>" />
	</form>