<?php

include '../../../../dao/mod05/alertaUserDAO.php';


date_default_timezone_set('America/Sao_Paulo');


$pastaUpload =  getProximaPasta('../../../../img/alerta/alertasUsuarios/' . date('Ymd'));
criarDiretorio($pastaUpload);
$qntFiles = count($_FILES['image']['name']);

$caminhos = [];

for($i = 0; $i < $qntFiles; $i++){
	$caminhoImagem = $pastaUpload . '/' . ($i + 1) . '.png';
	$caminhoImgOriginal = $_FILES['image']['tmp_name'][$i];
	if(move_uploaded_file($caminhoImgOriginal, $caminhoImagem))
		$caminhos[] = end(explode('../../../../', $caminhoImagem));
}

$alertaUserDAO = new alertaUserDAO();
$dataHora = new DateTime('NOW');
$alertaUser= new alertaUser(null, $_POST['desc'], $_POST['rua'], $_POST['bairro'], $_POST['cidade'],  $_POST['status'] ,$dataHora->format('Y-m-d H:i:s'), $_POST['tipoAlerta'], $_POST['idUsuario'], $caminhos);

echo $alertaUserDAO->create($alertaUser);

function criarDiretorio($caminho)
{
     return is_dir($caminho) || mkdir($caminho);
}

function getProximaPasta($caminho){
	if (!is_dir($caminho)) mkdir($caminho);
	$files = scandir($caminho);
	$ultimaPasta = count($files)-2;
	return $caminho . '/' . ($ultimaPasta + 1);
}
