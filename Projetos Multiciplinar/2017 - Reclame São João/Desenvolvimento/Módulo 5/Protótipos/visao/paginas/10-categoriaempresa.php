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
	include '../controle/TiposEstabelecimentosDAO.php';
	$TiposEstabelecimentosDAO = new TiposEstabelecimentosDAO();
	$registro = $TiposEstabelecimentosDAO->listar();
?>
<div class="text-right"><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#add"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</button></div>
<table id="table" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Categoria</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($registro as $linha) { ?>
		<tr>
			<td><?php echo $x = $linha['TES_ID']; ?></td>
			<td><?php echo $y = $linha['TES_CATEGORIA']; ?></td>
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
<div id = "editar" class = "modal fade" role = "dialog" >
	<div class = "modal-dialog" >
		<div class = "modal-content" >
			<div class = "modal-header" >
				<button type = "button" class = "close" data-dismiss = "modal" > &times; </button>
				<h4 class = "modal-title" > Editar informações da Categoria: <span id="tituloEditar"></span></h4>
			</div>
			<div class = "modal-body" >
				<form action = "paginas/gerenciamento/TiposEstabelecimento/update_TiposEstabelecimento.php" method = "post" data-toggle="validator" role="form">
					<ul class = "list-group" >
						<li class = "list-group-item" > Nome: 
							<span class = "pull-right"> 
							<div class = "form-group" >
								<input type = "text" name = "nomeup" id="nomeup" class = "form-control" data-error="O campo não pode ficar em branco" required>
								<div class="help-block with-errors"></div>
							</div>
							</span>
						</li >
						<input type="hidden" name="idup" id="idup"/>
					</ul>
			</div>
			<div class = "modal-footer" >
				<button type = "submit" class = "btn btn-success" > Salvar </button>
				<button type = "button" class = "btn btn-default" data-dismiss = "modal" > Fechar </button>
			</div>
				</form>
		</div>
	</div>
</div>
<div id = "remover" class = "modal fade" role = "dialog" >
	<div class = "modal-dialog" >
		<div class = "modal-content" >
			<div class = "modal-header" >
				<button type = "button" class = "close" data-dismiss = "modal" >&times;</button>
				<h4 class = "modal-title" > Exclusão da Categoria: <span id="tituloEditardel"></span></h4>
			</div>
			<div class = "modal-body" >
				<form action = "paginas/gerenciamento/TiposEstabelecimento/deleta_TiposEstabelecimento.php" method = "post" >
					<ul class = "list-group" >
						<li class = "list-group-item" >
							<p> Você tem certeza que deseja excluir a categoria: <span  id="nomedel"></span></p>
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
<div id = "add" class = "modal fade" role = "dialog">
	<div class = "modal-dialog" >
		<div class = "modal-content" >
			<div class = "modal-header" >
				<button type = "button" class = "close" data-dismiss = "modal" > &times; </button>
				<h4 class = "modal-title" > Inserção de categoria de estabelecimento </h4>
			</div>
			<div class = "modal-body" >
				<form action = "paginas/gerenciamento/TiposEstabelecimento/add_TiposEstabelecimento.php" method = "post" data-toggle="validator" role="form" >
					<div class = "form-group" >
						<label for = "nome" > Nome da nova categoria: </label>
						<input type = "nome" class = "form-control" id = "nomeadd" name = "nomeadd" data-error="O campo não pode ficar em branco" required>
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