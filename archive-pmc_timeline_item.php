<?php
/*
 * Template name: Timeline
 */
?>
<?php get_header(); ?>
<article>
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <hr/>
      </div>
    </div>
    <div class="container">
      <div class="eight columns">
        <div class="page-header-content">
          <h2> Linha do Tempo </h2>
          <div class="page-header-text connect-border connect-left">
            <p>Mapas Culturais é uma plataforma colaborativa que reúne informações sobre agentes, espaços, eventos e projetos culturais, fornecendo ao poder público uma radiografia da área de cultura e ao cidadão um mapa de espaços e eventos culturais da região.</p>
          </div>
        </div>
      </div>
    </div>
  </header>
  <section id="content">
    <div class="timeline">
      <a class="timeline-init fa fa-chevron-down" href="#"></a>

      <?php
        $posts_query = new WP_Query(array(
          'post_type' => 'pmc_timeline_item',
          'meta_key' => 'event_date',
          'orderby' => 'meta_value',
          'order' => 'ASC'
        ));
        while($posts_query->have_posts()) :
          $posts_query->the_post();
          ?>

          <div class="timeline-item row">
            <div class="post-box">
              <p class="date">
                <?php
                  $event_date = get_post_meta($posts_query->post->ID, 'event_date', true);

                  // format date according to length
                  switch (strlen($event_date)) {
                    case 4: // year only
                      echo $event_date;
                      break;
                    case 7: // year-month
                      echo date_i18n(_x('F Y', 'Pattern for YYYY-MM in timeline items', 'pmc'), strtotime($event_date));
                      break;
                    case 10: // year-month-day
                      echo date_i18n(_x('F j, Y', 'Pattern for YYYY-MM-DD in timeline items', 'pmc'), strtotime($event_date));
                      break;
                  }

                ?>
              </p>
              <div class="post-box-body">
                <?php the_post_thumbnail('timeline'); ?>
                <h3><?php the_title(); ?></h3>
                <p><?php the_content(); ?></p>
              </div>
            </div>
          </div>
          <?php
          wp_reset_postdata();
        endwhile;
      ?>
  <section>
</article>

<?php get_footer(); ?>
