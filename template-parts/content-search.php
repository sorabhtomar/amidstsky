<?php
/**
 * Template part for displaying results in search pages.
 *
 * @package Amidst Sky
 * @author Deepak Bansal
 * @link http://www.dbansal.com
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php amidstsky_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php amidstsky_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

