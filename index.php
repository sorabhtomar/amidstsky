<?php 
/**
 * The Template for displaying all homepage, archives, author archive, categroy and tags.
 *
 * @package WordPress
 * @subpackage Amidst Sky
 * @author Deepak Bansal
 */
get_header(); ?>
 
    <div id="content">
        
		<?php if(have_posts()) : ?>
        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		
			<?php /* If this is a category archive */ if (is_category()) { ?>
				<header class="archive-header">
					<h1 class="archive-title"><?php single_cat_title(); ?></h1>
					<?php if ( category_description() ) : // Show an optional category description ?>
						<p><?php echo category_description( $category_id ); ?></p>
					<?php endif; ?>
				</header>
				
			<?php /* If this is a tag archive */  } elseif( is_tag() ) { ?>
				<header class="archive-header"><h1 class="archive-title"><?php single_tag_title(); ?></h1>
					<?php if ( tag_description() ) : // Show an optional category description ?>
						<p><?php echo tag_description( $tag_id ); ?></p>
					<?php endif; ?>
				</header>
			
			<?php /* If this is a search result page archive */ } elseif (is_search()) { ?>
				<header class="archive-header">
					<h1 class="archive-title"><?php printf( __( 'Results for: %s' ), '<span>' . get_search_query() . '</span>'); ?></h1>
				</header>
				
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<header class="archive-header"><h1 class="archive-title">Archive for <?php the_time('F jS, Y'); ?></h1></header>
				
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<header class="archive-header"><h1 class="archive-title">Archive for <?php the_time('F, Y'); ?></h1></header>
			
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<header class="archive-header"><h1 class="archive-title">Archive for <?php the_time('Y'); ?></h1></header>
			
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<header class="archive-header">
					<h1 class="archive-title"><?php the_author_meta( 'display_name' ); ?></h1>
					<?php if(get_the_author_meta('description') != NULL): ?>
						<p><?php the_author_meta('description'); ?></p>
					<?php endif; ?>
				</header>
				
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<header class="archive-header"><h1 class="archive-title">Blog Archives</h1></header>
			
			<?php }?>
			<?php while(have_posts()) : the_post(); ?>
				
				<div id="post-<?php the_ID(); ?>" <?php post_class('excerpt'); ?>>
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail', array('class' => 'alignleft attachment-thumbnail')); ?></a>
					<div class="entry-meta">
						<?php _e('Posted on'); ?> <?php echo get_the_date(); ?> <?php _e('with'); ?> <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
					</div> 
					<?php the_excerpt(); ?>
				</div>
				
			<?php endwhile; ?>
			
			<?php amidstsky_paging_nav(); ?>
			
			<?php else: ?>
			
				<?php /* If this is a search result page archive */ if (is_search()) { ?>
					<header class="archive-header">
						<h1 class="archive-title"><?php printf( __( 'Results for: %s' ), '<span>' . get_search_query() . '</span>'); ?></h1>
					</header>
				<?php } ?>
				
				<article id="post-0" class="post no-results not-found post-single">
					<header class="entry-header"> 
						<h2><?php _e( 'Nothing Found', 'amidstsky' ); ?></h2>
					</header>

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no posts were found for the specified query.', 'amidstsky' ); ?></p>
					</div>
				</article>
				
		<?php endif; ?>
			
    </div>

<?php get_sidebar(); ?>  
<?php get_footer(); ?>