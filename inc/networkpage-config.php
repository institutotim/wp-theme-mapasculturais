<?php

class PMC_Networkpage_Config {

  function __construct() {
      if( function_exists('acf_add_local_field_group') ):

      acf_add_local_field_group(array(
            'key' => 'group_5ac160e349313',
            'title' => __('Network Map'),
            'fields' => array(
                  array(
                        'key' => 'field_5ac160f308f41',
                        'label' => __('Main Text'),
                        'name' => 'main_text',
                        'type' => 'textarea',
                        'instructions' => __('The main text of the network map page.'),
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                              'width' => '',
                              'class' => '',
                              'id' => '',
                        ),
                        'default_value' => '<p>Mapas Culturais foi criado pelo <a href="http://institutotim.org.br" rel="external" target="_blank">Instituto TIM</a> em parceria com a Secretaria de Cultura do Município de São Paulo, a primeira a adotar a plataforma, em 2014. Atualmente, a solução está em operação no Ministério da Cultura, em estados e municípios de todas as regiões do Brasil e até no exterior. Em 2015, Mapas Culturais passou a ser a plataforma oficial do Sistema Nacional de Informações e Indicadores Culturais (SNIIC), sendo o sistema oficial para mapeamento colaborativo e gestão da cultura do Ministério da Cultura.</p>',
                        'placeholder' => __('Add you main text for network map page'),
                        'maxlength' => '',
                        'rows' => '',
                        'new_lines' => '',
                  ),
                  array(
                        'key' => 'field_5ac1616108f42',
                        'label' => '',
                        'name' => '',
                        'type' => 'text',
                        'instructions' => '',
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
            ),
            'location' => array(
                  array(
                        array(
                              'param' => 'page_template',
                              'operator' => '==',
                              'value' => 'network.php',
                        ),
                  ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => array(
                  0 => 'the_content',
                  1 => 'excerpt',
            ),
            'active' => 1,
            'description' => '',
      ));

      endif;
  }
}

$pmc_networkpage_config = new PMC_Networkpage_Config();
