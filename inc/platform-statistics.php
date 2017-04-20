<?php

class PMC_Platform_Statistics {

  function __construct() {

    add_action('init', array($this, 'create_fetch_event'));
    add_action('pmc_create_fetch_event', array($this, 'update_statistics'));

    // "Instance URL" property for maintainers
    if(function_exists("register_field_group"))
    {
    	register_field_group(array (
    		'id' => 'acf_instance-url',
    		'title' => 'Instance URL',
    		'fields' => array (
    			array (
    				'key' => 'field_58eff2997be7d',
    				'label' => 'instance_url',
    				'name' => 'instance_url',
    				'type' => 'text',
    				'instructions' => 'URL of your instance of Mapas Culturais Platform',
    				'default_value' => '',
    				'placeholder' => '',
    				'prepend' => '',
    				'append' => '',
    				'formatting' => 'none',
    				'maxlength' => '',
    			),
    		),
    		'location' => array (
    			array (
    				array (
    					'param' => 'ef_user',
    					'operator' => '==',
    					'value' => 'all',
    					'order_no' => 0,
    					'group_no' => 0,
    				),
    			),
    		),
    		'options' => array (
    			'position' => 'side',
    			'layout' => 'default',
    			'hide_on_screen' => array (
    			),
    		),
    		'menu_order' => 0,
    	));
    }


  }

  function create_fetch_event() {
    // Uncomment lines bellow to reschedule task
    // $timestamp = wp_next_scheduled( 'pmc_create_fetch_event' );
    // if($timestamp) {
    //   wp_unschedule_event($timestamp, 'pmc_create_fetch_event');
    // }

    $timestamp = wp_next_scheduled( 'pmc_create_fetch_event' );
    if( $timestamp == false ) {
      error_log('scheduling');
      wp_schedule_event( time(), 'daily', 'pmc_create_fetch_event' );
    } else {
      error_log('already scheduled');
    }
  }

  public function update_statistics(){
    $maintainers = get_users( 'role=maintainer' );

    if ($maintainers) {

      foreach ($maintainers as $maintainer) {
        // Get instance URL
        $maintainer_id = $maintainer->ID;
        $instance_url = get_user_meta($maintainer_id, 'instance_url', true);

        if (filter_var($instance_url, FILTER_VALIDATE_URL) === FALSE) {
          error_log('Invalid or missing instance URL (User[ID]=' . $maintainer->ID .')');
        } else {
            error_log('Fetching statistics of user ' . $maintainer->ID .' ('. $instance_url .')');
          $this->update_instance($maintainer_id, $instance_url);
        }
      }
    } else {
      error_log('No maintainers found.');
    }
   }

   function get_element_count_series($instance_url, $element_type, $months_ago = 0, $series = array()) {

     // get date in the month being fetched
     $current_date = strtotime('-' . $months_ago       . ' month');

     // set timestamp to last day in the month, but not in the future
     if ($months_ago == 0) {
       $timestamp = date('Y-m-d', $current_date);
     } else {
       $timestamp = date('Y-m-t', $current_date);
     }

     // get element count for this month
     $result = $this->fetch_element_count($instance_url, $element_type, $timestamp);

     // if there was an error with fetch_element_count, return false
     if (!is_numeric($result)) {
       return false;
     }


     $series[$timestamp] = $result;

     // fetch next month if count is bigger than zero
     if ($result > 0) {

       $months_ago++;

       return $this->get_element_count_series($instance_url, $element_type, $months_ago, $series);

     // result is zero, finish series
     } else {
       return $series;
     }
   }

   function fetch_element_count($instance_url, $element_type, $date_limit) {
     // format API query
     $api_url = rtrim($instance_url, '/') . '/api/' . $element_type . '/find' ;

     // set date param
     $api_url = $api_url . '/?@limit=1&createTimestamp=LTE('.$date_limit.')';

     error_log('Fetching count of element \''.$element_type.'\' created before '.$date_limit.' from '. $instance_url );

     // make query
     $headers = get_headers($api_url, 1);

     // response is ok?
     if ( $headers != false && array_key_exists('API-Metadata', $headers) ) {

       // parse header metadata
       $metadata = json_decode($headers['API-Metadata'], 1) ;

       // response does have a count?
       if (array_key_exists('count', $metadata)) {
         return $metadata['count'];
       } else {
         return false;
       }

     } else return false;
   }

   function update_instance($maintainer_id, $instance_url){

      $element_types = array('event', 'agent', 'space', 'project');
      foreach ($element_types as $element_type) {

        // get count series for this element
        $result = $this->get_element_count_series($instance_url, $element_type);

        // do not update series meta if result is invalid
        if ($result != false) {
          update_user_meta($maintainer_id, $element_type . 's_count', $result);
        }
      }
   }
}

$pmc_get_statistics = new PMC_Platform_Statistics();
