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
	$respondidas = $ContatoDAO->listarRespondidas();

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
</script>
<div class="panel panel-default">
<div class="panel-heading"><span class="fa fa-envelope" aria-hidden="true"></span> Mensagens > Respondidas</div>
<div class="panel-body">
<table id="table" class="table table-striped table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome Contato</th>
		<th>Remetente</th>
		<th>Assunto</th>
		<th>Resposta</th>
		<th>Data</th>
		<th>Ações</th>
      </tr>
    </thead>
    <tbody>
	
		<?php foreach ($respondidas as $linha) { 
			$dados = array(
				$linha['CNT_ID'],
				$linha['CNT_NOME'],
				$linha['CNT_EMAIL'],
				$linha['CNT_TITULO'],
				date("d/m/Y", strtotime($linha['CNT_DATA_HORA_RESPOSTA'])),
				$linha['CNT_RESPOSTA_ADM']
			);
			$dados = "'".implode("','", $dados)."'";
		?>
		<tr>
			<td><?php echo $linha['CNT_ID'];?></td>
			<td><?php echo $linha['CNT_NOME'];?></td>
			<td><?php echo $linha['CNT_EMAIL'];?></td>
			<td><?php echo $linha['CNT_TITULO'];?></td>
			<td><?php echo $linha['CNT_RESPOSTA_ADM'];?></td>
			<td><?php echo date("d/m/Y", strtotime($linha['CNT_DATA_HORA_RESPOSTA']));?></td>
			<td>
				<div class="btn-group">
					<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#visualizar" onclick="sendDataToFormView(<?php echo ($dados) ?>)"><span class="fa fa-eye" aria-hidden="true"></span></button>
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
				<h4 class="modal-title">Detalhes da Resposta de Contato #<span class="dado1"></span></h4>
			</div>
			<div class="modal-body">
				<ul class="list-group">
					<li class="list-group-item">ID: <span class="dado1 pull-right"></span></li>
					<li class="list-group-item">Nome Contato: <span id="dado2" class="pull-right"></span></li>
					<li class="list-group-item">Remetente: <span id="dado3" class="pull-right"></span></li>
					<li class="list-group-item">Assunto: <span id="dado4" class="pull-right"></span></li>
					<li class="list-group-item">Data: <span id="dado5" class="pull-right"></span></li>
					<br><span>Resposta:</span>
					<div class="well" id="dado6"></div>
				</ul>
			</div>
			<div class="modal-footer">
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
				<h4 class="modal-title">Exclusão da Resposda de Contato #4871</h4>
			</div>
			<div class="modal-body">
				<p>Você tem certeza que deseja excluir a mensagem de resposta de contato id: #4871 ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Confirmar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>
