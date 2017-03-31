<?php

/**
 * Setup Theme
 */

function pmc_setup_theme() {
  load_theme_textdomain('pmc', get_template_directory() . '/languages');

  // uncomment this line to refresh maintainer's capabilities
  // remove_role('maintainer');

  // create maintainer role
  $maintainer_role = add_role('maintainer', __('Maintainer'));
  if (null !== $maintainer_role) {
    $maintainer_role->add_cap( 'read' );
    $maintainer_role->add_cap( 'upload_files' );
  }

  // capabilities for admins, editors and maintainers
  foreach (array('administrator', 'editor', 'maintainer') as $role_name) {
    $role = get_role( $role_name );

    // network posts (custom post type)
    $role->add_cap( 'edit_published_network_posts' );
    $role->add_cap( 'publish_network_posts' );
    $role->add_cap( 'delete_published_network_posts' );
    $role->add_cap( 'edit_network_posts' );
    $role->add_cap( 'delete_network_posts' );

    // tutorials (custom type)
    $role->add_cap( 'edit_published_tutorials' );
    $role->add_cap( 'delete_published_tutorials' );
    $role->add_cap( 'edit_tutorials' );
    $role->add_cap( 'delete_tutorials' );

    // related versions (taxonomy)
    $role->add_cap( 'manage_related_versions' );
    $role->add_cap( 'assign_related_versions' );
  }

  // capabilities for admins, editors
  foreach (array('administrator', 'editor') as $role_name) {
    $role = get_role( $role_name );

    // mapas culturais' versions (taxonomy)
    $role->add_cap( 'edit_related_versions' );
    $role->add_cap( 'delete_related_versions' );

    // tutorials (custom type)
    $role->add_cap( 'publish_tutorials' );
  }

}
add_action('after_setup_theme', 'pmc_setup_theme');

/**
 * Header
 */

function pmc_header_scripts() {

  wp_register_style('webfonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,800');
  wp_register_style('normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css');
  wp_register_style('skeleton', 'https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css');
  wp_register_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_register_style('leaflet', 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.css');

  wp_register_style('main', get_template_directory_uri() . '/css/main.css', array('webfonts', 'normalize', 'skeleton', 'fontawesome', 'leaflet'), '0.0.10');
  wp_register_style('responsive', get_template_directory_uri() . '/css/responsive.css', array('main'), '0.0.2');

  wp_enqueue_style('main');
  wp_enqueue_style('responsive');

}
add_action('wp_enqueue_scripts', 'pmc_header_scripts');

/**
 * Include features
 */

require_once(TEMPLATEPATH . '/inc/network-posts.php');
require_once(TEMPLATEPATH . '/inc/tutorials.php');
require_once(TEMPLATEPATH . '/inc/related-versions.php');
