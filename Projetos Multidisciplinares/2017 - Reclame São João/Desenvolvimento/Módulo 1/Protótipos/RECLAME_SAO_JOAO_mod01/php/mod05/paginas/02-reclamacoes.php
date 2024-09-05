<?php
	$reclamacoes = array(
		array("Produto com defeito", "texto texto texto texto...", "Rosangela", "BigBom", "22/04/2017", 0),
		array("Produto com defeito", "texto texto texto texto...", "Rosangela", "BigBom", "22/04/2017", 1),
		array("Produto com defeito", "texto texto texto texto...", "Rosangela", "BigBom", "22/04/2017", 2),
	);
?>
<table id="table" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Título</th>
			<th>Reclamação</th>
			<th>Usuário</th>
			<th>Empresa alvo</th>
			<th>Data</th>
			<th>Status</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php
			for ($x = 0; $x <= 25; $x++) {
				$random = rand(0,count($reclamacoes)-1);
				echo "<tr>";
					echo "<td>$x</td>";
					echo "<td>".$reclamacoes[$random][0]."</td>";
					echo "<td>".$reclamacoes[$random][1]."</td>";
					echo "<td>".$reclamacoes[$random][2]."</td>";
					echo "<td>".$reclamacoes[$random][3]."</td>";
					echo "<td>".$reclamacoes[$random][4]."</td>";
					if ($reclamacoes[$random][5] == 1) echo "<td><span class='label label-default'>Publicado</span></td>";
					elseif ($reclamacoes[$random][5] == 0) echo "<td><span class='label label-warning'>Pendente</span></td>";
					elseif ($reclamacoes[$random][5] == 2) echo "<td><span class='label label-danger'>Suspensa</span></td>";
					?>
					<td>
						<div class="dropdown">
						  <span style="cursor:pointer" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i> Gerenciamento
						  <span class="caret"></span></span>
						  <ul class="dropdown-menu">
							<li><a href="#" data-toggle="modal" data-target="#visualizar"><span class="fa fa-eye" aria-hidden="true"></span> Visualizar</a></li>
							<li><a href="#" data-toggle="modal" data-target="#editar"><span class="fa fa-pencil" aria-hidden="true"></span> Alterar</a></li>
							<li <?php if ($reclamacoes[$random][5] == 2) echo 'class="disabled"'; ?>><a href="#" data-toggle="modal" data-target="#suspender"><span class="fa fa-ban" aria-hidden="true"></span> Suspender</a></li>
							<li <?php if ($reclamacoes[$random][5] == 1) echo 'class="disabled"'; ?>><a href="#" data-toggle="modal" data-target="#publicar"><span class="fa fa-check" aria-hidden="true"></span> Publicar</a></li>
							<li><a href="#" data-toggle="modal" data-target="#remover"><span class="fa fa-remove" aria-hidden="true"></span> Remover</a></li>
						  </ul>
						</div>
					</td>
					<?php
				echo "</tr>";
			}
		?>
	</tbody>
</table>

<!-- Modal visualizar -->
<div id="visualizar" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Detalhes da Reclamação #4871</h4>
			</div>
			<div class="modal-body">
				<ul class="list-group">
					<li class="list-group-item">ID: <span class="pull-right">#4871</span></li>
					<li class="list-group-item">Título: <span class="pull-right">Empresa maldita</span></li>
					<li class="list-group-item">Usuário: <span class="pull-right">Rosangela</span></li>
					<li class="list-group-item">Empresa alvo: <span class="pull-right">BigBom</span></li>
					<li class="list-group-item">Tipo de estabelecimento: <span class="pull-right">Supermercado</span></li>
					<li class="list-group-item">Tipo de reclamação: <span class="pull-right">Produto com defeito</span></li>
					<li class="list-group-item">Tipo de produto e/ou serviço: <span class="pull-right">Sla o q por nisso</span></li>
					<li class="list-group-item">Data: <span class="pull-right">22/04/2017</span></li>
					<br><span>Reclamação:</span>
					<div class="well">	texto texto texto texto	texto texto texto texto	texto texto texto texto	texto texto texto texto	texto texto texto texto	texto texto texto texto 	texto texto texto texto</div>
				</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal editar -->
<div id="editar" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Alteração da Reclamação #4871</h4>
			</div>
			<div class="modal-body">
				<form>
				<ul class="list-group">
					<li class="list-group-item">ID: <span class="pull-right"><input type="text" class="form-control" value="#4871" disabled></span></li>
					<li class="list-group-item">Título: <span class="pull-right"><input type="text" class="form-control" value="Empresa maldita"></span></li>
					<li class="list-group-item">Usuário: <span class="pull-right"><input type="text" class="form-control" value="Rosangela"></span></li>
					<li class="list-group-item">Empresa alvo: <span class="pull-right"><input type="text" class="form-control" value="BigBom"></span></li>
					<li class="list-group-item">Tipo de estabelecimento: <span class="pull-right">
						<select class="form-control">
							<option>Supermercado</option>
							<option>Website</option>
							<option>Padaria</option>
						</select>
					</span></li>
					<li class="list-group-item">Tipo de reclamação: <span class="pull-right">
						<select class="form-control">
							<option>Produto com defeito</option>
							<option>Mal atendimento</option>
							<option>Preço incorreto</option>
						</select>
					</span></li>
					<li class="list-group-item">Tipo de produto e/ou serviço: <span class="pull-right">
						<select class="form-control">
							<option>krai man o q poe nisso</option>
							<option>sla 1</option>
							<option>sla 2</option>
						</select>
					</span></li>
					<li class="list-group-item">Data: <span class="pull-right"><input type="date" class="form-control" value="2017-04-22" disabled></span></li>
					<br><span>Reclamação:</span>
					<div class="well"><textarea class="form-control" rows="3">texto texto texto texto	texto texto texto texto	texto texto texto texto	texto texto texto texto	texto texto texto texto	texto texto texto texto </textarea></div>
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

<!-- Modal suspender -->
<div id="suspender" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Suspensão da Reclamação #4871</h4>
			</div>
			<div class="modal-body">
				<p>Você tem certeza que deseja suspender a reclamação #4871 ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Confirmar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal publicar -->
<div id="publicar" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Publicação da Reclamação #4871</h4>
			</div>
			<div class="modal-body">
				<p>Você tem certeza que deseja tornar público a reclamação #4871 ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Confirmar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal remover -->
<div id="remover" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Exclusão da Reclamação #4871</h4>
			</div>
			<div class="modal-body">
				<p>Você tem certeza que deseja excluir a reclamação #4871 ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Confirmar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>