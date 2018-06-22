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

  $plugins[] = array(
    'name' => 'MailChimp for WordPress',
    'slug' => 'mailchimp-for-wp',
    'required' => true,
    'force_activation' => true
  );

  $plugins[] = array(
    'name' => 'Delibera',
    'slug' => 'delibera',
    'required' => true,
    'force_activation' => false,
    'source' => 'https://github.com/redelivre/delibera/archive/v2.0.1a.zip'
  );

  tgmpa($plugins, $options);
}
add_action('tgmpa_register', 'pmc_register_required_plugins');

/**
 * Setup Customizer
 */

function pmc_customize_register( $wp_customize ) {

  $wp_customize->add_section( 'pmc_links' , array(
    'title'      => __( 'Web links', 'pmc' ),
    'priority'   => 30,
  ) );

  // input left

  $wp_customize->add_setting('github', array(
      'default' => 'https://github.com/hacklabr/mapasculturais' ,
      'capability'=> 'edit_theme_options',

  ));

  $wp_customize->add_control('pmc_github', array(
      'type'       => 'text',
      'label'      => __('Github', 'pmc'),
      'section'    => 'pmc_links',
      'settings'   => 'github',
  ));

}
add_action( 'customize_register', 'pmc_customize_register' );

/**
 * Setup Theme
 */

function pmc_setup_theme() {

  // add excerpt to pages
  add_post_type_support( 'page', 'excerpt' );

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
    //$role->add_cap( 'delete_published_network_posts' );
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

    // network posts (custom post type)
    $role->add_cap( 'edit_published_network_posts' );
    $role->add_cap( 'publish_network_posts' );
    $role->add_cap( 'delete_published_network_posts' );
    $role->add_cap( 'edit_network_posts' );
    $role->add_cap( 'delete_network_posts' );

    // timeline-items (custom post type)
    $role->add_cap( 'edit_published_timeline_items' );
    $role->add_cap( 'publish_timeline_items' );
    $role->add_cap( 'delete_published_timeline_items' );
    $role->add_cap( 'edit_timeline_items' );
    $role->add_cap( 'delete_timeline_items' );

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
add_image_size( 'archive-post', 836, 327, true );

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

  wp_register_style('main', get_template_directory_uri() . '/css/main.css', array('webfonts', 'pmc-icons', 'normalize', 'skeleton', 'fontawesome', 'leaflet', 'highcharts'), '0.1.2');
  wp_register_style('responsive', get_template_directory_uri() . '/css/responsive.css', array('main'), '0.0.1');

  wp_register_style('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
  wp_register_style('bootstrap-theme', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');
  wp_register_style('jquery-ui', '//code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css');

  wp_register_script('jquery-ui', 'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js', array('jquery'), '0.0.2');

  wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');


  wp_register_script('snapsvg', 'https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.5.1/snap.svg-min.js');
  wp_register_script('leaflet', '//cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.3/leaflet.js');
  wp_register_script('highcharts', '//cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.10/highcharts.js');
  wp_register_script('highcharts-more', '//cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.10/highcharts-more.js');
  wp_register_script('moment', '//cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js');
  wp_register_script('scroll-locate', get_template_directory_uri() . '/js/scroll-locate.js', array('jquery'), '0.0.2');
  wp_register_script('site', get_template_directory_uri() . '/js/site.js', array('jquery'), '0.0.4');
  wp_register_script('svg', get_template_directory_uri() . '/js/svg.js', array('jquery', 'scroll-locate', 'snapsvg', 'underscore'), '0.0.2');
  wp_register_script('timeline', get_template_directory_uri() . '/js/timeline.js', array('jquery', 'scroll-locate'), '0.0.2');
  wp_register_script('canvas', get_template_directory_uri() . '/js/canvas.js', array('jquery'), '0.0.2');
  wp_register_script('map', get_template_directory_uri() . '/js/map.js', array('jquery', 'leaflet'), '0.0.2');
  wp_register_script('github', get_template_directory_uri() . '/js/github.js', array('jquery', 'highcharts', 'highcharts-more', 'moment'), '0.0.2');
  wp_register_script('add-pauta', get_template_directory_uri() . '/js/add-pauta.js', array('jquery', 'moment'), '0.0.2');

  if (is_page_template( 'front_add_pauta.php')){
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('bootstrap-theme');
    wp_enqueue_style('jquery-ui');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('jquery-ui');
    wp_enqueue_script('add-pauta');
  }

  wp_enqueue_style('main');
  wp_enqueue_style('responsive');

  $gh_request = get_transient( 'gh_request' );

  $gh_body = wp_remote_retrieve_body( $gh_request );

  $gh_data = json_decode( $gh_body );

  $gh_status = (array)$gh_data;

  if (  false === $gh_request || null === $gh_request || is_wp_error( $gh_request ) || empty($gh_status) ) {

    $response  = wp_safe_remote_get( 'https://api.github.com/repos/hacklabr/mapasculturais/stats/commit_activity' );

    if ( ! is_wp_error( $response ) ) {
      $gh_request = $response;
      set_transient( 'gh_request', $gh_request, 6 * HOUR_IN_SECONDS );
    } elseif ( true === WP_DEBUG && is_wp_error( $response ) ) {
      echo $response->get_error_message();
    } else {
      echo 'Não foi possivel obter dados do github';
    }

  }

  $gh_body = wp_remote_retrieve_body( $gh_request );

  $gh_data = json_decode( $gh_body );

  if( ! empty( $gh_data ) ) {
    wp_localize_script('github', 'ghData', $gh_data);
  }

  $users = get_users( array( 'fields' => array( 'id', 'user_nicename', 'user_url' ), 'role' => 'instance') );

  $markers = array();

  foreach ($users as $user) {
    $markers[$user->user_nicename] = array(
      'position'       => get_the_author_meta( 'position', $user->id ),
      'agents_count'   =>
      array_values(get_the_author_meta( 'agents_count', $user->id ))[0],
      'events_count'   =>
      array_values(get_the_author_meta( 'events_count', $user->id ))[0],
      'spaces_count'   =>
      array_values(get_the_author_meta( 'spaces_count', $user->id ))[0],
      'projects_count' =>
      array_values(get_the_author_meta( 'projects_count', $user->id))[0],
      'url' => $user->user_url,
      'instance' => $user->user_nicename
    );
  }

  wp_localize_script('map', 'mapData', array(
    'iconUrl' => get_template_directory_uri() . '/img/marker.png',
    'markers' => $markers
  ));


  if (is_author()){
    $author = get_queried_object();

    if (in_array('instance', $author->caps)){

      $instanceData = array(
        'agents'   => get_the_author_meta( 'agents_count', $author->ID ),
        'events'   => get_the_author_meta( 'events_count', $author->ID ),
        'spaces'   => get_the_author_meta( 'spaces_count', $author->ID ),
        'projects' => get_the_author_meta( 'projects_count', $author->ID )
      );

      wp_localize_script('github', 'instanceData', $instanceData);
    }

  }

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

function pmc_delibera_pauta_situacao_filter($query) {
  if(is_post_type_archive("pauta") && $_GET["situacao"]) {
    $query->set("tax_query", array(
      array(
        "taxonomy" => "situacao",
        "field" => "slug",
        "terms" => $_GET["situacao"]
      )
    ));
  }
}
add_action("pre_get_posts", "pmc_delibera_pauta_situacao_filter");

// next and previous post links class

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="button"';
}

function pmc_custom_query_vars_filter($vars) {
  $vars[] = 'target_group';
  return $vars;
}
add_filter( 'query_vars', 'pmc_custom_query_vars_filter' );

function custom_rewrite_rule() {
    add_rewrite_rule('^tutorials/page/([0-9]+)/?','index.php?post_type=tutorial&page=$matches[1]','top');
    add_rewrite_rule('^noticias/page/([0-9]+)/?','index.php?post_type=post&page=$matches[1]','top');
    //add_rewrite_rule('^tutorials/?','index.php?post_type=tutorial','top');
}
add_action('init', 'custom_rewrite_rule', 10, 0);

function custom_rewrite_tag() {
  add_rewrite_tag('%page%', '([0-9]+)');
}
add_action('init', 'custom_rewrite_tag', 10, 0);


function pmc_remove_delibera_style(){
  wp_dequeue_style('delibera_style');
}

add_action('wp_print_scripts', 'pmc_remove_delibera_style', 10, 0);


// get count total for all instances

function get_agents_count(){

  $users = get_users( array( 'fields' => array( 'id' ), 'role' => 'instance') );

  $sum = 0;

  foreach ($users as $user) {
    $sum += array_values(get_the_author_meta( 'agents_count', $user->id ))[0];
  }
  echo $sum;
}

function get_events_count(){

  $users = get_users( array( 'fields' => array( 'id' ), 'role' => 'instance') );

  $sum = 0;

  foreach ($users as $user) {
    $sum += array_values(get_the_author_meta( 'events_count', $user->id ))[0];
  }
  echo $sum;
}


function get_spaces_count(){

  $users = get_users( array( 'fields' => array( 'id' ), 'role' => 'instance') );

  $sum = 0;

  foreach ($users as $user) {
    $sum += array_values(get_the_author_meta( 'spaces_count', $user->id ))[0];
  }
  echo $sum;
}

function get_projects_count(){

  $users = get_users( array( 'fields' => array( 'id' ), 'role' => 'instance') );

  $sum = 0;

  foreach ($users as $user) {
    $sum += array_values(get_the_author_meta( 'projects_count', $user->id ))[0];
  }
  echo $sum;
}

function get_instances_link(){
  $pages = get_pages(array(
    'meta_key' => '_wp_page_template',
    'meta_value' => 'network.php'
  ));

  echo $pages[0]->guid;
}

function get_support_link(){
  $pages = get_pages(array(
    'meta_key' => '_wp_page_template',
    'meta_value' => 'support.php'
  ));

  echo $pages[0]->guid;
}

function get_community_url(){
  $pages = get_pages(array(
    'meta_key' => '_wp_page_template',
    'meta_value' => 'community.php'
  ));

  echo $pages[0]->guid;
}


function page_template_redirect(){
  if( is_page_template( 'front_add_pauta.php') && ! is_user_logged_in() )
  {
      wp_redirect( home_url( '/wp-login.php' ) );
      die;
  }
}
add_action( 'template_redirect', 'page_template_redirect' );


function add_pauta_template_redirect($post_id){
  wp_redirect(get_permalink( $post_id ));
  die;
}

/**
 * Include features
 */

load_theme_textdomain('pmc', get_template_directory() . '/languages');

require_once(TEMPLATEPATH . '/inc/homepage-config.php');
require_once(TEMPLATEPATH . '/inc/networkpage-config.php');
require_once(TEMPLATEPATH . '/inc/support-config.php');
require_once(TEMPLATEPATH . '/inc/timeline-items.php');
require_once(TEMPLATEPATH . '/inc/network-posts.php');
require_once(TEMPLATEPATH . '/inc/tutorials/post-type.php');
require_once(TEMPLATEPATH . '/inc/tutorials/related-versions.php');
require_once(TEMPLATEPATH . '/inc/tutorials/widget.php');
require_once(TEMPLATEPATH . '/inc/platform-statistics.php');
require_once(TEMPLATEPATH . '/inc/sidebars.php');
require_once(TEMPLATEPATH . '/inc/menus.php');
