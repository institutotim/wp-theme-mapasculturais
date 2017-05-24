<?php

/**
 * Init plugins
 */

require_once(TEMPLATEPATH . '/inc/class-tgm-plugin-activation.php');
function pmc_register_required_plugins() {
  $plugins = array();

  $ACF_PRO_KEY = getenv('ACF_PRO_KEY');

  // Check ACP_PRO_KEY environment var
  if (is_string($ACF_PRO_KEY) && (strlen($ACF_PRO_KEY) == 72)) {
    $plugins[] = array(
      'name' => 'Advanced Custom Fields PRO',
      'slug' => 'advanced-custom-fields-pro',
      'required' => true,
      'force_activation' => true,
      'source' => 'https://connect.advancedcustomfields.com/index.php?p=pro&a=download&k=' . $ACF_PRO_KEY
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

    // difficulties (taxonomy)
    $role->add_cap( 'manage_difficulties' );
    $role->add_cap( 'assign_difficulties' );

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

    // difficulties (taxonomy)
    $role->add_cap( 'edit_difficulties' );
    $role->add_cap( 'delete_difficulties' );

    // tutorials (custom type)
    $role->add_cap( 'publish_tutorials' );
  }

}
add_action('after_setup_theme', 'pmc_setup_theme');

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

  wp_register_style('main', get_template_directory_uri() . '/css/main.css', array('webfonts', 'pmc-icons', 'normalize', 'skeleton', 'fontawesome', 'leaflet', 'highcharts'), '0.1.0');
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

  $gh_data = file_get_contents(TEMPLATEPATH . '/js/ghdata.json');
  wp_localize_script('github', 'ghData', json_decode($gh_data));

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

/**
 * Include features
 */

require_once(TEMPLATEPATH . '/inc/network-posts.php');
require_once(TEMPLATEPATH . '/inc/tutorials/post-type.php');
require_once(TEMPLATEPATH . '/inc/tutorials/related-versions.php');
require_once(TEMPLATEPATH . '/inc/tutorials/difficulties.php');
require_once(TEMPLATEPATH . '/inc/platform-statistics.php');
