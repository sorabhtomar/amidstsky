<?php

/**
 * recent-posts.php
 *
 * Plugin Name: Amidst Sky Recent Posts
 * Description: Widgte Displaying Recent Posts for Amidst Sky Theme
 * Version: 1.0
 * Author: Deepak Bansal
 * Author URI: http://www.dbansal.com
 */

class Amidst_Sky_Widget_Recent_Posts extends WP_Widget {

	/**
	 * Specifies widget name, description, class name and instantiates it
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' 	=> 'amidstsky-recent-posts',
			'description' 	=> __( 'Widgte Displaying Recent Posts for Amidst Sky Theme', 'amidst-sky')
		);
		parent::__construct( 'io-rp', __('Amidst Sky Recent Posts','amidst-sky'), $widget_ops);

		$this->alt_option_name = 'amidstsky-recent-posts';

		add_action( 'save_post', array($this, 'flush_widget_cache') );

		add_action( 'deleted_post', array($this, 'flush_widget_cache') );
	}

	public function widget($args, $instance) {
		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'widget_recent_posts', 'widget' );
		}

		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recently Posted', 'amidst-sky' );

		/** This filter is documented in wp-includes/default-widgets.php */

		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;

		/*if ( ! $number )
			$number = 10;*/

		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		//$show_category = isset( $instance['show_category'] ) ? $instance['show_category'] : false;

		$categories = get_categories();

		$taxonomy = ( ! empty( $instance['taxonomy'] ) ) ? $instance['taxonomy'] : $categories;

		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
			'cat'				  => $taxonomy
		) ) );

		if ($r->have_posts()) :
?>

		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
		
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<a class="amidstsky-recent-post" href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
					<?php the_post_thumbnail( 'thumbnail' ); ?>
					<?php if ( ! has_post_thumbnail() ) : ?>
						<h4 class="no-thumbnail">
					<?php else: ?>
						<h4>
					<?php endif; ?>
						<?php get_the_title() ? the_title() : the_ID(); ?></h4>
					<?php if( $show_date == true ) {
						echo "<time>" . get_the_date() . "</time>";
					} ?>
			</a>
		<?php endwhile; ?>
		<?php echo $args['after_widget']; ?>

<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();
		endif;
		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = ob_get_flush();
			wp_cache_set( 'widget_recent_posts', $cache, 'widget' );
		} else {
			ob_end_flush();
		}
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		//$instance['show_category'] = isset( $new_instance['show_category'] ) ? (bool) $new_instance['show_category'] : false;
		$instance['taxonomy'] = $new_instance['taxonomy'];
		$this->flush_widget_cache();
		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['amidstsky-recent-posts']) )
			delete_option('amidstsky-recent-posts');
		return $instance;
	}

	public function flush_widget_cache() {
		wp_cache_delete('widget_recent_posts', 'widget');
	}
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 10;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		//$show_category = isset( $instance['show_category'] ) ? (bool) $instance['show_category'] : false;
		$taxonomy  = isset( $instance['taxonomy'] ) ? esc_attr( $instance['taxonomy'] ) : '';
?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'amidst-sky' ); ?></label>

		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:', 'amidst-sky' ); ?></label>

		<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />

		<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?', 'amidst-sky' ); ?></label></p>

		<p><label for="<?php echo $this->get_field_id( 'taxonomy' ); ?>"><?php _e( 'Categories (Enter IDs e.g. 2,4,10):', 'amidst-sky' ); ?></label>

		<input class="widefat" id="<?php echo $this->get_field_id( 'taxonomy' ); ?>" name="<?php echo $this->get_field_name( 'taxonomy' ); ?>" type="text" value="<?php echo $taxonomy; ?>" /></p>

<?php

	}

}
// Register the widget

add_action( 'widgets_init', create_function( '', 'register_widget( "Amidst_Sky_Widget_Recent_Posts" );') );

?>