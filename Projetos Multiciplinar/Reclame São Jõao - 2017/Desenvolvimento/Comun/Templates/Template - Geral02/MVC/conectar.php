<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>CONEXAO</title>
</head>
<body>
	<?php
	include_once "controle/Conexao.php";
	$con = new Conexao(); 
	include_once "controle/ReclamacoesDAO.php";
	include_once "controle/EstabelecimentosDAO.php";
	include_once "modelo/Estabelecimentos.php";
	include_once "modelo/Reclamacoes.php";
	include_once "modelo/Tipo_Estabelecimentos.php";
	include_once "controle/Tipo_EstabelecimentosDAO.php";

	$est = new Estabelecimentos();
	$estDAO = new EstabelecimentosDAO();
	$recDAO = new ReclamacoesDAO();
	$tesDAO = new Tipo_EstabelecimentosDAO();
	$tes = new Tipo_Estabelecimentos();
	$var = $recDAO->listarTodos();
	$rec = new Reclamacoes();
	$recById = $recDAO->pesquisarPorId(15);
	$varEst = $estDAO->listarTodos();
	// var_dump($recById);
	$tamanho = count($var);
	$tamanhoEst = count($varEst);
	
// 	//start
// 	$errei = array();
// 	$i=1;
// 	$rec2 = new Reclamacoes();

// 	// foreach ($var as $linha) {
// 	// 	$rec2=$recDAO->pesquisarPorId(i);
// 	// 	$i++;
// 	// }
// 	for ($i; $i<$tamanho; $i++){
// 		$rec2 = new Reclamacoes();
// 		$rec2=$recDAO->pesquisarPorId($i+1);
// 		array_push($errei, $rec2);
// 	}

// 	var_dump($errei);
// //end







	if (count($varEst)<1)
	{
		echo"<br/> Não existem registros"; 
	}
	else 
	{

		?>

		<table border = "2"> 
			<tr>
				<th> ID </th>
				<th> Estabelecimentos </th>
				<th> Categoria </th>
				<th> Pontuação</th>           
			</tr>
			<?php $numero=1; ?>
			<?php foreach($varEst as $linha) { ?>
			<tr>
				<?php $tes=$tesDAO->pesquisarPorId($numero);?>
				<td><?php echo $linha['EST_ID'];?></td>                     
				<td><?php echo $linha['EST_NOME_FANTASIA'];?></td>                     
				<td><?php foreach($tes as $lia) {
					echo $lia['TES_CATEGORIA'];
					} ?></td>   
				<td><?php echo $linha['EST_MEDIA_RECLAMACAO'];?></td>                
			</tr>
			<?php } ?>
		</table>
		<?php } ?>

		<?php 

		if (count($var)<1)
		{
			echo"<br/> Não existem registros"; 
		}
		else 
		{

			?>

			<table border = "2"> 
				<tr>
					<th> ID </th>
					<th> Descrição </th>
					<th> Data-Hora </th>
					<th> Aprovado</th>
					<th> Titulo</th>
					<th> Nota</th>            
				</tr>
				<?php foreach($var as $linha) { ?>
				<tr>
					<td><?php echo $linha['REC_ID'];?></td>                     
					<td><?php echo $linha['REC_DESCRICAO'];?></td>                     
					<td><?php echo $linha['REC_DATA_HORA'];?></td>   
					<td><?php echo $linha['REC_APROVADO'];?></td> 
					<td><?php echo $linha['REC_TITULO_RECLAMACAO'];?></td>    
					<td><?php echo $linha['REC_NOTA'];}?></td>                 
				</tr>
				<?php } ?>
			</table>


		</body>
		</html>