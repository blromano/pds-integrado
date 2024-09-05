<?php 
session_start();

include_once("rec_conexao.php");
// header('Location: www.google.com.br');
date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d H:i');

$textareaD=$_GET['descricao'];
$valor=$_GET['valor'];



$stmt = $conn->prepare("INSERT INTO avaliacoes_estabelecimentos (AVA_DESCRICAO, AVA_DATA_HORA, AVA_NOTA, EST_ID, CON_ID) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $ava_descricao, $ava_data_hora, $ava_nota, $est_id, $con_id);

$ava_descricao=$textareaD;
$ava_data_hora=$date;
$ava_nota=$valor;
$est_id=$_SESSION["est_id"];
$con_id=1;

$stmt->execute();
// $sql="INSERT INTO avaliacoes_estabelecimentos (AVA_DESCRICAO, AVA_DATA_HORA, AVA_NOTA,EST_ID,CON_ID) VALUES (:AVA_DESCRICAO,:AVA_DATA_HORA,:AVA_NOTA,:EST_ID,:CON_ID)";

// if($stmt = $conn->prepare($sql)){
// 	$stmt->bindParam(':AVA_DESCRICAO','adfs');       
// 	$stmt->bindParam(':AVA_DATA_HORA', '2017-02-13'); 
// 	$stmt->bindParam(':AVA_NOTA', 3); 
// 	$stmt->bindParam(':EST_ID', 16);  
// 	$stmt->bindParam(':CON_ID', 1);     
// 	$stmt->execute();
//     //rest of code here
// }else{
//    //error !! don't go further
// 	// var_dump($conn->db->error);
// }

// $stmt = $conn->prepare($sql);

	// INSERT INTO avaliacoes_estabelecimentos (AVA_DESCRICAO, AVA_DATA_HORA, AVA_NOTA,EST_ID,CON_ID) VALUES ('adf','2017-02-13', 3, 15, 1);

	// select * from avaliacoes_estabelecimentos;

// select * from avaliacoes_estabelecimentos;

// $stmt->bindParam(':AVA_DESCRICAO',$textareaD);       
// $stmt->bindParam(':AVA_DATA_HORA', $date); 
// $stmt->bindParam(':AVA_NOTA', $valor); 
// $stmt->bindParam(':EST_ID', $est_id);  
// $stmt->bindParam(':CON_ID', 1);                                      
// $stmt->execute(); 
// $newId = $conn->lastInsertId();
header('Location: index.php?alerta=true');


?>