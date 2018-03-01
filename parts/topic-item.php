<?php
$status_pauta = delibera_get_situacao($post->ID)->slug;
?>
<article <?php post_class($status_pauta); ?>>
  <?php
  if($status_pauta !== 'comresolucao') :
    ?>
    <p class="topic-deadline">
      <span class="fa fa-clock-o"></span>
      <?php
      if ( \Delibera\Flow::getDeadlineDays( $post->ID ) <= -1 )
        _e( 'prazo encerrado', 'delibera' );
      else
        printf( _n( '<span class="numero">1</span> dia restante', '<span class="numero">%1$s</span> dias restantes', \Delibera\Flow::getDeadlineDays( $post->ID ), 'delibera' ), number_format_i18n( \Delibera\Flow::getDeadlineDays( $post->ID ) ) );
      ?>
    </p>
    <?php
  endif;
  ?>
  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
  <div class="topic-meta row">
    <div class="topic-vote">
      <?php
      echo delibera_gerar_curtir($post->ID, 'pauta');
      echo delibera_gerar_discordar($post->ID, 'pauta');
      ?>
    </div>
    <?php if(has_term('discussao', 'situacao')) : ?>
      <span class="topic-comment">
        <a href="#">
          <span class="fa fa-comment"></span>
          Comente
        </a>
      </span>
    <?php endif; ?>
    <?php if(has_term('comresolucao', 'situacao')) : ?>
      <span class="topic-comment">
        <a href="#">
          <span class="fa fa-comment"></span>
          Veja debate
        </a>
      </span>
    <?php endif; ?>
    <?php /*
    <div class="topic-follow entry-seguir">
      <a href="javascript:void(0);">
        <span class="fa fa-feed"></span>
        <?php echo delibera_gerar_seguir($post->ID); ?>
      </a>
    </div>
    */ ?>
  </div>
</article>
