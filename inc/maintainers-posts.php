<?php

class PMC_Maintainers_Posts {

  function __construct() {
    add_action('init', array($this, 'register_maintainers_post_type'));
  }

  function register_maintainers_post_type() {
    $labels = array(
      'name'               => _x( 'Maintainer\'s Posts', 'post type general name', 'pmc' ),
      'singular_name'      => _x( 'Maintainer Post', 'post type singular name', 'pmc' ),
      'menu_name'          => _x( 'Maintainer\'s Posts', 'admin menu', 'pmc' ),
      'name_admin_bar'     => _x( 'Maintainer\'s Post', 'add new on admin bar', 'pmc' ),
      'add_new'            => _x( 'Add new post', 'maintainers_post', 'pmc' ),
      'add_new_item'       => __( 'Add new post', 'pmc' ),
      'new_item'           => __( 'New post', 'pmc' ),
      'edit_item'          => __( 'Edit post', 'pmc' ),
      'view_item'          => __( 'View post', 'pmc' ),
      'all_items'          => __( 'All posts', 'pmc' ),
      'search_items'       => __( 'Search maintainer\'s posts', 'pmc' ),
      'not_found'          => __( 'No maintainer\'s posts found.', 'pmc' ),
      'not_found_in_trash' => __( 'No maintainer\'s posts found in trash.', 'pmc' )
    );
    $args = array(
      'labels'             => $labels,
      'description'        => __( 'Maintainer\'s Posts', 'pmc' ),
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'maintainers_posts' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'supports'           => array( 'title', 'editor', 'thumbnail', 'revisions' )
    );
    register_post_type( 'maintainers_post', $args );
  }
}

$pmc_maintainers_posts = new PMC_Maintainers_Posts();
