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

	$pauta['meta_input'] = array();

	$deadline_validation = date("d/m/Y", strtotime($_POST['deadline_validation']));
	$deadline_discussion = date("d/m/Y", strtotime($_POST['deadline_discussion']));
	$deadline_report = date("d/m/Y", strtotime($_POST['deadline_report']));
	$deadline_voting = date("d/m/Y", strtotime($_POST['deadline_voting']));

	$pauta['meta_input']['prazo_validacao'] = $deadline_validation;
	$pauta['meta_input']['prazo_discussao'] = $deadline_discussion;
	$pauta['meta_input']['prazo_relatoria'] = $deadline_report;
	$pauta['meta_input']['prazo_votacao'] = $deadline_voting;


	$pauta['meta_input']['tipo_votacao'] = $_POST['votation_type'];

	$pauta['meta_input']['discussion_type'] = $_POST['discussion_type'];

	$pauta['meta_input']['delibera_flow'] = $_POST['flow'];

	if (intval($_POST['min_validations']) != 0){
		$pauta['meta_input']['min_validacoes'] = intval($_POST['min_validations']);
	} else {
		// add error "Valor não pode ser zero ou caracteres, deve ser um valor numerico."
	}

	$pauta['meta_input']['delibera_validation_show_rejeitar'] = $_POST['show_reject'] == "S"? "S": "N";

	$pauta['meta_input']['delibera_validation_show_abstencao'] = $_POST['show_abstention'] == "S"? "S": "N";

	$pauta['meta_input']['delibera_validation_show_comment'] = $_POST['show_comment'] == "S"? "S": "N";

	$pauta['meta_input']['delibera_show_default_comment_form'] = $_POST['enable_any_comment'] == "S"? "S": "N";

	$pauta['meta_input']['show_based_proposals'] = $_POST['show_based_proposals'] == "S"? "S": "N";


	//$pauta['meta_input']['prazo_eleicao_relator'] = ... (parece que não é algo necessário, parece que é baseado na ultima data de)
	// ["prazo_eleicao_relator"]=> array(1) { [0]=> string(10) "11/02/2018" } 

	// TODO: add attachment

	// ...

	$pauta_id = wp_insert_post($pauta);

	if ($pauta_id) {
		wp_redirect(get_permalink( $pauta_id ));
  	die;
	} else {
		var_dump("Erro!");
	}

}

?>



<?php get_header(); ?>

<div class="container">
	<form id="new_pauta" name="new_pauta" method="post">
  	<div class="eight columns">
			<?php wp_nonce_field('delibera_nova_pauta'); ?>

			<div class="row">

				<div class="twelve columns">
					<p>
						<h4 for="nova-pauta-resumo"><?php _e( 'Título da pauta', 'delibera' ); ?></h4>
						<input style="width: 100%" type="text" name="title" id="nova-pauta-titulo" value="<?php echo htmlentities($titulo) ?>" placeholder="<?php _e( 'Digite o título da pauta aqui', 'delibera' ); ?>"/>
					</p>
				</div>

				<div class="three columns">

					<p>
						<label>File</label>
						<input type="file" name="file" id="file"  multiple="false" />
					</p>
				</div>

				<div class="three columns offset-by-three">
					<p>

						<label>Flow</label>

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
					</p>
				</div>

			</div>

			<p>
				<h4 for="nova-pauta-resumo"><?php _e( 'Resumo da pauta', 'delibera' ); ?></h4>
				<textarea style="width: 100%" name="description" id="nova-pauta-resumo"><?php echo htmlentities($resumo) ?></textarea>
			</p>


			<p>
				<?php wp_editor($conteudo, 'content'); ?>
			</p>


	  </div>
	  <div class="three columns offset-by-one">
	    <div id="sidebar" class="sidebar regular-sidebar connect-border connect-right">

	    	<h3>Configurações</h3>

				<p>
					<?php $temas = get_terms('tema', array('hide_empty' => true)); ?>
					<h4><?php _e("Temas", 'pmc') ?>:</h4>
						<?php foreach($temas as $tema): ?>
							<label><input type="checkbox" name="tema[]" value="<?php echo $tema->term_id; ?>" /> <?php echo $tema->name ?></label>
						<?php endforeach; ?>
				</p>

				<hr>

				<p>
					<h4>Proposta de Pauta</h4>
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
				</p>

				<hr>


				<p>
					<h4>Pauta em discussão</h4>
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

				</p>

				<hr>

				<p>
					<h4>Relatoria</h4>
					<label>Prazo para relatoria</label>
					<input type="date" name="deadline_report">
				</p>

				

				<p>
					<h4>Regime de Votação</h4>
					<label>Prazo para votações</label>
					<input type="date" name="deadline_voting">
				</p>

				<input type="radio" name="votation_type" value="checkbox"> Multipla escolha<br>
			  <input type="radio" name="votation_type" value="radio"> Opção única<br>
			  <input type="radio" name="votation_type" value="pairwise"> Pairwise

			  <label>
			     <input value="S" name="show_based_proposals" type="checkbox"> Votar em propostas que tiveram outras propostas derivadas?
			  </label>

			  <hr>

				<input type="hidden" name="submitted" id="submitted" value="true" />
				<input type="submit" value="<?php _e( 'Criar pauta', 'delibera' ); ?>"/>

	    </div>
	  </div>
  </form>
</div>

<?php get_footer(); ?>