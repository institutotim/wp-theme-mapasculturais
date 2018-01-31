<?php

class PMC_Platform_Statistics {

  function __construct() {

    add_action('init', array($this, 'create_get_event'));
    add_action('pmc_create_get_event', array($this, 'update_statistics'));

    if( function_exists('acf_add_local_field_group') ):

      acf_add_local_field_group(array (
      	'key' => 'group_59359b3543d28',
      	'title' => __('Instance details', 'pmc'),
      	'fields' => array (
      		array (
      			'key' => 'field_5935a251ce25c',
      			'label' => __('Instance URL', 'pmc'),
      			'name' => 'instance_url',
      			'type' => 'url',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      		),
      		array (
      			'key' => 'field_5935a5e0948b5',
      			'label' => __('Public E-mail', 'pmc'),
      			'name' => 'public_email',
      			'type' => 'text',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      			'prepend' => '',
      			'append' => '',
      			'maxlength' => '',
      		),
      		array (
      			'key' => 'field_59359b4ecc202',
      			'label' => __('Team Members', 'pmc'),
      			'name' => 'team_members',
      			'type' => 'repeater',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'collapsed' => 'field_59359e11cc206',
      			'min' => 0,
      			'max' => 0,
      			'layout' => 'table',
      			'button_label' => '',
      			'sub_fields' => array (
      				array (
      					'key' => 'field_59359e11cc206',
      					'label' => __('Name', 'pmc'),
      					'name' => 'name',
      					'type' => 'text',
      					'instructions' => '',
      					'required' => 1,
      					'conditional_logic' => 0,
      					'wrapper' => array (
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'default_value' => '',
      					'placeholder' => '',
      					'prepend' => '',
      					'append' => '',
      					'maxlength' => '',
      				),
      				array (
      					'key' => 'field_59359e3dcc207',
      					'label' => __('Position', 'pmc'),
      					'name' => 'position',
      					'type' => 'text',
      					'instructions' => '',
      					'required' => 0,
      					'conditional_logic' => 0,
      					'wrapper' => array (
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'default_value' => '',
      					'placeholder' => '',
      					'prepend' => '',
      					'append' => '',
      					'maxlength' => '',
      				),
      				array (
      					'key' => 'field_59359e7dcc208',
      					'label' => __('E-mail', 'pmc'),
      					'name' => 'email',
      					'type' => 'email',
      					'instructions' => '',
      					'required' => 0,
      					'conditional_logic' => 0,
      					'wrapper' => array (
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'default_value' => '',
      					'placeholder' => '',
      					'prepend' => '',
      					'append' => '',
      				),
      			),
      		),
      		array (
      			'key' => 'field_59359b97cc204',
      			'label' => __('Facebook', 'pmc'),
      			'name' => 'facebook',
      			'type' => 'text',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      			'prepend' => '',
      			'append' => '',
      			'maxlength' => '',
      		),
      		array (
      			'key' => 'field_59359b81cc203',
      			'label' => __('Twitter', 'pmc'),
      			'name' => 'twitter',
      			'type' => 'text',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      			'prepend' => '',
      			'append' => '',
      			'maxlength' => '',
      		),
      		array (
      			'key' => 'field_59359c0dcc205',
      			'label' => __('Github', 'pmc'),
      			'name' => 'github',
      			'type' => 'text',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      			'prepend' => '',
      			'append' => '',
      			'maxlength' => '',
      		),
      		array (
      			'key' => 'field_59359f61cc209',
      			'label' => __('Telegram', 'pmc'),
      			'name' => 'telegram',
      			'type' => 'text',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => __('ID or phone number', 'pmc'),
      			'prepend' => '',
      			'append' => '',
      			'maxlength' => '',
      		),
      		array (
      			'key' => 'field_59359f75cc20a',
      			'label' => __('WhatsApp', 'pmc'),
      			'name' => 'whatsapp',
      			'type' => 'text',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => __('ID or phone number', 'pmc'),
      			'prepend' => '',
      			'append' => '',
      			'maxlength' => '',
      		),
          array (  
          'key' => 'field_position',
          'label' => __('Position on the map', 'pmc'),
          'name' => 'position',
          'type' => 'google_map',
          'required' => 1,
          'center_lat' => -14.235004,
          'center_lng' => -51.92528,
          'zoom' => 4,
          'height' => 400
        ),
      	),
      	'location' => array (
      		array (
      			array (
      				'param' => 'user_role',
      				'operator' => '==',
      				'value' => 'instance',
      			),
      		),
      	),
      	'menu_order' => 0,
      	'position' => 'normal',
      	'style' => 'default',
      	'label_placement' => 'top',
      	'instruction_placement' => 'label',
      	'active' => 1,
      	'description' => '',
      ));

    endif;

  }

  function create_get_event() {
    // Uncomment lines bellow to reschedule task
    $timestamp = wp_next_scheduled( 'pmc_create_get_event' );
    if ($timestamp) {
      wp_unschedule_event($timestamp, 'pmc_create_get_event');
    }

    $timestamp = wp_next_scheduled( 'pmc_create_get_event' );
    if( $timestamp == false ) {
      error_log('scheduling');
      wp_schedule_event( time(), 'daily', 'pmc_create_get_event' );
    } else {
      error_log('already scheduled');
    }
  }

  function get_instances() {
    $result = array();

    $all_instances = get_users( 'role=instance' );

    if ($all_instances) {

      foreach ($all_instances as $instance) {

        // Get instance's instance URL
        $instance_id = $instance->ID;
        $instance_url = get_user_meta($instance_id, 'instance_url', true);

        // Check if URL is valid
        if (filter_var($instance_url, FILTER_VALIDATE_URL) === FALSE) {
          error_log('Maintainer ' . $instance->ID . ': no URL.');
        } else {
          // push instance to result
          $result[] = $instance;
          error_log('Maintainer ' . $instance->ID . ': ' . $instance_url);
        }
      }
    } else {
      error_log('No instances found.');
    }

    return $result;
  }

  public function update_statistics(){

    $instances = $this->get_instances();

    $element_types = array('event', 'agent', 'space', 'project');
    // $element_types = array('event');

    foreach ($element_types as $element_type) {

      // clear count for this $element_type
      $global_count_series = array();

      // for each maintainer
      foreach ($instances as $instance) {

        // get its count series
        $count_series = $this->get_element_count_series($instance->instance_url, $element_type);

        // if result is valid
        if ($count_series != false) {

          // update instance count series
          update_user_meta($instance->ID, $element_type . 's_count', $count_series);

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
