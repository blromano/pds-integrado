<?php
$ReclamacaoDAO = new ReclamacoesDAO;
$EST_ID = $ReclamacaoDAO->retornandoEstId();
$resultado = $ReclamacaoDAO->reclamacaoInformacoesAprovado($EST_ID);
$primeiromaiusculo = $ReclamacaoDAO->primeiroMaiusculo();

?>
<!DOCTYPE HTML>
<html lang="en">
<body>
	
<div class="tudorecentes">
<table id="table" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Titulo<div class="popup" onclick="myFunction()"><i class="fa fa-info-circle" aria-hidden="true"></i>
			<span class="popuptext" id="myPopup">Clique no título da reclamação para<br/> ver mais</span>
			</div>
			</th>
			<th>Assunto</th>
			<th>Nota</th>
		</tr>
	</thead>
	<tbody id="ajustestable">

	<?php foreach ($resultado as $row){
	
		echo "<tr>";
		echo "<td>#".$row["REC_ID"]."</td>";
		$REC_ID = $row["REC_ID"];
		echo "<td><a href='rec_conversa.php?REC_ID=$REC_ID' target='_blank'>".ucprimeiro(limitar($row["REC_TITULO_RECLAMACAO"],40))."</a></td>";
		echo "<td>".ucprimeiro(limitar($row["REC_DESCRICAO"],30))."</td>";;
		echo "<td>".$row["REC_NOTA"]."</td>";
		echo "</tr>";
		}
	?>
		
	</tbody>
	
	<tbody id="ajustestable_responsivo">

	<?php foreach ($resultado as $row){
	
		echo "<tr>";
		echo "<td>#".$row["REC_ID"]."</td>";
		echo "<td>".ucprimeiro(limitar($row["REC_TITULO_RECLAMACAO"],8))."</td>";
		echo "<td>".ucprimeiro(limitar($row["REC_DESCRICAO"],10))."</td>";;
		echo "<td>".$row["REC_NOTA"]."</td>";
		echo "</tr>";
		}
	?>
		
	</tbody>
	
</table>
</div>
<script type="text/javascript" src="js/formulario.js"></script>
</body>
</html>