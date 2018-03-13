<?php get_header(); ?>
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <hr/>
      </div>
    </div>
    <div class="container">
      <div class="twelve columns">
        <div class="page-header-content no-text has-icon row">
          <h2><i class="fa fa-meh-o"></i><?php _e('Página não encontrada ', 'pmc'); ?></h2>
          <p class="page-description">
            <?php printf(__( 'Return to the <a href=%s>main page</a> or perform a new search.', 'pmc' ), site_url()); ?>
          </p>
        </div>
      </div>
    </div>
  </header>
<?php get_footer(); ?>