<?php
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
	
		<h2 class="comments-title">
			<?php
				printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'amidstsky' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2><!-- .comments-title -->

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 64,
					'format' 	  => 'html5',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<nav id="comment-nav-below" class="navigation" role="navigation">
				<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'amidstsky' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'amidstsky' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'amidstsky' ) ); ?></div>
			</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'amidstsky' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form(); ?>

</div><!-- #comments .comments-area -->