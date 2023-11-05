<?php
if (session_status() == PHP_SESSION_NONE) session_start();
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
	include 'controle/TiposReclamacaoDAO.php';
	include 'controle/TiposEstabelecimentosDAO.php';
	$tiposReclamacaoDAO = new TiposReclamacaoDAO();
	$registro = $tiposReclamacaoDAO->listar();
	$tiposEstabelecimentosDAO = new TiposEstabelecimentosDAO();
	$registro2 = $tiposEstabelecimentosDAO->listar();
?>
<script>
	function sendDataToForm(id,nome) {
		document.getElementById("inputIdRemover").value = id;
		document.getElementById("labelTituloRemover").innerHTML = nome+"("+id+")";
		document.getElementById("labelSpanRemover").innerHTML = nome+"("+id+")";
	}
	function sendDataToForm2(id,nome,tesname) {
		document.getElementById("inputIdEditar").value = id;
		document.getElementById("inputNomeEditar").value = nome;
		document.getElementById("labelTituloEditar").innerHTML = nome+"("+id+")";		
		document.getElementById("vincula").namedItem(tesname).selected=true;		
	}
</script>


<div class="panel panel-default">
<div class="panel-heading"><span class="fa fa-bookmark" aria-hidden="true"></span> Categorias > Tipos de Reclamações</div>
<div class="panel-body">
<div class="text-right"><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#add"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</button></div>
<table id="table" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Categoria</th>
			<th>Vinculado com Estabelecimento</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($registro as $linha) { ?>
		<tr>
			<td><?php echo $linha['TRC_ID'];?></td>
			<td><?php echo $linha['TRC_CATEGORIA'];?></td>
			<td><?php echo $linha['TES_CATEGORIA'];?></td>
			<td>
				<div class="btn-group">
					<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#editar" onclick='sendDataToForm2(<?php echo $linha["TRC_ID"];?>,"<?php echo $linha["TRC_CATEGORIA"];?>","<?php echo $linha["TES_CATEGORIA"] ;?>")'><span class="fa fa-pencil" aria-hidden="true"></span></button>
					<button type = "button" class = "btn btn-danger btn-xs" data-toggle = "modal" data-target = "#remover" onclick='sendDataToForm(<?php echo $linha['TRC_ID'];?>,"<?php echo $linha["TRC_CATEGORIA"];?>")'> <span class = "fa fa-remove" aria-hidden = "true"> </span></button>					
				</div>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>
</div>

<div id="editar" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Editar reclamação: <span id="labelTituloEditar"></span></h4>
			</div>
			<div class="modal-body">
				<form action="php/mod05/gerenciamento/TiposReclamacao/editarTiposReclamacao.php" method="post" data-toggle="validator" role="form">
					<input type="hidden" name="id" id="inputIdEditar">
					<ul class="list-group">
						<li class="list-group-item">
							Nome:
							<span class="pull-right">
								<div class="form-group">
									<input type="text" name="nome" class="form-control" id="inputNomeEditar" data-error="O campo não pode ficar em branco" required>
									<div class="help-block with-errors"></div>
								</div>
							</span>
						</li>
						<li class="list-group-item">
							Estabelecimento:
							<span class="pull-right">
								<div class="form-group">
									<select class="form-control" id="vincula"  name="estabelecimento" required>
										<?php foreach ($registro2 as $linha) { ?>
										<option name="<?php echo $linha['TES_CATEGORIA']; ?>" value="<?php echo $linha['TES_ID']; ?>"><?php echo $linha['TES_CATEGORIA']; ?></option>
										<?php } ?>	
									</select>
									<div class="help-block with-errors"></div>
								</div>
							</span>
						</li>
					</ul>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Salvar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
			</form>
		</div>
	</div>
</div>
<div id="remover" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Exclusão da Categoria: <span id="labelTituloRemover"></span></h4>
			</div>
			<form action="php/mod05/gerenciamento/TiposReclamacao/removerTiposReclamacao.php" method="post">
				<input type="hidden" name="id" id="inputIdRemover">
				<div class="modal-body">
					<p>Você tem certeza que deseja excluir a categoria: <span id="labelSpanRemover"></span> ?</p>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger">Confirmar</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div id="add" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Inserir nova categoria de reclamação</h4>
			</div>
			<div class="modal-body">
				<form action="php/mod05/gerenciamento/TiposReclamacao/inserirTiposReclamacao.php" method="post" data-toggle="validator" role="form">
					<div class="form-group">
						<label for="nome">Nome da nova reclamação:</label>
						<input type="nome" class="form-control" id="nome" name="nome" data-error="O campo não pode ficar em branco" required>
						<div class="help-block with-errors"></div>
					</div>
					<li class="list-group-item">
						Estabelecimento:
						<span class="pull-right">
							<div class="form-group">
								<select class="form-control" name="estabelecimento" required>
									<?php foreach ($registro2 as $linha) { ?>
									<option value="<?php echo $linha['TES_ID']; ?>"><?php echo $linha['TES_CATEGORIA']; ?></option>
									<?php } ?>	
								</select>
								<div class="help-block with-errors"></div>
							</div>
						</span>
					</li>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-default">Adicionar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			</div>
			</form>
		</div>
	</div>
</div>