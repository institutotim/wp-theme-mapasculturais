<?php

class PMC_Sidebars {

  function __construct() {
    add_action('init', array($this, 'register_sidebars'));
  }

  function register_sidebars() {
    $args = array(
      'name'          => __( 'News', 'pmc' ), //time-line
      'id'            => 'news-pmc', 
      'description'   => '',
      'class'         => 'widget text-widget',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2>',
      'after_title'   => '</h2>' );

    register_sidebar( $args );

    $args = array(
      'name'          => __( 'Tutorials', 'pmc' ), //time-line
      'id'            => 'tutorials-pmc', 
      'description'   => '',
      'class'         => 'widget text-widget',
      'before_widget' => '<div id="%1$s" class="widget">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2>',
      'after_title'   => '</h2>' );

    register_sidebar( $args );
  }
}

$pmc_sidebars = new PMC_Sidebars();