<?php
	session_start();
	include_once("../../controle/Conexao.php");
	include_once("../../controle/AvaliacoesDAO.php");
	include_once("../../controle/ReclamacoesDAO.php");
	include_once("../../controle/ConsumidorDAO.php");
	include "../../controle/UsuarioDAO.php";
	//Pegar sessions
	$nome_estabelecimento = $_SESSION["nome"];
	$id_estabelecimento = $_SESSION["EST_ID"]; 
	
	$ReclamacaoDAO = new ReclamacoesDAO;
	$primeiromaiusculo = $ReclamacaoDAO->primeiroMaiusculo();
	
	$UsuarioDAO = new UsuarioDAO;
	$USU_ID = $UsuarioDAO->buscarUsuario($_SESSION['USU_EMAIL']);
	
	//Pegar data e hora
	date_default_timezone_set('America/Sao_Paulo');
	$date = date('Y-m-d H:i');
	$ava_data_hora = $date;
	
	//gets
	$descricao = $_GET['descricao'];
	$ava_descricao = ucprimeiro($descricao);
	$ava_nota = $_GET['valor'];
	//PEGAR CON_ID APARTIR DO USU_ID
	$ConsumidorDAO = new ConsumidorDAO;
	$con_id = $ConsumidorDAO->idCon($USU_ID);
	//CALCULO MEDIA
	$media_ava = ($ava_nota+$_SESSION["total"])/($_SESSION["total_avaliacoes"]+1); 
	$EST_ID_ANTES = 0;
	$CON_ID_ANTES = 0;
	$notaPdo = new AvaliacoesDAO;
	
	//inserir nova avalição
	$atualizar = $notaPdo->selecionarAvaliacaoAtualizar($id_estabelecimento,$con_id);
	foreach ($atualizar as $row) {
	$EST_ID_ANTES = $row["EST_ID"];
	$CON_ID_ANTES = $row["CON_ID"];
	}
	
	if($id_estabelecimento == $EST_ID_ANTES && $con_id == $CON_ID_ANTES){
		$_SESSION['avaliacaoatualizada'] = "Cadastro Validado com Sucesso!";
		$notaPdo->atualizarAvaliacao($ava_descricao,$ava_data_hora,$ava_nota,$id_estabelecimento,$con_id);
		echo "<script>window.location='../../index.php';</script>";
	}else{
		$_SESSION['avaliacaoainserida'] = "Cadastro Validado com Sucesso!";
		$notaPdo->inserir_avaliacao($ava_descricao,$ava_data_hora,$ava_nota,$id_estabelecimento,$con_id);
		echo "<script>window.location='../../index.php';</script>";
	}

?>
