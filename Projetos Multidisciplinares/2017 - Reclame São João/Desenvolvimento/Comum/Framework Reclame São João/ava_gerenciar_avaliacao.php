<?php

$EstabelecimentosDAO = new EstabelecimentosDAO;
$AvaliacoesDAO = new AvaliacoesDAO;
$ReclamacaoDAO = new ReclamacoesDAO;
$ConsumidorDAO = new ConsumidorDAO;
$UsuarioDAO = new UsuarioDAO;

$USU_EMAIL = $ReclamacaoDAO->retornandoEmail();
//print_r($USU_EMAIL);
$USU_ID = $UsuarioDAO->buscarUsuario($USU_EMAIL);
//print_r($USU_ID);
$CON_ID = $ConsumidorDAO->idCon($USU_ID);	
//print_r($CON_ID);
$EST_NOME = $EstabelecimentosDAO->estabelecimentoNomeAvaliacao($CON_ID);
//print_r($EST_NOME);
$resultado = $AvaliacoesDAO->obterAvaliacoesPorConID($CON_ID);
//print_r($resultado);
$string = $ReclamacaoDAO->stringTamanho();
//print_r($string);
$CONT_NOME = $ReclamacaoDAO->contarNome($EST_NOME);
//print_r($CONT_NOME);
$primeiromaiusculo = $ReclamacaoDAO->primeiroMaiusculo();

?>
<!DOCTYPE HTML>
<html lang="en">

<body>
<center>
<div class="gerenciar_div">
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
	<tbody id="ajustestable">

	<?php 
	$cont=0;
	foreach ($resultado as $row):
	echo "<tr>";
	echo "<td>#".$row['AVA_ID']."</td>";
	echo "<td>".ucprimeiro(limitar($row["AVA_DESCRICAO"],100))."</td>";
	echo "<td>".limitar("$CONT_NOME[$cont]",40)."</td>";
	$cont++;
	echo "<td>".$row["AVA_DATA_HORA"]."</td>";
	echo "<td>".$row["AVA_NOTA"]."</td>";
	?>
	
	<?php
	echo "</tr>";
	endforeach;
	?>
		
	</tbody>
</table>
</div>
</center>
<center>
<div class="gerenciar_div_responsivo">
<table id="table" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Assunto</th>
			<th>Estabelecimento</th>
			<th>D/H</th>
			<th>Estrelas</th>
		</tr>
	</thead>
	<tbody id="ajustestable">

	<?php 
	$cont2=0;
	foreach ($resultado as $row):
	echo "<tr>";
	echo "<td>#".$row['AVA_ID']."</td>";
	echo "<td>".ucprimeiro(limitar($row["AVA_DESCRICAO"],100))."</td>";
	echo "<td>".limitar("$CONT_NOME[$cont2]",40)."</td>";
	$cont2++;
	echo "<td>".$row["AVA_DATA_HORA"]."</td>";
	echo "<td>".$row["AVA_NOTA"]."</td>";
	?>
	
	<?php
	echo "</tr>";
	endforeach;
	?>
		
	</tbody>
</table>
</div>
</center>
</body>
</html>