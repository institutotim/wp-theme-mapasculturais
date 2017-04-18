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
              <a href="page.html">Mapas Culturais</a>
              <ul>
                <li><a href="#">Test submenu</a></li>
                <li><a href="#">Lorem ipsum</a></li>
                <li><a href="#">Dolor sit</a></li>
              </ul>
            </li>
            <li>
              <a href="blog.html">Blog</a>
            </li>
            <li>
              <a href="page.html">Parceiros</a>
              <ul>
                <li><a href="#">Test submenu</a></li>
                <li><a href="#">Lorem ipsum</a></li>
                <li><a href="#">Dolor sit</a></li>
              </ul>
            </li>
            <li>
              <a href="support.html">Suporte</a>
            </li>
            <li>
              <a href="page.html">Contato</a>
            </li>
          </u>
        </nav>
      </div>
    </div>
  </header>
  <?php if(is_home() || is_front_page()) : ?>
    <section id="hero" class="page-header full-height">
      <a class="scroll-down" href="#">
        <span class="fa fa-chevron-down"></span>
      </a>
      <div class="canvas"></div>
      <div class="container">
        <div class="twelve columns">
          <hr/>
        </div>
      </div>
      <div class="page-header-content">
        <div class="container">
          <div class="seven columns">
            <div class="intro-text">
              <p class="big">Software livre para gestão cultural e mapeamento colaborativo.</p>
              <p class="connect-border connect-left buttons">
                <a class="button" href="support.html">
                  <span class="fa fa-support"></span>
                  Suporte
                </a>
                <a class="button button-primary" href="page.html">
                  <span class="fa fa-star"></span>
                  Saiba mais
                </a>
              </p>
            </div>
          </div>
          <div class="five columns">
            <div class="network full-height connect-border connect-right">
              <div class="intro-numbers row">
                <p class="number do-count">30</p>
                <p class="number-label">plataformas <span>na rede</span></p>
              </div>
              <a href="#">Conheça as instalações</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
