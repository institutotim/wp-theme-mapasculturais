<?php

class PMC_Support_Config {

  function __construct() {
		if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array(
			'key' => 'group_5a96c36cd2e26',
			'title' => __('Support Configuration','pmc'),
			'fields' => array(
				array(
					'key' => 'field_5a96c36b44f95',
					'label' => 'Github',
					'name' => 'github_url',
					'type' => 'text',
					'instructions' => __('URL for Mapas Culturais repository at Github', 'pmc'),
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
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
				array(
					'key' => 'field_5a96c47e44f97',
					'label' => 'Rocket Chat',
					'name' => 'rocket_url',
					'type' => 'text',
					'instructions' => __('URL for Rocket Chat', 'pmc'),
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
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
				array(
					'key' => 'field_5a96c4e144f98',
					'label' => 'Delibera',
					'name' => 'delibera',
					'type' => 'text',
					'instructions' => __('initial page URL for Delibera', 'pmc'),
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
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
				array(
					'key' => 'field_5a96c51544f99',
					'label' => __('About', 'pmc'),
					'name' => 'know',
					'type' => 'text',
					'instructions' => __('URL for about page', 'pmc'),
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
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
				array(
					'key' => 'field_5a96db0db367d',
					'label' => __('Link Manual', 'pmc'),
					'name' => 'manual',
					'type' => 'text',
					'instructions' => __('URL for User Manual', 'pmc'),
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
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
			'location' => array(
				array(
					array(
						'param' => 'page',
						'operator' => '==',
						'value' => '20',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'acf_after_title',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => array(
				0 => 'the_content',
				1 => 'excerpt',
				2 => 'custom_fields',
				3 => 'discussion',
				4 => 'comments',
				5 => 'revisions',
				6 => 'slug',
				7 => 'author',
				8 => 'format',
				9 => 'page_attributes',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
			),
			'active' => 1,
			'description' => '',
		));

		endif;
  }
}

$pmc_support_config = new PMC_Support_Config();
