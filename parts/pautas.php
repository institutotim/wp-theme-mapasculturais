<div class="content-section">
  <div class="content-section-content">

    <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>
      <article class="post">
        <a href="<?php echo get_permalink();?>">
          <div class="featured-image">
            <?php echo get_the_post_thumbnail(); ?>
          </div>
          <h3><?php the_title(); ?></h3>
        </a>
        <div class="meta">
          <p class="author">
            <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
              <img src='<?php echo get_avatar_url(get_the_author_meta( 'ID' ), 30); ?>' />
              <?php the_author(); ?>
            </a>
          </p>
          <p class="date">
            <span class="fa fa-clock-o"></span>
            <?php echo the_date(); ?>
          </p>
          <p>
          <?php
            if ( \Delibera\Flow::getDeadlineDays( $post->ID ) <= -1 )
            _e( 'Prazo encerrado', 'delibera' );
            else
            printf( _n( 'Pauta aberta por mais 1 dia', 'Pauta aberta por mais %1$s dias', \Delibera\Flow::getDeadlineDays( $post->ID ), 'pmc' ), number_format_i18n( \Delibera\Flow::getDeadlineDays( $post->ID ) ) );
          ?>
          </p>

        </div>
        <?php echo the_content(); ?>
      </article>
      <hr class="dark" />
    <?php endwhile; ?>

    <nav class="paging row">
    <?php

      $pagination = array(
          'base' => @add_query_arg('page','%#%'),
          'format' => '',
          'total' => $query->max_num_pages,
          'current' => $page,
          'type' => 'plain',
          'prev_next'          => true,
          'prev_text'          => __('« Previous'),
          'next_text'          => __('Next »'),
          'show_all' => get_theme_mod( 'all-links', false ),
          'before_page_number' => "<!--",
          'after_page_number' => '-->'
      );

      if ( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

      if ( !empty($query->query_vars['s']) )
        $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

      echo paginate_links( $pagination );
    ?>
    </nav>

    <?php wp_reset_postdata(); ?>

    <?php else : ?>
      <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'pmc' ); ?></p>
    <?php endif; ?>
  </div>
</div>
