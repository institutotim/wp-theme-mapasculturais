<?php get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<article id="page-<?php the_ID(); ?>">
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <hr/>
      </div>
    </div>
    <div class="container">
      <div class="eight columns">
        <div class="page-header-content no-text has-icon row">
          <span class="page-icon">
            <span class="fa fa-newspaper-o"></span>
          </span>

            <p class="over-title category">
              <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="area">Pauta</a>
              <span class="fa fa-chevron-right"></span>
              <?php $terms = get_the_terms( get_the_ID(), 'category' );
                if ( $terms && !is_wp_error( $terms ) ) :
                  foreach ( $terms as $term ) { ?>
                    <a href="<?php echo get_term_link($term->term_id); ?>" class="category">
                      <?php echo $term->name; ?>
                    </a>
            <?php } ?>
            <?php endif; ?>
          <h2><?php the_title(); ?></h2>
        </div>
      </div>
    </div>
  </header>

<?php

	$status_pauta = delibera_get_situacao($post->ID)->slug;

	global $DeliberaFlow;
	$flow = $DeliberaFlow->get(get_the_ID());

	$current_module = $DeliberaFlow->getCurrentModule(get_the_ID());

	$temas = wp_get_post_terms(get_the_ID(), 'tema');

?>

	<div class="pauta-content <?php echo $status_pauta; ?>">

		<div class="banner-ciclo status-ciclo">
			<h3>Estágio da pauta</h3>
			<ul class="ciclos"><?php
			$i = 1;
			foreach ($flow as $situacao)
			{
				switch($situacao)
				{
					case 'validacao':?>
					<li class="validacao <?php echo ($status_pauta != "validacao" ? "inactive" : ""); ?>"><?php echo $i; ?><br>Validação</li><?php
					break;
					case 'discussao': ?>
					<li class="discussao <?php echo ($status_pauta != "discussao" ? "inactive" : ""); ?>"><?php echo $i; ?><br>Discussão</li><?php
					break;
					case 'relatoria':
					case 'eleicao_relator': ?>
					<li class="relatoria <?php echo ($status_pauta != "relatoria" ? "inactive" : ""); ?>"><?php echo $i; ?><br>Relatoria</li><?php
					break;
					case 'emvotacao': ?>
					<li class="emvotacao <?php echo ($status_pauta != "emvotacao" ? "inactive" : ""); ?>"><?php echo $i; ?><br>Votação</li><?php
					break;
					case 'naovalidada':
					case 'comresolucao': ?>
					<li class="comresolucao <?php echo ($status_pauta != "comresolucao" && $status_pauta != "naovalidada" ? "inactive" : ""); ?>"><?php echo $i; ?><br>Resolução</li><?php
					break;
				}
				$i++;
			}?>
		</ul>
	</div>



  <section id="content">
    <div class="container">
      <div class="twelve columns">
        <div id="meta">
          <p class="author">
            <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
              <img src="<?php echo get_avatar_url(get_the_author_meta( 'ID' ), 30); ?>" />
              <?php the_author(); ?>
              </a>
          </p>
          <p class="tags">
            <span class="fa fa-tags"></span>
           <?php $terms = get_the_terms( get_the_ID(), 'category');
              if ( $terms && !is_wp_error( $terms ) ) :
                $aux = array();
                foreach ( $terms as $term ) {
                  $aux[] = '<a href="'.get_term_link($term->term_id).'" class="category">'.$term->name.'</a>';
                }
                endif; 
                echo join( ", ", $aux );
                ?>
          </p>
          <p class="date">
            <span class="fa fa-clock-o"></span>
            <?php the_date(); ?>
          </p>
          <p>
					<?php
						if ( \Delibera\Flow::getDeadlineDays( $post->ID ) <= -1 )
						_e( 'Prazo encerrado', 'delibera' );
						else
						printf( _n( 'Pauta aberta por mais 1 dia', 'Pauta aberta por mais %1$s dias', \Delibera\Flow::getDeadlineDays( $post->ID ), 'pmc' ), number_format_i18n( \Delibera\Flow::getDeadlineDays( $post->ID ) ) );
					?>
				  </p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="eight columns">
        <?php the_content(); ?>
	      <div>

	      	<button style="color:white; font-size: 20px" >
						<?php echo delibera_gerar_seguir($post->ID); ?>
					</button>


					<button style="color:white; font-size: 20px">
						<a title="Versão simplificada para impressão" href="?delibera_print=1" class=""><i style="color:white"class="delibera-icon-print"></i></a></button><!-- .entry-print -->

					<?php echo delibera_gerar_curtir($post->ID, 'pauta'); ?>
					<?php echo delibera_gerar_discordar($post->ID, 'pauta');?>

					<div class="entry-attachment">
					</div><!-- .entry-attachment -->

					<?php if (!empty($temas)) : ?>
						<ul class="meta meta-temas">
							<li class="delibera-tema-entry-title"><?php _e('Tema(as)', 'delibera'); ?>:</li>
							<?php $size = count($temas) - 1; ?>
							<?php foreach ($temas as $key => $tema) : ?>
							<li>
								<a href="<?php echo get_term_link($tema);?>"><?php echo $tema->name; ?></a>
								<?php echo ($key != $size) ? ',' : ''; ?>
							</li>
							<?php endforeach; ?>
					  </ul>
					 <?php endif; ?>


					<h6>
						<strong>
						 	<?php echo $current_module->getCommentListLabel(); ?> 		
						</strong>
					</h6>


					<?php
						comments_template( '', true );
					?>

					

      </div>
      <div class="three columns offset-by-one">
        <div id="sidebar" class="sidebar regular-sidebar connect-border connect-right">

         	<?php dynamic_sidebar('news-pmc') ?>
        </div>
      </div>
    </div>
  <section>
</article>
<?php endwhile; endif; ?>

<?php get_footer(); ?>