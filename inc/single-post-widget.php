<?php

function single_post_load_widget() {
    register_widget( 'single_post_widget' );
}
add_action( 'widgets_init', 'single_post_load_widget' );
  
class single_post_widget extends WP_Widget {
 
	function __construct() {
		parent::__construct(
 
		'single_post_widget', 
		 
		__('List single post categories', 'pmc'), 

		array( 'description' => __( 'Show all single post categories', 'pmc' ), ) 
		);
	}
	 
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		$terms = get_the_category();
	  ?>
	  	<h2> Categorias</h2>
      <ul>
      <?php   
          if ( $terms && !is_wp_error( $terms ) ) : 
            foreach ( $terms as $term ) { ?>
	            <li class="cat-item">
	              <a href="<?php echo get_term_link($term->term_id); ?>" class="category">
	                <?php echo $term->name; ?>
	              </a>
	            </li>
        <?php } ?>
      <?php endif; ?>
      </ul>
    <?
		echo $args['after_widget'];
	}
}