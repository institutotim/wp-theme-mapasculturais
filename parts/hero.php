<section id="hero" class="page-header full-height">
  <a class="scroll-down" href="#">
    <span class="fa fa-chevron-down"></span>
  </a>
  <div class="canvas"></div>
  <div class="container">
    <div class="twelve columns">
      <hr/>
    </div>
  </div>
  <div class="page-header-content">
    <div class="container">
      <div class="seven columns">
        <div class="intro-text">
          <h2>Mapas Culturais</h2>
          <p class="big"><?php echo get_post_meta(get_the_ID(), 'introduction_text', true); ?></p>
          <p class="connect-border connect-left buttons">
            <a class="button" href="<?php get_support_link() ?>">
              <span class="fa fa-wrench"></span>
              Suporte
            </a>
            <a class="button button-primary" href="<?php echo get_option('know') ?>">
              <span class="fa fa-star"></span>
              Saiba mais
            </a>
          </p>
        </div>
      </div>
      <div class="five columns">
        <div class="network full-height connect-border connect-right">
          <div class="intro-numbers row">
            <p class="number do-count">
              <?php
                $instances = get_users('role=instance');
                echo count($instances);
              ?>
            </p>
            <p class="number-label">plataformas <span>na rede</span></p>
          </div>
          <a href="<?php get_instances_link() ?>">Conheça as instalações</a>
        </div>
      </div>
    </div>
  </div>
</section>
