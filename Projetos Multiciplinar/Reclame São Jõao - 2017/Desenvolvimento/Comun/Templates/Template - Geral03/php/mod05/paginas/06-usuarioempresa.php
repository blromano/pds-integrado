<?php
	$estabelecimentos = array(
		array("Sempre Vale", "semprevale@email.com", "75.107.761/0001-46", "22/04/2017", "22/04/2017"),
		array("Big Bom", "bigbom@email.com", "69.847.610/0001-21", "22/04/2017", "22/04/2017"),
		array("Corso", "corso@email.com", "53.255.878/0001-34", "22/04/2017", "22/04/2017"),
	);
?>
<table id="table" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Imagem</th>
			<th>Usuário</th>
			<th>E-mail</th>
			<th>CNPJ</th>
			<th>Data de Registro</th>
			<th>Última Visita</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php
			for ($x = 0; $x <= 25; $x++) {
				$random = rand(0,count($estabelecimentos)-1);
				echo "<tr>";
					echo "<td>$x</td>";
					echo "<td><img src='./imagens/no-image.png' style='height:50px;width:50px'></td>";
					echo "<td>".$estabelecimentos[$random][0]."</td>";
					echo "<td><a href='".$estabelecimentos[$random][1]."'>".$estabelecimentos[$random][1]."</a></td>";
					echo "<td>".$estabelecimentos[$random][2]."</td>";
					echo "<td>".$estabelecimentos[$random][3]."</td>";
					echo "<td>".$estabelecimentos[$random][4]."</td>";
					?>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#visualizar"><span class="fa fa-eye" aria-hidden="true"></span></button>
							<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#editar"><span class="fa fa-pencil" aria-hidden="true"></span></button>
							<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#remover"><span class="fa fa-remove" aria-hidden="true"></span></button>
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
				<h4 class="modal-title">Visualizar informações de Sempre Vale</h4>
			</div>
			<div class="modal-body">
			<ul class="list-group">
			  <li class="list-group-item">Nome da empresa: <span class="pull-right">Sempre Vale</span></li>
			  <li class="list-group-item">Nome fantasia: <span class="pull-right">Comércio José Braga</span></li>
			  <li class="list-group-item">CNPJ: <span class="pull-right">75.107.761/0001-46</span></li>
			  <li class="list-group-item">Nome do responsável: <span class="pull-right">José Braga</span></li>
			  <li class="list-group-item">Tipo de estabelecimento: <span class="pull-right">Supermercado</span></li>
			  <li class="list-group-item">E-mail: <span class="pull-right"><a href="semprevale@email.com">semprevale@email.com</a></span></li>
			  <li class="list-group-item">Senha: <span class="pull-right">*******</span></li>
			  <li class="list-group-item">Site da empresa: <span class="pull-right"><a href="semprevale.com">semprevale.com</a></span></li>
			  <li class="list-group-item">Data de Registro: <span class="pull-right">21/04/2017</span></li>
			  <li class="list-group-item">Último Acesso: <span class="pull-right">21/04/2017</span></li>
			  <li class="list-group-item">Quantidade de comentários: <span class="pull-right">12</span></li>
			  <li class="list-group-item">Rua: <span class="pull-right">Rua de Ninguém</span></li>
			  <li class="list-group-item">Bairro: <span class="pull-right">Olosko bixo</span></li>
			  <li class="list-group-item">Número: <span class="pull-right">69</span></li>
			  <li class="list-group-item">Complemento: <span class="pull-right">--</span></li>
			  <li class="list-group-item">Cidade: <span class="pull-right">São João da Boa Vista</span></li>
			  <li class="list-group-item">Estado: <span class="pull-right">São Paulo</span></li>
			  <li class="list-group-item">Telefone1: <span class="pull-right">(11)3012-5485</span></li>
			  <li class="list-group-item">Telefone2: <span class="pull-right">(19)98312-5485</span></li>
			</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<div id="editar" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Editar informações de SempreVale</h4>
			</div>
			<div class="modal-body">
				<form>
					<ul class="list-group">
					  <li class="list-group-item">Nome da empresa: <span class="pull-right"><input type="text" class="form-control" value="Sempre Vale"></span></li>
					  <li class="list-group-item">Nome fantasia: <span class="pull-right"><input type="text" class="form-control" value="Comércio José Braga"></span></li>
					  <li class="list-group-item">CNPJ: <span class="pull-right"><input type="text" class="form-control" value="75.107.761/0001-46"></span></li>
					  <li class="list-group-item">Nome do responsável: <span class="pull-right"><input type="text" class="form-control" value="José Braga"></span></li>
					  <li class="list-group-item">Tipo de estabelecimento: <span class="pull-right"><input type="text" class="form-control" value="Supermercado"></span></li>
					  <li class="list-group-item">E-mail: <span class="pull-right"><input type="text" class="form-control" value="semprevale@email.com"></span></li>
					  <li class="list-group-item">Senha: <span class="pull-right"><input type="text" class="form-control" value="*******"></span></li>
					  <li class="list-group-item">Site da empresa: <span class="pull-right"><input type="text" class="form-control" value="semprevale.com"></span></li>
					  <li class="list-group-item">Data de Registro: <span class="pull-right"><input type="text" class="form-control" value="2017-04-22"></span></li>
					  <li class="list-group-item">Último Acesso: <span class="pull-right"><input type="text" class="form-control" value="2017-04-22"></span></li>
					  <li class="list-group-item">Quantidade de comentários: <span class="pull-right"><input type="text" class="form-control" value="12"></span></li>
					  <li class="list-group-item">Rua: <span class="pull-right"><input type="text" class="form-control" value="Rua de Ninguém"></span></li>
					  <li class="list-group-item">Bairro: <span class="pull-right"><input type="text" class="form-control" value="Olosko bixo"></span></li>
					  <li class="list-group-item">Número: <span class="pull-right"><input type="text" class="form-control" value="69"></span></li>
					  <li class="list-group-item">Complemento: <span class="pull-right"><input type="text" class="form-control" value="--"></span></li>
					  <li class="list-group-item">Cidade: <span class="pull-right"><input type="text" class="form-control" value="São João da Boa Vista"></span></li>
					  <li class="list-group-item">Estado: <span class="pull-right"><input type="text" class="form-control" value="São Paulo"></span></li>
					  <li class="list-group-item">Telefone1: <span class="pull-right"><input type="text" class="form-control" value="(11)3012-5485"></span></li>
					  <li class="list-group-item">Telefone2: <span class="pull-right"><input type="text" class="form-control" value="(19)98312-5485"></span></li>
					</ul>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Salvar</button>
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
				<h4 class="modal-title">Exclusão do Usuário: SempreVale</h4>
			</div>
			<div class="modal-body">
				<p>Você tem certeza que deseja excluir o usuário: SempreVale ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Confirmar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>