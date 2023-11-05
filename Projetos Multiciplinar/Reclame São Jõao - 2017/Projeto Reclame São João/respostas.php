<?php
	include 'controle/ReclamacoesDAO.php';
	$ReclamacoesDAO = new ReclamacoesDAO();
	
	include 'controle/RespostaReclamacaoDAO.php';
	$RespostaReclamacaoDAO = new RespostaReclamacaoDAO();
	$respostas = $RespostaReclamacaoDAO->listarADM();
?>

<script>
	function sendDataToFormEdit(...args) {
		$('#aprovar,#reprovar').val(args[0]);
		
		$('#resp_title').text(args[0]+' - '+args[1]);
		
		$('#nomeConsumidor').text(args[2]);
		$('#dataReclamacao').text(args[3]);
		$('#reclamacao').text(args[4]);
		
		$('#nomeEmpresa').text(args[5]);
		$('#dataResposta').text(args[6]);
		$('#resposta').text(args[7]);
		
		$("button[name='btnAprovar']").show();
		$("button[name='btnReprovar']").show();
		if (args[8] == '1') {
			$("button[name='btnAprovar']").hide();
		}else if (args[8] == '-1') {
			$("button[name='btnReprovar']").hide();
		}
		
		$('#img-consumidor').attr("src", args[9]);
		$('#img-estabelecimento').attr("src", args[10]);
	}
	
	function setLoading(btn) {
		$(btn).html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>');
	}
</script>

<div class="panel panel-default">
<div class="panel-heading"><span class="fa fa-reply" aria-hidden="true"></span> Respostas de Reclamações</div>
<div class="panel-body">
<table id="table" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Usuário</th>
			<th>Resposta</th>
			<th>Data</th>
			<th>Reclamação</th>
			<th>Status</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($respostas as $linha) {
				
				$imagem1 = (strpos($linha['FOTO_CONSUMIDOR'], 'images/foto_perfil') !== false) ? './'.$linha['FOTO_CONSUMIDOR'] : 'https://www.gravatar.com/avatar/'.(md5($linha['EMAIL_CONSUMIDOR'])).'?d=wavatar&f=y&s=40.jpg';
				$imagem2 = (strpos($linha['FOTO_ESTABELECIMENTO'], 'images/foto_perfil') !== false) ? './'.$linha['FOTO_ESTABELECIMENTO'] : 'https://www.gravatar.com/avatar/'.(md5($linha['EMAIL_ESTABELECIMENTO'])).'?d=wavatar&f=y&s=40.jpg';
				
				$dados = array(
						$linha['RER_ID'],
						$linha['REC_TITULO_RECLAMACAO'],
						$ReclamacoesDAO->obterNomeConsumidor($linha['CON_ID']),
						date("d/m/Y", strtotime($linha['REC_DATA_HORA'])),
						$linha['REC_DESCRICAO'],
						$ReclamacoesDAO->obterNomeEmpresa($linha['EST_ID']),
						date("d/m/Y", strtotime($linha['RER_DATA_HORA'])),
						$linha['RER_DESCRICAO'],
						$linha['RER_STATUS_APROVADO'],
						$imagem1,
						$imagem2
						
					);
				$dados = "'".implode("','", $dados)."'";
				
				?>
				<tr>
					<td><?php echo $linha['RER_ID']; ?></td>
					<td><?php echo $ReclamacoesDAO->obterNomeEmpresa($linha['EST_ID']); ?></td>
					<td><?php echo $linha['RER_DESCRICAO']; ?></td>
					<td><?php echo date("d/m/Y", strtotime($linha['RER_DATA_HORA'])); ?></td>
					<td><?php echo $linha['REC_TITULO_RECLAMACAO']; ?></td>
					<?php
						if ($linha['RER_STATUS_APROVADO'] == 1) echo "<td><span class='label label-default'>Aprovado</span></td>";
						elseif ($linha['RER_STATUS_APROVADO'] == 0) echo "<td><span class='label label-warning'>Pendente</span></td>";
						elseif ($linha['RER_STATUS_APROVADO'] == -1) echo "<td><span class='label label-danger'>Reprovado</span></td>";
					?>
					<td>
						<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#editar" onclick="sendDataToFormEdit(<?php echo ($dados) ?>)"><span class="fa fa-pencil" aria-hidden="true"></span></button>
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
				<h4 class="modal-title">Resposta #<span id="resp_title"></span></h4>
				<div class="btn-group pull-right">
					<form action="php/mod05/gerenciamento/RespostaReclamacao/Autorizacao.php" method="post">
						<input type="hidden" name="aprovar" id="aprovar">
						<button type="submit" name="btnAprovar" onclick="setLoading(this);" class="btn btn-success">Aprovar</button>

						<input type="hidden" name="reprovar" id="reprovar">
						<button type="submit" name="btnReprovar" onclick="setLoading(this);" class="btn btn-danger">Reprovar</button>
					</form>
				</div>
			</div>
			<div class="modal-body">
				
				<div class="reclamacao row" style="opacity: 0.5">
					<div class="col-md-1">
						<div class="thumbnail">
							<img id="img-consumidor" class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
						</div>
					</div>

					<div class="col-md-11">
						<div class="panel panel-default">
							<div class="panel-heading">
								<strong><span id="nomeConsumidor"></span></strong> <span id="dataReclamacao" class="text-muted pull-right"></span>
							</div>
							<div class="panel-body">
								<span id="reclamacao"></span>
							</div>
						</div>
					</div>
				</div>
				
				<div class="resposta row col-md-offset-1">
					<div class="col-md-1">
						<div class="thumbnail">
							<img id="img-estabelecimento" class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
						</div>
					</div>

					<div class="col-md-11">
						<div class="panel panel-default">
							<div class="panel-heading">
								<strong><span id="nomeEmpresa"></span></strong> <span id="dataResposta" class="text-muted pull-right"></span>
							</div>
							<div class="panel-body">
								<span id="resposta"></span>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			<!--<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Salvar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>-->
		</div>
	</div>
</div>

<style>


.thumbnail {
    padding:0px;
}
.panel {
	position:relative;
}
.panel>.panel-heading:after,.panel>.panel-heading:before{
	position:absolute;
	top:11px;left:-16px;
	right:100%;
	width:0;
	height:0;
	display:block;
	content:" ";
	border-color:transparent;
	border-style:solid solid outset;
	pointer-events:none;
}
.panel>.panel-heading:after{
	border-width:7px;
	border-right-color:#f7f7f7;
	margin-top:1px;
	margin-left:2px;
}
.panel>.panel-heading:before{
	border-right-color:#ddd;
	border-width:8px;
}
</style>