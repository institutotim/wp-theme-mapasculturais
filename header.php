<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php
  $head_css = '';
  $head_image = get_header_image();
  if (is_front_page() && $head_image) {
      $head_css = 'style="background-image:url(' . $head_image . ')"';
  }
  ?>

  <header id="masthead">
      <div class="container">
          <div class="six columns">
              <h1><a href="<?php echo home_url('/'); ?>">Mapas Culturais</a></h1>
          </div>
          <div class="six columns">
            <input class="search u-pull-right" type="text" placeholder="Busque qualquer coisa">
            <nav class="u-pull-right" id="mastnav">
              <a href="page.html">Mapas Culturais</a>
              <a href="blog.html">Blog</a>
              <a href="page.html">Parceiros</a>
              <a href="support.html">Suporte</a>
              <a href="page.html">Contato</a>
            </nav>
          </div>
      </div>
  </header>
