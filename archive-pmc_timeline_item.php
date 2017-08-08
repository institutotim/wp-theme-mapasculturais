<?php
/*
 * Template name: Timeline
 */

// format date according to length
function formatTimelineDate($date) {
 switch (strlen($date)) {
   case 4: // year only
     return $date;
     break;
   case 7: // year-month
     return date_i18n(_x('F Y', 'Pattern for YYYY-MM in timeline items', 'pmc'), strtotime($date));
     break;
   case 10: // year-month-day
     return date_i18n(_x('F j, Y', 'Pattern for YYYY-MM-DD in timeline items', 'pmc'), strtotime($date));
     break;
 }
}

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

        while(have_posts()) :
          the_post();
          ?>

          <div class="timeline-item row">
            <div class="post-box">
              <p class="date">
                <?php
                  $start_date = get_post_meta(get_the_ID(), 'start_date', true);
                  $finish_date = get_post_meta(get_the_ID(), 'finish_date', true);

                  echo formatTimelineDate($start_date);

                  // display finish_date if defined
                  if ( ! empty( $finish_date ) ) {
                    echo '&nbsp' . _x('to', 'Conjunction for timeline periods', 'pmc') . '&nbsp';
                    echo '<br />';
                    echo formatTimelineDate($finish_date);
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
