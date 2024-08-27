<?php
	session_start();
	include_once("rec_conexao.php");
	$nome_estabelecimento = $_SESSION["nome"];
	$id_estabelecimento = $_SESSION["EST_ID"]; 
	date_default_timezone_set('America/Sao_Paulo');
	$date = date('Y-m-d H:i');

	$ava_descricao = $_GET['descricao'];
	$ava_nota = $_GET['valor'];
	$est_id = $id_estabelecimento;
	$ava_data_hora = $date;
	$con_id = 1;
	
	 $sql = "INSERT INTO avaliacoes_estabelecimentos (AVA_DESCRICAO, AVA_DATA_HORA, AVA_NOTA, EST_ID, CON_ID)
   VALUES ('$ava_descricao', '$ava_data_hora', '$ava_nota', '$est_id', '$con_id')";
   
   if ($conn->query($sql) === TRUE) {
	   header('Location: index.php?alerta=true');
   } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
   }
   
?>
