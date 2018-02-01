<?php
/*
 * Template name: Network
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
          <span class="page-icon">
            <span class="fa fa-map"></span>
          </span>
          <h2>
            <?php the_title(); ?>
          </h2>
          <div class="sub-header">
            <div class="row">
              <div class="five columns">
                <div class="connect-border connect-left connect-no-padding">
                  <div id="map"></div>
                </div>
              </div>
              <div class="seven columns">
                <div class="page-header-text connect-border connect-right">
                  <p>Mapas Culturais foi criado pelo <a href="http://institutotim.org.br" rel="external" target="_blank">Instituto TIM</a> em parceria com a Secretaria de Cultura do Município de São Paulo, a primeira a adotar a plataforma, em 2014. Atualmente, a solução está em operação no Ministério da Cultura, em estados e municípios de todas as regiões do Brasil e até no exterior. Em 2015, Mapas Culturais passou a ser a plataforma oficial do Sistema Nacional de Informações e Indicadores Culturais (SNIIC), sendo o sistema oficial para mapeamento colaborativo e gestão da cultura do Ministério da Cultura.</p>
                </div>
                <div class="network-numbers connect-border connect-right">
                  <hr />
                  <p class="numbers-intro">Consulte o mapa e a lista abaixo para conhecer as instalações da ferramenta Mapas Culturais.</p>
                  <div class="row">
                    <div class="six columns">
                      <div class="intro-numbers">
                        <p class="icon pmc-icon-person"></p>
                        <p class="number do-count">
                          <?php get_agents_count() ?>
                        </p>
                        <p class="label">agentes</p>
                      </div>
                    </div>
                    <div class="six columns">
                      <div class="intro-numbers">
                        <p class="icon pmc-icon-calendar"></p>
                        <p class="number do-count">
                          <?php get_events_count() ?>
                        </p>
                        <p class="label">eventos</p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="six columns">
                      <div class="intro-numbers">
                        <p class="icon pmc-icon-door"></p>
                        <p class="number do-count">
                          <?php get_spaces_count() ?>
                        </p>
                        <p class="label">espaços</p>
                      </div>
                    </div>
                    <div class="six columns">
                      <div class="intro-numbers">
                        <p class="icon pmc-icon-paper"></p>
                        <p class="number do-count">
                          <?php get_projects_count() ?>
                        </p>
                        <p class="label">projetos</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <section id="content">
    <div class="container">
      <div class="six columns">
      <?php get_template_part('parts/network-blog'); ?>
      </div>
      <div class="five columns offset-by-one">
        <div class="profiles content-section connect-border connect-right">
          <header class="content-section-header">
            <h2>Conheça as iniciativas</h2>
          </header>

          <?php $blogusers = get_users( 'orderby=nicename&role=instance' );
          // Array of WP_User objects.
          foreach ( $blogusers as $user ) : ?>
            <article class="profile row">
              <div class="author network-author">
                <div class="author-thumb">
                  <?php echo get_avatar( $user->ID, 100 ); ?>
                </div>
              </div>
              <p class="profile-label"><?php echo esc_html($user->display_name); ?></p>
              <h3><a href="#"><?php echo esc_html($user->user_nicename); ?></a></h3>
              <p class="profile-data">
                <span class="profile-data-item">
                  <span class="pmc-icon-person icon"></span>
                  321
                </span>
                <span class="profile-data-item">
                  <span class="pmc-icon-paper icon"></span>
                  321
                </span>
                <span class="profile-data-item">
                  <span class="pmc-icon-door icon"></span>
                  321
                </span>
                <span class="profile-data-item">
                  <span class="pmc-icon-calendar icon"></span>
                  321
                </span>
              </p>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  <section>
</article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
