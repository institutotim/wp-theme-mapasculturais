<?php

/**
 * Init plugins
 */

require_once(TEMPLATEPATH . '/inc/class-tgm-plugin-activation.php');
function pmc_register_required_plugins() {
  $plugins = array();

  // Check ACP_PRO_KEY environment var
  if (defined('ACF_PRO_KEY')) {
    $plugins[] = array(
      'name' => 'Advanced Custom Fields PRO',
      'slug' => 'advanced-custom-fields-pro',
      'required' => true,
      'force_activation' => true,
      'source' => 'https://connect.advancedcustomfields.com/index.php?p=pro&a=download&k=' . ACF_PRO_KEY
    );
    $plugins[] = array(
      'name' => 'ACF: Advanced Taxonomy Selector',
      'slug' => 'acf-advanced-taxonomy-selector',
      'required' => true,
      'force_activation' => true
    );
    $plugins[] = array(
      'name' => 'Advanced Custom Fields: Tag It Field',
      'slug' => 'advanced-custom-fields-tag-it',
      'required' => true,
      'force_activation' => true
    );
    $plugins[] = array(
      'name' => 'Advanced Custom Fields: Font Awesome',
      'slug' => 'advanced-custom-fields-font-awesome',
      'required' => true,
      'force_activation' => true
    );
  } else {
   error_log('Error: Environment variable ACF_PRO_KEY is not defined.');
  }

  $options = array(
   'default_path'  => '',
   'menu'      => 'pmc-install-plugins',
   'has_notices'  => true,
   'dismissable'  => true,
   'dismiss_msg'  => '',
   'is_automatic'  => false,
   'message'    => ''
  );
  tgmpa($plugins, $options);
}
add_action('tgmpa_register', 'pmc_register_required_plugins');

/**
 * Setup Theme
 */

function pmc_setup_theme() {

  // uncomment this line to refresh maintainer's capabilities
  // remove_role('instance');

  // create instance role
  $instance_role = add_role('instance', __('Instance', 'pmc'));

  if (null !== $instance_role) {
    $instance_role->add_cap( 'read' );
    $instance_role->add_cap( 'upload_files' );
  }

  // capabilities for admins, editors and instances
  foreach (array('administrator', 'editor', 'instance') as $role_name) {
    $role = get_role( $role_name );

    // network posts (custom post type)
    $role->add_cap( 'edit_published_network_posts' );
    $role->add_cap( 'publish_network_posts' );
    $role->add_cap( 'delete_published_network_posts' );
    $role->add_cap( 'edit_network_posts' );
    $role->add_cap( 'delete_network_posts' );

    // network posts (custom post type)
    $role->add_cap( 'edit_published_timeline_items' );
    $role->add_cap( 'publish_timeline_items' );
    $role->add_cap( 'delete_published_timeline_items' );
    $role->add_cap( 'edit_timeline_items' );
    $role->add_cap( 'delete_timeline_items' );

    // tutorials (custom type)
    $role->add_cap( 'edit_published_tutorials' );
    $role->add_cap( 'delete_published_tutorials' );
    $role->add_cap( 'edit_tutorials' );
    $role->add_cap( 'delete_tutorials' );

    // related versions (taxonomy)
    $role->add_cap( 'manage_related_versions' );
    $role->add_cap( 'assign_related_versions' );

    // install stats (custom post type)
    $role->add_cap( 'edit_published_install_stats' );
    $role->add_cap( 'publish_install_stats' );
    $role->add_cap( 'delete_published_install_stats' );
    $role->add_cap( 'edit_install_stats' );
    $role->add_cap( 'delete_install_stats' );
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
 * Enable Thumbnails for all posts
 */

add_theme_support( 'post-thumbnails' );
add_image_size( 'timeline', 600, 600, false );

/**
 * Header
 */

function pmc_header_scripts() {

  wp_register_style('webfonts', '//fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,800');
  wp_register_style('pmc-icons', get_template_directory_uri() . '/css/pmc-icons.css');
  wp_register_style('normalize', '//cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css');
  wp_register_style('skeleton', '//cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css');
  wp_register_style('fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_register_style('leaflet', '//cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.css');
  wp_register_style('highcharts', '//cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.10/css/highcharts.css');

  wp_register_style('main', get_template_directory_uri() . '/css/main.css', array('webfonts', 'pmc-icons', 'normalize', 'skeleton', 'fontawesome', 'leaflet', 'highcharts'), '0.1.1');
  wp_register_style('responsive', get_template_directory_uri() . '/css/responsive.css', array('main'), '0.0.1');

  wp_enqueue_style('main');
  wp_enqueue_style('responsive');

  wp_register_script('snapsvg', 'https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.5.1/snap.svg-min.js');
  wp_register_script('leaflet', '//cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.js');
  wp_register_script('highcharts', '//cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.10/highcharts.js');
  wp_register_script('highcharts-more', '//cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.10/highcharts-more.js');
  wp_register_script('moment', '//cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js');
  wp_register_script('scroll-locate', get_template_directory_uri() . '/js/scroll-locate.js', array('jquery'), '0.0.2');
  wp_register_script('site', get_template_directory_uri() . '/js/site.js', array('jquery'), '0.0.3');
  wp_register_script('svg', get_template_directory_uri() . '/js/svg.js', array('jquery', 'scroll-locate', 'snapsvg', 'underscore'), '0.0.2');
  wp_register_script('timeline', get_template_directory_uri() . '/js/timeline.js', array('jquery', 'scroll-locate'), '0.0.2');
  wp_register_script('canvas', get_template_directory_uri() . '/js/canvas.js', array('jquery'), '0.0.2');
  wp_register_script('map', get_template_directory_uri() . '/js/map.js', array('jquery', 'leaflet'), '0.0.2');
  wp_register_script('github', get_template_directory_uri() . '/js/github.js', array('jquery', 'highcharts', 'highcharts-more', 'moment'), '0.0.2');

  if ( false === ( $gh_request = get_transient( 'gh_request' ) ) ) {
       $gh_request = wp_remote_get(esc_url('https://api.github.com/repos/hacklabr/mapasculturais/stats/commit_activity'));
       set_transient( 'gh_request', $gh_request, 3 * HOUR_IN_SECONDS );
  }

  if( is_wp_error( $gh_request ) ) {
    return false;
  }
  $gh_body = wp_remote_retrieve_body( $gh_request );
  $gh_data = json_decode( $gh_body );
  if( ! empty( $gh_data ) ) {
    //$gh_data = file_get_contents(TEMPLATEPATH . '/js/ghdata.json');
    wp_localize_script('github', 'ghData', $gh_data);
  }

  wp_localize_script('map', 'mapData', array(
    'iconUrl' => get_template_directory_uri() . '/img/marker.png'
  ));

  wp_enqueue_script('site');
  wp_enqueue_script('canvas');
  wp_enqueue_script('svg');
  wp_enqueue_script('timeline');
  wp_enqueue_script('map');
  wp_enqueue_script('github');

}
add_action('wp_enqueue_scripts', 'pmc_header_scripts');

// Delibera hooks
function pmc_is_pauta($is_pauta) {
  if(is_page('comunidade')) {
    return true;
  }
  return $is_pauta;
}
add_filter('delibera_is_pauta', 'pmc_is_pauta');

// next and previous post links class

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="button"';
}


// settings page


function pmc_settings()
{
  ?>
  <h1><?php _e('Settings Page','pmc'); ?></h1>
  <h3><?php _e("Add the button's link:");?><h3>
  <form method="post" action="admin-post.php" >
    <input type="hidden" name="action" value="update_options">
    <div>
      <p>
        <label>The github link of Mapas Culturais</label>
        <input id="github_url" name="github_url" type="text" value="<?php echo get_option('github_url') ? get_option('github_url'):""; ?>">
      </p>
      <p>
        <label>The network link's page</label>
        <input id="network_url" name="network_url" type="text" value="<?php echo get_option('network_url') ? get_option('network_url'):""; ?>">
      </p>
  </div>
  <?php submit_button(__("Save", 'pmc')); ?>
  </form>

  <?php
  
}


function add_admin_menu(){
  add_menu_page( __('Mapas Theme','pmc'), __('Mapas Theme','pmc'), 'manage_options', 'pmc_menu', 'pmc_settings', 'dashicons-megaphone', 100);
}

add_action('admin_menu', 'add_admin_menu');

add_action( 'admin_post_update_options', 'save_settings_fields' );

function save_settings_fields(){

  $github_url = isset( $_POST["github_url"]) ? $_POST["github_url"]:"";
  $network_url = isset( $_POST["network_url"]) ? $_POST["network_url"]:"";

  update_option( "github_url", $github_url);
  update_option( "network_url", $network_url);


    wp_redirect( "admin.php?page=pmc_menu" );
    exit;
}

/**
 * Include features
 */

load_theme_textdomain('pmc', get_template_directory() . '/languages');

require_once(TEMPLATEPATH . '/inc/homepage-config.php');
require_once(TEMPLATEPATH . '/inc/timeline-items.php');
require_once(TEMPLATEPATH . '/inc/network-posts.php');
require_once(TEMPLATEPATH . '/inc/tutorials/post-type.php');
require_once(TEMPLATEPATH . '/inc/tutorials/related-versions.php');
require_once(TEMPLATEPATH . '/inc/tutorials/widget.php');
require_once(TEMPLATEPATH . '/inc/platform-statistics.php');
require_once(TEMPLATEPATH . '/inc/sidebars.php');
require_once(TEMPLATEPATH . '/inc/menus.php');