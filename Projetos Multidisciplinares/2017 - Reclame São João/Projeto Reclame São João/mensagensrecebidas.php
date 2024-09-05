
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

	include 'controle/ContatoDAO.php';
	$ContatoDAO = new ContatoDAO();
	$contatos = $ContatoDAO->listarTudo();
        	

?>

<script>
	function sendDataToFormView(...args) {
		$('.dado1').text(args[0]);
		$('#dado2').text(args[1]);
		$('#dado3').text(args[2]);
		$('#dado4').text(args[3]);
		$('#dado5').text(args[4]);
		$('#dado6').text(args[5]);
	}
	
	function sendDataToFormResponder(...args) {
		$('.dado1').text(args[0]);
		$('#input1').val(args[0]);
		$('#input2').val(args[2]);
		$('#input3').val('RE: '+args[3]);
	}
</script>

<div class="panel panel-default">
<div class="panel-heading"><span class="fa fa-envelope" aria-hidden="true"></span> Mensagens > Recebidas</div>
<div class="panel-body">
<table id="table" class="table table-striped table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>E-mail</th>
		<th>Assunto</th>
		<th>Mensagem</th>
		<th>Data</th>
		<th>Status</th>
		<th>Ações</th>
      </tr>
    </thead>
    <tbody>
	
	<?php foreach ($contatos as $linha) { 
	
			$dados = array(
				$linha['CNT_ID'],
				$linha['CNT_NOME'],
				$linha['CNT_EMAIL'],
				$linha['CNT_TITULO'],
				date("d/m/Y", strtotime($linha['CNT_DATA_HORA_ENVIO'])),
				$linha['CNT_DESCRICAO']
			);
			$dados = "'".implode("','", $dados)."'";
		?>
	
		<tr>
			<td><?php echo $linha['CNT_ID'];?></td>
			<td><?php echo $linha['CNT_NOME'];?></td>
			<td><?php echo $linha['CNT_EMAIL'];?></td>
			<td><?php echo $linha['CNT_TITULO'];?></td>
			<td><?php echo $linha['CNT_DESCRICAO'];?></td>
			<td><?php echo date("d/m/Y", strtotime($linha['CNT_DATA_HORA_ENVIO']));?></td>
			<?php if ($linha['CNT_RESPONDIDO'] == 1) {?>
				<td><span class='label label-default'>Respondido</span></td>
			<?php }else{ ?>
				<td><span class='label label-warning'>Pendente</span></td>
			<?php } ?>
			<td>
				<div class="btn-group">
					<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#visualizar" onclick="sendDataToFormView(<?php echo ($dados) ?>)"><span class="fa fa-eye" aria-hidden="true"></span></button>
					<?php
						if ($linha['CNT_RESPONDIDO'] == 1) {?>
							<button type="button" class="btn btn-default btn-xs disabled"><span class="fa fa-reply" aria-hidden="true"></span></button>
						<?php }else{ ?>
							<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#responder" onclick="sendDataToFormResponder(<?php echo ($dados) ?>)"><span class="fa fa-reply" aria-hidden="true"></span></button>
						<?php } ?>
					<!--<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#remover"><span class="fa fa-remove" aria-hidden="true"></span></button>-->
				</div>
			</td>
		</tr>
	<?php } ?>
    </tbody>
  </table>
 </div>
</div>
  
  
 <div id="visualizar" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Detalhes do Contato #<span class="dado1"></span></h4>
			</div>
			<div class="modal-body">
				<ul class="list-group">
					<li class="list-group-item">ID: <span class="pull-right dado1"></span></li>
					<li class="list-group-item">Nome: <span id="dado2" class="pull-right"></span></li>
					<li class="list-group-item">E-mail: <span id="dado3" class="pull-right"></span></li>
					<li class="list-group-item">Assunto: <span id="dado4" class="pull-right"></span></li>
					<li class="list-group-item">Data: <span id="dado5" class="pull-right"></span></li>
					<br><span>Mensagem:</span>
					<div class="well" id="dado6"></div>
				</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<div id="responder" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Responder Mensagem de Contato #<span class="dado1"></span></h4>
			</div>
			<div class="modal-body">
				<form action="php/mod05/gerenciamento/Mensagens/responder.php" method="post">
				<ul class="list-group">
					<li class="list-group-item">ID de contato: <span class="pull-right"><input type="text" id="input1" name="cnt_id" class="form-control" readonly></span></li>
					<li class="list-group-item">Remetente: <span class="pull-right"><input type="text" id="input2" name="remetente" class="form-control"></span></li>
					<li class="list-group-item">Assunto: <span class="pull-right"><input type="text" id="input3" name="assunto" class="form-control"></span></li>
					<br><span>Resposta:</span>
					<div class="well"><textarea class="form-control" rows="3" name="resposta"></textarea></div>
				</ul>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Enviar</button>
				</form>
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<div id="remover" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Exclusão da Mensagem de Contato #4871</h4>
			</div>
			<div class="modal-body">
				<p>Você tem certeza que deseja excluir a mensagem de contato id: #4871 ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Confirmar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>
