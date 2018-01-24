<?php
/*
 * Template name: Home page
 */
?>
<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
  <?php get_template_part('parts/hero'); ?>
  <section id="content">
    <div class="main-text">
      <div class="container">
        <div class="eight columns">
          <p>
            <?php
              // get and split project_description, first phrase will be highlighted
              $project_description = get_post_meta(get_the_ID(), 'project_description', true);
              $project_description = explode('.', $project_description, 2);
            ?>
            <strong>
              <?php echo $project_description[0] ?>.
            </strong>
            <?php echo $project_description[1] ?>
          </p>
          <hr class="dark"/>
        </div>
      </div>
      <div id="mc_svg" class="svg">
        <?php include(TEMPLATEPATH . '/img/mc.svg'); ?>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="five columns">
          <section class="content-section pink-section connect-border connect-left">
            <div class="content-section-content first-content">
              <header class="content-section-header">
                <h2>Notícias</h2>
              </header>
              <?php

              $first_post_query = new WP_Query(array(
                'posts_per_page' => 1,
                'post__in' => get_option('sticky_posts'),
                'ignore_sticky_posts' => 1,
                'meta_query' => array(
                    array(
                     'key' => '_thumbnail_id',
                     'compare' => 'EXISTS'
                    ),
                )
              ));
              $firstPosts = array();
              while($first_post_query->have_posts()) :
                $firstPosts[] = $post->ID;
                $first_post_query->the_post();
                ?>
                <article class="post">
                  <div class="post-thumbnail" style="background-image:url(<?php echo get_the_post_thumbnail_url() ?>);"></div>
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <div class="meta">
                    <p class="author">
                      <?php
                       echo get_avatar(get_the_author_meta('ID'), $size = '30');
                      ?>
                      <?php echo get_the_author(); ?>
                    </p>
                    <p class="date">
                      <span class="fa fa-clock-o"></span>
                      <?php echo get_the_date(); ?>
                    </p>
                  </div>
                </article>
                <?php
                wp_reset_postdata();
              endwhile;
              ?>
            </div>
            <div class="content-section-content secondary-content">
              <?php
              $posts_query = new WP_Query(array(
                'ignore_sticky_posts' => 1,
                'post__not_in' => get_option('sticky_posts'),
                'posts_per_page' => 2,
                'post__not_in' => $firstPosts
              ));
              while($posts_query->have_posts()) :
                $posts_query->the_post();
                ?>
                <article class="post">
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <div class="meta">
                    <p class="author">
                      <?php
                       echo get_avatar(get_the_author_meta('ID'), $size = '30');
                      ?>
                      <?php echo get_the_author(); ?>
                    </p>
                    <p class="date">
                      <span class="fa fa-clock-o"></span>
                      <?php echo get_the_date(); ?>
                    </p>
                  </div>
                </article>
                <?php
                wp_reset_postdata();
              endwhile;
              ?>
            </div>
            <p><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="button block">Veja mais notícias</a></p>
          </section>
        </div>
        <?php query_posts('post_type=network_post'); ?>
        <?php if(have_posts()) : ?>
          <div class="six columns offset-by-one">
            <?php get_template_part('parts/network-blog'); ?>
          </div>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
      </div>
    </div>
  </section>
  <?php get_template_part('parts/community-section'); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
