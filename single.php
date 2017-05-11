<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<article id="page-<?php the_ID(); ?>">
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <hr/>
      </div>
    </div>
    <div class="container">
      <div class="eight columns">
        <div class="page-header-content no-text has-icon row">
          <span class="page-icon">
            <span class="fa fa-newspaper-o"></span>
          </span>
          <p class="over-title category">
            <a href="#" class="area">Notícias</a>
            <span class="fa fa-chevron-right"></span>
            <a href="#" class="cat">Categoria #2</a>
          </p>
          <h2><?php the_title(); ?></h2>
        </div>
      </div>
    </div>
  </header>
  <section id="content">
    <div class="container">
      <div class="twelve columns">
        <div id="meta">
          <p class="author">
            <img src="http://lorempixel.com/60/60/" />
            Raimundo Nonato
          </p>
          <p class="tags">
            <span class="fa fa-tags"></span>
            <a>interatividade</a>, <a>cinema</a>
          </p>
          <p class="date">
            <span class="fa fa-clock-o"></span>
            <?php the_date(); ?>
          </p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="eight columns">
        <?php the_content(); ?>
      </div>
      <div class="three columns offset-by-one">
        <div id="sidebar" class="sidebar regular-sidebar connect-border connect-right">
          <div class="widget text-widget">
            <h2>Exemplo de widget</h2>
            <div class="widget-content">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis euismod lectus a cursus dictum. Nulla at metus id elit volutpat ornare ut quis nisl. Sed pellentesque leo in massa ornare, eu tincidunt nibh cursus. Nulla vestibulum, enim in vulputate imperdiet, felis arcu dignissim ipsum, at laoreet urna lectus at metus. Phasellus vitae massa ac ligula placerat sagittis. Ut lobortis purus in neque vestibulum, quis tincidunt ipsum posuere. Etiam vel pellentesque justo. Aliquam semper id purus eu cursus.</p>
            </div>
          </div>
          <div class="widget">
            <h2>Categorias</h2>
            <ul>
              <li>
                <a href="#">
                  Categoria #1
                </a>
              </li>
              <li>
                <a href="#">
                  Categoria #2
                </a>
              </li>
              <li>
                <a href="#">
                  Categoria #3
                </a>
              </li>
              <li>
                <a href="#">
                  Categoria #4
                </a>
              </li>
              <li>
                <a href="#">
                  Categoria #4
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  <section>
</article>
<?php endwhile; endif; ?>
<?php get_template_part('parts/community-section'); ?>
<?php get_footer(); ?>
