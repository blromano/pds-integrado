<?php
	include 'controle/ConsumidorDAO.php';
	$ConsumidorDAO = new ConsumidorDAO();
	$registro = $ConsumidorDAO->listarADM();
?>
<script>
	var inputs = ['usu_id', 'con_id', 'loc_id', 'nome', 'email', 'cpf', 'dataNascimento', 'rua', 'bairro', 'numero', 'complemento', 'cidade', 'estado', 'telefone1', 'telefone2'];
	function sendDataToFormEdit(...args) {
		document.getElementById("labelTituloEditar").innerHTML = args[1];
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
<table id="table" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Imagem</th>
			<th>Usuário</th>
			<th>E-mail</th>
			<th>CPF</th>
			<th>Data de Registro</th>
			<th>Última Visita</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($registro as $linha) {
			$dados = array($linha['USU_ID'],$linha['CON_ID'],$linha['LOC_ID'],$linha['USU_NOME'],$linha['USU_EMAIL'],$linha['CON_CPF'],$linha['CON_DATA_NASCIMENTO'],$linha['LOC_RUA'],$linha['LOC_BAIRRO'],$linha['CON_NUMERO'],$linha['CON_COMPLEMENTO'],$linha['LOC_CIDADE'],$linha['LOC_ESTADO'],$linha['USU_TELEFONE'],$linha['CON_TELEFONE2']);
			$dados = "'".implode("','", $dados)."'";
		?>
		<tr>
			<td><?php echo $linha['CON_ID']; ?></td>
			<td><?php echo $linha['USU_FOTO_PERFIL']; ?></td>
			<td><?php echo $linha['USU_NOME']; ?></td>
			<td><?php echo $linha['USU_EMAIL']; ?></td>
			<td><?php echo $linha['CON_CPF']; ?></td>
			<td><?php echo $linha['USU_DATA_CADASTRO']; ?></td>
			<td><?php echo $linha['USU_DATA_CADASTRO']; ?></td>
			<td>
				<div class="btn-group">
					<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#editar" onclick="sendDataToFormEdit(<?php echo ($dados) ?>)"><span class="fa fa-pencil" aria-hidden="true"></span></button>
					<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#remover" onclick="sendDataToFormDelete(<?php echo $linha['CON_ID'] ?>,'<?php echo $linha['USU_NOME'] ?>')"><span class="fa fa-trash" aria-hidden="true"></span></button>
				</div>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<div id="editar" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Editar informações do cliente(<span id="labelTituloEditar"></span>)</h4>
			</div>
			<div class="modal-body">
				<form action="php/mod05/gerenciamento/Consumidores/editarConsumidores.php" method="post" data-toggle="validator" role="form">
					<input type="hidden" name="usu_id">
					<input type="hidden" name="con_id">
					<input type="hidden" name="loc_id">
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
								<label for="cpf"><strong>CPF:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-id-card"></span></span>
									<input type="text" class="form-control" name="cpf" id="cpf" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="dataNascimento"><strong>Data de Nascimento:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-birthday-cake"></span></span>
									<input type="date" class="form-control" name="dataNascimento" id="dataNascimento" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="rua"><strong>Rua:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-road"></span></span>
									<input type="text" class="form-control" name="rua" id="rua" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="bairro"><strong>Bairro:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-street-view"></span></span>
									<input type="text" class="form-control" name="bairro" id="bairro" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="numero"><strong>Número:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-bullseye"></span></span>
									<input type="number" class="form-control" name="numero" id="numero" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="complemento"><strong>Complemento:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-external-link-square"></span></span>
									<input type="text" class="form-control" name="complemento" id="complemento">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="cidade"><strong>Cidade:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
									<input type="text" class="form-control" name="cidade" id="cidade" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="estado"><strong>Estado:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
									<input type="text" class="form-control" name="estado" id="estado" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="telefone1"><strong>Telefone1:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-phone"></span></span>
									<input type="text" class="form-control" name="telefone1" id="telefone1">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="telefone2"><strong>Telefone2:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-mobile"></span></span>
									<input type="text" class="form-control" name="telefone2" id="telefone2">
								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success" >Salvar</button>
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
				<h4 class="modal-title">Remover cliente(<span id="labelTituloRemover"></span>)</h4>
			</div>
			<form action="php/mod05/gerenciamento/Consumidores/removerConsumidores.php" method="post">
				<input type="hidden" name="id" id="inputIdRemover">
				<div class="modal-body">
					<p>Você tem certeza que deseja excluir o cliente: <span id="labelSpanRemover"></span> ?</p>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger">Confirmar</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				</div>
			</form>
		</div>
	</div>
</div>