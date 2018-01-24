<?php
/*
 * Template name: Support
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
    <div class="container">
      <div class="twelve columns">
        <div class="page-header-content has-icon row">
          <div class="row">
            <div class="eight columns">
              <span class="page-icon">
                <span class="fa fa-wrench"></span>
              </span>
              <h2>
                <?php the_title(); ?>
              </h2>
              <div class="page-header-text connect-border connect-left">
                <p>Mapas Culturais foi criado pelo <a href="http://institutotim.org.br" rel="external" target="_blank">Instituto TIM</a> em parceria com a Secretaria de Cultura do Município de São Paulo, a primeira a adotar a plataforma, em 2014. Atualmente, a solução está em operação no Ministério da Cultura, em estados e municípios de todas as regiões do Brasil e até no exterior. Em 2015, Mapas Culturais passou a ser a plataforma oficial do Sistema Nacional de Informações e Indicadores Culturais (SNIIC), sendo o sistema oficial para mapeamento colaborativo e gestão da cultura do Ministério da Cultura.</p>
              </div>
            </div>
            <div class="four columns">
              <p class="buttons small-buttons u-pull-right">
                <a class="button">
                  <span class="fa fa-bookmark-o"></span>
                  Tutoriais
                </a>
                <a class="button">
                  <span class="fa fa-comments-o"></span>
                  Rocket Chat
                </a>
                <a class="button">
                  <span class="fa fa-book"></span>
                  Manual
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <section id="big-search">
    <div class="container">
      <div class="twelve columns">
        <div class="big-search-container">
          <label for="big_search_input">
            <span class="fa fa-search"></span>
            <input id="big_search_input" type="text" placeholder="Busque por informações de suporte..." />
          </label>
        </div>
      </div>
    </div>
  </section>
  <section id="content">
    <div class="container">
      <div class="eight columns">
        <h3>Manual</h3>
        <p>Acesse abaixo os Manuais de Uso do sistema</p>
      </div>
    </div>
    <div class="container">
      <div class="seven columns">
        <p class="download-user-guide connect-border connect-left">
          <a class="button">
            <span class="fa fa-download"></span>
            Baixar o manual
          </a>
        </p>
      </div>
      <div class="four columns offset-by-one">
        <section id="support-chat">
          <h3>Participe do chat</h3>
          <p>Se tiver dúvidas durante o processo de instalação de Mapas Culturais, entre em contato com a equipe do projeto no chat de Suporte Técnico.</p>
          <p><a class="button button-primary block">
            <span class="fa fa-comments-o"></span>
            Entrar
          </a></p>
        </section>
      </div>
    </div>
    <div class="container">
      <div class="twelve columns">
        <hr class="dark" />
      </div>
    </div>
    <section id="support-tutorials" class="content-section">
      <div class="container">
        <div class="eight columns">
          <div class="content-section-header-big">
            <h3>Tutoriais</h3>
          </div>
          <div class="tutorial-list">
            <article class="tutorial-item row">
              <div class="tutorial-meta">
                <a class="category">
                  <span class="fa fa-bookmark-o"></span>
                  Categoria #1
                </a>
                <p class="meta-item">
                  <span class="label">
                    <span class="fa fa-certificate"></span>
                    Complexidade
                  </span>
                  <span class="meta-val complex-item complex-item-2">Média</span>
                </p>
                <p class="meta-item target-group">
                  <span class="fa fa-gear"></span>
                  para gestores
                </p>
              </div>
              <div class="tutorial-content">
                <h3>Como fazer uma instalação local da plataforma</h3>
                <p>Conheça os passos para instalar a plataforma no seu computador.</p>
              </div>
            </article>
            <hr class="dark" />
            <article class="tutorial-item row">
              <div class="tutorial-meta">
                <a class="category">
                  <span class="fa fa-bookmark-o"></span>
                  Categoria #2
                </a>
                <p class="meta-item">
                  <span class="label">
                    <span class="fa fa-certificate"></span>
                    Complexidade
                  </span>
                  <span class="meta-val complex-item complex-item-2">Média</span>
                </p>
                <p class="meta-item target-group">
                  <span class="fa fa-gear"></span>
                  para gestores
                </p>
              </div>
              <div class="tutorial-content">
                <h3>Gerenciamento de usuários</h3>
                <p>In in velit in nibh ullamcorper lobortis nec eu ante. Curabitur vitae mauris ut quam elementum posuere vel ac quam.</p>
              </div>
            </article>
            <hr class="dark" />
            <article class="tutorial-item row">
              <div class="tutorial-meta">
                <a class="category">
                  <span class="fa fa-bookmark-o"></span>
                  Categoria #3
                </a>
                <p class="meta-item">
                  <span class="label">
                    <span class="fa fa-certificate"></span>
                    Complexidade
                  </span>
                  <span class="meta-val complex-item complex-item-2">Baixa</span>
                </p>
                <p class="meta-item target-group">
                  <span class="fa fa-user"></span>
                  para agentes culturais
                </p>
              </div>
              <div class="tutorial-content">
                <h3>Editando seu perfil</h3>
                <p>In in velit in nibh ullamcorper lobortis nec eu ante. Curabitur vitae mauris ut quam elementum posuere vel ac quam.</p>
              </div>
            </article>
          </div>
          <p>
            <a class="button block">Veja mais tutoriais</a>
          </p>
        </div>
        <div class="four columns">
          <div class="sidebar regular-sidebar connect-border connect-right">
            <?php dynamic_sidebar('tutorials-pmc') ?>
          </div>
        </div>
      </div>
    </section>
  <section>
</article>
<?php endwhile; endif; ?>
<?php get_template_part('parts/community-section'); ?>
<?php get_footer(); ?>
