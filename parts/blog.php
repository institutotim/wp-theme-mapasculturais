<div class="content-section">
  <div class="content-section-content">
    <?php
      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
      $args = array(
        'post_type' => 'post', 
        's' => esc_html( get_search_query( false ) ),
        'posts_per_page' => 3,
        'paged' => $paged
      );
      $query = new WP_Query( $args );
    ?>
    
    <?php if ( $query->have_posts() ) : ?>

    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <article class="post">
        <div class="featured-image">
          <?php echo get_the_post_thumbnail(); ?>
        </div>
        <a href="<?php echo get_permalink();?>">
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
        </div>
        <?php echo the_content(); ?>
      </article>
      <hr class="dark" />
    <?php endwhile; ?>

    <nav class="paging row">
      <?php if( get_next_posts_link('', $query->max_num_pages) ) : ?>
        <?php echo get_next_posts_link( 'Older Entries', $query->max_num_pages); ?>
      <?php endif; ?>
      <?php if( get_previous_posts_link() ) : ?>
        <?php echo get_previous_posts_link( 'Newer posts' ); ?>
      <?php endif; ?>
    </nav>

    <?php wp_reset_postdata(); ?>

    <?php else : ?>
      <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'pmc' ); ?></p>
    <?php endif; ?> 
  </div>
</div>