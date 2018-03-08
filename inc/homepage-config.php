<?php

class PMC_Homepage_Config {

  function __construct() {

    if( function_exists('acf_add_local_field_group') ):

      acf_add_local_field_group(array (
      	'key' => 'group_5936ea5e6fb56',
      	'title' => __('Homepage configuration', 'pmc'),
      	'fields' => array (
      		array (
      			'key' => 'field_5936ea88f8eee',
      			'label' => __('Introduction text', 'pmc'),
      			'name' => 'introduction_text',
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
      			'key' => 'field_5936eaaff8eef',
      			'label' => __('"Support" button target', 'pmc'),
      			'name' => 'support_button_target',
      			'type' => 'page_link',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'post_type' => array (
      			),
      			'taxonomy' => array (
      			),
      			'allow_null' => 0,
      			'allow_archives' => 1,
      			'multiple' => 0,
      		),
      		array (
      			'key' => 'field_5936eb07f8ef0',
      			'label' => __('"Learn More" button target', 'pmc'),
      			'name' => 'learn_more_button_target',
      			'type' => 'page_link',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'post_type' => array (
      			),
      			'taxonomy' => array (
      			),
      			'allow_null' => 0,
      			'allow_archives' => 1,
      			'multiple' => 0,
      		),
      		array (
      			'key' => 'field_5936ec3df8ef1',
      			'label' => __('Project description', 'pmc'),
      			'name' => 'project_description',
      			'type' => 'textarea',
      			'instructions' => __('Please enter one paragraph describing the project, considering that the first phrase will be highlighted.', 'pmc'),
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
      	),
      	'location' => array (
      		array (
      			array (
      				'param' => 'page_template',
      				'operator' => '==',
      				'value' => 'homepage.php',
      			),
      		),
      	),
      	'menu_order' => 0,
      	'position' => 'normal',
      	'style' => 'default',
      	'label_placement' => 'top',
      	'instruction_placement' => 'label',
      	'hide_on_screen' => array (
      		0 => 'the_content',
          1 => 'featured_image',
      	),
      	'active' => 1,
      	'description' => '',
      ));

    endif;
  }
}

$pmc_homepage_config = new PMC_Homepage_Config();
