<?php
/*
 * Template name: Community
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
        <div class="row">
          <div class="eight columns">
            <h2><?php the_title(); ?></h2>
          </div>
        </div>
        <div class="row">
          <div class="five columns">
            <div class="page-header-text connect-border connect-left">
              <ul class="feature-list">
                <li>Qualquer município ou estado pode instalar a plataforma</li>
                <li>Mapas Culturais é resultado do trabalho colaborativo de diversos parceiros</li>
                <li>Participe da rede de desenvolvedores que trabalha para aprimorar a solução</li>
              </ul>
            </div>
          </div>
          <div class="seven columns">

          </div>
        </div>
      </div>
    </div>
  </header>
  <section id="content">
    <div class="container">
      <div class="six columns">
        <?php the_content(); ?>
      </div>
    </div>
  <section>
</article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
