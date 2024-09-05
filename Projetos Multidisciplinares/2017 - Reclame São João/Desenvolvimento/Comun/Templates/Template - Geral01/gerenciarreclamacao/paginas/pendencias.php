<script>
			function sendDataToForm(id,descricao,comentario) {
				document.getElementById("id").value = id;
				document.getElementById("descricao").value = descricao;
				document.getElementById("data").value = comentario;
			}
		</script>
				<script type="text/javascript">
$(document).ready(function() {
    $('#haha').DataTable( {
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese.json"
        },
		"drawCallback": function () {
            $('.dataTables_paginate > .pagination').addClass('pagination-sm');
        }
    } );
} );
</script>

<div class="panel panel-default">
	<div class="panel-heading">
		<li class="fa fa-align-right">
		</li>
		Minhas reclamações
	</div>
	<div class="panel-body">
	
		<div class="tudao" style="border: 1px solid transparent;">
	<table border="1" style="width:100%; height: 100%; margin-left:0%; border-color: transparent; ">
   <tr>
   <td style="width: 25%; font-size: 14px;">
   <table border="1" style="width:100%; height: 100%;border: 1px solid #ddd; margin-top: -0.5%;">
   <tr style="height: 15%;"><td style="padding: 10% 10% 10%; background: #FAFAFA;">
   <table border="1" style="width:100%; height: 100%;border: 1px solid transparent;">
   <tr style="height: 15%;"><td style="width: 30%;"><img  style="width: 100%;" src="../images/avatar.png"/></td><td style="padding: 10% 10% 10%;">Olá, Alexandre Freitas</td></tr>
   </table>
   </td></tr>
   <tr style="height: 15%;"><td style="padding: 10% 10% 10%;">
   <table border="1" style="width:100%; height: 40%;border: 1px solid transparent;">
   <tr style="height: 15%;"><td style="width: 20%;"><span style="font-size: 130%;" class="glyphicon glyphicon-home"></span></td><td style="padding: 2% 5% 2%;"><a href="index.html">Início</a></td>
   </tr>
   </table>
   </td></tr>
   <tr style="height: 15%;"><td style="padding: 10% 10% 10%;">
   <table border="1" style="width:100%; height: 40%;border: 1px solid transparent;">
   <tr style="height: 15%;"><td style="width: 20%;"><span style="font-size: 130%;" class="glyphicon glyphicon-cog"></span></td><td style="padding: 2% 5% 2%;">Configurações</td></tr>
   <tr style="height: 15%;"><td style="width: 20%;"></td><td style="padding: 2% 5% 2%; font-size: 14px;"><a href="index.html">Trocar e-mail</a></td></tr>
   <tr style="height: 15%;"><td style="width: 20%;"></td><td style="padding: 2% 5% 2%; font-size: 14px;"><a href="index.html">Trocar senha</a></td></tr>
   <tr style="height: 15%;"><td style="width: 20%;"></td><td style="padding: 2% 5% 2%; font-size: 14px;"><a href="index.html">Dados pessoais</a></td></tr>
   <tr style="height: 15%;"><td style="width: 20%;"></td><td style="padding: 2% 5% 2%; font-size: 14px;"><a href="index.html">Desativar minha conta</a></td></tr>
   </table>
   </td></tr>
   <tr style="height: 15%;"><td style="padding: 10% 10% 10%;">
   <table border="1" style="width:100%; height: 40%;border: 1px solid transparent;">
   <tr style="height: 15%;"><td style="width: 20%;"><span style="font-size: 130%;" class="glyphicon glyphicon-list-alt"></span></td><td style="padding: 2% 5% 2%;">Minhas reclamações</td></tr>
   <tr style="height: 15%;"><td style="width: 20%;"></td><td style="padding: 2% 5% 2%; font-size: 14px;"><a href="index.html">Todas (5)</a></td></tr>
   <tr style="height: 15%;"><td style="width: 20%;"></td><td style="padding: 2% 5% 2%; font-size: 14px;"><a href="index.html">Atendidas (0)</a></td></tr>
   <tr style="height: 15%;"><td style="width: 20%;"></td><td style="padding: 2% 5% 2%; font-size: 14px;"><a href="index.html">Não atendidas (0)</a></td></tr>
   </table>
   </td></tr>
   <tr style="height: 15%;"><td style="padding: 10% 10% 10%;">
   <table border="1" style="width:100%; height: 40%;border: 1px solid transparent;">
   <tr style="height: 15%;"><td style="width: 20%;"><span style="font-size: 130%;" class="glyphicon glyphicon-envelope"></span></td><td style="padding: 2% 5% 2%;">Minhas avaliações</td></tr>
   <tr style="height: 15%;"><td style="width: 20%;"></td><td style="padding: 2% 5% 2%; font-size: 14px;"><a href="index.html">Todas (5)</a></td></tr>
   </table>
   </td></tr>
    <tr style="height: 15%;"><td style="padding: 10% 10% 10%;">
   <table border="1" style="width:100%; height: 40%;border: 1px solid transparent;">
   <tr style="height: 15%;"><td style="width: 20%;"> <span style="font-size: 130%;" class="glyphicon glyphicon-off"></span></td><td style="padding: 2% 5% 2%;"><a href="index.html">Sair</a></td></tr>
   </table>
   </td></tr>
   </table>
   </td> 
   
		<td>
		<div style="border:1px solid transparent; width: 90%; margin-left: 5%;">
		<table id="haha" class="table table-bordered">
			<thead>
				<tr>
					<th>
						Código
					</th>
					<th>
						Descrição
					</th>
					<th>
						Data
					</th>
					<th>
						Ações
					</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
					$values = array
					(
						array("Reclamação cliente", "14/04/2017 17:24"),
						array("Reclamação cliente", "14/04/2017 17:24"),
						array("Reclamação cliente", "14/04/2017 17:24")
					);
					for ($x = 0; $x <= 25; $x++) {
						$random_keys= rand(0,2);
						
						?>
						<tr>
					<td>
						<?php echo $x;?>
					</td>
					<td>
						<?php echo $values[$random_keys][0];?>
					</td>
					<td>
						<?php echo $values[$random_keys][1];?>
					</td>
					<td>

							<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#editar" onclick='sendDataToForm(<?php echo $x;?>,"<?php echo $values[$random_keys][0];?>","<?php echo $values[$random_keys][1];?>")'>
							<span style="margin-top: 15%;" class="glyphicon glyphicon-search"></span>
							</button>
							<button type="button" style="background-color: #64594f" class="btn btn-success btn-xs" data-toggle="modal" data-target="#salvar">
							<span style="margin-top: 15%;" class="glyphicon glyphicon-pencil"></span>
							</button>
							<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#reprovar">
							<span style="margin-top: 15%;" class="glyphicon glyphicon-remove"></span>

					</td>
				</tr>
						
						<?php
					}
				?>
			</tbody>
		</table>
		</div>
		</td> </tr>
		</table></div>
	</div>
</div>
<div id="editar" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Detalhes da Pendência</h4>
			</div>
			<div class="modal-body">
				<form action="admin.php" method="post">
					<div class="form-group">
						<label for="id">Código:</label>
						<input type="text" class="form-control" id="id" name="id">
					</div>
					<div class="form-group">
						<label for="descricao">Descrição:</label>
						<input type="text" class="form-control" id="descricao" name="descricao">
					</div>
					<div class="form-group">
						<label for="data">Data:</label>
						<input type="text" class="form-control" id="data" name="data">
					</div>
					<!--<button type="submit" class="btn btn-default" name="edit">Salvar</button>-->
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<div id="salvar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Aprovar</h4>
      </div>
      <div class="modal-body">
        <p>Você tem certeza que deseja aprovar o item: (descricao) ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Confirmar</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>
</div>

<div id="reprovar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reprovar</h4>
      </div>
      <div class="modal-body">
        <p>Você tem certeza que deseja reprovar o item: (descricao) ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Confirmar</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>
</div>


