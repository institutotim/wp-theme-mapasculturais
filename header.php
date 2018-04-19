<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header id="masthead">
    <div class="container">
      <h1 class="link_tim">
        <a href="<?php echo home_url('/'); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Portal Mapas Culturais" />
          Portal Mapas Culturais
        </a>
      </h1>
      <nav class="headnav">
        <div class="search-input u-pull-right">
          <form method="get" id="searchform" action="<?php echo get_post_type_archive_link("post") ?>/">
              <label class="fa fa-search" for="search"></label>
              <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="search" type="text" placeholder="Busca..." />
          </form>
        </div>
        <?php wp_nav_menu(array(
          "theme_location" => "header",
          "menu_class" => "",
          "menu_id" => "",
          "container_class" => "u-pull-right",
          "container_id" => "mastnav"
          )
        );
        ?>
      </nav>
    </div>
  </header>
