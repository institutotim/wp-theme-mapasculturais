<div class="content-section">
  <div class="content-section-content">

    <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part('parts/topic-item'); ?>
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
          'prev_text'          => "« " . __('Previous'),
          'next_text'          => __('Next') . " »",
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
      <p><?php _e( 'Sorry, no posts matched your criteria.', 'pmc' ); ?></p>
    <?php endif; ?>
  </div>
</div>
