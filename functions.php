<?php

/**
 * Setup Theme
 */

function pmc_setup_theme() {
  load_theme_textdomain('pmc', get_template_directory() . '/languages');

  // create maintainer role
  $maintainer_role = add_role('maintainer', __('Maintainer'));
  if (null !== $maintainer_role) {
    $maintainer_role->add_cap( 'read' );
    $maintainer_role->add_cap( 'upload_files' );
  }

  // set network post capabilities to roles
  foreach (array('administrator', 'editor', 'maintainer') as $role_name) {
    $role = get_role( $role_name );
    $role->add_cap( 'edit_published_network_posts' );
    $role->add_cap( 'publish_network_posts' );
    $role->add_cap( 'delete_published_network_posts' );
    $role->add_cap( 'edit_network_posts' );
    $role->add_cap( 'delete_network_posts' );
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
