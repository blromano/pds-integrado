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

<script>
	function sendDataToForm(id, nome) {                
	    document.getElementById("idup").value = id;
	    document.getElementById("nomeup").value = nome;
	    document.getElementById("tituloEditar").innerHTML = nome+"("+id+")";
	}
	
	function sendDataToFormdel(id,nome) {                
	    document.getElementById("delid").value = id;
	    document.getElementById("nomedel").innerHTML = nome;
	    document.getElementById("tituloEditardel").innerHTML = nome+"("+id+")";
	}
</script>
<?php
	include 'controle/TiposProdutoseServicoDAO.php';
	$TiposProdutoseServicoDAO = new TiposProdutoseServicoDAO();
	$registro = $TiposProdutoseServicoDAO->listar();
?>

<div class="panel panel-default">
<div class="panel-heading"><span class="fa fa-bookmark" aria-hidden="true"></span> Categorias > Tipos de Produtos/Serviços</div>
<div class="panel-body">
<div class="text-right"><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#add"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</button></div>
<table id="table" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Produto/Serviço</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($registro as $linha) { ?>
		<tr>
			<td><?php echo $x = $linha['TPR_ID']; ?></td>
			<td><?php echo $y = $linha['TPR_DESCRICAO']; ?></td>
			<td>
				<div class="btn-group">
					<button type="button" class="btn btn-default btn-xs"   data-toggle="modal" data-target="#editar" onclick='sendDataToForm(<?php echo $x;?>,"<?php echo $y;?>")'><span class="fa fa-pencil" aria-hidden="true"></span></button>
					<button type = "button" class = "btn btn-danger btn-xs" data-toggle = "modal" data-target = "#remover" onclick='sendDataToFormdel(<?php echo $x;?>,"<?php echo $y;?>")'> <span class = "fa fa-remove" aria-hidden = "true"> </span></button>
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
				<h4 class="modal-title">Editar informações da Categoria: <span id="tituloEditar"></span></h4>
			</div>
			<div class="modal-body">
				<form action = "php/mod05/gerenciamento/TiposProdutoseServico/update_TiposProdutoseServico.php" method = "post" data-toggle="validator" role="form" >
					<ul class="list-group">
						<li class="list-group-item">
							Nome:
							<span class="pull-right">
							<div class = "form-group" >
								<input type = "text" name = "nomeup" id="nomeup" class = "form-control" data-error="O campo não pode ficar em branco" required>
								<div class="help-block with-errors"></div>
								<input type = "hidden" name="idup" id="idup"/>
							</div>
							</span>
						</li>
					</ul>
			</div>
			<div class="modal-footer">
				<button type = "submit" class = "btn btn-success" > Salvar </button>
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
				<h4 class="modal-title">Exclusão do Produto/Serviço: <span id="tituloEditardel"></span></h4>
			</div>
			<div class="modal-body">
				<form action = "php/mod05/gerenciamento/TiposProdutoseServico/deleta_TiposProdutoseServico.php" method = "post" >
					<ul class = "list-group" >
						<li class = "list-group-item" >
							<p> Você tem certeza que deseja excluir o Produto/Serviço: <span  id="nomedel"></span></p>
						</li>
						<input type = "hidden" name="delid" id="delid"/>
					</ul>
			</div>
			<div class = "modal-footer" >
				<button type = "submit" class = "btn btn-danger"  > Confirmar </button>
				<button type = "button" class = "btn btn-default" data-dismiss = "modal" > Cancelar </button>
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
				<h4 class="modal-title">Inserção de categoria de Produto / Serviço</h4>
			</div>
			<div class="modal-body">
				<form action = "php/mod05/gerenciamento/TiposProdutoseServico/add_TiposProdutoseServico.php" method = "post" data-toggle="validator" role="form" >
					<div class="form-group">
						<label for = "nome" >  Nome do novo Produto / Serviço: </label>
						<input type = "nome" class = "form-control" id = "nomeadd" name = "nomeadd" data-error="O campo não pode ficar em branco" required >
						<div class="help-block with-errors"></div>
					</div>
			</div>
			<div class = "modal-footer" >
				<button type = "submit" class = "btn btn-default" > Adicionar </button>
				<button type = "button" class = "btn btn-default" data-dismiss = "modal" > Cancelar </button>
			</div>
				</form>
		</div>
	</div>
</div>