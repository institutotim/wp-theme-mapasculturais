<?php
/*
 * Template name: Network
 */
?>
<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<article id="page-<?php the_ID(); ?>">
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <hr/>
      </div>
    </div>
    <div class="page-header-content">
      <div class="container">
        <div class="eight columns">
          <h2><?php the_title(); ?></h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis mi et malesuada aliquet. Donec dictum lorem sit amet nunc dictum iaculis. Etiam commodo malesuada libero id feugiat. Nam nisi eros, feugiat vel diam vel, semper convallis justo. Integer lacinia placerat elit in egestas. Nam sed enim dictum, ornare sem at, tempus justo.</p>
        </div>
      </div>
    </div>
  </header>
  <section id="content">
    <div class="container">
      <div class="seven columns">
        <div class="connect-border connect-left connect-no-padding">
          <div id="map"></div>
        </div>
      </div>
      <div class="five columns">
        <div class="network-numbers">
          <div class="row">
            <div class="six columns">
              <div class="intro-numbers">
                <p class="number do-count">123456</p>
                <p class="label">agentes</p>
              </div>
            </div>
            <div class="six columns">
              <div class="intro-numbers">
                <p class="number do-count">123456</p>
                <p class="label">eventos</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="six columns">
              <div class="intro-numbers">
                <p class="number do-count">123456</p>
                <p class="label">espaços</p>
              </div>
            </div>
            <div class="six columns">
              <div class="intro-numbers">
                <p class="number do-count">123456</p>
                <p class="label">projetos</p>
              </div>
            </div>
          </div>
        </div>
        <div class="profiles content-section">
          <article class="profile row">
            <div class="author network-author">
              <div class="author-thumb">
                <img src="http://lorempixel.com/100/100/?1" />
              </div>
              <h4>SPCultura</h4>
            </div>
            <h3><a href="#">Secretaria de Cultura de São Paulo</a></h3>
            <p>
              <strong>321</strong> agentes,
              <strong>123</strong> eventos,
              <strong>123</strong> espaços,
              <strong>123</strong> projetos
            </p>
          </article>
          <article class="profile row">
            <div class="author network-author">
              <div class="author-thumb">
                <img src="http://lorempixel.com/100/100/?1" />
              </div>
              <h4>SPCultura</h4>
            </div>
            <h3><a href="#">Secretaria de Cultura de São Paulo</a></h3>
            <p>
              <strong>321</strong> agentes,
              <strong>123</strong> eventos,
              <strong>123</strong> espaços,
              <strong>123</strong> projetos
            </p>
          </article>
          <article class="profile row">
            <div class="author network-author">
              <div class="author-thumb">
                <img src="http://lorempixel.com/100/100/?1" />
              </div>
              <h4>SPCultura</h4>
            </div>
            <h3><a href="#">Secretaria de Cultura de São Paulo</a></h3>
            <p>
              <strong>321</strong> agentes,
              <strong>123</strong> eventos,
              <strong>123</strong> espaços,
              <strong>123</strong> projetos
            </p>
          </article>
          <article class="profile row">
            <div class="author network-author">
              <div class="author-thumb">
                <img src="http://lorempixel.com/100/100/?1" />
              </div>
              <h4>SPCultura</h4>
            </div>
            <h3><a href="#">Secretaria de Cultura de São Paulo</a></h3>
            <p>
              <strong>321</strong> agentes,
              <strong>123</strong> eventos,
              <strong>123</strong> espaços,
              <strong>123</strong> projetos
            </p>
          </article>
        </div>
      </div>
    </div>
  <section>
</article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
