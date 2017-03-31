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
  }
}

$pmc_tutorials = new PMC_Tutorials();
