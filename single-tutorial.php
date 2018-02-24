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
            <span class="fa fa-bookmark-o"></span>
          </span>
          <p class="over-title category">
            <a href="<?php echo get_post_type_archive_link( 'tutorial' ); ?>" class="area">Tutoriais</a>
            <span class="fa fa-chevron-right"></span>
            <?php $terms = get_the_terms( get_the_ID(), 'category_tutorial' );      
              if ( $terms && !is_wp_error( $terms ) ) : 
                foreach ( $terms as $term ) { ?>
                  <a href="<?php echo get_term_link($term->term_id); ?>" class="category">
                    <?php echo $term->name; ?>
                  </a>
          <?php } ?>
        <?php endif; ?>
          </p>
          <h2>
            <?php the_title(); ?>
          </h2>
        </div>
      </div>
    </div>
  </header>

  <?php

    $all_terms = get_terms( 'related_version' );
    $terms = get_the_terms( get_the_ID(), 'related_version' );

   

    if ( $all_terms && !is_wp_error( $all_terms ) && $terms && !is_wp_error( $terms ) ) {

      if (count($all_terms) == count($terms)){
         $valid = __('to all platform versions', 'pmc');
      }
      if (count($terms) < count($all_terms)){
        foreach ( $terms as $term ) {
          $valid = '<a href="' . get_term_link($term->term_id) . '" class="category">' . $term->name . '</a>';
        }
        if (count($terms) > 1) {
          $valid = __('to platform versions:', 'pmc') . " " . $valid;
        } else {
          $valid = __('to platform version:', 'pmc') . " " . $valid;
        }
      }

    }
    if (!$terms) {
      $valid = "Nenhuma versão foi definida no tutorial";
    }
  ?>

  <section id="content">
    <div class="container">
      <div class="twelve columns">
        <div id="meta">
          <p class="target-group">
            <span class="fa fa-gear"></span>
            <?php echo __('to', 'pmc') . " " . get_post_meta(get_the_ID(), 'tutorial_group_target_label')[0]; ?>
          </p>
          <p class="complex">
            <span class="fa fa-certificate"></span>
            <?php echo __('difficulty', 'pmc') . " " . get_post_meta(get_the_ID(), 'tutorial_difficulty_label')[0]; ?>
          </p>
          <p class="valid">
            <span class="fa fa-check-circle"></span>
            <?php echo $valid; ?>
          </p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="eight columns">
        <?php echo the_content(); ?>
      </div>
      <div class="three columns offset-by-one">
        <div id="sidebar" class="sidebar regular-sidebar connect-border connect-right">
          <?php dynamic_sidebar('tutorials-pmc') ?>
      </div>
    </div>
  <section>
</article>
<?php endwhile; endif; ?>
<?php get_template_part('parts/community-section'); ?>
<?php get_footer(); ?>