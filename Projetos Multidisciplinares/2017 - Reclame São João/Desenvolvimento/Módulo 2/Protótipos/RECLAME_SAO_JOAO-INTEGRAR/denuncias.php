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

?>

<?php
	$respostas = array(
		array("Linguagem imprópria", "texto texto texto texto...", "Sempre vale",  "./reclamacao/240", "22/04/2017", 0),
		array("Qualificação maliciosa", "texto texto texto texto...", "Rosangela", "./reclamacao/240", "22/04/2017", 1),
		array("Spam", "texto texto texto texto...", "Rosangela", "./reclamacao/240", "22/04/2017", 0),
	);
?>
<table id="table" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tipo de Denúncia</th>
			<th>Descrição</th>
			<th>Denunciado</th>
			<th>Link</th>
			<th>Data</th>
			<th>Status</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php
			for ($x = 0; $x <= 25; $x++) {
				$random = rand(0,count($respostas)-1);
				echo "<tr>";
					echo "<td>$x</td>";
					echo "<td>".$respostas[$random][0]."</td>";
					echo "<td>".$respostas[$random][1]."</td>";
					echo "<td>".$respostas[$random][2]."</td>";
					echo "<td><a href='".$respostas[$random][3]."'>".$respostas[$random][3]."</a></td>";
					echo "<td>".$respostas[$random][4]."</td>";
					if ($respostas[$random][5] == 1) echo "<td><span class='label label-success'>Resolvido</span></td>";
					elseif ($respostas[$random][5] == 0) echo "<td><span class='label label-warning'>Pendente</span></td>";
					?>
					<td>
						<div class="dropdown">
						  <span style="cursor:pointer" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i> Gerenciamento
						  <span class="caret"></span></span>
						  <ul class="dropdown-menu">
							<li><a href="#" data-toggle="modal" data-target="#visualizar"><span class="fa fa-eye" aria-hidden="true"></span> Visualizar</a></li>
							<li><a href="#" data-toggle="modal" data-target="#punir"><span class="fa fa-ban" aria-hidden="true"></span> Punir Usuário</a></li>
							<li <?php if ($respostas[$random][5] == 1) echo 'class="disabled"'; ?>><a href="#" data-toggle="modal" data-target="#recusardenuncia"><span class="fa fa-check" aria-hidden="true"></span> Recusar Denúncia</a></li>
							<li <?php if ($respostas[$random][5] == 1) echo 'class="disabled"'; ?>><a href="#" data-toggle="modal" data-target="#publicar"><span class="fa fa-thumbs-o-up" aria-hidden="true"></span> Resolvido</a></li>
							<li><a href="#" data-toggle="modal" data-target="#remover"><span class="fa fa-remove" aria-hidden="true"></span> Remover</a></li>
						  </ul>
						</div>
					</td>
					<?php
				echo "</tr>";
			}
		?>
	</tbody>
</table>

<div id="visualizar" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Visualizando informações da denúncia #754</h4>
			</div>
			<div class="modal-body">
				<ul class="list-group">
					<li class="list-group-item">ID Denúncia: <span class="pull-right">754</span></li>
					<li class="list-group-item">Tipo de denúncia: <span class="pull-right">Linguagem imprópria</span></li>
					<li class="list-group-item">Denunciado: <span class="pull-right">Rosangela</span></li>
					<li class="list-group-item">Denunciante: <span class="pull-right">Birubiru</span></li>
					<li class="list-group-item">Link: <span class="pull-right"><a href="./reclamacao/240">reclamacao/240</a></span></li>
					<li class="list-group-item">Data: <span class="pull-right">24/02/2017</span></li>
					<br><span>Descrição:</span>
					<div class="well">texto texto texto texto...</div>
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
				<h4 class="modal-title">Punição contra: Birubiru</h4>
			</div>
			<div class="modal-body">
				<ul class="list-group">
					<form>
						<div class="form-group">
							<label for="user">Usuário:</label>
							<input type="text" class="form-control" id="user" value="Birubiru">
						</div>
						<div class="form-group">
							<label for="ban">Dias de banimento:</label>
							<input type="number" class="form-control" id="ban" value="20">
						</div>
						<div class="form-group">
							<label for="motivo">Motivo:</label>
							<textarea class="form-control" rows="3" id="motivo">texto texto texto texto..</textarea>
						</div>
					
					</form>
				</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Punir</button>
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