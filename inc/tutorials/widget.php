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
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		 
		// This is where you run the code and display the output
	  ?>
      <nav class="target-group-nav">
        <a>
          <span class="fa fa-gear"></span>
          <a href="<?php echo add_query_arg(array('target_group' => '1') , get_post_type_archive_link( 'tutorial' )); ?>">gestor</a>
        </a>
        <a>
          <span class="fa fa-user"></span>
          <a href="<?php echo add_query_arg(array('target_group' => '2') , get_post_type_archive_link( 'tutorial' )); ?>">agente cultural</a>
        </a>
      </nav>
      <ul>
      <?php $terms = get_terms( 'tutorial_category' );      
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
} // Class tutorials_widget ends here