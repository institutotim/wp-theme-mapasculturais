<footer id="colophon">
  <div class="container">
    <div class="eight columns">
      <nav id="footnav">
          <?php wp_nav_menu(array(
            "theme_location" => "footer",
            "menu_class" => "nav",
            "menu_id" => "",
            "container_class" => "",
            "container_id" => ""
            )
          ); 
          ?>
      </nav>
      <hr/>
      <p class="credits">Software livre desenvolvido pelo <a href="http://institutotim.org.br/" target="_blank" title="Instituto TIM" rel="external"><img width="100" alt="Instituto TIM" src="<?php echo get_template_directory_uri(); ?>/img/institutotim.png" /></a></p>
    </div>
    <div class="four columns">
      <?php echo do_shortcode('[mc4wp_form]'); ?>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
