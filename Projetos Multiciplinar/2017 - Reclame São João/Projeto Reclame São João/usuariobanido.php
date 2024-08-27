<?php
	include 'controle/DenunciasDAO.php';
	$DenunciasDAO = new DenunciasDAO();
	$banidos = $DenunciasDAO->listarBanidos();
?>
<script>
	var inputs = ['hbe_id','dataBanimento', 'duracaoBanimento'];
	function sendDataToFormEdit(...args) {
		document.getElementById("usu_nome").innerHTML = args[4];
		for (index = 0; index < inputs.length; ++index) {
			document.getElementsByName(inputs[index])[0].setAttribute("value", args[index]);
		}
		document.getElementsByName('motivo')[0].innerHTML = args[3];
	}
	
	function modalExcluir(id,nome) {
		
		document.getElementsByName('hbe_id')[1].value = id;
		$('.nome_usu').text(nome);
	}

</script>
<div class="panel panel-default">
<div class="panel-heading"><span class="fa fa-users" aria-hidden="true"></span> Usuários > Banidos</div>
<div class="panel-body">
<table id="table" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Imagem</th>
			<th>Usuário</th>
			<th>E-mail</th>
			<th>Data de banimento</th>
			<th>Término do banimento</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
			<?php foreach ($banidos as $linha) {
				$dados = array(
					$linha['HBE_ID'],
					date("Y-m-d", strtotime($linha['HBE_DATA_HORA_BLOQUEIO'])),
					date("Y-m-d", strtotime($linha['HBE_DATA_HORA_DESBLOQUEIO'])),
					$linha['HBE_MOTIVO'],
					$linha['EST_NOME_FANTASIA']
				);
				$dados = "'".implode("','", $dados)."'";
				?>
				<tr>
					<td><?php echo $linha['HBE_ID']; ?></td>
					<?php if (strpos($linha['USU_FOTO_PERFIL'], 'images/foto_perfil') !== false) { ?>
						<td><img style="width: 40px;height: 40px;" src="./<?php echo $linha['USU_FOTO_PERFIL'] ?>"></td>
					<?php }else{ ?>
						<td><img src="https://www.gravatar.com/avatar/<?php echo md5($linha['USU_EMAIL']); ?>?d=wavatar&f=y&s=40.jpg"></td>
					<?php } ?>
					<td><?php echo $linha['EST_NOME_FANTASIA']; ?></td>
					<td><?php echo $linha['USU_EMAIL']; ?></td>
					<td><?php echo date("d/m/Y", strtotime($linha['HBE_DATA_HORA_BLOQUEIO'])); ?></td>
					<td><?php echo date("d/m/Y", strtotime($linha['HBE_DATA_HORA_DESBLOQUEIO'])); ?></td>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#editar" onclick="sendDataToFormEdit(<?php echo ($dados) ?>)"><span class="fa fa-pencil" aria-hidden="true"></span></button>
							<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#remover" onclick="modalExcluir(<?php echo $linha['HBE_ID'].",'".$linha['EST_NOME_FANTASIA']."'"?>)"><span class="fa fa-remove" aria-hidden="true"></span></button>
						</div>
					</td>
				</tr>
				<?php
			}
		?>
	</tbody>
</table>
</div>
</div>

<div id="editar" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Editar punição contra <span id="usu_nome"></span></h4>
			</div>
			<div class="modal-body">
				<form action="php/mod05/gerenciamento/Denuncias/editarPunicao.php" method="post">
					<input type="hidden" name="hbe_id">
					<ul class="list-group">
					  <li class="list-group-item">Data do banimento: <span class="pull-right"><input type="date" class="form-control" name="dataBanimento" readonly></span></li>
			          <li class="list-group-item">Término do banimento: <span class="pull-right"><input type="date" class="form-control" name="duracaoBanimento"></span></li>
					  <br><span>Motivo:</span>
					  <div class="well"><textarea class="form-control" name="motivo" rows="3"></textarea></div>
					</ul>
				
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Salvar</button>
				</form>
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
				<h4 class="modal-title">Exclusão da punição contra <span class="nome_usu"></span></h4>
			</div>
			<div class="modal-body">
			<form action="php/mod05/gerenciamento/Denuncias/removerPunicao.php" method="post">
				<input type="hidden" name="hbe_id">
				<p>Você tem certeza que deseja cancelar a punição contra <span class="nome_usu"></span> ?</p>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-danger">Confirmar</button>
			</form>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>