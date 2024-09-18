<?php
include '../../../dao/alertaUserDAO.php';

$alertDAO = new alertaUserDAO();
$caminhoReal = realpath($_POST['caminho']);
if (is_writable($caminhoReal)){
	array_map('unlink', glob("$caminhoReal/*.*")); //Deleta os arquivos dentro da pasta de imagens
	rmdir($caminhoReal); // Deleta a pasta de imagens
	echo $alertDAO->deletar($_POST['id']); // deleta o alerta no banco
}else echo false;

