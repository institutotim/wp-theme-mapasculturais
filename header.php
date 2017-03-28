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
        <div class="six columns">
            <h1><a href="<?php echo home_url('/'); ?>">Mapas Culturais</a></h1>
        </div>
        <div class="six columns">
          <input class="search u-pull-right" type="text" placeholder="Busque qualquer coisa">
          <nav id="mastnav" class="u-pull-right">
            <a href="page.html">Mapas Culturais</a>
            <a href="blog.html">Blog</a>
            <a href="page.html">Parceiros</a>
            <a href="support.html">Suporte</a>
            <a href="page.html">Contato</a>
          </nav>
        </div>
    </div>
    <section id="hero">
      <div class="container">
        <div class="seven columns">
          <div class="intro-text">
            <p class="big">Software livre para gestão cultural e mapeamento colaborativo.</p>
            <p><a class="button" href="support.html">Suporte</a><a class="button button-primary" href="page.html">Saiba mais</a></p>
          </div>
        </div>
        <div class="five columns">
          <div class="network">
            <div class="intro-numbers row">
              <p class="number">30</p>
              <p class="number-label">plataformas <span>na rede</span></p>
            </div>
            <p><a class="button u-full-width" href="installations.html">Conheça as instalações</a></p>
            <div class="ptns">
              <div class="ptn ptn-1">
                <a href="#">Conheça as instalações</a>
              </div>
              <div class="ptn ptn-2"></div>
              <div class="ptn ptn-3"></div>
            </div>
          </div>
        </div>
    </section>
  </header>
