<?php

function pmc_setup_theme() {

  load_theme_textdomain('pmc', get_template_directory() . '/languages');

}
add_action('after_setup_theme', 'pmc_setup_theme');

function pmc_header_scripts() {

  wp_register_style('webfonts', 'https://fonts.googleapis.com/css?family=Codystar|Ubuntu:300,400,400i,500,700');
  wp_register_style('normalize', get_template_directory_uri() . '/assets/skeleton/css/normalize.css');
  wp_register_style('skeleton', get_template_directory_uri() . '/assets/skeleton/css/skeleton.css');
  wp_register_style('fontawesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css');
  wp_register_style('main', get_template_directory_uri() . '/css/main.css', array('webfonts', 'normalize', 'skeleton', 'fontawesome'), '0.0.10');
  wp_register_style('responsive', get_template_directory_uri() . '/css/responsive.css', array('main'), '0.0.2');

  wp_enqueue_style('main');
  wp_enqueue_style('responsive');

}
add_action('wp_enqueue_scripts', 'pmc_header_scripts');
