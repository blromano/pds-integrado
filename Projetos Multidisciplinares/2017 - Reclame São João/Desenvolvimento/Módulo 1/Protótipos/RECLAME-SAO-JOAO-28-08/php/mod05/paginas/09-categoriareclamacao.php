<?php
	include '../controle/TiposReclamacaoDAO.php';
	$tiposReclamacaoDAO = new TiposReclamacaoDAO();
	$registro = $tiposReclamacaoDAO->listar();
?>
<script>
	function sendDataToForm(id,nome,index) {
		document.getElementById("inputIdRemover").value = id;
		document.getElementById("labelTituloRemover").innerHTML = nome+"("+id+")";
		document.getElementById("labelSpanRemover").innerHTML = nome+"("+id+")";
		document.getElementById("status").options.selectedIndex = index;
	}
	function sendDataToForm2(id,nome,index) {
		document.getElementById("inputIdEditar").value = id;
		document.getElementById("inputNomeEditar").value = nome;
		document.getElementById("labelTituloEditar").innerHTML = nome+"("+id+")";
		document.getElementById("status").options.selectedIndex = index;
	}
</script>
<div class="text-right"><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#add"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</button></div>
<table id="table" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Categoria</th>
			<th>Status</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($registro as $linha) { ?>
		<tr>
			<td><?php echo $linha['TPR_ID'];?></td>
			<td><?php echo $linha['TPR_CATEGORIA'];?></td>
			<td><span class="label label-<?php echo ($linha['TPR_ATIVO'] == 1) ? "success" : "danger";?>"><?php echo ($linha['TPR_ATIVO'] == 1) ? "ATIVO" : "INATIVO";?></span></td>
			<td>
				<div class="btn-group">
					<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#editar" onclick='sendDataToForm2(<?php echo $linha["TPR_ID"];?>,"<?php echo $linha["TPR_CATEGORIA"];?>",<?php echo $linha["TPR_ATIVO"];?>)'><span class="fa fa-pencil" aria-hidden="true"></span></button>
					<!--<button type= "button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#remover" onclick='sendDataToForm(<?php echo $linha["TPR_ID"];?>,"<?php echo $linha["TPR_CATEGORIA"];?>")'><span class="fa fa-remove" aria-hidden="true"></span></button>-->
				</div>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<div id="editar" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Editar categoria: <span id="labelTituloEditar"></span></h4>
			</div>
			<div class="modal-body">
				<form action="paginas/gerenciamento/controle_TiposReclamacao/editarTiposReclamacao.php" method="post" data-toggle="validator" role="form">
					<input type="hidden" name="id" id="inputIdEditar">
					<ul class="list-group">
						<li class="list-group-item">Nome:
							<span class="pull-right">
								<div class="form-group has-feedback">
									<input type="text" name="nome" class="form-control" id="inputNomeEditar" data-error="O campo não pode ficar em branco" required>
									<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
									<div class="help-block with-errors"></div>
								</div>
							</span>
						</li>
						
						<li class="list-group-item">Status:
						<span class="pull-right">
						<div class="form-group">
							<select class="form-control" id="status" name="status">
								<option value="0">INATIVO</option>
								<option value="1">ATIVO</option>
							</select>
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
			<form action="paginas/gerenciamento/controle_TiposReclamacao/removerTiposReclamacao.php" method="post">
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
				<form action="paginas/gerenciamento/controle_TiposReclamacao/inserirTiposReclamacao.php" method="post" data-toggle="validator" role="form">
					<div class="form-group has-feedback">
						<label for="nome">Nome da nova categoria:</label>
						<input type="nome" class="form-control" id="nome" name="nome" data-error="O campo não pode ficar em branco" required>
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
			</div>
			<div class="modal-footer">
			<button type="submit" class="btn btn-default">Adicionar</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			</div>
			</form>
		</div>
	</div>
</div>