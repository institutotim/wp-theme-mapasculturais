<?php
  $author = get_user_by( 'slug', get_query_var( 'author_name' ) );
  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
  $args = array(
    'post_type' => 'network_post',
    's' => esc_html( get_search_query( false ) ),
    'posts_per_page' => 3,
    'paged' => $paged,
    'author' => $author->ID
  );
  $query = new WP_Query( $args );
?>
<section class="content-section">
  <header class="content-section-header">
    <h2>Blog da rede</h2>
  </header>
  <div class="content-section-content">
    <?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
    <article class="row">
      <div class="author network-author">
        <div class="author-thumb">
          <?php get_the_post_thumbnail(); ?>
        </div>
        <h4><?php echo esc_html($author->user_nicename); ?></h4>
      </div>
      <div class="network-post-content">
        <h3><a href="<?php echo get_permalink();?>"><?php the_title() ?></a></h3>
        <div class="meta">
          <p class="date">
            <span class="fa fa-clock-o"></span>
            <?php echo get_the_date(); ?>
          </p>
          <p class="comments">
            <a href="<?php comments_link(); ?>">
              <span class="fa fa-comments-o"></span>
              <?php comments_number( __('no comments', 'pmc'), __('one comment', 'pmc'), __('% comments', 'pmc') ); ?>
            </a>
          </p>
        </div>
      </div>
    </article>
    <hr class="dark" />
    <?php endwhile; ?>
    <?php endif; ?>
  </div>
  <p><a class="button block" href="<?php echo get_post_type_archive_link( 'network_post' ); ?>">Conheça o blog da rede</a></p>
</section>
