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
            <article>
              <h3>Proin egestas ante sapien, et venenatis felis luctus a. In interdum facilisis augue quis tempor.</h3>
              <p> Mauris luctus lobortis diam, quis aliquet velit sollicitudin quis. Mauris mattis elit ac justo commodo pulvinar. Quisque porta libero massa, ultrices imperdiet nunc tempor ac. Quisque accumsan lectus ac orci interdum, id pretium nulla tempus. Vestibulum lorem velit, ultricies et faucibus et, lacinia non felis.</p>
            </article>
          </div>
          <div class="content-section-content">
            <article>
              <h3>Mauris mattis elit ac justo commodo pulvinar. Quisque porta libero massa.</h3>
              <p>Quisque accumsan lectus ac orci interdum, id pretium nulla tempus. Vestibulum lorem velit, ultricies et faucibus et, lacinia non felis.</p>
            </article>
            <hr class="dark" />
            <article>
              <h3>Vestibulum lorem velit, ultricies et faucibus et, lacinia non felis.</h3>
              <p>Mauris luctus lobortis diam, quis aliquet velit sollicitudin quis. Ultrices imperdiet nunc tempor ac. Quisque accumsan lectus ac orci interdum, id pretium nulla tempus.</p>
            </article>
            <hr class="dark" />
          </div>
        </section>
      </div>
      <div class="seven columns">
        <?php get_template_part('parts/network-blog'); ?>
      </div>
    </div>
  </div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
