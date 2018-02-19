<?php
  global $wp_query;
  var_dump($wp_query->query_vars);
?>



<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<article id="page-<?php the_ID(); ?>">
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
            <span class="fa fa-newspaper-o"></span>
          </span>
          <?php if (get_post_type() != 'network_post'): ?>
            <p class="over-title category">
              <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="area">Notícias</a>
              <span class="fa fa-chevron-right"></span>
              <?php $terms = get_the_terms( get_the_ID(), 'category' );
                if ( $terms && !is_wp_error( $terms ) ) :
                  foreach ( $terms as $term ) { ?>
                    <a href="<?php echo get_term_link($term->term_id); ?>" class="category">
                      <?php echo $term->name; ?>
                    </a>
            <?php } ?>
            <?php endif; ?>
          <?php else: ?>
            <p class="over-title category">
              <a href="<?php echo get_post_type_archive_link( 'network_post' ); ?>" class="area"><?php _e('Network Blog', 'pmc'); ?></a>
            </p>
          </p>
          <?php endif; ?>
          <h2><?php the_title(); ?></h2>
        </div>
      </div>
    </div>
  </header>
  <section id="content">
    <div class="container">
      <div class="twelve columns">
        <div id="meta">
          <p class="author">
            <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
              <img src="<?php echo get_avatar_url(get_the_author_meta( 'ID' ), 30); ?>" />
              <?php the_author(); ?>
              </a>
          </p>
          <?php if (get_post_type() != 'network_post'): ?>
          <p class="tags">
            <span class="fa fa-tags"></span>
           <?php $terms = get_the_terms( get_the_ID(), 'category');
              if ( $terms && !is_wp_error( $terms ) ) :
                $aux = array();
                foreach ( $terms as $term ) {
                  $aux[] = '<a href="'.get_term_link($term->term_id).'" class="category">'.$term->name.'</a>';
                }
                endif; 
                echo join( ", ", $aux );
                ?>
          </p>
          <?php endif; ?>
          <p class="date">
            <span class="fa fa-clock-o"></span>
            <?php the_date(); ?>
          </p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="eight columns">
        <?php the_content(); ?>
      </div>
      <div class="three columns offset-by-one">
        <div id="sidebar" class="sidebar regular-sidebar connect-border connect-right">
         <?php dynamic_sidebar('news-pmc') ?>
        </div>
      </div>
    </div>
  <section>
</article>
<?php endwhile; endif; ?>
<?php get_template_part('parts/community-section'); ?>
<?php get_footer(); ?>