<?php
include 'pcdDAO.php';

$pcdDAO = new pcdDAO();

$pcd = new PCD($_POST['ide'],null,null,null,null,null,null);

echo $_POST['ide'];

if($pcdDAO->Deletar($pcd)){
	echo'<script>window.location="../listarPCDs.php";</script>';
}else{
	echo'<script>window.location="../listarPCDs.php";</script>';
}


?>