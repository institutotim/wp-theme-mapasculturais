<?php
global $deliberaThemes;
get_header();
?>

<div id="nova-pauta">
	<header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <hr>
      </div>
    </div>
    <div class="container">
      <div class="eight columns">
        <div class="page-header-content has-icon no-text">
					<div class="row">
						<span class="page-icon">
	              <span class="fa fa-group"></span>
	            </span>
	          <h2>Novo tópico de discussão</h2>
					</div>
        </div>
      </div>
    </div>
	</header>
	<div id="content">
		<div class="container">
			<div class="eight columns offset-by-two">
				<?php
				// chama o formulário de nova pauta
				if(is_user_logged_in())
				include $deliberaThemes->themeFilePath('form-nova-pauta.php');
				?>
			</div>
	</div><!-- #content -->
</div><!-- #container -->

<?php get_footer(); ?>
