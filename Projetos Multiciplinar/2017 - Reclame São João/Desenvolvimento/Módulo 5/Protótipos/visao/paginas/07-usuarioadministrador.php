<?php
	include '../controle/AdministradoresDAO.php';
	$AdministradoresDAO = new AdministradoresDAO();
	$registro = $AdministradoresDAO->listar();
?>
<script>
	var inputs = ['adm_id','usu_id','nome','email'];
	function sendDataToFormEdit(privilegio,...args) {
		document.getElementById("labelTituloEditar").innerHTML = args[0];
		document.getElementsByName("privilegio")[0].options[privilegio-1].selected=true;	
		for (index = 0; index < inputs.length; ++index) {
			document.getElementsByName(inputs[index])[0].setAttribute("value", args[index]);
		}
	}
	function sendDataToFormDelete(id,nome) {
		document.getElementById("labelTituloRemover").innerHTML = id;
		document.getElementById("labelSpanRemover").innerHTML = nome;
		document.getElementById("inputIdRemover").value = id;			
	}
</script>
<div class="text-right"><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#add"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</button></div>
<table id="table" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Privilégio</th>
			<th>Nome</th>
			<th>E-mail</th>
			<th>Data de Registro</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($registro as $linha) {
			$dados = array($linha['ADM_ID'],$linha['USU_ID'],$linha['USU_NOME'],$linha['USU_EMAIL']);
			$dados = "'".implode("','", $dados)."'";
		?>
		<tr>
			<td><?php echo $linha['ADM_ID']; ?></td>
			<td><?php echo ($linha['ADM_TIPO_PRIVILEGIO'] == 2) ? '<span class="label label-danger">ADMIN</span>' : '<span class="label label-info">MOD</span>'; ?></td>
			<td><?php echo $linha['USU_NOME']; ?></td>
			<td><?php echo $linha['USU_EMAIL']; ?></td>
			<td><?php echo $linha['USU_DATA_CADASTRO']; ?></td>
			<td>
				<div class="btn-group">
					<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#editar" onclick="sendDataToFormEdit(<?php echo $linha['ADM_TIPO_PRIVILEGIO'] ?>,<?php echo ($dados) ?>)"><span class="fa fa-pencil" aria-hidden="true"></span></button>
					<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#remover" onclick="sendDataToFormDelete(<?php echo $linha['USU_ID'] ?>,'<?php echo $linha['USU_NOME'] ?>')"><span class="fa fa-trash" aria-hidden="true"></span></button>
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
				<h4 class="modal-title">Editar informações do staff(<span id="labelTituloEditar"></span>)</h4>
			</div>
			<div class="modal-body">
				<form action="paginas/gerenciamento/Administradores/editarAdministradores.php" method="post" data-toggle="validator" role="form">
					<input type="hidden" name="adm_id">
					<input type="hidden" name="usu_id">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nome"><strong>Nome:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-user"></span></span>
									<input type="text" class="form-control" name="nome" id="nome" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="email"><strong>E-mail:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-envelope"></span></span>
									<input type="email" class="form-control" name="email" id="email" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-star"></span></span>
								<select class="form-control" name="privilegio" required>
									<option value="1">Moderador</option>
									<option value="2">Administrador</option>
								</select>
								<div class="help-block with-errors"></div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<button type="submit" class="btn btn-success" >Salvar</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					</div>
				</div>
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
				<h4 class="modal-title">Exclusão do staff(<span id="labelTituloRemover"></span>)</h4>
			</div>
			<form action="paginas/gerenciamento/Administradores/removerAdministradores.php" method="post">
				<input type="hidden" name="id" id="inputIdRemover">
				<div class="modal-body">
					<p>Você tem certeza que deseja excluir o staff: <span id="labelSpanRemover"></span> ?</p>
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
				<h4 class="modal-title">Adicionar staff</h4>
			</div>
			<div class="modal-body">
				<form action="paginas/gerenciamento/Administradores/inserirAdministradores.php" method="post" data-toggle="validator" role="form">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nome"><strong>Nome:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-user"></span></span>
									<input type="text" class="form-control" name="nome" id="nome" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="email"><strong>E-mail:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-envelope"></span></span>
									<input type="email" class="form-control" name="email" id="email" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="senha"><strong>Senha:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-key"></span></span>
									<input type="password" class="form-control" name="senha" id="senha" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="resenha"><strong>Repita a senha:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-repeat"></span></span>
									<input type="password" class="form-control" name="resenha" id="resenha"  data-match="#senha" data-match-error="Oops! As senhas não coincidem" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<li class="list-group-item">
									<i class="fa fa-star" aria-hidden="true"></i> Privilégios:
									<span class="pull-right">
										<select class="form-control" id="privilegio" name="privilegio" required>
											<option value="1">Moderador</option>
											<option value="2">Administrador</option>
										</select>
										<div class="help-block with-errors"></div>
									</span>
								</li>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Adicionar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			</div>
			</form>
		</div>
	</div>
</div>