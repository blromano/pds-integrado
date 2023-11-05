<?php
include 'pcdDAO.php';

$pcdDAO = new pcdDAO();

$pcd = new PCD($_POST['ide'],$_POST['cidade'],$_POST['estado'],$_POST['latitude'],$_POST['longitude'],$_POST['descricao'],null);


if($pcdDAO->Atualizar($pcd)){
	echo "<script>alert('Dados editados com sucesso!');</script>";
	
	echo'<script>window.location="../listarPCDs.php";</script>';
	
}else{
	echo'<script>window.location="../listarPCDs.php";</script>';
}


?>