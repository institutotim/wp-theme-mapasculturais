<footer id="colophon">
  <div class="container">
    <div class="eight columns">
      <nav id="footnav">
        <ul class="nav">
          <li>
            <a href="#">Sobre</a>
            <ul>
              <li><a href="#">Lorem ipsum</a></li>
              <li><a href="#">Dolor sit amet</a></li>
            </ul>
          </li>
          <li>
            <a href="<?php echo get_post_type_archive_link('pmc_timeline_item'); ?>">Linha do Tempo</a>
            <ul>
              <li><a href="#">Proin egestas</a></li>
              <li><a href="#">Mauris luctus lobortis</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Contato</a>
            <ul>
              <li><a href="#">Quisque accumsan</a></li>
              <li><a href="#">Vestibulum lorem</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Parceiros</a>
            <ul>
              <li><a href="#">Lorem ipsum</a></li>
              <li><a href="#">Dolor sit amet</a></li>
            </ul>
          </li>
          <li>
            <a href="<?php echo get_option('github_url') ?>">
              <span class="fa fa-github"></span>
              GitHub
            </a>
          </li>
        </ul>
      </nav>
      <hr/>
      <p class="credits">Software livre desenvolvido pelo <a href="http://institutotim.org.br/" target="_blank" title="Instituto TIM" rel="external"><img alt="Instituto TIM" src="<?php echo get_template_directory_uri(); ?>/img/institutotim.png" /></a>.</p>
    </div>
    <div class="four columns">
      <?php echo do_shortcode('[mc4wp_form]'); ?>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
