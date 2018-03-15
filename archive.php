<?php get_header(); ?>
<section id="archive">
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <hr/>
      </div>
    </div>
    <div class="container">
      <div class="twelve columns">
        <div class="page-header-content no-text has-icon row">
          <span class="page-icon">
            <span class="fa fa-newspaper-o"></span>
          </span>
          <h2><?php
          if( is_tag() || is_category() || is_tax() ) :
            $term = get_queried_object();
            $link = get_term_link($term);
            if($term->parent) :
              $parent = get_term($term->parent);
              $link = get_term_link($parent);
              $title = sprintf( __( '%s', 'pmc' ), $parent->name );
            else :
              $title = sprintf( __( '%s', 'pmc' ), single_term_title() );
            endif;
            echo '<a href="' . $link . '">' . $title . '</a>';
          elseif( get_search_query( false ) ) :
            printf( __( 'Search results for: %s', 'pmc' ), $_GET['s'] );
          elseif ( is_day() ) :
            printf( __( 'Daily Archives: %s', 'pmc' ), get_the_date() );
          elseif ( is_month() ) :
            printf( __( 'Monthly Archives: %s', 'pmc' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'pmc' ) ) );
          elseif ( is_year() ) :
            printf( __( 'Yearly Archives: %s', 'pmc' ), get_the_date( _x( 'Y', 'yearly archives date format', 'pmc' ) ) );
          elseif (get_post_type() == 'network_post') :
            _e('Network Blog', 'pmc');
          else :
            _e('News', 'pmc');
          endif;
          ?></h2>
          <p class="page-description"><?php _e('Saiba o que está acontecendo no mundo do Mapas Culturais', 'pmc') ?></p>
        </div>
      </div>
    </div>
  </header>
  <section id="content">
    <div class="container">
      <div class="eight columns">
        <?php get_template_part('parts/blog'); ?>
      </div>
      <div class="three columns offset-by-one">
        <div id="sidebar" class="sidebar regular-sidebar connect-border connect-right">
          <?php dynamic_sidebar('news-pmc') ?>
        </div>
      </div>
    </div>
  </section>
</section>
<?php get_template_part('parts/community-section'); ?>
<?php get_footer(); ?>