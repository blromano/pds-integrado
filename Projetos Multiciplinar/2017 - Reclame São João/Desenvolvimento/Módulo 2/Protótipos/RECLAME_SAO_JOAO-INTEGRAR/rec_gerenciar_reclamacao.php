<?php

$con_id = $_SESSION["rec_id"];

$sql = "SELECT REC_ID, REC_TITULO_RECLAMACAO, REC_DESCRICAO, REC_DATA_HORA, EST_ID, REC_NOTA, REC_APROVADO FROM reclamacoes WHERE CON_ID='$con_id'";
$result = $conn->query($sql);

$sql2 = "SELECT EST_NOME_FANTASIA FROM estabelecimentos INNER JOIN reclamacoes ON estabelecimentos.EST_ID = reclamacoes.EST_ID WHERE CON_ID='$con_id'";
$result2 = $conn->query($sql2);
$cont=0;
while($row = mysqli_fetch_assoc($result2)){
	$est_nome[$cont]= $row["EST_NOME_FANTASIA"];
	$cont++;
}



function limitar($string, $tamanho, $encode = 'UTF-8') {
if( strlen($string) > $tamanho ){
$string = mb_substr($string, 0, $tamanho - 3, $encode) . '...';
}
else{
$string = mb_substr($string, 0, $tamanho, $encode);
}
return $string;
}
?>

<html lang="en">

<body style="background: #f4f3f0;">

<div class="tudorecentes">
<table id="table" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Título</th>
			<th>Estabelecimento</th>
			<th>Status</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>

	<?php 
	$cont2=0;
	
	while($rows_cursos = mysqli_fetch_assoc($result)){
		
		echo "<tr>";
		echo "<td>#".$rows_cursos["REC_ID"]."</td>";
		echo "<td>".limitar($rows_cursos["REC_TITULO_RECLAMACAO"],40)."</td>";
		echo "<td>".limitar("$est_nome[$cont2]",40)."</td>";
		$cont2++;
		if ($rows_cursos["REC_APROVADO"] == 1) echo "<td><span class='label label-default'>Publicado</span></td>";
		elseif ($rows_cursos["REC_APROVADO"] == 0) echo "<td><span class='label label-warning'>Pendente</span></td>";
		elseif ($rows_cursos["REC_APROVADO"] == 2) echo "<td><span class='label label-danger'>Suspensa</span></td>";
	?>
		<td>
		
		<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_cursos['REC_ID']; ?>">Visualizar</button>
		<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $rows_cursos['REC_ID']; ?>" data-whatevernome="<?php echo $rows_cursos['REC_TITULO_RECLAMACAO']; ?>" data-whateverdetalhes="<?php echo $rows_cursos['REC_DESCRICAO']; ?>">Editar</button>
		<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#remover<?php echo $rows_cursos['REC_ID']; ?>">Apagar</button>
		
		</td>
	<?php
		echo "</tr>";}
	?>
		
	</tbody>
</table>

<?php
$sql = "SELECT REC_ID, REC_TITULO_RECLAMACAO, REC_DESCRICAO, EST_ID, REC_DATA_HORA, REC_NOTA, REC_APROVADO FROM reclamacoes WHERE CON_ID='$con_id'";
$result = $conn->query($sql);
$x=0;
$cont3=0;
while($rows_cursos = mysqli_fetch_assoc($result)){ 
$x++;
?>
	<style>
	.btn-danger{
		background-color: #ed786a;
	}
	.btn-danger:hover{
		background-color: #fd887a;
	}
	.btn{
		border-radius: 2px;
		padding: 3.5px 3.5px 3.5px 3.5px;
	}
	#botao{
		padding: 0.50em 2em 0.50em 2em;
	}
	</style>
	<!-- Modal visualizar -->
	<div class="modal fade" id="myModal<?php echo $rows_cursos['REC_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
	<div class="modal-header">
	<h4 class="modal-title">Detalhes da Reclamação #<?php echo $rows_cursos['REC_ID']; ?></h4>
	</div>
	<div class="modal-body">
	<ul class="list-group">
	<li class="list-group-item">ID: <span class="pull-right"><?php echo $rows_cursos['REC_ID']; ?></span></li>
	<li class="list-group-item">Título: <span class="pull-right"><?php echo $rows_cursos['REC_TITULO_RECLAMACAO']; ?></span></li>
	<li class="list-group-item">Data e Hora<span class="pull-right"><?php echo $rows_cursos['REC_DATA_HORA']; ?></span></li>
	<li class="list-group-item">Empresa alvo: <span class="pull-right">
	<?php 
	echo limitar("$est_nome[$cont3]",40);
	$cont3++;
	?>
	</span></li>
	<li class="list-group-item">Status: <span class="pull-right">
	<?php 
	if ($rows_cursos['REC_APROVADO'] == 0){
		echo "pendente";
	}
	else if ($rows_cursos['REC_APROVADO'] == 1){
		echo "aprovado";
	}
	else if ($rows_cursos['REC_APROVADO'] == 2){
		echo "reprovado";
	}
	?>
	</span></li>
	<li class="list-group-item">Nota: <span class="pull-right"><?php echo $rows_cursos['REC_NOTA']; ?></span></li>
	<br><span>Reclamação:</span>
	<div class="well"><?php echo $rows_cursos['REC_DESCRICAO']; ?></div>
	</ul>
	</div>
	<div class="modal-footer">
	<button type="button" class="default" data-dismiss="modal" id="botao">Fechar</button>
	</div>
	</div>
	</div>
	</div>
	<style>
#recipient-name{
	 background-color: white;
	 box-shadow: inset 0px 0px 0px 0px rgba(0, 0, 0, 0.1);
	 border: 1px solid #ccc;
	 
	 
}
#recipient-name:focus{
	box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
}
</style>
	<!-- Modal editar -->
	<div id="exampleModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<h4 class="modal-title"></h4>
	</div>
	<div class="modal-body">
	<form method="POST" action="http://localhost/RECLAME_SAO_JOAO-INTEGRAR/processa.php" enctype="multipart/form-data">
	<div class="form-group">
	<label for="recipient-name" class="control-label">Tituto:</label>
	<input name="nome" type="text" class="form-control" id="recipient-name" required="required">
	</div>
	<div class="form-group">
	<label for="message-text" class="control-label">Descrição:</label>
	<textarea name="detalhes" class="form-control" id="detalhes" required="required"></textarea>
	</div>

	<input name="id" type="hidden" class="form-control" id="id-curso" value="">

	<button type="button" class="success" id="botao" data-dismiss="modal">Cancelar</button>
	<button type="submit" class="danger" id="botao">Alterar</button>
	</form>
	</div>
	
	</div>
	</div>
	</div>


	<!-- Modal remover -->
	<div id="remover<?php echo $rows_cursos['REC_ID']; ?>" class="modal fade" role="dialog">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Exclusão da Reclamação #<?php echo $rows_cursos['REC_ID']; ?></h4>
	</div>
	<div class="modal-footer">
	<a href='apagar.php?id=<?php echo $rows_cursos['REC_ID']; ?>'><button type='button' class='success' id="botao">Confirmar</button></a>
	<button type="button" class="default" data-dismiss="modal"  id="botao">Cancelar</button>
	</div>
	</div>
	</div>
	</div>
	<?php
	}
	?>

</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
	$('#exampleModal').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var recipient = button.data('whatever') // Extract info from data-* attributes
	var recipientnome = button.data('whatevernome')
	var recipientdetalhes = button.data('whateverdetalhes')
	// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	var modal = $(this)
	modal.find('.modal-title').text('ID da Reclamação #' + recipient)
	modal.find('#id-curso').val(recipient)
	modal.find('#recipient-name').val(recipientnome)
	modal.find('#detalhes').val(recipientdetalhes)
	})
	</script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

</body>
</html>