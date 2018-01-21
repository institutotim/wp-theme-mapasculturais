<?php

class PMC_Difficulties {

  function __construct() {
    add_action('init', array($this, 'register_difficulties'));
  }

  function register_difficulties() {
    // create a new taxonomy
    // register_taxonomy(
    //   'difficulty',
    //   'tutorial',
    //   array(
    //     'label' => __( 'Difficulties' ),
    //     'description' => __( 'Difficulty level of a tutorial.' ),
    //     'capabilities' => array(
    //       'manage_terms' => 'manage_difficulties',
    //       'edit_terms' => 'edit_difficulties',
    //       'delete_terms' => 'delete_difficulties',
    //       'assign_terms' => 'assign_difficulties'
    //     )
    //   )
    // );
  }
}

$pmc_difficulties = new PMC_Difficulties();
