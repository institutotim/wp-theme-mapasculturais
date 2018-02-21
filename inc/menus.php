<?php

class PMC_Menus {

  function __construct() {
    add_action('init', array($this, 'register_menus'));
  }

  function register_menus() {

    $args = array(
        'header' => __( 'Header' ),
        'footer' => __( 'Footer' )
    );

    register_nav_menus($args);

  }
}

$pmc_sidebars = new PMC_Menus();