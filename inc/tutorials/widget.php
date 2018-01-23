<?php

function tutorials_load_widget() {
    register_widget( 'tutorials_widget' );
}
add_action( 'widgets_init', 'tutorials_load_widget' );
 
// Creating the widget 
class tutorials_widget extends WP_Widget {
 
	function __construct() {
		parent::__construct(
 
		// Base ID of your widget
		'tutorials_widget', 
		 
		// Widget name will appear in UI
		__('Browse on Tutorials', 'pmc'), 
		 
		// Widget description
		array( 'description' => __( 'Navigate on tutorials categories', 'pmc' ), ) 
		);
	}
 
	// Creating widget front-end
	 
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		 
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];
		 
		// This is where you run the code and display the output
	  ?>
      <nav class="target-group-nav">
        <a>
          <span class="fa fa-gear"></span>
          gestor
        </a>
        <a>
          <span class="fa fa-user"></span>
          agente cultural
        </a>
      </nav>
      <ul>
      <?php $terms = get_the_terms( get_the_ID(), 'category_tutorial' );      
          if ( $terms && !is_wp_error( $terms ) ) : 
            foreach ( $terms as $term ) { ?>
	            <li>
	              <a href="<?php echo get_term_link($term->term_id); ?>" class="category">
	              	<span class="fa fa-bookmark-o"></span>
	                <?php echo $term->name; ?>
	              </a>
	            </li>
        <?php } ?>
      <?php endif; ?>
      </ul>
    <?
		echo $args['after_widget'];
	}
         
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
	}
	else {
	$title = __( 'New title', 'pmc' );
	}
	// Widget admin form
	?>

	<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<?php 
	}
     
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} // Class tutorials_widget ends here