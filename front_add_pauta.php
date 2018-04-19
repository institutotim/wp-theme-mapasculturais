<?php
/*
 * Template name: Add Pauta via Front
 */
?>

<?php

if (isset( $_POST['submitted'] ) && isset( $_POST['_wpnonce'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'delibera_nova_pauta' ) && is_user_logged_in()){

	// base info

	$title = $_POST['title'];
	$excerpt = $_POST['description'];
	$content = $_POST['content'];

	$pauta = array();
	$pauta['post_title'] = $title;
	$pauta['post_excerpt'] = $excerpt;
	$pauta['post_content'] = $content;
	$pauta['post_type'] = 'pauta';
	$pauta['post_status'] = 'publish';
	$pauta['post_author'] = get_current_user_id();

	// temas

	if (is_array($_POST["tema"])) {
		$pauta['tax_input'] = array();
		$pauta['tax_input']['tema'] = $_POST["tema"];
	}

	// metas

	// $pauta['meta_input'] = array();
	//
	// $deadline_validation = date("d/m/Y", strtotime($_POST['deadline_validation']));
	// $deadline_discussion = date("d/m/Y", strtotime($_POST['deadline_discussion']));
	// $deadline_report = date("d/m/Y", strtotime($_POST['deadline_report']));
	// $deadline_voting = date("d/m/Y", strtotime($_POST['deadline_voting']));
	//
	// $pauta['meta_input']['prazo_validacao'] = $deadline_validation;
	// $pauta['meta_input']['prazo_discussao'] = $deadline_discussion;
	// $pauta['meta_input']['prazo_relatoria'] = $deadline_report;
	// $pauta['meta_input']['prazo_votacao'] = $deadline_voting;
	//
	//
	// $pauta['meta_input']['tipo_votacao'] = $_POST['votation_type'];
	//
	// $pauta['meta_input']['discussion_type'] = $_POST['discussion_type'];
	//
	// $pauta['meta_input']['delibera_flow'] = $_POST['flow'];
	//
	// if (intval($_POST['min_validations']) != 0){
	// 	$pauta['meta_input']['min_validacoes'] = intval($_POST['min_validations']);
	// } else {
	// 	// add error "Valor não pode ser zero ou caracteres, deve ser um valor numerico."
	// }
	//
	// $pauta['meta_input']['delibera_validation_show_rejeitar'] = $_POST['show_reject'] == "S"? "S": "N";
	//
	// $pauta['meta_input']['delibera_validation_show_abstencao'] = $_POST['show_abstention'] == "S"? "S": "N";
	//
	// $pauta['meta_input']['delibera_validation_show_comment'] = $_POST['show_comment'] == "S"? "S": "N";
	//
	// $pauta['meta_input']['delibera_show_default_comment_form'] = $_POST['enable_any_comment'] == "S"? "S": "N";
	//
	// $pauta['meta_input']['show_based_proposals'] = $_POST['show_based_proposals'] == "S"? "S": "N";


	//$pauta['meta_input']['prazo_eleicao_relator'] = ... (parece que não é algo necessário, parece que é baseado na ultima data de)
	// ["prazo_eleicao_relator"]=> array(1) { [0]=> string(10) "11/02/2018" }

	// TODO: add attachment

	// ...

	$pauta_id = wp_insert_post($pauta);

	if ($pauta_id) {
		wp_set_post_terms( $pauta_id, 'validacao', 'situacao');
		wp_redirect(get_permalink( $pauta_id ));
  	die;
	} else {
		var_dump("Erro!");
	}

}

?>

<?php get_header(); ?>

<div id="add-pauta">
	<header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <hr>
      </div>
    </div>
    <div class="container">
      <div class="eight columns">
        <div class="page-header-content has-icon no-text row">
					<span class="page-icon">
            <span class="fa fa-group"></span>
          </span>
					<p class="over-title">
						<a href="<?php echo home_url("/comunidade"); ?>" class="area">Comunidade</a>
					</p>
          <h2>Novo tópico de discussão</h2>
					<p class="page-description">Participe do debate do Mapas Culturais</p>
        </div>
      </div>
    </div>
  </header>
	<section class="page-content">
		<div class="container">
			<div class="row">
			<form id="new_pauta" name="new_pauta" method="post">
		  	<div class="eight columns offset-by-two">
					<?php wp_nonce_field('delibera_nova_pauta'); ?>

					<div class="add-pauta-step" data-step="1">

						<div class="pauta-item row">
							<div class="twelve columns">
								<h4 for="nova-pauta-resumo"><label for="nova-pauta-titulo"><?php _e( 'Título da pauta', 'delibera' ); ?></label></h4>
								<input style="width: 100%" type="text" name="title" id="nova-pauta-titulo" value="<?php echo htmlentities($titulo) ?>" placeholder="<?php _e( 'Digite o título da pauta aqui', 'delibera' ); ?>" required />
							</div>
						</div>

						<div class="pauta-item row">
							<h4 for="nova-pauta-resumo"><label for="nova-pauta-resumo"><?php _e( 'Resumo da pauta', 'delibera' ); ?></label></h4>
							<textarea style="width: 100%;height: 150px;" name="description" id="nova-pauta-resumo" placeholder="Digite o resumo da pauta aqui..." required><?php echo htmlentities($resumo) ?></textarea>
						</div>

					</div>

					<div class="add-pauta-step" data-step="2">


						<div class="pauta-item row">
							<?php $temas = get_terms('tema', array('hide_empty' => false)); ?>
							<h4><?php _e("Temas", 'pmc') ?>:</h4>
								<?php foreach($temas as $tema): ?>
									<label><input type="checkbox" name="tema[]" value="<?php echo $tema->term_id; ?>" /> <?php echo $tema->name ?></label>
								<?php endforeach; ?>
						</div>

						<div class="pauta-item row">
							<h4>Descrição detalhada</h4>
							<?php wp_editor($conteudo, 'content'); ?>
						</div>

						<div class="pauta-item row">
							<label>Adicionar anexo em PDF</label>
							<input type="file" name="file" id="file"  multiple="false" />
						</div>

					</div>
					<?php
					/*
					<div class="add-pauta-step" data-step="2">

						<div class="pauta-item row">
							<p><label>Flow</label></p>
							<div class="sort-container">
		            <div class="sort-item">
		            	<div class="input-group">
		                <input type="hidden" class="sort-order-value" id="form-field-0-sort-order" name="flow[]" value="validacao">
		               <input class="form-control" type="text" id="form-field-0" name="form-field[]" value="Validação" disabled=""><div class="input-group-addon dragdrop-handle"><span class="glyphicon glyphicon-move"></span></div>
		             </div>
		            </div>

		            <div class="sort-item">
		            	<div class="input-group">
		                <input type="hidden" class="sort-order-value" id="form-field-1-sort-order" name="flow[]" value="discussao">
		               <input class="form-control" type="text" id="form-field-1" name="form-field[]" value="Discussão" disabled=""><div class="input-group-addon dragdrop-handle"><span class="glyphicon glyphicon-move"></span></div>
		             </div>
		            </div>

		            <div class="sort-item">
		            	<div class="input-group">
		                <input type="hidden" class="sort-order-value" id="form-field-2-sort-order" name="flow[]" value="relatoria">
		               <input class="form-control" type="text" id="form-field-2" name="form-field[]" value="Relatoria" disabled=""><div class="input-group-addon dragdrop-handle"><span class="glyphicon glyphicon-move"></span></div>
		             </div>
		            </div>

		            <div class="sort-item">
		            	<div class="input-group">
		                <input type="hidden" class="sort-order-value" id="form-field-3-sort-order" name="flow[]" value="emvotacao">
		               <input class="form-control" type="text" id="form-field-3" name="form-field[]" value="Em votação" disabled=""><div class="input-group-addon dragdrop-handle"><span class="glyphicon glyphicon-move"></span></div>
		             </div>
		            </div>

		            <div class="sort-item">
		            	<div class="input-group">
		                <input type="hidden" class="sort-order-value" id="form-field-4-sort-order" name="flow[]" value="comresolucao">
		               <input class="form-control" type="text" id="form-field-4" name="form-field[]" value="Com resolução" disabled=""><div class="input-group-addon dragdrop-handle"><span class="glyphicon glyphicon-move"></span></div>
		             </div>
		            </div>
							</div>
						</div>
					</div>
					<div class="add-pauta-step" data-step="3">
						<h3>Configurações</h3>

						<div class="pauta-item">
							<h4>Proposta de Pauta</h4>
							<div class="pauta-subitem">
								<label>Prazo para validação</label>
								<input type="date" name="deadline_validation">
								<label>Mínimo de Validações:</label>
								<input type="text" name="min_validations">

								<label>
									 <input value="S" name="show_reject" type="checkbox"> Mostrar opção para rejeitar Pauta
								</label>

								<label>
									 <input value="S" name="show_abstention" type="checkbox"> Mostrar opção para absteção sobre a Pauta
								</label>

								<label>
									 <input value="S" name="show_comment" type="checkbox"> Mostrar campo para comentário durante a validação
								</label>
							</div>
						</div>

						<div class="pauta-item">
							<h4>Pauta em discussão</h4>
							<div class="pauta-subitem">
								<label>Prazo para Discussões</label>
								<input type="date" name="deadline_discussion">

								<label>Tipo da discussão</label>

								<select name="discussion_type">
									<option value="forum">Formato de fórum</option>
									<option value="side">Por parágrafo</option>
								</select>

								<label>
									 <input value="S" name="enable_any_comment" type="checkbox"> Permitir comentários gerais?
								</label>
							</div>
						</div>

						<div class="pauta-item">
							<h4>Regime de Votação</h4>
							<div class="pauta-subitem">
								<label>Prazo para votações</label>
								<input type="date" name="deadline_voting">
								<div class="row">
									<label><input type="radio" name="votation_type" value="checkbox"> Multipla escolha</label>
									<label><input type="radio" name="votation_type" value="radio"> Opção única</label>
									<label><input type="radio" name="votation_type" value="pairwise"> Pairwise</label>
									<label>
										<input value="S" name="show_based_proposals" type="checkbox"> Votar em propostas que tiveram outras propostas derivadas?
									</label>
								</div>
							</div>
						</div>

						<div class="pauta-item">
							<h4>Relatoria</h4>
							<div class="pauta-subitem">
								<label>Prazo para relatoria</label>
								<input type="date" name="deadline_report">
							</div>
						</div>

					</div>
					*/
					?>
					<input type="hidden" name="submitted" id="submitted" value="true" />
					<div class="add-pauta-buttons row">
						<a class="button add-pauta-prev" href="#">Etapa anterior</a>
						<a class="button add-pauta-next" href="#">Próxima etapa</a>
						<input class="button button-primary add-pauta-create" type="submit" value="<?php _e( 'Criar tópico de discussão', 'delibera' ); ?>"/>
					</div>
				</div>
		  </form>
			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>
