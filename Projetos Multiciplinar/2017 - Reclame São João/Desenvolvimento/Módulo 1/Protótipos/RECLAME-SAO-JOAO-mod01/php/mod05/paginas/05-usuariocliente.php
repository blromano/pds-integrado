<?php
	$clientes = array(
		array("Marcola", "marcola@email.com", "269.900.304-29", "22/04/2017", "22/04/2017"),
		array("Rosangela", "rosangela@email.com", "053.375.178-05", "22/04/2017", "22/04/2017"),
		array("Birubiru", "birubiru@email.com", "924.446.904-94", "22/04/2017", "22/04/2017"),
	);
?>
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
		<?php
			for ($x = 0; $x <= 25; $x++) {
				$random = rand(0,count($clientes)-1);
				echo "<tr>";
					echo "<td>$x</td>";
					echo "<td><img src='./imagens/no-image.png' style='height:50px;width:50px'></td>";
					echo "<td>".$clientes[$random][0]."</td>";
					echo "<td><a href='".$clientes[$random][1]."'>".$clientes[$random][1]."</a></td>";
					echo "<td>".$clientes[$random][2]."</td>";
					echo "<td>".$clientes[$random][3]."</td>";
					echo "<td>".$clientes[$random][4]."</td>";
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
				<h4 class="modal-title">Visualizar informações de Birubiru</h4>
			</div>
			<div class="modal-body">
			<ul class="list-group">
			  <li class="list-group-item">Nome: <span class="pull-right">Birubiru</span></li>
			  <li class="list-group-item">E-mail: <span class="pull-right"><a href="birubiru@email.com">birubiru@email.com</a></span></li>
			  <li class="list-group-item">Senha: <span class="pull-right">*******</span></li>
			  <li class="list-group-item">CPF: <span class="pull-right">924.446.904-94</span></li>
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
				<h4 class="modal-title">Editar informações de Birubiru</h4>
			</div>
			<div class="modal-body">
				<form>
					<ul class="list-group">
					  <li class="list-group-item">Nome: <span class="pull-right"><input type="text" class="form-control" value="Birubiru"></span></li>
					  <li class="list-group-item">E-mail: <span class="pull-right"><input type="text" class="form-control" value="birubiru@email"></span></li>
					  <li class="list-group-item">Senha: <span class="pull-right"><input type="password" class="form-control" value="asdasd"></span></li>
					  <li class="list-group-item">CPF: <span class="pull-right"><input type="text" class="form-control" value="924.446.904-94"></span></li>
					  <li class="list-group-item">Data de Registro: <span class="pull-right"><input type="date" class="form-control" value="2017-04-21" disabled></span></li>
					  <li class="list-group-item">Último Acesso: <span class="pull-right"><input type="date" class="form-control" value="2017-04-21" disabled></span></li>
					  <li class="list-group-item">Quantidade de comentários: <span class="pull-right"><input type="number" class="form-control" value="12" disabled></span></li>
					  <li class="list-group-item">Rua: <span class="pull-right"><input type="text" class="form-control" value="Rua de Ninguém"></span></li>
					  <li class="list-group-item">Bairro: <span class="pull-right"><input type="text" class="form-control" value="Olosko bixo"></span></li>
					  <li class="list-group-item">Número: <span class="pull-right"><input type="text" class="form-control" value="69"></span></li>
					  <li class="list-group-item">Complemento: <span class="pull-right"><input type="text" class="form-control" value="--"></span></li>
					  <li class="list-group-item">Cidade: <span class="pull-right"><input type="text" class="form-control" value="São João da Boa Vista"></span></li>
					  <li class="list-group-item">Estado: <span class="pull-right"><input type="text" class="form-control" value="São Paulo"></span></li>
					  <li class="list-group-item">Telefone1: <span class="pull-right"><input type="tel" class="form-control" value="(11)3012-5485"></span></li>
					  <li class="list-group-item">Telefone2: <span class="pull-right"><input type="tel" class="form-control" value="(19)98312-5485"></span></li>
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
				<h4 class="modal-title">Exclusão do Usuário: Birubiru</h4>
			</div>
			<div class="modal-body">
				<p>Você tem certeza que deseja excluir o usuário: Birubiru ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Confirmar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>