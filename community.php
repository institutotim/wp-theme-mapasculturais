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
    <div class="container">
      <div class="twelve columns">
        <div class="page-header-content has-icon">
          <div class="row">
            <span class="page-icon">
              <span class="fa fa-group"></span>
            </span>
            <h2><?php the_title(); ?></h2>
          </div>
          <div class="row">
            <div class="four columns">
              <div class="page-header-text connect-border connect-left">
                <ul class="feature-list">
                  <li>Qualquer município ou estado pode instalar a plataforma</li>
                  <li>Mapas Culturais é resultado do trabalho colaborativo de diversos parceiros</li>
                  <li>Participe da rede de desenvolvedores que trabalha para aprimorar a solução</li>
                </ul>
              </div>
            </div>
            <?php 

              if ( false === ( $request_contributors = get_transient( 'request_contributors' ) ) ) {
                   $request_contributors = wp_remote_get(esc_url('https://api.github.com/repos/hacklabr/mapasculturais/stats/contributors'));
                   set_transient( 'request_contributors', $request_contributors, 3 * HOUR_IN_SECONDS );
              }

              if( is_wp_error( $request_contributors ) ) {
                return false;
              }
              $body_contributors = wp_remote_retrieve_body( $request_contributors );
              $data_contributors = json_decode( $body_contributors );
              if( ! empty( $data_contributors ) ) {
                $contributors = count($data_contributors)+1;
              }

              if ( false === ( $request_latest_commit = get_transient( 'request_latest_commit' ) ) ) {
                   $request_latest_commit = wp_remote_get(esc_url('https://api.github.com/repos/hacklabr/mapasculturais/git/refs/heads/master'));
                   set_transient( 'request_latest_commit', $request_latest_commit, 3 * HOUR_IN_SECONDS );
              }

              if( is_wp_error( $request_latest_commit ) ) {
                return false; 
              }
              $body_latest_commit = wp_remote_retrieve_body( $request_latest_commit );
              $data_latest_commit = json_decode( $body_latest_commit );
              if( ! empty( $data_latest_commit ) ) {

                if ( false === ( $request_commits = get_transient( 'request_commits' ) ) ) {
                     $request_commits = wp_remote_get(esc_url('https://api.github.com/repos/hacklabr/mapasculturais/compare/917c0cc5ea17cb8961efe7486eccb9d450d3c8cd...'.$data_latest_commit->object->sha));
                     set_transient( 'request_commits', $request_commits, 3 * HOUR_IN_SECONDS );
                }

                if( is_wp_error( $request_commits ) ) {
                  return false;
                }
                $body_commits = wp_remote_retrieve_body( $request_commits );
                $data_commits = json_decode( $body_commits );
                if( ! empty( $data_commits ) ) {
                  $commits = $data_commits->total_commits+1;
                }
              }


              if ( false === ( $request_issues = get_transient( 'request_issues' ) ) ) {
                   $request_issues = wp_remote_get(esc_url('https://api.github.com/repos/hacklabr/mapasculturais'));

                   set_transient( 'request_issues', $request_issues, 3 * HOUR_IN_SECONDS );
              }

              if( is_wp_error( $request_issues ) ) {
                return false;
              }
              $body_issues = wp_remote_retrieve_body( $request_issues );
              $data_issues = json_decode( $body_issues );
              if( ! empty( $data_issues ) ) {
                $issues = $data_issues->open_issues_count;
              }


              // $request_graph = wp_remote_get(esc_url('https://api.github.com/repos/hacklabr/mapasculturais/commits'));

              // if( is_wp_error( $request_graph ) ) {
              //   return false;
              // }
              // $body_graph = wp_remote_retrieve_body( $request_graph );
              // $data_graph = json_decode( $body_graph );
              // if( ! empty( $data_graph ) ) {
              //   var_dump($data_graph);
              //   //$graph = $data_graph;
              // }

            ?>
            <div class="eight columns">
              <div class="community-numbers">
                <div class="intro-numbers">
                  <p class="icon fa fa-code"></p>
                  <p class="number do-count"><?php echo $commits; ?></p>
                  <p class="label">contribuições no código</p>
                </div>
                <div class="intro-numbers">
                  <p class="icon fa fa-code-fork"></p>
                  <p class="number do-count"><?php echo $contributors; ?></p>
                  <p class="label">desenvolvedores colaborando</p>
                </div>
                <div class="intro-numbers">
                  <p class="icon fa fa-comments-o"></p>
                  <p class="number do-count"><?php echo $issues; ?></p>
                  <p class="label">questões em discussão no GitHub</p>
                </div>
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
        <div class="community-intro connect-border connect-left parent-height" data-parent=".container">
          <h2>Discussões</h2>
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
      </div>
      <div class="eight columns">
        <div class="row">
          <section class="community-session">
            <p>Você não está conectado, <a href="<?php echo wp_registration_url(); ?> ">cadastre-se</a> ou efetue <a href="<?php echo wp_login_url( home_url() ); ?>">login</a>.</p>
          </section>
        </div>
        <div class="row">
          <?php
          $debating_query = new WP_Query(array(
            'post_type' => 'pauta',
            'tax_query' => array(
              array(
                'taxonomy' => 'situacao',
                'field' => 'slug',
                'terms' => 'discussao'
              )
            )
          ));
          ?>
          <section class="content-section">
            <header class="content-section-header">
              <h3>Pautas em discussão</h3>
              <p class="section-description">Acompanhe e participe do debate das pautas em discussão.</p>
            </header>
            <?php
            if($debating_query->have_posts()) :
              while($debating_query->have_posts()) :
                $debating_query->the_post();
                ?>
                <?php get_template_part('parts/topic-item'); ?>
                <?php
                wp_reset_postdata();
              endwhile;
            else :
              ?>
              <p>Nenhuma pauta foi encontrada</p>
              <?php
            endif;
            ?>
          </section>
        </div>
        <hr class="dark" />
        <div class="row">
          <div class="six columns">
            <?php
            $proposal_query = new WP_Query(array(
              'post_type' => 'pauta',
              'tax_query' => array(
                array(
                  'taxonomy' => 'situacao',
                  'field' => 'slug',
                  'terms' => 'validacao'
                )
              )
            ));
            ?>
            <section class="content-section community-section topic-proposal-section">
              <header class="content-section-header">
                <h3>Propostas de pauta</h3>
                <p class="section-description">Vote para abrir discussão sobre as pautas propostas.</p>
              </header>
              <?php
              if($proposal_query->have_posts()) :
                while($proposal_query->have_posts()) :
                  $proposal_query->the_post();
                  ?>
                  <?php get_template_part('parts/topic-item'); ?>
                  <?php
                  wp_reset_postdata();
                endwhile;
              else :
                ?>
                <p>Nenhuma pauta foi encontrada</p>
                <?php
              endif;
              ?>
            </section>
          </div>
          <div class="six columns">
            <?php
            $debating_query = new WP_Query(array(
              'post_type' => 'pauta',
              'tax_query' => array(
                array(
                  'taxonomy' => 'situacao',
                  'field' => 'slug',
                  'terms' => 'comresolucao'
                )
              )
            ));
            ?>
            <section class="content-section community-section topic-resolved-section">
              <header class="content-section-header">
                <h3>Pautas com resolução</h3>
                <p class="section-description">Veja as resoluções das pautas concluídas.</p>
              </header>
              <?php
              if($debating_query->have_posts()) :
                while($debating_query->have_posts()) :
                  $debating_query->the_post();
                  ?>
                  <?php get_template_part('parts/topic-item'); ?>
                  <?php
                  wp_reset_postdata();
                endwhile;
              else :
                ?>
                <p>Nenhuma pauta foi encontrada</p>
                <?php
              endif;
              ?>
            </section>
          </div>
        </div>
      </div>
    </div>
  <section>
</article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
