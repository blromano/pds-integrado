<?php 
include '../../../../dao/mod05/alertaUserDAO.php';

$numImgs = $_POST['numImgs'] + 1;
$pastaUpload = '../../../../' . $_POST['caminho'];
$qntFiles = count($_FILES['image']['name']);

for($i = 0; $i < $qntFiles; $i++){
	$caminhoImagem = $pastaUpload . ($i + $numImgs) . '.png';
	$caminhoImgOriginal = $_FILES['image']['tmp_name'][$i];	
	if(move_uploaded_file($caminhoImgOriginal, $caminhoImagem))
		$caminhos[] = end(explode('../', $caminhoImagem));
}
$alertaUserDAO = new alertaUserDAO();
echo $alertaUserDAO->addImagens($numImgs, $caminhos, $_POST['id'], $qntFiles);