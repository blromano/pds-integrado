<?php
	$banidos = array(
		array("Marcola", "marcola@email.com", "22/04/2017", "30 dias", "Qualificação maliciosa"),
		array("Rosangela", "rosangela@email.com", "22/04/2017", "2 dias", "Linguagem imprópria"),
		array("Birubiru", "birubiru@email.com", "22/04/2017", "4ever", "Spam"),
	);
?>
<table id="table" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Imagem</th>
			<th>Usuário</th>
			<th>E-mail</th>
			<th>Data de banimento</th>
			<th>Duração do banimento</th>
			<th>Motivo</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php
			for ($x = 0; $x <= 25; $x++) {
				$random = rand(0,count($banidos)-1);
				echo "<tr>";
					echo "<td>$x</td>";
					echo "<td><img src='./imagens/no-image.png' style='height:50px;width:50px'></td>";
					echo "<td>".$banidos[$random][0]."</td>";
					echo "<td><a href='".$banidos[$random][1]."'>".$banidos[$random][1]."</a></td>";
					echo "<td>".$banidos[$random][2]."</td>";
					echo "<td>".$banidos[$random][3]."</td>";
					echo "<td>".$banidos[$random][4]."</td>";
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
				<h4 class="modal-title">Informações da punição de Birubiru</h4>
			</div>
			<div class="modal-body">
			<ul class="list-group">
			  <li class="list-group-item">Data do banimento: <span class="pull-right">21/04/2017</span></li>
			  <li class="list-group-item">Duração do banimento: <span class="pull-right">12</span></li>
			  <br><span>Motivo:</span>
			  <div class="well">	texto texto texto texto	texto texto texto texto	texto texto texto texto	texto texto texto texto	texto texto texto texto	texto texto texto texto 	texto texto texto texto</div>
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
				<h4 class="modal-title">Editar punição de Birubiru</h4>
			</div>
			<div class="modal-body">
				<form>
					<ul class="list-group">
					  <li class="list-group-item">Data do banimento: <span class="pull-right"><input type="date" class="form-control" value="2017-04-21" disabled></span></li>
			          <li class="list-group-item">Duração do banimento: <span class="pull-right"><input type="text" class="form-control" value="69"></span></li>
					  <br><span>Motivo:</span>
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

<div id="remover" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Exclusão da punição contra Birubiru</h4>
			</div>
			<div class="modal-body">
				<p>Você tem certeza que deseja cancelar a punição contra Birubiru ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Confirmar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>