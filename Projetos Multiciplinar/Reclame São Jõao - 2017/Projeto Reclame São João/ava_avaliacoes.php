<?php
$AvaliacoesDAO = new AvaliacoesDAO;
$ReclamacaoDAO = new ReclamacoesDAO;
$EST_ID = $ReclamacaoDAO->retornandoEstId();
$resultado = $AvaliacoesDAO->avaliacaoInformacoes($EST_ID);
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
			<th>Assunto</th>
			<th>Estrelas</th>
		</tr>
	</thead>
	<tbody id="ajustestable">

	<?php foreach ($resultado as $row):
	echo "<tr>";
	echo "<td>#".$row["AVA_ID"]."</td>";
	echo "<td>".ucprimeiro(limitar($row["AVA_DESCRICAO"],100))."</td>";;
	echo "<td>".$row["AVA_NOTA"]."</td>";
	echo "</tr>";
	endforeach;
	?>

	</tbody>
	
	<tbody id="ajustestable_responsivo">

	<?php foreach ($resultado as $row):
	echo "<tr>";
	echo "<td>#".$row["AVA_ID"]."</td>";
	echo "<td>".ucprimeiro(limitar($row["AVA_DESCRICAO"],30))."</td>";;
	echo "<td>".$row["AVA_NOTA"]."</td>";
	echo "</tr>";
	endforeach;
	?>

	</tbody>
	
</table>
</div>

</body>
</html>