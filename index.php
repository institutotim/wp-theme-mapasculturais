<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<section id="content">
  <div class="main-text">
    <div class="container">
      <div class="eight columns">
        <p><strong>Mapas Culturais é uma ferramenta que articula agentes culturais, instituições governamentais e a sociedade de forma colaborativa.</strong> Promove o acesso e a visibilidade para o público, o governo e o mercado. O setor público ganha uma compreensão do território e de sua cultura, os agentes divulgam suas programações e a população pode entender seu espaço e se envolver em atividades culturais na vizinhança.</p>
        <hr class="dark"/>
      </div>
    </div>
    <div id="mc_svg" class="svg">
      <?php include(TEMPLATEPATH . '/img/mc.svg'); ?>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="five columns">
        <section class="content-section">
          <div class="content-section-content first-content connect-border connect-left">
            <header class="content-section-header">
              <h2>Notícias</h2>
            </header>
            <article class="post">
              <div class="post-thumbnail" style="background-image:url(http://lorempixel.com/700/700/);"></div>
              <h3>Proin egestas ante sapien, et venenatis felis luctus a. In interdum facilisis augue quis tempor.</h3>
              <div class="meta">
                <p class="author">
                  <img src="http://lorempixel.com/30/30/" />
                  Raimundo Nonato
                </p>
                <p class="date">
                  <span class="fa fa-clock-o"></span>
                  10 de abril de 2017
                </p>
              </div>
            </article>
          </div>
          <div class="content-section-content">
            <article class="post">
              <h3>Mauris mattis elit ac justo commodo pulvinar. Quisque porta libero massa. In interdum facilisis.</h3>
              <div class="meta">
                <p class="author">
                  <img src="http://lorempixel.com/30/30/" />
                  Raimundo Nonato
                </p>
                <p class="date">
                  <span class="fa fa-clock-o"></span>
                  10 de abril de 2017
                </p>
              </div>
            </article>
          </div>
          <p><a class="button block">Veja mais notícias</a></p>
        </section>
      </div>
      <div class="six columns offset-by-one">
        <?php get_template_part('parts/network-blog'); ?>
      </div>
    </div>
  </div>
</section>
<?php endwhile; endif; ?>
<?php get_template_part('parts/community-section'); ?>
<?php get_footer(); ?>
