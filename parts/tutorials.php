<div class="tutorial-list">
  <?php

    $page = ( get_query_var('page') ) ? get_query_var('page') : 1;
    $target_group = ( get_query_var('target_group') ) ? get_query_var('target_group') : '';
    $args = array(
      'post_type' => 'tutorial',
       'paged' => $paged,
       'meta_key' => 'tutorial_group_target', 
       'meta_value' => esc_html($target_group)
    );


    if (get_search_query( false )) {
      $args['s'] = esc_html( get_search_query( false ) );
      $args['posts_per_page'] = -1;
    } else {
      $args['posts_per_page'] = 1;
    }


    $query = new WP_Query( $args );
  ?>

  <?php if ( $query->have_posts() ) : ?>

  <?php while ( $query->have_posts() ) : $query->the_post(); ?>
    <article class="tutorial-item row">
      <div class="tutorial-meta">
        <?php $terms = get_the_terms( get_the_ID(), 'category_tutorial' );      
          if ( $terms && !is_wp_error( $terms ) ) : 
            foreach ( $terms as $term ) { ?>
              <a href="<?php echo get_term_link($term->term_id); ?>" class="category">
                <span class="fa fa-bookmark-o"></span>
                <?php echo $term->name; ?>
              </a>
      <?php } ?>
    <?php endif; ?>
        <p class="meta-item">
          <span class="label">
            <span class="fa fa-certificate"></span>
            Complexidade
          </span>
          <span class="meta-val complex-item complex-item-2">
            <?php echo get_post_meta(get_the_ID(), 'tutorial_difficulty')[0]; ?>
          </span>
        </p>
        <p class="meta-item target-group">
          <span class="fa fa-gear"></span>
          <?php echo get_post_meta(get_the_ID(), 'tutorial_group_target_label')[0]; ?>
        </p>
      </div>
      <div class="tutorial-content">
        <a href="<?php echo get_permalink();?>">
          <div class="featured-image">
            <?php echo get_the_post_thumbnail(); ?>
          </div>
          <h3><?php the_title(); ?></h3>
        </a>
        <?php echo the_content(); ?>
      </div>
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