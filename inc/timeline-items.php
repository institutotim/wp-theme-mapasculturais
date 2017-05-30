<?php

class PMC_Timeline_Items {

  function __construct() {
    add_action('init', array($this, 'register_timeline_item_type'));

    // Create "event date" custom field via ACF
    if(function_exists("register_field_group"))
    {
    	register_field_group(array (
    		'id' => 'acf_event_date',
    		'title' => 'Data do Evento',
    		'fields' => array (
    			array (
    				'key' => 'field_5925d734986b5',
    				'label' => 'Informe a data do evento na linha do tempo:',
    				'name' => 'event_date',
    				'type' => 'text',
    				'instructions' => 'Formatos válidos: YYYY-MM-DD, YYYY-MM e YYYY, onde YYYY = ano, MM = mês e DD = dia.',
    				'required' => 1,
    				'default_value' => '',
    				'placeholder' => 'Exemplos: 2015-07, 2014, 2017-03-01',
    				'prepend' => '',
    				'append' => '',
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
    			'position' => 'acf_after_title',
    			'layout' => 'default',
    			'hide_on_screen' => array (
    			),
    		),
    		'menu_order' => 0,
    	));
    }

    //
    // add_filter('acf/validate_value', 'pmc_acf_validate_event_date', 10, 4);
    // function pmc_acf_validate_event_date( $valid, $value, $field, $input ){
    //
    //   error_log('yo')
    //
    //   // bail early if value is already invalid
    //   if( !$valid ) {
    //
    //     return $valid;
    //
    //   }
    //
    //   // return
    //   return $valid;
    // }




  }

  function register_timeline_item_type() {
    $labels = array(
      'name'               => _x( 'Timeline Items', 'post type general name', 'pmc' ),
      'singular_name'      => _x( 'Timeline Item', 'post type singular name', 'pmc' ),
      'menu_name'          => _x( 'Timeline', 'admin menu', 'pmc' ),
      'name_admin_bar'     => _x( 'Timeline', 'add new on admin bar', 'pmc' ),
      // 'add_new'            => _x( 'Add item', 'pmc_timeline_item', 'pmc' ),
      'add_new_item'       => __( 'Add new timeline item', 'pmc' ),
      'new_item'           => __( 'New item', 'pmc' ),
      'edit_item'          => __( 'Edit item', 'pmc' ),
      'view_item'          => __( 'View item', 'pmc' ),
      'all_items'          => __( 'All items', 'pmc' ),
      'search_items'       => __( 'Search timeline items', 'pmc' ),
      'not_found'          => __( 'No timeline items found.', 'pmc' ),
      'not_found_in_trash' => __( 'No timeline items found in trash.', 'pmc' )
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
      'description'        => __( 'Timeline\'s Posts', 'pmc' ),
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      // 'rewrite'            => array( 'slug' => 'timeline_items' ),
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
}

$pmc_timeline_posts = new PMC_Timeline_Items();
