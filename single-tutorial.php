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
            <a href="<?php echo get_post_type_archive_link( 'tutorial' ); ?>" class="area">TUTORIAIS</a>            
            <?php $terms = get_the_terms( get_the_ID(), 'tutorial_category' );      
              if ( $terms && !is_wp_error( $terms ) ) : ?>
                <span class="fa fa-chevron-right"></span>
                <a href="<?php echo get_term_link($terms[0]->term_id); ?>" class="category">
                  <?php echo $terms[0]->name; ?>
                </a>
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
    $terms = get_the_terms( get_the_ID(), 'related_version' );

    if (!$terms) {
      $valid_versions = __('to all platform versions', 'pmc');
    } else {
      $valid_versions = implode(", ", array_column($terms, 'name'));

      // add prefix
      if (count($terms) > 1) {
        $valid_versions = __('platform versions:', 'pmc') . " " . $valid_versions;
      } else {
        $valid_versions = __('platform version:', 'pmc') . " " . $valid_versions;
      }  
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
            <?php echo __('difficulty:', 'pmc') . " " . get_post_meta(get_the_ID(), 'tutorial_difficulty_label')[0]; ?>
          </p>
          <p class="valid">
            <span class="fa fa-check-circle"></span>
            <?php echo $valid_versions; ?>
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