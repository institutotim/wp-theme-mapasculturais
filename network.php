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
    <div class="page-header-content has-icon">
      <div class="container">
        <div class="twelve columns">
          <span class="page-icon">
            <span class="fa fa-map"></span>
          </span>
          <h2>
            <?php the_title(); ?>
          </h2>
        </div>
      </div>
      <div class="sub-header">
        <div class="container">
          <div class="six columns">
            <div class="connect-border connect-left connect-no-padding">
              <div id="map"></div>
            </div>
          </div>
          <div class="six columns">
            <div class="page-header-text connect-border connect-right">
              <p>Mapas Culturais foi criado pelo Instituto TIM em parceria com a Secretaria de Cultura do Município de São Paulo, a primeira a adotar a plataforma, em 2014. Atualmente, a solução está em operação no Ministério da Cultura, em estados e municípios de todas as regiões do Brasil e até no exterior.</p>
            </div>
            <div class="network-numbers connect-border connect-right">
              <hr />
              <p class="numbers-intro">Consulte o mapa e a lista abaixo para conhecer as instalações da ferramenta Mapas Culturais.</p>
              <div class="row">
                <div class="six columns">
                  <div class="intro-numbers">
                    <p class="icon pmc-icon-person"></p>
                    <p class="number do-count">123456</p>
                    <p class="label">agentes</p>
                  </div>
                </div>
                <div class="six columns">
                  <div class="intro-numbers">
                    <p class="icon pmc-icon-calendar"></p>
                    <p class="number do-count">123456</p>
                    <p class="label">eventos</p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="six columns">
                  <div class="intro-numbers">
                    <p class="icon pmc-icon-door"></p>
                    <p class="number do-count">123456</p>
                    <p class="label">espaços</p>
                  </div>
                </div>
                <div class="six columns">
                  <div class="intro-numbers">
                    <p class="icon pmc-icon-paper"></p>
                    <p class="number do-count">123456</p>
                    <p class="label">projetos</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <section id="content">
    <div class="container">
      <div class="six columns">
      <?php get_template_part('parts/network-blog'); ?>
      </div>
      <div class="six columns">
        <div class="profiles content-section connect-border connect-right">
          <header class="content-section-header">
            <h2>Conheça as iniciativas</h2>
          </header>
          <?php for($i = 0; $i < 10; $i++) : ?>
            <article class="profile row">
              <div class="author network-author">
                <div class="author-thumb">
                  <img src="http://lorempixel.com/100/100/?1" />
                </div>
              </div>
              <p class="profile-label">Secretaria de Cultura de São Paulo</p>
              <h3><a href="#">SPCultura</a></h3>
              <p class="profile-data">
                <span class="profile-data-item">
                  <span class="pmc-icon-person icon"></span>
                  321
                </span>
                <span class="profile-data-item">
                  <span class="pmc-icon-paper icon"></span>
                  321
                </span>
                <span class="profile-data-item">
                  <span class="pmc-icon-door icon"></span>
                  321
                </span>
                <span class="profile-data-item">
                  <span class="pmc-icon-calendar icon"></span>
                  321
                </span>
              </p>
            </article>
          <?php endfor; ?>
        </div>
      </div>
    </div>
  <section>
</article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
