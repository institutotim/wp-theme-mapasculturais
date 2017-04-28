<?php get_header(); ?>
<section id="archive">
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <hr/>
      </div>
    </div>
    <div class="page-header-content no-text">
      <div class="container">
        <div class="twelve columns">
          <h2>Notícias</h2>
        </div>
      </div>
    </div>
  </header>
  <section id="content">
    <div class="container">
      <div class="eight columns">
        <?php get_template_part('parts/blog'); ?>
        <?php get_template_part('parts/pagination'); ?>
      </div>
      <div class="four columns">
        <div id="sidebar" class="sidebar regular-sidebar connect-border connect-right">
          <div class="widget text-widget">
            <h2>Exemplo de widget de texto</h2>
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
</section>
<?php get_template_part('parts/community-section'); ?>
<?php get_footer(); ?>
