<?php

class PMC_Tutorials {

  function __construct() {
    add_action('init', array($this, 'register_post_type'));
  }

  function register_post_type() {
    $labels = array(
      'name'               => _x( 'Tutorials', 'post type general name', 'pmc' ),
      'singular_name'      => _x( 'Tutorial', 'post type singular name', 'pmc' ),
      'menu_name'          => _x( 'Tutorials', 'admin menu', 'pmc' ),
      'name_admin_bar'     => _x( 'Tutorials', 'add new on admin bar', 'pmc' ),
      'add_new'            => _x( 'Add new tutorial', 'tutorial', 'pmc' ),
      'add_new_item'       => __( 'Add new tutorial', 'pmc' ),
      'new_item'           => __( 'New tutorial', 'pmc' ),
      'edit_item'          => __( 'Edit tutorial', 'pmc' ),
      'view_item'          => __( 'View tutorial', 'pmc' ),
      'all_items'          => __( 'All tutorials', 'pmc' ),
      'search_items'       => __( 'Search tutorial\'s posts', 'pmc' ),
      'not_found'          => __( 'No tutorials found.', 'pmc' ),
      'not_found_in_trash' => __( 'No tutorials found in trash.', 'pmc' )
    );

    $capabilities = array(
      'edit_published_posts'    => 'edit_published_tutorials',
      'publish_posts'           => 'publish_tutorials',
      'delete_published_posts'  => 'delete_published_tutorials',
      'edit_posts'              => 'edit_tutorials',
      'delete_posts'            => 'delete_tutorials'
  );

    $args = array(
      'labels'             => $labels,
      'description'        => __( 'Tutorials Posts', 'pmc' ),
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'tutorials' ),
      'capabilities'       => $capabilities,
      'map_meta_cap'       => true,
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'supports'           => array( 'title', 'editor', 'related_version', 'thumbnail', 'revisions' )
    );

    register_post_type( 'tutorial', $args );

    $labels = array(
      'name'              => esc_html__( 'Categories', 'pmc' ),
      'singular_name'     => esc_html__( 'Category', 'pmc' ),
      'search_items'      => esc_html__( 'Search Categories', 'pmc' ),
      'all_items'         => esc_html__( 'All Categories', 'pmc' ),
      'parent_item'       => esc_html__( 'Parent Category', 'pmc' ),
      'parent_item_colon' => esc_html__( 'Parent Category:', 'pmc' ),
      'edit_item'         => esc_html__( 'Edit Category', 'pmc' ),
      'update_item'       => esc_html__( 'Update Category', 'pmc' ),
      'add_new_item'      => esc_html__( 'Add New Category', 'pmc' ),
      'new_item_name'     => esc_html__( 'New Category Name', 'pmc' ),
      'menu_name'         => esc_html__( 'Categories', 'pmc' ),
    );

    register_taxonomy( 'category_tutorial', array( 'tutorial' ), array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
      )
    );

    $labels = array(
      'name'              => esc_html__( 'Target Group', 'pmc' ),
      'singular_name'     => esc_html__( 'Target Groups', 'pmc' ),
      'search_items'      => esc_html__( 'Search Target Groups', 'pmc' ),
      'all_items'         => esc_html__( 'All Target Groups', 'pmc' ),
      'parent_item'       => esc_html__( 'Parent Target Group', 'pmc' ),
      'parent_item_colon' => esc_html__( 'Parent Target Group:', 'pmc' ),
      'edit_item'         => esc_html__( 'Edit Target Group', 'pmc' ),
      'update_item'       => esc_html__( 'Update Target Group', 'pmc' ),
      'add_new_item'      => esc_html__( 'Add New Target Group', 'pmc' ),
      'new_item_name'     => esc_html__( 'New Target Group Name', 'pmc' ),
      'menu_name'         => esc_html__( 'Target Groups', 'pmc' ),
    );

    register_taxonomy( 'target_group', array( 'tutorial' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
      )
    );
  }
}

$pmc_tutorials = new PMC_Tutorials();
