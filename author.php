<?php get_header(); ?>
<?php if(have_posts()) : ?>
<article>
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <hr/>
      </div>
    </div>
    <div class="container">
      <div class="twelve columns">
        <div class="page-header-content has-icon row">
          <div class="row">
            <div class="seven columns">
              <span class="page-icon">
                <span class="pmc-icon-marker"></span>
              </span>
              <p class="over-title subtitle">Secretaria Municipal de Cultura de São Paulo</p>
              <h2>SPCultura</h2>
              <div class="page-header-text connect-border connect-left">
                <p>Quisque tempus, massa in pulvinar aliquet, est tellus scelerisque lorem, vel lobortis felis elit at justo. Nullam id arcu sed purus scelerisque aliquam in et purus. Nam et consequat lacus. Proin egestas ante sapien, et venenatis felis luctus a. In interdum facilisis augue quis tempor.</p>
              </div>
            </div>
            <div class="five columns">
              <div class="author-numbers">
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
                <p><a class="button block"><span class="fa fa-star"></span>Acesse a plataforma</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <section id="content">
    <div class="container">
      <div class="eight columns">
        <?php get_template_part('parts/network-blog-2'); ?>
        <?php get_template_part('parts/pagination'); ?>
      </div>
      <div class="four columns">
        <div id="sidebar" class="sidebar regular-sidebar connect-border connect-right">
          <div class="widget">
            <div class="statistics">
              <h3>Estatísticas</h3>
              <p class="filter">
                <select>
                  <option>Agentes culturais</option>
                  <option>Eventos</option>
                  <option>Epaços</option>
                  <option>Projetos</option>
                </select>
                nos últimos 30 dias
              </p>
              <div class="gh-chart chart"></div>
              <p class="result">123 agentes culturais cadastrados nos últimos 30 dias</p>
            </div>
          </div>
          <div class="widget">
            <div class="team">
              <h3>Equipe</h3>
              <ul>
                <li class="row">
                  <img src="http://lorempixel.com/100/100/" class="li-img" />
                  <h4>Lorem Ipsum</h4>
                  <p>Direção geral</p>
                </li>
                <li class="row">
                  <img src="http://lorempixel.com/100/100/" class="li-img" />
                  <h4>Dolor Sit</h4>
                  <p>Desenvolvimento</p>
                </li>
              </ul>
            </div>
          </div>
          <div class="widget">
            <h3>Contato</h3>
            <ul>
              <li>
                <a href="#">
                  <span class="fa fa-envelope"></span>
                  cultura@sp.gov.br
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="fa fa-telegram"></span>
                  @spcultura
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="fa fa-whatsapp"></span>
                  @spcultura
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="fa fa-github"></span>
                  secult
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  <section>
</article>
<?php endif; ?>
<?php get_footer(); ?>
