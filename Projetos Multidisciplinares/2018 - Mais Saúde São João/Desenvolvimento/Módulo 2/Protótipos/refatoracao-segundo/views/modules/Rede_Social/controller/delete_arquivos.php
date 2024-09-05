<?php
    require_once "../Publicacoes.php";
	$pub_dao = new Publicacoes;
	if($_POST['variavel'] == "imagem")
	{
		$pub_dao->remove_imagem($_POST['id']);
	}
	elseif($_POST['variavel'] == "video")
	{
		$pub_dao->remove_video($_POST['id']);
	}
?>