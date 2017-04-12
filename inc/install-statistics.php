<?php

class PMC_Installs_Stats {

  function __construct() {
    add_action('init', array($this, 'register_installs_data'));
    add_action('wi_create_daily_backup', array($this, 'wi_create_backup'));
  }

  function register_installs_data() {
    error_log('hi');

    // CLEAN UP FOR TESTING
    // -----
    // $timestamp = wp_next_scheduled( 'wi_create_daily_backup' );
    // if($timestamp) {
    //   wp_unschedule_event($timestamp, 'wi_create_daily_backup');
    // }
    // -----

    //Use wp_next_scheduled to check if the event is already scheduled
    $timestamp = wp_next_scheduled( 'wi_create_daily_backup' );

    //If $timestamp == false schedule daily backups since it hasn't been done previously
    if( $timestamp == false ) {
      error_log('scheduling');
      //Schedule the event for right now, then to repeat daily using the hook 'wi_create_daily_backup'
      wp_schedule_event( time(), 'five_seconds', 'wi_create_daily_backup' );
    } else {
      error_log('already scheduled');
    }

    //Hook our function , wi_create_backup(), into the action wi_create_daily_backup
  }

   public function wi_create_backup(){
     //Run code to create backup.
     error_log('wi_create_backup');
   }
}

$pmc_install_stats = new PMC_Installs_Stats();
