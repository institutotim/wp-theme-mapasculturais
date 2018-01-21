<div class="tutorial-list">
  <?php
    $args = array(
      'post_type' => 'tutorial',
       's' => esc_html( get_search_query( false ) )
    );
    $query = new WP_Query( $args );
  ?>


  <?php if ( $query->have_posts() ) : ?>

  <!-- pagination here -->

  <!-- the loop -->

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
          <?php echo get_post_meta(get_the_ID(), 'tutorial_group_target')[0]; ?>
        </p>
      </div>
      <div class="tutorial-content">
        <div class="featured-image">
          <?php echo get_the_post_thumbnail(); ?>
        </div>
        <h3><?php the_title(); ?></h3>
        <?php echo the_content(); ?>
      </div>
    </article>
    <hr class="dark" />
  <?php endwhile; ?>

  <!-- end of the loop -->

  <!-- pagination here -->

  <?php wp_reset_postdata(); ?>

  <?php else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>
</div>