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
  <section id="content">
    <div class="container">
      <div class="twelve columns">
        <div id="meta">
          <p class="target-group">
            <span class="fa fa-gear"></span>
            <?php echo get_post_meta(get_the_ID(), 'tutorial_group_target_label')[0]; ?>
          </p>
          <p class="complex">
            <span class="fa fa-certificate"></span>
            <span class="label">Complexidade:</span>
            <?php echo get_post_meta(get_the_ID(), 'tutorial_difficulty')[0]; ?>
          </p>
          <p class="valid">
            <span class="fa fa-check-circle"></span>
            Válido para todas as versões da plataforma
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