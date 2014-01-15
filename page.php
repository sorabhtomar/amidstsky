<?php get_header(); ?>

    <div id="content">
	
        <?php if(have_posts()) : ?>
		
			<?php while(have_posts()) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
				
					<h1 class="entry-title" ><?php the_title(); ?></h1>
					<div class="post-image">   
						<?php the_post_thumbnail('large'); ?>
					</div>
 
					<div class="entry">
						<?php the_content(); ?>
					</div>
					
					<div class="comments-template">
						<?php comments_template(); ?>
					</div>
					
				</div>

			<?php endwhile; ?>
 
		<?php endif; ?>
		
	</div>
 
<?php get_sidebar(); ?>  
<?php get_footer(); ?>