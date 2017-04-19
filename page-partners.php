<?php
/*
 * Template name: Partners
 */
?>
<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<article id="page-<?php the_ID(); ?>">
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <hr/>
      </div>
    </div>
    <div class="page-header-content">
      <div class="container">
        <div class="eight columns">
          <h2><?php the_title(); ?></h2>
          <div class="page-header-text connect-border connect-left">
            <p>Mapas Culturais foi criado em parceria com a Secretaria de Cultura do Município de São Paulo, o primeiro a adotar a plataforma, em 2014. Atualmente, a solução está em operação no Ministério da Cultura, em estados e municípios de todas as regiões do Brasil e até no exterior.</p>
          </div>
        </div>
      </div>
    </div>
  </header>
  <section id="content">
    <div class="container">
      <div class="twelve columns">
        <div class="partner-list">
          <?php
          $images = array(
            array(
              'g20.png',
              'g46.png'
            ),
            array(
              'g62.png',
              'g90.png',
              'g116.png'
            ),
            array(
              'g132.png',
              'g158.png'
            ),
            array(
              'g174.png'
            ),
            array(
              'g190.png',
              'g216.png'
            ),
            array(
              'g238.png',
              'g264.png',
              'g280.png'
            ),
            array(
              'g296.png',
              'g312.png',
              'g338.png'
            ),
            array(
              'g364.png',
              'g390.png'
            ),
            array(
              'g416.png',
              'g432.png',
              'g458.png'
            ),
            array(
              'g474.png'
            ),
            array(
              'g500.png',
              'g526.png',
              'g552.png'
            ),
            array(
              'g4723.png'
            )
          );
          foreach($images as $row) :
            ?>
            <div class="partner-row">
              <?php
              foreach($row as $img) :
                ?>
                <div class="partner-item">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/partners/<?php echo $img; ?>" />
                </div>
                <?php
              endforeach;
              ?>
            </div>
            <?php
          endforeach;
          ?>
        </div>
      </div>
    </div>
  <section>
</article>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
