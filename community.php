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
            <div class="community-numbers">
              <div class="intro-numbers">
                <p class="icon fa fa-code"></p>
                <p class="number do-count">4681</p>
                <p class="label">contribuições no código</p>
              </div>
              <div class="intro-numbers">
                <p class="icon fa fa-code-fork"></p>
                <p class="number do-count">29</p>
                <p class="label">desenvolvedores colaborando</p>
              </div>
              <div class="intro-numbers">
                <p class="icon fa fa-comments-o"></p>
                <p class="number do-count">161</p>
                <p class="label">questões em discussão no GitHub</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <section id="content">
    <div class="code-chart-container">
      <div class="gh-chart">
      </div>
      <h3>Atividade recente do repositório</h3>
    </div>
    <div class="container">
      <div class="four columns">
        <h2>Delibera</h2>
        <p>In at est ac magna suscipit fermentum. Sed efficitur nisl a tristique malesuada. Etiam tempor lorem vel sapien congue volutpat. Nulla luctus felis ut diam congue, nec dignissim quam placerat.</p>
        <div class="featured-categories">
          <ul>
            <li>
              <a href="#">Categoria #1</a>
            </li>
            <li>
              <a href="#">Categoria #2</a>
            </li>
            <li>
              <a href="#">Categoria #3</a>
            </li>
            <li>
              <a href="#">Categoria #4</a>
            </li>
            <li>
              <a href="#">Categoria #5</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="four columns">
        <section class="content-section">
          <header class="content-section-header align">
            <h3>Pautas em discussão</h3>
          </header>
          <article class="delibera-issue">
            <h4>Etiam tempor lorem vel sapien congue volutpat. Nulla luctus felis ut diam congue, nec dignissim quam placerat.</h4>
            <button>Votar</button>
          </article>
          <hr class="dark" />
          <article class="delibera-issue">
            <h4>Etiam tempor lorem vel sapien congue volutpat. Nulla luctus felis ut diam congue, nec dignissim quam placerat.</h4>
            <button>Votar</button>
          </article>
          <hr class="dark" />
          <article class="delibera-issue">
            <h4>Etiam tempor lorem vel sapien congue volutpat. Nulla luctus felis ut diam congue, nec dignissim quam placerat.</h4>
            <button>Votar</button>
          </article>
          <hr class="dark" />
        </section>
      </div>
      <div class="four columns">
        <section class="content-section">
          <header class="content-section-header align">
            <h3>Propostas de pauta</h3>
          </header>
          <article class="delibera-issue">
            <h4>Etiam tempor lorem vel sapien congue volutpat. Nulla luctus felis ut diam congue, nec dignissim quam placerat.</h4>
            <div class="issue-meta">
              <span class="pending-meta">
                <span class="up">
                  <span class="fa fa-thumbs-up"></span>
                  0
                </span>
                <span class="down">
                  <span class="fa fa-thumbs-down"></span>
                  0
                </span>
              </span>
            </div>
            <button>Gostaria de ver essa pauta em discussão</button>
          </article>
          <hr class="dark" />
          <article class="delibera-issue">
            <h4>Etiam tempor lorem vel sapien congue volutpat. Nulla luctus felis ut diam congue, nec dignissim quam placerat.</h4>
            <button>Gostaria de ver essa pauta em discussão</button>
          </article>
          <hr class="dark" />
          <article class="delibera-issue">
            <h4>Etiam tempor lorem vel sapien congue volutpat. Nulla luctus felis ut diam congue, nec dignissim quam placerat.</h4>
            <button>Gostaria de ver essa pauta em discussão</button>
          </article>
          <hr class="dark" />
        </section>
      </div>
    </div>
  <section>
</article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
