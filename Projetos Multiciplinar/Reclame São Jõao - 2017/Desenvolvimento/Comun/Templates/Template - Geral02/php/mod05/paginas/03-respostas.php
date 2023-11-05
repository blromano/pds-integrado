<?php
	$respostas = array(
		array("Cliente", "Rosangela", "texto texto texto texto...", "./reclamacao/240", "22/04/2017", 0),
		array("Estabelecimento", "Sempre Vale", "texto texto texto texto...", "./reclamacao/240", "22/04/2017", 1),
		array("Cliente", "Rosangela", "texto texto texto texto...", "./reclamacao/240", "22/04/2017", 2),
	);
?>
<table id="table" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tipo de Resposta</th>
			<th>Usuário</th>
			<th>Resposta</th>
			<th>Link</th>
			<th>Data</th>
			<th>ID Reclamação</th>
			<th>Status</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php
			for ($x = 0; $x <= 25; $x++) {
				$random = rand(0,count($respostas)-1);
				echo "<tr>";
					echo "<td>$x</td>";
					echo "<td>".$respostas[$random][0]."</td>";
					echo "<td>".$respostas[$random][1]."</td>";
					echo "<td>".$respostas[$random][2]."</td>";
					echo "<td><a href='".$respostas[$random][3]."'>".$respostas[$random][3]."</a></td>";
					echo "<td>".$respostas[$random][4]."</td>";
					echo "<td>".($x+10)."</td>";
					if ($respostas[$random][5] == 1) echo "<td><span class='label label-default'>Publicado</span></td>";
					elseif ($respostas[$random][5] == 0) echo "<td><span class='label label-warning'>Pendente</span></td>";
					elseif ($respostas[$random][5] == 2) echo "<td><span class='label label-danger'>Suspensa</span></td>";
					?>
					<td>
						<div class="dropdown">
						  <span style="cursor:pointer" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i> Gerenciamento
						  <span class="caret"></span></span>
						  <ul class="dropdown-menu">
							<li><a href="#" data-toggle="modal" data-target="#visualizar"><span class="fa fa-eye" aria-hidden="true"></span> Visualizar</a></li>
							<li><a href="#" data-toggle="modal" data-target="#editar"><span class="fa fa-pencil" aria-hidden="true"></span> Alterar</a></li>
							<li <?php if ($respostas[$random][5] == 2) echo 'class="disabled"'; ?>><a href="#" data-toggle="modal" data-target="#suspender"><span class="fa fa-ban" aria-hidden="true"></span> Suspender</a></li>
							<li <?php if ($respostas[$random][5] == 1) echo 'class="disabled"'; ?>><a href="#" data-toggle="modal" data-target="#publicar"><span class="fa fa-check" aria-hidden="true"></span> Publicar</a></li>
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
				<h4 class="modal-title">Detalhes da Resposta #4871</h4>
			</div>
			<div class="modal-body">
				<ul class="list-group">
					<li class="list-group-item">ID: <span class="pull-right">#4871</span></li>
					<li class="list-group-item">Tipo de Resposta: <span class="pull-right">Estabelecimento</span></li>
					<li class="list-group-item">Usuário: <span class="pull-right">Sempre Vale</span></li>
					<li class="list-group-item">Link Reclamação: <span class="pull-right"><a href="http://reclamesj.com/reclamacao/240">http://reclamesj.com/reclamacao/240</a></span></li>
					<li class="list-group-item">ID Reclamação: <span class="pull-right">12</span></li>
					<li class="list-group-item">Data: <span class="pull-right">22/04/2017</span></li>
					<br><span>Resposta:</span>
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
				<h4 class="modal-title">Alteração da Resposta #4871</h4>
			</div>
			<div class="modal-body">
				<form>
				<ul class="list-group">
					<li class="list-group-item">ID: <span class="pull-right"><input type="text" class="form-control" value="#4871" disabled></span></li>
					<li class="list-group-item">Tipo de Resposta: <span class="pull-right"><input type="text" class="form-control" value="Estabelecimento"></span></li>
					<li class="list-group-item">Usuário: <span class="pull-right"><input type="text" class="form-control" value="Sempre Vale"></span></li>
					<li class="list-group-item">Link Reclamação: <span class="pull-right"><input type="text" class="form-control" value="http://reclamesj.com/reclamacao/240" disabled></span></li>
					<li class="list-group-item">ID Reclamação: <span class="pull-right"><input type="text" class="form-control" value="#12" disabled></span></li>
					<li class="list-group-item">Data: <span class="pull-right"><span class="pull-right"><input type="date" class="form-control" value="2017-04-22" disabled></span></li>
					<br><span>Resposta:</span>
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
				<h4 class="modal-title">Suspensão da Resposta #4871</h4>
			</div>
			<div class="modal-body">
				<p>Você tem certeza que deseja suspender a resposta #4871 ?</p>
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
				<h4 class="modal-title">Publicação da Resposta #4871</h4>
			</div>
			<div class="modal-body">
				<p>Você tem certeza que deseja tornar público a resposta #4871 ?</p>
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
				<h4 class="modal-title">Exclusão da Resposta #4871</h4>
			</div>
			<div class="modal-body">
				<p>Você tem certeza que deseja excluir a resposta #4871 ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Confirmar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>
