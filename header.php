<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header id="masthead">
    <div class="container">
      <div class="four columns">
          <h1>
            <a href="<?php echo home_url('/'); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Portal Mapas Culturais" />
              Portal Mapas Culturais
            </a>
          </h1>
      </div>
      <div class="eight columns">
        <div class="search-input u-pull-right">
          <label class="fa fa-search" for="search"></label>
          <input id="search" class="search" type="text" placeholder="Busque qualquer coisa">
        </div>
        <nav id="mastnav" class="u-pull-right">
          <ul>
            <li>
              <a href="page.html">Sobre a iniciativa</a>
              <ul>
                <li><a href="#">O que é</a></li>
                <li><a href="#">Histórico</a></li>
                <li><a href="#">Parceiros</a></li>
              </ul>
            </li>
            <li>
              <a href="blog.html">Sobre o sistema</a>
              <ul>
                <li><a href="#">Mapas como serviço</a></li>
                <li><a href="#">Suporte ao usuário</a></li>
              </ul>
            </li>
            <li>
              <a href="page.html">Notícias</a>
            </li>
            <li>
              <a href="page.html">Contato</a>
            </li>
          </u>
        </nav>
      </div>
    </div>
  </header>
