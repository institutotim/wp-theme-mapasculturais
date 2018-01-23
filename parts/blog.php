<div class="content-section">
  <div class="content-section-content">
    <?php
      $args = array(
        'post_type' => 'post', 
        's' => esc_html( get_search_query( false ) ) 
      );
      $query = new WP_Query( $args );
    ?>
    
    <?php if ( $query->have_posts() ) : ?>

    <!-- pagination here -->

    <!-- the loop -->

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
            <a href="#">
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

    <!-- end of the loop -->

    <!-- pagination here -->

    <?php wp_reset_postdata(); ?>

    <?php else : ?>
      <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?> 
  </div>
</div>