<?php
$sql = "SELECT REC_ID, REC_TITULO_RECLAMACAO, REC_DESCRICAO, REC_NOTA FROM reclamacoes WHERE EST_ID='$id_estabelecimento'";
$result = $conn->query($sql);

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
			<th>Titulo</th>
			<th>Assunto</th>
			<th>Nota</th>
		</tr>
	</thead>
	<tbody>

	<?php while($rows_cursos = mysqli_fetch_assoc($result)){;
	
		echo "<tr>";
		echo "<td>#".$rows_cursos["REC_ID"]."</td>";
		echo "<td>".limitar($rows_cursos["REC_TITULO_RECLAMACAO"],20)."</td>";
		echo "<td>".limitar($rows_cursos["REC_DESCRICAO"],100)."</td>";;
		echo "<td>".$rows_cursos["REC_NOTA"]."</td>";
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