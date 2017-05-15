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
          <p><strong>Mapas Culturais é uma ferramenta que articula agentes culturais, instituições governamentais e a sociedade de forma colaborativa.</strong> Promove o acesso e a visibilidade para o público, o governo e o mercado. O setor público ganha uma compreensão do território e de sua cultura, os agentes divulgam suas programações e a população pode entender seu espaço e se envolver em atividades culturais na vizinhança.</p>
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
                'ignore_sticky_posts' => 1
              ));
              while($first_post_query->have_posts()) :
                $first_post_query->the_post();
                ?>
                <article class="post">
                  <div class="post-thumbnail" style="background-image:url(http://lorempixel.com/700/700/);"></div>
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <div class="meta">
                    <p class="author">
                      <img src="http://lorempixel.com/30/30/" />
                      Raimundo Nonato
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
            <hr />
            <div class="content-section-content secondary-content">
              <?php
              $posts_query = new WP_Query(array(
                'ignore_sticky_posts' => 1,
                'post__not_in' => get_option('sticky_posts'),
                'posts_per_page' => 2
              ));
              while($posts_query->have_posts()) :
                $posts_query->the_post();
                ?>
                <article class="post">
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <div class="meta">
                    <p class="author">
                      <img src="http://lorempixel.com/30/30/" />
                      Raimundo Nonato
                    </p>
                    <p class="date">
                      <span class="fa fa-clock-o"></span>                      <?php echo get_the_date(); ?>
                    </p>
                  </div>
                </article>
                <?php
                wp_reset_postdata();
              endwhile;
              ?>
            </div>
            <p><a class="button block">Veja mais notícias</a></p>
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
