<?php

include ('../../controle/ReclamacoesDAO.php');
date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d H:i');

$ReclamacaoDAO = new ReclamacoesDAO;
$primeiromaiusculo = $ReclamacaoDAO->primeiroMaiusculo();

$nome = $_POST['nome'];
$REC_TITULO = ucprimeiro($nome);
$detalhes = $_POST['detalhes'];
$REC_DESCRICAO = ucprimeiro($detalhes);

$id = $_POST['id'];
$REC_ID = $id;

$editar = new Reclamacoes();
$editar->setREC_DATA_HORA($date); 
$editar->setREC_TITULO_RECLAMACAO($REC_TITULO);
$editar->setREC_DESCRICAO($REC_DESCRICAO);

$resultado=$ReclamacaoDAO->editarReclamacao($REC_ID, $REC_TITULO, $REC_DESCRICAO, $date);

if ($resultado == true){	
echo "
	<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/RECLAME_SAO_JOAO-INTEGRAR/rec_gerenciar.php?pagina=2'>
	<script type=\"text/javascript\">
	alert(\"Reclamação editada com Sucesso.\");
	</script>
";		   
}
else{ 	
echo "
	<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/RECLAME_SAO_JOAO-INTEGRAR/rec_gerenciar.php?pagina=2'>
	<script type=\"text/javascript\">
	alert(\"Reclamação não foi editada com Sucesso.\");
	</script>
";		   
}
	
?>