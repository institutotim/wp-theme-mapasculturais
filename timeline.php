<?php
/*
 * Template name: Timeline
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
          <p>Mapas Culturais é uma plataforma colaborativa que reúne informações sobre agentes, espaços, eventos e projetos culturais, fornecendo ao poder público uma radiografia da área de cultura e ao cidadão um mapa de espaços e eventos culturais da região.</p>
        </div>
      </div>
    </div>
  </header>
  <section id="content">
    <div class="timeline">
      <hr class="top" />
      <div class="timeline-item row">
        <div class="post-box">
          <p class="date">2015</p>
          <div class="post-box-body">
            <h3>Item #1</h3>
            <p>Nunc pulvinar nisi sed pretium lobortis. Phasellus id aliquam turpis, ut placerat dolor. Sed consectetur, nisi vel tristique luctus, sem mauris posuere erat, vitae tristique enim urna eget turpis.</p>
          </div>
        </div>
      </div>
      <div class="timeline-item row">
        <div class="post-box">
          <p class="date">2015</p>
          <div class="post-box-body">
            <img src="http://lorempixel.com/600/400/?0" class="featured-image">
            <h3>Item #2</h3>
            <p>Nunc pulvinar nisi sed pretium lobortis. Phasellus id aliquam turpis, ut placerat dolor. Sed consectetur, nisi vel tristique luctus.</p>
          </div>
        </div>
      </div>
      <div class="timeline-item row">
        <div class="post-box">
          <p class="date">2015</p>
          <div class="post-box-body">
            <h3>Item #3</h3>
            <p>Nunc pulvinar nisi sed pretium lobortis.</p>
          </div>
        </div>
      </div>
      <div class="timeline-item row">
        <div class="post-box">
          <p class="date">2015</p>
          <div class="post-box-body">
            <h3>Item #4</h3>
            <p><img class="u-pull-right" src="http://lorempixel.com/100/100/">Nunc pulvinar nisi sed pretium lobortis. Phasellus id aliquam turpis, ut placerat dolor. Sed consectetur, nisi vel tristique luctus, sem mauris posuere erat, vitae tristique enim urna eget turpis.</p>
          </div>
        </div>
      </div>
      <div class="timeline-item row">
        <div class="post-box">
          <p class="date">2015</p>
          <div class="post-box-body">
            <img src="http://lorempixel.com/600/400/?1" class="featured-image">
            <h3>Item #5</h3>
            <p>Nunc pulvinar nisi sed pretium lobortis. Phasellus id aliquam turpis, ut placerat dolor. Sed consectetur, nisi vel tristique luctus.</p>
          </div>
        </div>
      </div>
      <div class="timeline-item row">
        <div class="post-box">
          <p class="date">2015</p>
          <div class="post-box-body">
            <h3>Item #6</h3>
            <p>Nunc pulvinar nisi sed pretium lobortis.</p>
          </div>
        </div>
      </div>
    </div>
  <section>
</article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
