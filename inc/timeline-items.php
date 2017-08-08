<?php

class PMC_Timeline_Items {

  function __construct() {
    add_action('init', array($this, 'register_timeline_item_type'));
    add_action('pre_get_posts', array($this, 'pre_get_posts'));

    // Create "event date" custom field via ACF
    if(function_exists("register_field_group"))
    {
    	register_field_group(array (
    		'id' => 'acf_event_date',
    		'title' => 'Data do Evento',
    		'fields' => array (
    			array (
    				'key' => 'field_5925d734986d7',
    				'label' => __('Date of occurrence or start date (if a period):', 'pmc'),
    				'name' => 'start_date',
    				'type' => 'text',
    				'instructions' => __('Format: YYYY-MM-DD (YYYY = year, MM = month, DD = day, year is required).', 'pmc'),
    				'required' => 1,
    				'placeholder' => __('Examples: 2014, 2014-05, 2014-05-01', 'pmc'),
    				'formatting' => 'html',
    				'maxlength' => 10,
    			),
    			array (
    				'key' => 'field_5925d734986a2',
    				'label' => __('Finish date (optional):', 'pmc'),
    				'name' => 'finish_date',
    				'type' => 'text',
    				'placeholder' => __('Leave blank if same as above.', 'pmc'),
    				'formatting' => 'html',
    				'maxlength' => 10,
    			),
    		),
    		'location' => array (
    			array (
    				array (
    					'param' => 'post_type',
    					'operator' => '==',
    					'value' => 'pmc_timeline_item',
    					'order_no' => 0,
    					'group_no' => 0,
    				),
    			),
    		),
    		'options' => array (
          'style' => 'seamless',
          'menu_order' => 0
    		)
    	));
    }

  }

  function register_timeline_item_type() {
    $labels = array(
      'edit_item'          => __( 'Edit event', 'pmc' ),
      'all_items'          => __( 'All events', 'pmc' ),
    );

    $capabilities = array(
      'edit_published_posts'    => 'edit_published_timeline_items',
      'publish_posts'           => 'publish_timeline_items',
      'delete_published_posts'  => 'delete_published_timeline_items',
      'edit_posts'              => 'edit_timeline_items',
      'delete_posts'            => 'delete_timeline_items'
  );

    $args = array(
      'labels'             => $labels,
      'label'              => __( 'Timeline', 'pmc' ),
      'description'        => __( 'Historical events of Mapas Culturais platform.', 'pmc' ),
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'timeline' ),
      'capabilities'       => $capabilities,
      'map_meta_cap'       => true,
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'supports'           => array( 'title', 'editor', 'thumbnail')
    );

    register_post_type( 'pmc_timeline_item', $args );
    add_post_type_support( 'pmc_timeline_item', 'thumbnail' );
  }

  function pre_get_posts ($query) {
    $post_type = $query->get('post_type');

    if($post_type == 'pmc_timeline_item' || $post_type == array('pmc_timeline_item')) {
      $query->set('posts_per_page', -1);
      $query->set('meta_key', 'start_date');
      $query->set('orderby', 'meta_value');
      $query->set('order', 'ASC');
    }
  }

}

$pmc_timeline_posts = new PMC_Timeline_Items();
