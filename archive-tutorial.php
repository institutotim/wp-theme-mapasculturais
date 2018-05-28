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
        <div class="page-header-content no-text has-icon compos-title row">
          <span class="page-icon">
            <span class="fa fa-bookmark-o"></span>
          </span>
          <h2>
            <a href="<?php echo get_post_type_archive_link("tutorial"); ?>">Tutoriais</a>
          </h2>
          <h3 class="complete">
            <span class="fa fa-gear"></span>
            <span class="dropdown-menu">
              <span class="dropdown-menu-label">
                <?php
                  $target_group = ( get_query_var('target_group') ) ? get_query_var('target_group') : '';
                  if($target_group == 2){
                    echo 'para agentes';
                  }
                  else if ($target_group == 1){
                    echo 'para gestores';
                  } else { _e("Select Target Group", "pmc"); }
                ?>
              </span>
              <span class="fa fa-chevron-down"></span>
              <span class="dropdown-menu-items">
                <a href="<?php echo get_post_type_archive_link( 'tutorial' ); ?>">todos</a>
                <a href="<?php echo add_query_arg(array('target_group' => '1') , get_post_type_archive_link( 'tutorial' )); ?>">para gestores</a>
                <a href="<?php echo add_query_arg(array('target_group' => '2') , get_post_type_archive_link( 'tutorial' )); ?>">para agentes</a>
              </span>
            </span>
          </h3>
        </div>
      </div>
    </div>
  </header>
  <section id="big-search">
    <form method="get" id="searchform" action="<?php echo get_post_type_archive_link( 'tutorial' ); ?>">
      <div class="container">
        <div class="twelve columns">
          <div class="big-search-container">
            <label for="big_search_input">
              <span class="fa fa-search"></span>
              <input value="<?php the_search_query(); ?>" name="s" id="big_search_input" type="text" placeholder="Busque por tutoriais..." />
            </label>
          </div>
        </div>
      </div>
    </form>
  </section>
  <section id="content">
    <div class="container">
      <div class="eight columns">
        <?php get_template_part('parts/tutorials'); ?>
      </div>
      <div class="three columns offset-by-one">
        <div id="sidebar" class="sidebar regular-sidebar connect-border connect-right">
          <?php dynamic_sidebar('archive-tutorials-pmc') ?>
        </div>
      </div>
    </div>
  </section>
</section>
<?php get_template_part('parts/community-section'); ?>
<?php get_footer(); ?>
