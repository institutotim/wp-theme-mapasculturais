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
            <span class="fa fa-chevron-right"></span>
            <a href="<?php echo get_post_type_archive_link("pauta"); ?>" class="area">Pautas</a>
					</p>
          <h2><?php single_term_title(); ?></h2>
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
          <div class="widget">
            <form class="content-section-search-form" action="<?php echo get_post_type_archive_link("pauta"); ?>">
              <input type="text" placeholder="Busque por tópicos de discussão..." name="s" value="<?php echo $_GET['s']; ?>" />
            </form>
          </div>
          <div class="widget">
            <h3>Temas</h3>
            <ul>
            <?php
              $terms = get_terms( 'tema');
                if ( $terms && !is_wp_error( $terms ) ) :
                  foreach ( $terms as $term ) { ?>
                    <li><a href="<?php echo get_term_link($term->term_id); ?>">
                      <?php echo $term->name; ?>
                    </a></li>
                <?php } ?>
              <?php endif; ?>
            </ul>
          </div>
          <div class="widget">
            <h3>Situação</h3>
            <ul>
            <?php
              $terms = get_terms('situacao');
                if ( $terms && !is_wp_error( $terms ) ) :
                  foreach ( $terms as $term ) :
                    if($term->slug !== "validacao") : ?>
                      <li><a href="<?php echo add_query_arg("situacao", $term->slug, get_post_type_archive_link("pauta")); ?>">
                        <?php echo $term->name; ?>
                      </a></li>
                    <?php
                  endif;
                endforeach; ?>
              <?php endif; ?>
            </ul>
          </div>
          <?php dynamic_sidebar('news-pmc') ?>
        </div>
      </div>
    </div>
  </section>
</section>
<?php get_footer(); ?>
