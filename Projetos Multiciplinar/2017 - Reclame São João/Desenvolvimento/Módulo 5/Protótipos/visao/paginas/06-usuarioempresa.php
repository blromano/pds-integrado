<?php
	include '../controle/EstabelecimentosDAO.php';
	$EstabelecimentosDAO = new EstabelecimentosDAO();
	$registro = $EstabelecimentosDAO->listarTodos();
	include '../controle/TiposEstabelecimentosDAO.php';
	$TiposEstabelecimentosDAO = new TiposEstabelecimentosDAO();
	$registro2 = $TiposEstabelecimentosDAO->listar();
?>
<script>
	var inputs = ['usu_id', 'est_id', 'loc_id', 'tes_id', 'nome', 'cnpj', 'tipo', 'alvo', 'responsavel', 'email', 'site', 'facebook', 'telefone', 'cep', 'rua', 'bairro', 'numero', 'complemento', 'cidade', 'estado'];
	function sendDataToFormEdit(...args) {
		document.getElementById("labelTituloEditar").innerHTML = args[1];
		document.getElementById("tipo").namedItem(args[6]).selected = true;
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
			<th>CNPJ</th>
			<th>Data de Registro</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($registro as $linha) {
			$dados = array($linha['USU_ID'],$linha['EST_ID'],$linha['LOC_ID'],$linha['TES_ID'],$linha['EST_NOME_FANTASIA'],$linha['EST_CNPJ'],$linha['TES_CATEGORIA'],$linha['EST_PUBLICO_ALVO'],$linha['EST_NOME_RESPONSAVEL'],$linha['USU_EMAIL'],$linha['EST_SITE_EMPRESA'],$linha['EST_FACEBOOK_EMPRESA'],$linha['USU_TELEFONE'],$linha['LOC_CEP'],$linha['LOC_RUA'],$linha['LOC_BAIRRO'],$linha['EST_NUMERO_ENDERECO'],$linha['EST_COMPLEMENTO'],$linha['LOC_CIDADE'],$linha['LOC_ESTADO']);
			$dados = "'".implode("','", $dados)."'";
		?>
		<tr>
			<td><?php echo $linha['EST_ID']; ?></td>
			<td><?php echo $linha['USU_FOTO_PERFIL']; ?></td>
			<td><?php echo $linha['EST_NOME_FANTASIA']; ?></td>
			<td><?php echo $linha['USU_EMAIL']; ?></td>
			<td><?php echo $linha['EST_CNPJ']; ?></td>
			<td><?php echo $linha['USU_DATA_CADASTRO']; ?></td>
			<td>
				<div class="btn-group">
					<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#editar" onclick="sendDataToFormEdit(<?php echo ($dados) ?>)"><span class="fa fa-pencil" aria-hidden="true"></span></button>
					<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#remover" onclick="sendDataToFormDelete(<?php echo $linha['EST_ID'] ?>,'<?php echo $linha['EST_NOME_FANTASIA'] ?>')"><span class="fa fa-trash" aria-hidden="true"></span></button>
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
				<h4 class="modal-title">Editar informações do estabelecimento(<span id="labelTituloEditar"></span>)</h4>
			</div>
			<div class="modal-body">
				<form action="paginas/gerenciamento/Estabelecimentos/editarEstabelecimentos.php" method="post" data-toggle="validator" role="form">
					<input type="hidden" name="usu_id">
					<input type="hidden" name="est_id">
					<input type="hidden" name="loc_id">
					<input type="hidden" name="tes_id">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nome"><strong>Nome da empresa:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-industry"></span></span>
									<input type="text" class="form-control" name="nome" id="nome" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="cnpj"><strong>CNPJ:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-university"></span></span>
									<input type="text" class="form-control" name="cnpj" id="cnpj" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="tipo"><strong>Tipo de estabelecimento:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-bookmark"></span></span>
									<select class="form-control" id="tipo"  name="tipo" required>
										<?php foreach ($registro2 as $linha) { ?>
										<option name="<?php echo $linha['TES_CATEGORIA']; ?>" value="<?php echo $linha['TES_ID']; ?>"><?php echo $linha['TES_CATEGORIA']; ?></option>
										<?php } ?>	
									</select>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="alvo"><strong>Público alvo:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-users"></span></span>
									<input type="text" class="form-control" name="alvo" id="alvo" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="responsavel"><strong>Nome do responsável:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-user-circle"></span></span>
									<input type="text" class="form-control" name="responsavel" id="responsavel" required>
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
								<label for="site"><strong>Site da empresa:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-link"></span></span>
									<input type="text" class="form-control" name="site" id="site">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="facebook"><strong>Facebook da empresa:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-facebook-square"></span></span>
									<input type="text" class="form-control" name="facebook" id="facebook">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="telefone"><strong>Telefone:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-phone"></span></span>
									<input type="tel" class="form-control" name="telefone" id="telefone" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="cep"><strong>CEP:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-fa"></span></span>
									<input type="text" class="form-control" name="cep" id="cep" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
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
					</div>
					<div class="row">
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
						<div class="col-md-4">
							<div class="form-group">
								<label for="numero"><strong>Número:</strong></label>
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-bullseye"></span></span>
									<input type="number" class="form-control" name="numero" id="numero" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
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
				<h4 class="modal-title">Remover estabelecimento(<span id="labelTituloRemover"></span>)</h4>
			</div>
			<form action="paginas/gerenciamento/Estabelecimentos/removerEstabelecimentos.php" method="post">
				<input type="hidden" name="id" id="inputIdRemover">
				<div class="modal-body">
					<p>Você tem certeza que deseja excluir o estabelecimento: <span id="labelSpanRemover"></span> ?</p>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger">Confirmar</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				</div>
			</form>
		</div>
	</div>
</div>