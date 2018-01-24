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
          <nav class="button-nav u-pull-right">
            <?php $terms = get_the_terms( get_the_ID(), 'category' );      
              if ( $terms && !is_wp_error( $terms ) ) : 
                foreach ( $terms as $term ) { ?>
                  <a href="<?php echo get_term_link($term->term_id); ?>" class="button">
                    <?php echo $term->name; ?>
                  </a>
          <?php } ?>
        <?php endif; ?>
          </nav>
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
              $title = sprintf( __( '%s', 'arp' ), $parent->name );
            else :
              $title = sprintf( __( '%s', 'arp' ), single_term_title() );
            endif;
            echo '<a href="' . $link . '">' . $title . '</a>';
          elseif( is_search() ) :
            printf( __( 'Search results for: %s', 'arp' ), $_GET['s'] );
          elseif ( is_day() ) :
            printf( __( 'Daily Archives: %s', 'arp' ), get_the_date() );
          elseif ( is_month() ) :
            printf( __( 'Monthly Archives: %s', 'arp' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'arp' ) ) );
          elseif ( is_year() ) :
            printf( __( 'Yearly Archives: %s', 'arp' ), get_the_date( _x( 'Y', 'yearly archives date format', 'arp' ) ) );
          else :
            // _e( 'Archives', 'arp' );
            echo 'Notícias';
          endif;
          ?></h2>
          <p class="page-description">Saiba o que está acontecendo no mundo do Mapas Culturais</p>
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
         <!--  
          <div class="widget">
            <h2>Categorias</h2>
            <ul>
              <li>
                <a href="#">
                  Categoria #1
                </a>
              </li>
              <li>
                <a href="#">
                  Categoria #2
                </a>
              </li>
              <li>
                <a href="#">
                  Categoria #3
                </a>
              </li>
              <li>
                <a href="#">
                  Categoria #4
                </a>
              </li>
              <li>
                <a href="#">
                  Categoria #4
                </a>
              </li>
            </ul>
          </div> -->
        </div>
      </div>
    </div>
  </section>
</section>
<?php get_template_part('parts/community-section'); ?>
<?php get_footer(); ?>
