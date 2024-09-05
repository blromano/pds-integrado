<?php
	include 'controle/ReclamacoesDAO.php';
	$ReclamacoesDAO = new ReclamacoesDAO();
	$reclamacoes = $ReclamacoesDAO->listarTodos();
	
	include 'controle/TiposReclamacaoDAO.php';
	$tiposReclamacaoDAO = new TiposReclamacaoDAO();
	$tiposreclamacao = $tiposReclamacaoDAO->listar();
?>

<script>
	var inputs = ['rec_id', 'rec_titulo', 'con_id', 'est_id', 'rec_data', 'rec_desc', 'rec_nota'];
	function sendDataToFormEdit(...args) {
		document.getElementById("rec_id_title").innerHTML = args[0];
		$('#aprovar,#reprovar').val(args[0]);
		for (index = 0; index < inputs.length; ++index) {
			document.getElementById(inputs[index]).innerHTML = args[index];
		}
		$("button[name='btnAprovar']").show();
		$("button[name='btnReprovar']").show();
		if (args[7] == '1') {
			$("button[name='btnAprovar']").hide();
		}else if (args[7] == '-1') {
			$("button[name='btnReprovar']").hide();
		}
	}
	
	function setLoading(btn) {
		$(btn).html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>');
	}
	
</script>

<div class="panel panel-default">
<div class="panel-heading"><span class="fa fa-fire" aria-hidden="true"></span> Reclamações</div>
<div class="panel-body">
<table id="table" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Título</th>
			<th>Usuário</th>
			<th>Empresa alvo</th>
			<th>Data</th>
			<th>Status</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($reclamacoes as $linha) {
				$dados = array(
						$linha['REC_ID'],
						$linha['REC_TITULO_RECLAMACAO'],
						$ReclamacoesDAO->obterNomeConsumidor($linha['CON_ID']),
						$ReclamacoesDAO->obterNomeEmpresa($linha['EST_ID']),
						//$ReclamacoesDAO->obterTiposEstabelecimentoReclamacao($linha['TRC_ID']),
						date("d/m/Y", strtotime($linha['REC_DATA_HORA'])),$linha['REC_DESCRICAO'],
						$linha['REC_NOTA'],
						$linha['REC_APROVADO']
					);
				$dados = "'".implode("','", $dados)."'";
		?>
			<tr>
				<td><?php echo $linha['REC_ID']; ?></td>
				<td><?php echo $linha['REC_TITULO_RECLAMACAO']; ?></td>
				<td><?php echo $ReclamacoesDAO->obterNomeConsumidor($linha['CON_ID']); ?></td>
				<td><?php echo $ReclamacoesDAO->obterNomeEmpresa($linha['EST_ID']); ?></td>
				<td><?php echo date("d/m/Y", strtotime($linha['REC_DATA_HORA'])); ?></td>
				<?php
					if ($linha['REC_APROVADO'] == 1) echo "<td><span class='label label-default'>Aprovado</span></td>";
					elseif ($linha['REC_APROVADO'] == 0) echo "<td><span class='label label-warning'>Pendente</span></td>";
					elseif ($linha['REC_APROVADO'] == -1) echo "<td><span class='label label-danger'>Reprovado</span></td>";
				?>
				<td>
					<div class="btn-group">
						<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#editar" onclick="sendDataToFormEdit(<?php echo ($dados) ?>)"><span class="fa fa-pencil" aria-hidden="true"></span></button>
					</div>
				</td>
			</tr>
			
		<?php
			}
		?>
	</tbody>
</table>
</div>
</div>

<!-- Modal editar -->
<div id="editar" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Reclamação #<span id="rec_id_title"></span></h4>
				<div class="btn-group pull-right">
					<form action="php/mod05/gerenciamento/Reclamacoes/Autorizacao.php" method="post">
						<input type="hidden" name="aprovar" id="aprovar">
						<button type="submit" name="btnAprovar" onclick="setLoading(this);" class="btn btn-success">Aprovar</button>

						<input type="hidden" name="reprovar" id="reprovar">
						<button type="submit" name="btnReprovar" onclick="setLoading(this);" class="btn btn-danger">Reprovar</button>
					</form>
				</div>
			</div>
			<div class="modal-body">
				<form>
				<ul class="list-group">
					<li class="list-group-item">ID: <span class="pull-right" id="rec_id"></span></li>
					<li class="list-group-item">Título: <span class="pull-right" id="rec_titulo"></span></li>
					<li class="list-group-item">Usuário: <span class="pull-right" id="con_id"></span></li>
					<li class="list-group-item">Empresa alvo: <span class="pull-right" id="est_id"></span></li>
					<!--<li class="list-group-item">Tipo de reclamação: <span class="pull-right" id="trc_id"></span></li>-->
					<li class="list-group-item">Data: <span class="pull-right" id="rec_data"></span></li>
					<li class="list-group-item">Nota: <span class="pull-right" id="rec_nota"></span></li>
					<br><span>Reclamação:</span>
					<div class="well" id="rec_desc"></div>
				</ul>
				</form>
			</div>
		</div>
	</div>
</div>
