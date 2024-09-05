<?php
session_start();
include "enviarImagem.php";
include "../../controle/ReclamacoesDAO.php";
include "../../controle/UsuarioDAO.php";
$nome_estabelecimento = $_SESSION["nome"];
$EST_ID = $_SESSION["EST_ID"];
date_default_timezone_set('America/Sao_Paulo');
$REC_DATA_HORA = date('Y-m-d H:i');

$ReclamacaoDAO = new ReclamacoesDAO;
$ReclamacaoDAO->reclamacaoID();
$primeiromaiusculo = $ReclamacaoDAO->primeiroMaiusculo();

$UsuarioDAO = new UsuarioDAO;
$USU_ID = $UsuarioDAO->buscarUsuario($_SESSION['USU_EMAIL']);
$USU_TIPO_ID = $UsuarioDAO->buscarTipoId($_SESSION['USU_EMAIL']);
//variavel link imagem ta ali pego atraves da session criada no upload
$REC_NOTA = $_POST['REC_NOTA'];

//variavel fixa
$titulo = $_POST['REC_TITULO_RECLAMACAO'];
$descricao = $_POST['REC_DESCRICAO'];
$REC_TITULO_RECLAMACAO = ucprimeiro($titulo);
$REC_DESCRICAO = ucprimeiro($descricao);

//aqui começa o codigo do upload da imagem:
if ((isset($_POST["submit"])) && (! empty($_FILES['REC_LINK_IMAGEM']))){
$upload = new Upload($_FILES['REC_LINK_IMAGEM'], 1000, 800, "../../images/rec_upload/");
echo $upload->salvar();		
}
$REC_IMAGEM = $_SESSION['REC_LINK_IMAGEM'];//pego esse codigo do upload.class
$REC_LINK_IMAGEM = 'http://localhost/RECLAME_SAO_JOAO-INTEGRAR/images/rec_upload/'.$_SESSION['REC_LINK_IMAGEM'];

//PEGAR O CHECKBOX PELA QUANTIDADE:
if(isset($_POST["submit"])){
	$QUANT_CHECKBOX = 0;
	for($i=0;$i<count($_POST["REC_NOTA"]);$i++){
		$QUANT_CHECKBOX++;
	}
}

//Pegar o NOME_CHECKBOX selecionado, pelo nome:
$NOME_CHECKBOX = "";
foreach ($REC_NOTA as $item) {
    $NOME_CHECKBOX .= $item . ", ";
}
$NOME_CHECKBOX = rtrim($NOME_CHECKBOX, ', ');

//Pegar o NOME_CHECKBOX selecionado sozinho, pelo nome:
$ID_CHECKBOX = "";
foreach ($REC_NOTA as $item) {
    $ID_CHECKBOX = $item;
}

$TRC_ID = $ID_RECLAMACAO[0][0];

//formula da estrela
$media = 0;
$s = $QUANT_CHECKBOX;
$n = 9;

$media = (($n-$s) * (3/$n)) + 2;
$REC_NOTA_FORMATADA = round($media, 1);

//armazenar as variaveis em uma session
$_SESSION["REC_TITULO_RECLAMACAO"] = $REC_TITULO_RECLAMACAO; 
$_SESSION["REC_DESCRICAO"] = $REC_DESCRICAO;
$_SESSION["REC_DATA_HORA"] = $REC_DATA_HORA;
$_SESSION["REC_LINK_IMAGEM"] = $REC_LINK_IMAGEM; 
$_SESSION["REC_IMAGEM"] = $REC_IMAGEM; 
$_SESSION["REC_NOTA_FORMATADA"] = $REC_NOTA_FORMATADA; 
$_SESSION["REC_APROVADO"] = 0; 
$_SESSION["QUANT_CHECKBOX"] = $QUANT_CHECKBOX;
$_SESSION["NOME_CHECKBOX"] = $NOME_CHECKBOX;
$_SESSION['EST_ID'] = $EST_ID;
$_SESSION['CON_ID'] = $USU_ID;
$_SESSION['ID_CHECKBOX'] = $ID_CHECKBOX; 

header("location:../../rec_revise.php"); 
?>
