<?php

class PMC_RelatedVersions {

  function __construct() {
    add_action('init', array($this, 'register_related_version'));
  }

  function register_related_version() {
    register_taxonomy(
      'related_version',
      'tutorial',
      array(
        'label'          => __( 'Related Versions', 'pmc' ),
        'description'    => __( 'Versions of Mapas Culturais a tutorial applies to.', 'pmc' ),
        'capabilities'   => array(
          'manage_terms' => 'manage_related_versions',
          'edit_terms'   => 'edit_related_versions',
          'delete_terms' => 'delete_related_versions',
          'assign_terms' => 'assign_related_versions'
        )
      )
    );
  }
}

$pmc_related_versions = new PMC_RelatedVersions();
