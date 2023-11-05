<?php
header("Content-type: text/json");
include_once '../../controle/Conexao.php';
include_once '../../controle/ReclamacoesDAO.php';

$conexao = new Conexao();
$recDAO = new ReclamacoesDAO();

$reclamacoes = new Reclamacoes();


$tamanho = count($recDAO->listarTodos());


//RECLAMAÇÃO JOIN RESPOSTA COM O MESMO ID
$tabelaJoin = array();

$i=0;
$rec = new Reclamacoes();
$recPush = new Reclamacoes();
$numReclamacoes = new NumReclamacoes();
// for ($i; $i<100; $i++){
// 	$rec=$recDAO->pesquisarPorIdSolucionados($i+1);
// 	if($rec->getSolucao()==1){
// 		// $numReclamacoes->setDate($rec->getDate());
// 		// $numReclamacoes->setReclamacoesTotais($recDAO->numeroReclamacoesAteData($rec->getDate()));
// 		// $date = strtotime($numReclamacoes->getDate())*1000;
// 		// $recTotais = number_format($numReclamacoes->getReclamacoesTotais(),2);
// 		// $data[] = "[$date, $recTotais]";
// 	}else{

// 	}

// 	array_push($tabelaJoin, $rec);
// }
$idEstabelecimento = 795;
if (isset($_GET['id'])){
	$idEstabelecimento = $_GET["id"];
}


$fetchEst = array();
// $idEstabelecimento=795;
$fetchEst = $recDAO->pesqusiarEstabelecimento($idEstabelecimento);
// var_dump($fetchEst);
$semSolucao=0;
$totais=0;

foreach ($fetchEst as $est) {
	# code...
	$do = false;
	$date = strtotime($est->getDate())*1000;
	$totais++;
	$data[] = "[$date, $totais]";
	if ($est->getSolucao()==1){
		//$numReclamacoes->setDate($est->getDate());
		//$numReclamacoes->setReclamacoesTotais($recDAO->numeroReclamacoesAteData($est->getDate(),$idEstabelecimento));
		
		//$solucionadas = number_format($numReclamacoes->getReclamacoesTotais(),2);
		// $do=true;
		// $data[] = "[$date, $totais]";
	}
	else{
		$semSolucao++;
		// $do = false;
		$data1[] = "[$date, $semSolucao]";
	}
	

}

$jsonFinal = json_encode($data, JSON_PRETTY_PRINT|JSON_NUMERIC_CHECK);

$jsonFinal = str_replace('"',"",$jsonFinal);
echo str_replace(' ',"",$jsonFinal);

?>

