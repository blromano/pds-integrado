<?php
$sql = "SELECT AVA_ID, AVA_DESCRICAO, AVA_NOTA, CON_ID FROM avaliacoes_estabelecimentos WHERE EST_ID='$id_estabelecimento'";
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
			<th>Assunto</th>
			<th>Estrelas</th>
		</tr>
	</thead>
	<tbody>

	<?php while($rows_cursos = mysqli_fetch_assoc($result)){;
	echo "<tr>";
	echo "<td>#".$rows_cursos["AVA_ID"]."</td>";
	echo "<td>".limitar($rows_cursos["AVA_DESCRICAO"],100)."</td>";;
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