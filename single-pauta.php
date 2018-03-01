<?php get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

  <article id="pauta-<?php the_ID(); ?>" class="pauta">
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
              <span class="fa fa-group"></span>
            </span>
            <p class="over-title category">
              <a href="<?php echo home_url("/comunidade") ?>" class="area">Comunidade</a>
              <span class="fa fa-chevron-right"></span>
              <a href="<?php echo get_post_type_archive_link("pauta"); ?>" class="area">Pauta</a>
            </p>
            <h2><?php the_title(); ?></h2>
          </div>
        </div>
      </div>
    </header>

    <?php

    $status_pauta = delibera_get_situacao($post->ID)->slug;

    global $DeliberaFlow;
    $flow = $DeliberaFlow->get(get_the_ID());

    $current_module = $DeliberaFlow->getCurrentModule(get_the_ID());

    $temas = wp_get_post_terms(get_the_ID(), 'tema');

    ?>
    <div class="pauta-content <?php echo $status_pauta; ?>">
      <div class="banner-ciclo status-ciclo">
        <h3>Estágio da pauta</h3>
        <ul class="ciclos"><?php
        $i = 1;
        foreach ($flow as $situacao)
        {
          switch($situacao)
          {
            case 'validacao':?>
            <li class="validacao <?php echo ($status_pauta != "validacao" ? "inactive" : ""); ?>"><?php echo $i; ?><br>Validação</li><?php
            break;
            case 'discussao': ?>
            <li class="discussao <?php echo ($status_pauta != "discussao" ? "inactive" : ""); ?>"><?php echo $i; ?><br>Discussão</li><?php
            break;
            case 'relatoria':
            case 'eleicao_relator': ?>
            <li class="relatoria <?php echo ($status_pauta != "relatoria" ? "inactive" : ""); ?>"><?php echo $i; ?><br>Relatoria</li><?php
            break;
            case 'emvotacao': ?>
            <li class="emvotacao <?php echo ($status_pauta != "emvotacao" ? "inactive" : ""); ?>"><?php echo $i; ?><br>Votação</li><?php
            break;
            case 'naovalidada':
            case 'comresolucao': ?>
            <li class="comresolucao <?php echo ($status_pauta != "comresolucao" && $status_pauta != "naovalidada" ? "inactive" : ""); ?>"><?php echo $i; ?><br>Resolução</li><?php
            break;
          }
          $i++;
        }?>
      </ul>
    </div>

    <div class="container">
      <div class="twelve columns">
        <div id="meta">
          <p class="author">
            <img src="<?php echo get_avatar_url(get_the_author_meta( 'ID' ), 30); ?>" />
            Proposta por <?php the_author(); ?>
          </p>
          <p class="tags">
            <span class="fa fa-tags"></span>
            <?php $terms = get_the_terms( get_the_ID(), 'tema');
            if ( $terms && !is_wp_error( $terms ) ) :
              $aux = array();
              foreach ( $terms as $term ) {
                $aux[] = '<a href="'.get_term_link($term->term_id).'" class="category">'.$term->name.'</a>';
              }
            endif;
            echo join( ", ", $aux );
            ?>
          </p>
          <p class="date">
            <span class="fa fa-clock-o"></span>
            <?php
            if ( \Delibera\Flow::getDeadlineDays( $post->ID ) <= -1 )
              _e( 'Prazo encerrado', 'delibera' );
            else
              printf( _n( 'Pauta aberta por mais 1 dia', 'Pauta aberta por mais %1$s dias', \Delibera\Flow::getDeadlineDays( $post->ID ), 'pmc' ), number_format_i18n( \Delibera\Flow::getDeadlineDays( $post->ID ) ) );
            ?>
            <span class="small">(publicada <?php echo get_the_date(); ?>)</span>
          </p>
          <p>
          </p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="eight columns">
          <?php the_content(); ?>
          <div class="entry-attachment">
          </div><!-- .entry-attachment -->
          <?php echo $current_module->getCommentListLabel(); ?>
          <div><div>
            <?php  comments_template( '', true ); ?>
          </div></div>
        </div>
        <div class="three columns offset-by-one">
          <div id="sidebar" class="sidebar regular-sidebar connect-border connect-right">
            <div class="pauta-actions">
              <button>
                <?php echo delibera_gerar_seguir($post->ID); ?>
              </button>
              <?php echo delibera_gerar_curtir($post->ID, 'pauta'); ?>
              <?php echo delibera_gerar_discordar($post->ID, 'pauta');?>
            </div>
            <?php dynamic_sidebar('news-pmc') ?>
          </div>
        </div>
      </div>
    </div>
  </article>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
