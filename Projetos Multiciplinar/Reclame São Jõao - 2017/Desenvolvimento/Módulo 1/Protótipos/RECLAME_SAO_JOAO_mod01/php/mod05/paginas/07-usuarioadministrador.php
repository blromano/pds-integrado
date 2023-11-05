<?php
	$administradores = array(
		array("José Ferdinando", "josef@reclamesj.com", "22/04/2017", "22/04/2017"),
		array("Maria Brandão", "mariab@reclamesj.com", "22/04/2017", "22/04/2017"),
		array("Eduardo Marcolino", "eduardom@reclamesj.com", "22/04/2017", "22/04/2017"),
	);
?>
<div class="text-right"><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#add"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</button></div>
<table id="table" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Imagem</th>
			<th>Usuário</th>
			<th>E-mail</th>
			<th>Data de Registro</th>
			<th>Última Visita</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php
			for ($x = 0; $x <= 25; $x++) {
				$random = rand(0,count($administradores)-1);
				echo "<tr>";
					echo "<td>$x</td>";
					echo "<td><img src='./imagens/no-image.png' style='height:50px;width:50px'></td>";
					echo "<td>".$administradores[$random][0]."</td>";
					echo "<td><a href='".$administradores[$random][1]."'>".$administradores[$random][1]."</a></td>";
					echo "<td>".$administradores[$random][2]."</td>";
					echo "<td>".$administradores[$random][3]."</td>";
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
				<h4 class="modal-title">Visualizar informações de José Ferdinando</h4>
			</div>
			<div class="modal-body">
			<ul class="list-group">
			  <li class="list-group-item">Nome: <span class="pull-right">José Ferdinando</span></li>
			  <li class="list-group-item">E-mail: <span class="pull-right"><a href="josef@reclamesj.com">josef@reclamesj.com</a></span></li>
			  <li class="list-group-item">Senha: <span class="pull-right">*******</span></li>
			  <li class="list-group-item">Data de Registro: <span class="pull-right">21/04/2017</span></li>
			  <li class="list-group-item">Último Acesso: <span class="pull-right">21/04/2017</span></li>
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
					  <li class="list-group-item">Nome: <span class="pull-right"><input type="text" class="form-control" value="José Ferdinando"></span></li>
					  <li class="list-group-item">E-mail: <span class="pull-right"><input type="text" class="form-control" value="josef@reclamesj.com"></span></li>
					  <li class="list-group-item">Senha: <span class="pull-right"><input type="text" class="form-control" value="*******"></span></li>
					  <li class="list-group-item">Data de Registro: <span class="pull-right"><input type="text" class="form-control" value="21/04/2017"></span></li>
					  <li class="list-group-item">Último Acesso: <span class="pull-right"><input type="text" class="form-control" value="21/04/2017"></span></li>
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
				<h4 class="modal-title">Exclusão do Administrador: José Ferdinando</h4>
			</div>
			<div class="modal-body">
				<p>Você tem certeza que deseja excluir o Administrador: José Ferdinando ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Confirmar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

<div id="add" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Inserção de Administrador</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="nome">Nome:</label>
						<input type="nome" class="form-control" id="nome">
					</div>
					<div class="form-group">
						<label for="email">E-mail:</label>
						<input type="email" class="form-control" id="email">
					</div>
					<div class="form-group">
						<label for="pass1">Senha:</label>
						<input type="password" class="form-control" id="pass1">
					</div>
					<div class="form-group">
						<label for="pass2">Repita a senha:</label>
						<input type="password" class="form-control" id="pass2">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Adicionar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>