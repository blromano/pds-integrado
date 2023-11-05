<?php
session_start();
include ('../../controle/ReclamacoesDAO.php');
include ('../../controle/MotivoExclusoesReclamacoesDAO.php');
$MotivoExclusoesReclamacoesDAO = new MotivoExclusoesReclamacoesDAO;
$ReclamacaoDAO = new ReclamacoesDAO;

date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d H:i');
$REC_ID = $_GET['id'];

$primeiromaiusculo = $ReclamacaoDAO->primeiroMaiusculo();
$REC_TITULO_RECLAMACAO = $ReclamacaoDAO->selecionarRecTitulo($REC_ID);

$descricao = $_POST['descricao'];
$MER_MOTIVO_EXCLUSAO = ucprimeiro($descricao);


$motivo = new MotivoExclusoesReclamacoes();
$motivo->setMER_DATA_HORA($date); 
$motivo->setMER_MOTIVO_EXCLUSAO($MER_MOTIVO_EXCLUSAO);
$motivo->setMER_RECLAMACAO_CONSUMIDOR($REC_TITULO_RECLAMACAO);
$motivo->setCON_ID($_SESSION['CON_ID']);


$MotivoExclusoesReclamacoesDAO->inserirMotivoExclusao($motivo);


$deletar = $ReclamacaoDAO->deletarReclamacao($REC_ID);

if ($deletar == true){	
echo "
	<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/RECLAME_SAO_JOAO-INTEGRAR/rec_gerenciar.php?pagina=2'>
	<script type=\"text/javascript\">
	alert(\"Reclamação apagada com Sucesso.\");
	</script>
";		   
}
else{ 	
echo "
	<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/RECLAME_SAO_JOAO-INTEGRAR/rec_gerenciar.php?pagina=2'>
	<script type=\"text/javascript\">
	alert(\"Reclamação não foi apagada com Sucesso.\");
	</script>
";		   

}
	
?>
