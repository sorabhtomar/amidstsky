<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Amidst Sky
 * @since Amidst Sky 1.0
 */

get_header(); ?>

	<div id="content">
	
		<article id="post-0" class="post error404 no-results not-found post-single">

			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Oops! Not found. :(', 'swati' ); ?></h1>
			</header>

			<div class="entry-content">
				
				<p>
					<?php _e( 'Apologies, but the requested URL was not found on this server. That’s all we know.', 'amidstsky' ); ?>
				</p>
				<?php get_search_form( $echo ); ?>

			</div><!-- .entry-content -->
			
		</article><!-- #post-0 -->
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>