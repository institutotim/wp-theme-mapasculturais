<article <?php post_class(); ?>>
  <p class="topic-deadline">
    <span class="fa fa-clock-o"></span>
    <?php
    if ( \Delibera\Flow::getDeadlineDays( $post->ID ) <= -1 )
    _e( 'prazo encerrado', 'delibera' );
    else
    printf( _n( 'por mais <span class="numero">1</span> dia', 'por mais <span class="numero">%1$s</span> dias', \Delibera\Flow::getDeadlineDays( $post->ID ), 'delibera' ), number_format_i18n( \Delibera\Flow::getDeadlineDays( $post->ID ) ) );
    ?>
  </p>
  <h4><?php the_title(); ?></h4>
  <div class="topic-meta">
    <span class="topic-vote">
      <span class="up">
        <span class="fa fa-thumbs-up"></span>
        <?php echo get_post_meta($post->ID, 'delibera_numero_curtir', true); ?>
      </span>
      <span class="down">
        <span class="fa fa-thumbs-down"></span>
        <?php echo get_post_meta($post->ID, 'delibera_numero_discordar', true); ?>
      </span>
    </span>
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
  </div>
</article>
