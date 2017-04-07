<?php

class PMC_Installs_Stats {

  function __construct() {
    add_action('init', array($this, 'register_installs_data'));

    add_filter('manage_posts_columns', array($this, 'admin_columns'));
    add_action('manage_posts_custom_column', array($this, 'admin_columns_content'), 10, 2);
  }

  function register_installs_data() {
    $labels = array(
      'name'               => _x( 'Statistics of your Mapas Culturais install', 'post type general name', 'pmc' ),
      // 'singular_name'      => _x( 'Installs Stats', 'post type singular name', 'pmc' ),
      'menu_name'          => _x( 'Install Statistics', 'admin menu', 'pmc' ),
      // 'name_admin_bar'     => _x( 'My Install', 'add new on admin bar', 'pmc' ),
      'add_new'            => _x( 'New entry', 'install_stats', 'pmc' ),
      'add_new_item'       => __( 'New entry', 'pmc' ),
      'new_item'           => __( 'New entry', 'pmc' ),
      'edit_item'          => __( 'Edit entries', 'pmc' ),
      'view_item'          => __( 'View entries', 'pmc' ),
      'all_items'          => __( 'All entries', 'pmc' ),
      'search_items'       => __( 'Search entries', 'pmc' ),
      'not_found'          => __( 'No entries found.', 'pmc' ),
      'not_found_in_trash' => __( 'No entries found in trash.', 'pmc' )
    );

    $capabilities = array(
      'edit_published_posts'    => 'edit_published_install_stats',
      'publish_posts'           => 'publish_install_stats',
      'delete_published_posts'  => 'delete_published_install_stats',
      'edit_posts'              => 'edit_install_stats',
      'delete_posts'            => 'delete_install_stats'
    );

    $args = array(
      'labels'             => $labels,
      'description'        => __( 'Install stats', 'pmc' ),
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'install_stats' ),
      'capabilities'       => $capabilities,
      'map_meta_cap'       => true,
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'supports'           => array( '' )
    );

    register_post_type( 'install_stats', $args );



    if(function_exists("register_field_group"))
    {
    	register_field_group(array (
    		'id' => 'acf_install-stat',
    		'title' => 'Install stat',
    		'fields' => array (
    			array (
    				'key' => 'field_58e7d7c66b742',
    				'label' => 'Collected At',
    				'name' => 'collected_at',
    				'type' => 'date_picker',
    				'instructions' => 'Data de coleta da entrada. ',
    				'required' => 1,
    				'date_format' => 'yymmdd',
    				'display_format' => 'dd/mm/yy',
    				'first_day' => 1,
    			),
    			array (
    				'key' => 'field_58e7cb747f0f5',
    				'label' => 'Variable',
    				'name' => 'variable',
    				'type' => 'radio',
    				'required' => 1,
    				'choices' => array (
    					'Agents' => 'Agents',
    					'Events' => 'Events',
    					'Projects' => 'Projects',
    					'Spaces' => 'Spaces',
    				),
    				'other_choice' => 0,
    				'save_other_choice' => 0,
    				'default_value' => '',
    				'layout' => 'vertical',
    			),
    			array (
    				'key' => 'field_58e7cd2d7f0f6',
    				'label' => 'Value',
    				'name' => 'value',
    				'type' => 'number',
    				'required' => 1,
    				'default_value' => 0,
    				'placeholder' => '',
    				'prepend' => '',
    				'append' => '',
    				'min' => 0,
    				'max' => '',
    				'step' => 0,
    			),
    		),
    		'location' => array (
    			array (
    				array (
    					'param' => 'post_type',
    					'operator' => '==',
    					'value' => 'install_stats',
    					'order_no' => 0,
    					'group_no' => 0,
    				),
    			),
    		),
    		'options' => array (
    			'position' => 'normal',
    			'layout' => 'no_box',
    			'hide_on_screen' => array (
    			),
    		),
    		'menu_order' => 0,
    	));
    }
  }

  function admin_columns($defaults) {
    global $wp_query;
    if($wp_query->get('post_type') == 'install_stats') {
      $columns = array();

      $columns['variable'] = __('Variable', 'clade');
      $columns['collected_at'] = __('Collected At', 'clade');
      $columns['value'] = __('Value', 'clade');

      $defaults = $columns;
    }
    return $defaults;
  }

  function admin_columns_content($column_name, $post_id) {
    echo get_field($column_name, $post_id);
  }


}

$pmc_install_stats = new PMC_Installs_Stats();
