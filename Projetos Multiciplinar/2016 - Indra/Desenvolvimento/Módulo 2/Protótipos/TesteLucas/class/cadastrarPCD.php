<?php
include 'pcdDAO.php';

$pcdDAO = new pcdDAO();
$pcd = new PCD(null,$_POST['cidade'],$_POST['estado'],$_POST['latitude'],$_POST['longitude'],$_POST['descricao'],null);

if($pcdDAO->Criar($pcd)){
	echo'<script>window.location="../listarPCDs.php";</script>';
}else{
	echo'<script>window.location="../listarPCDs.php";</script>';
}

?>