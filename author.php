<?php get_header(); ?>
<?php if(have_posts()) : ?>
<article>
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <hr/>
      </div>
    </div>
    <div class="page-header-content">
      <div class="container">
        <div class="eight columns">
          <p class="subtitle">Secretaria Municipal de Cultura de São Paulo</p>
          <h2>SPCultura</h2>
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
<?php endif; ?>
<?php get_footer(); ?>
