<?php

$con_id = $_SESSION["rec_id"];

$sql = "SELECT AVA_ID, AVA_DESCRICAO, AVA_DATA_HORA, AVA_NOTA, CON_ID FROM avaliacoes_estabelecimentos WHERE CON_ID='$con_id'";
$result = $conn->query($sql);

$sql2 = "SELECT EST_NOME_FANTASIA FROM estabelecimentos INNER JOIN avaliacoes_estabelecimentos ON estabelecimentos.EST_ID = avaliacoes_estabelecimentos.EST_ID WHERE CON_ID='$con_id'";
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
			<th>Assunto</th>
			<th>Estabelecimento</th>
			<th>Data e Hora</th>
			<th>Estrelas</th>
		</tr>
	</thead>
	<tbody>

	<?php 
	$cont2=0;
	while($rows_cursos = mysqli_fetch_assoc($result)){;
	echo "<tr>";
	echo "<td>#".$rows_cursos["AVA_ID"]."</td>";
	echo "<td>".limitar($rows_cursos["AVA_DESCRICAO"],100)."</td>";
	echo "<td>".limitar("$est_nome[$cont2]",40)."</td>";
	$cont2++;
	echo "<td>".$rows_cursos["AVA_DATA_HORA"]."</td>";
	echo "<td>".$rows_cursos["AVA_NOTA"]."</td>";
	
	?>
	
	<?php
	echo "</tr>";
	}
	?>
		
	</tbody>
</table>
</div>

</body>
</html>