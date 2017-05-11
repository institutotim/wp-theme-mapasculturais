<?php

class PMC_Platform_Statistics {

  function __construct() {

    add_action('init', array($this, 'create_get_event'));
    add_action('pmc_create_get_event', array($this, 'update_statistics'));

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

  function create_get_event() {
    // Uncomment lines bellow to reschedule task
    // $timestamp = wp_next_scheduled( 'pmc_create_get_event' );
    // if($timestamp) {
    //   wp_unschedule_event($timestamp, 'pmc_create_get_event');
    // }

    $timestamp = wp_next_scheduled( 'pmc_create_get_event' );
    if( $timestamp == false ) {
      error_log('scheduling');
      wp_schedule_event( time(), 'daily', 'pmc_create_get_event' );
    } else {
      error_log('already scheduled');
    }
  }

  function get_maintainers() {
    $result = array();

    $all_maintainers = get_users( 'role=maintainer' );

    if ($all_maintainers) {

      foreach ($all_maintainers as $maintainer) {

        // Get maintainer's instance URL
        $maintainer_id = $maintainer->ID;
        $instance_url = get_user_meta($maintainer_id, 'instance_url', true);

        // Check if URL is valid
        if (filter_var($instance_url, FILTER_VALIDATE_URL) === FALSE) {
          error_log('Maintainer ' . $maintainer->ID . ': no URL.');
        } else {
          // push maintainer to result
          $result[] = $maintainer;
          error_log('Maintainer ' . $maintainer->ID . ': ' . $instance_url);
        }
      }
    } else {
      error_log('No maintainers found.');
    }

    return $result;
  }

  public function update_statistics(){

    $maintainers = $this->get_maintainers();

    $element_types = array('event', 'agent', 'space', 'project');

    foreach ($element_types as $element_type) {

      // clear count for this $element_type
      $global_count_series = array();

      // for each maintainer
      foreach ($maintainers as $maintainer) {

        // get its count series
        $count_series = $this->get_element_count_series($maintainer->instance_url, $element_type);

        // if result is valid
        if ($count_series != false) {

          // update instance count series
          update_user_meta($maintainer_id, $element_type . 's_count', $count_series);

          // update global count
          foreach ($count_series as $date => $value) {

            if (!isset($global_count_series[$date])) {
              $global_count_series[$date] = 0;
            }

            $global_count_series[$date] = $value + $global_count_series[$date];
          }
          update_option($element_type . 's_count', $global_count_series);
        }
      }
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
     $result = $this->get_element_count($instance_url, $element_type, $timestamp);

     // if there was an error with get_element_count, return false
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

   function get_element_count($instance_url, $element_type, $date_limit) {
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


}

$pmc_get_statistics = new PMC_Platform_Statistics();
