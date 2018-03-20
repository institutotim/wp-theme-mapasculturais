<?php

class PMC_Network_Posts {

  function __construct() {
    add_action('init', array($this, 'register_network_post_type'));
  }

  function register_network_post_type() {
    $labels = array(
      'name'               => _x( 'Network Posts', 'post type general name', 'pmc' ),
      'singular_name'      => _x( 'Network Post', 'post type singular name', 'pmc' ),
      'menu_name'          => _x( 'Network', 'admin menu', 'pmc' ),
      'name_admin_bar'     => _x( 'Network', 'add new on admin bar', 'pmc' ),
      'add_new'            => _x( 'Add network post', 'network_post', 'pmc' ),
      'add_new_item'       => __( 'Add new network post', 'pmc' ),
      'new_item'           => __( 'New post', 'pmc' ),
      'edit_item'          => __( 'Edit post', 'pmc' ),
      'view_item'          => __( 'View post', 'pmc' ),
      'all_items'          => __( 'All posts', 'pmc' ),
      'search_items'       => __( 'Search network posts', 'pmc' ),
      'not_found'          => __( 'No network posts found.', 'pmc' ),
      'not_found_in_trash' => __( 'No network posts found in trash.', 'pmc' )
    );

    $capabilities = array(
      'edit_published_posts'    => 'edit_published_network_posts',
      'publish_posts'           => 'publish_network_posts',
      'delete_published_posts'  => 'delete_published_network_posts',
      'edit_posts'              => 'edit_network_posts',
      'delete_posts'            => 'delete_network_posts'
  );

    $args = array(
      'labels'             => $labels,
      'description'        => __( 'Network\'s Posts', 'pmc' ),
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'blog-da-rede' ),
      'capabilities'       => $capabilities,
      'map_meta_cap'       => true,
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'supports'           => array( 'title', 'editor', 'thumbnail', 'revisions' )
    );


    register_post_type( 'network_post', $args );
  }
}

$pmc_network_posts = new PMC_Network_Posts();
