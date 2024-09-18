<?php
include 'pcdDAO.php';

$pcdDAO = new pcdDAO();

$pcd = new PCD($_POST['ide'],$_POST['cidade1'],$_POST['estado1'],$_POST['latitude1'],$_POST['longitude1'],$_POST['descricao1'],null);


if($pcdDAO->Atualizar($pcd)){
	echo'<script>window.location="../listarPCDs.php";</script>';
}else{
	echo'<script>window.location="../listarPCDs.php";</script>';
}


?>