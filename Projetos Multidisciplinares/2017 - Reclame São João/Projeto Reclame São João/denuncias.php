<?php
// session_start();
// echo $_SESSION['USU_EMAIL'];
include_once 'controle/Conexao.php';
include_once 'controle/UsuarioDAO.php';


$conn = new Conexao();
$dao = new UsuarioDAO();

if (isset($_SESSION['USU_EMAIL'])) {
    # code...
    // $dao->redirecionar($_SESSION['USU_EMAIL']);
    $tipo = $dao->verificarUsuario($_SESSION['USU_EMAIL']);

// echo $tipo;
    if ($tipo == 'est') {
        # code...
        header('Location: est_boas-vindas.php');
    }
    if ($tipo == 'adm') {
        # code...
        // header('Location: admin.php');
    }
    if ($tipo==="usr") {
        # code...
        header('Location: usu_paginaBoasVindasUsuario.php');
    }

}else{
    header('Location: usu_loginUsuario.php');

    // select * from usuarios;
}


	include 'controle/DenunciasDAO.php';
	$DenunciasDAO = new DenunciasDAO();
	$denuncias = $DenunciasDAO->listar();
	
	include 'controle/ReclamacoesDAO.php';
	$ReclamacoesDAO = new ReclamacoesDAO();
	$reclamacoes = $ReclamacoesDAO->listarTodos();

?>
<script>
	var elementsID = ['id', 'tipo', 'denunciado', 'denunciante', 'data', 'descricao'];
	function sendDataToFormView(...args) {
		for (index = 0; index < elementsID.length; ++index) {
			document.getElementById(elementsID[index]).innerHTML = args[index];
		}
		$('#denuncia-id').text(args[0]);
	}
	
	function modalPunicao(nome,id,des) {
		$('#usu_nome').text(nome);
		$('#nome').val(nome);
		$('#est_id').val(id);
		$('#des_id').val(des);
	}
</script>

<div class="panel panel-default">
<div class="panel-heading"><span class="fa fa-flag" aria-hidden="true"></span> Denúncias</div>
<div class="panel-body">
<table id="table" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tipo de Denúncia</th>
			<th>Descrição</th>
			<th>Denunciado</th>
			<th>Denunciante</th>
			<th>Data</th>
			<th>Status</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php

			foreach ($denuncias as $linha) {
				$dados = array(
						$linha['DES_ID'],
						$linha['DES_TIPO_DENUNCIA'],
						$ReclamacoesDAO->obterNomeEmpresa($linha['EST_ID']),
						$ReclamacoesDAO->obterNomeConsumidor($linha['CON_ID']),
						//$ReclamacoesDAO->obterTiposEstabelecimentoReclamacao($linha['TRC_ID']),
						date("d/m/Y", strtotime($linha['DES_DATA_HORA_DENUNCIA'])),
						$linha['DES_MOTIVO'],
					);
				$dados = "'".implode("','", $dados)."'";
				
				?>
				<tr>
					<td><?php echo $linha["DES_ID"];?></td>
					<td><?php echo $linha["DES_TIPO_DENUNCIA"];?></td>
					<td><?php echo $linha["DES_MOTIVO"];?></td>
					<td><?php echo $ReclamacoesDAO->obterNomeEmpresa($linha['EST_ID']);?></td>
					<td><?php echo $ReclamacoesDAO->obterNomeConsumidor($linha['CON_ID']);?></td>
					<td><?php echo date("d/m/Y",strtotime($linha["DES_DATA_HORA_DENUNCIA"]));?></td>
					<?php
					if ($linha["DES_STATUS_APROVADO"] == 1) echo "<td><span class='label label-success'>Resolvido</span></td>";
					elseif ($linha["DES_STATUS_APROVADO"] == 0) echo "<td><span class='label label-warning'>Pendente</span></td>";
					?>

					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#visualizar" onclick="sendDataToFormView(<?php echo ($dados) ?>)"><span class="fa fa-eye" aria-hidden="true"></span></button>
							<?php
								if ($linha['DES_STATUS_APROVADO'] == 1) {?>
									<button type="button" class="btn btn-default btn-xs disabled"><span class="fa fa-ban" aria-hidden="true"></span></button>
								<?php }else{ ?>
									<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#punir" onClick="modalPunicao(<?php echo "'".$ReclamacoesDAO->obterNomeEmpresa($linha['EST_ID'])."',".$linha['EST_ID'].",".$linha['DES_ID'] ?>);"><span class="fa fa-ban" aria-hidden="true"></span></button>
								<?php } ?>
							<!--<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#remover"><span class="fa fa-remove" aria-hidden="true"></span></button>-->
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

<div id="visualizar" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Visualizando informações da denúncia #<span id="denuncia-id">754</span></h4>
			</div>
			<div class="modal-body">
				<ul class="list-group">
					<li class="list-group-item">ID Denúncia: <span id="id" class="pull-right">754</span></li>
					<li class="list-group-item">Tipo de denúncia: <span id="tipo" class="pull-right">Linguagem imprópria</span></li>
					<li class="list-group-item">Denunciado: <span id="denunciado" class="pull-right">Rosangela</span></li>
					<li class="list-group-item">Denunciante: <span id="denunciante" class="pull-right">Birubiru</span></li>
					<li class="list-group-item">Data: <span id="data" class="pull-right">24/02/2017</span></li>
					<br><span>Descrição:</span>
					<div class="well" id="descricao" >texto texto texto texto...</div>
				</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<div id="punir" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Punição contra: <span id="usu_nome"></span></h4>
			</div>
			<div class="modal-body">
				<ul class="list-group">
					<form action="php/mod05/gerenciamento/Denuncias/punirUsuario.php" method="post" data-toggle="validator" role="form">
						<input type="hidden" name="est_id" id="est_id">
						<input type="hidden" name="des_id" id="des_id">
						<div class="form-group">
							<label for="user">Usuário:</label>
							<input type="text" class="form-control" name="nome" id="nome" required>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label for="ban">Dias de banimento:</label>
							<input type="number" class="form-control" name="dias" id="dias" required>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label for="motivo">Motivo:</label>
							<textarea class="form-control" rows="3" name="motivo" id="motivo" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
					
					
				</ul>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-danger">Punir</button>
				</form>
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<div id="recusardenuncia" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Punição contra: Birubiru</h4>
			</div>
			<div class="modal-body">
				<p>Você tem certeza que deseja recusar a denúncia e mudar seu estado para resolvido ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Confirmar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>