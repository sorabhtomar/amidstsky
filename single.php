<?php 

/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Amidst Sky
 * @author Deepak Bansal
 */

get_header(); ?>
 
   	<div id="content">
   
       	<?php if(have_posts()) : ?>
		
			<?php while(have_posts()) : the_post(); ?>
                
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<h1 class="entry-title"><?php the_title(); ?></h1>
					
					<div class="entry-meta">
							<?php _e('Posted on'); ?> <?php echo get_the_date(); ?> <?php _e('by'); ?> <?php the_author_posts_link(); ?> <?php _e('in'); ?> <?php the_category(', ') ?>
							<?php
								if (is_single() && comments_open()) {
									_e('with ');
								}
								else _e('. '); 
							?>
							<?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?><?php _e('.'); ?> <?php edit_post_link('Edit', ' ', ''); ?>
					</div>
					
					<div class="post-image"> 
						<?php the_post_thumbnail('large'); ?>
					</div>

					<div class="entry">  
						<?php the_content(); ?> 
						<?php 
							$args = array (
							'before'		=> __('Pages: '),
							'link_before' 		=> '<span class="nav-link">',
							'link_after' 		=> '</span>',
							'next_or_number'	=> 'number',
							'nextpagelink'  	=> __('Next page'),
							'previouspagelink'	=> __('Previous page'),
							'pagelink'        	=> '%',
							'echo'            	=> 1
							);
						wp_link_pages($args); ?>
					</div>
	 
					<div class="comments-template">
						<?php comments_template(); ?>
					</div>
				</div>
 
			<?php endwhile; ?>
			
			<?php amidstsky_post_nav(); ?>
 
		<?php endif; ?>
	</div>
 
<?php get_sidebar(); ?>  
<?php get_footer(); ?>