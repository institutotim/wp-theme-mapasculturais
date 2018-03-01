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
            <span class="fa fa-group"></span>
          </span>
					<p class="over-title">
						<a href="<?php echo home_url("/comunidade"); ?>" class="area">Comunidade</a>
					</p>
          <h2><?php _e('Pautas', 'pmc');?></h2>
          <p class="page-description"><?php _e('Veja as pautas abertas sobre o mapas culturais', 'pmc') ?></p>
        </div>
      </div>
    </div>
  </header>


  <section id="content">
    <div class="container">
      <div class="eight columns">
        <?php get_template_part('parts/pautas'); ?>
      </div>


      <div class="three columns offset-by-one">
        <div id="sidebar" class="sidebar regular-sidebar connect-border connect-right">
          <?php dynamic_sidebar('news-pmc') ?>
        </div>
      </div>
    </div>
  </section>
</section>
<?php get_footer(); ?>
