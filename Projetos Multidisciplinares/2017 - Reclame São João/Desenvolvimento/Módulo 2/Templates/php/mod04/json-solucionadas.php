<?php
header("Content-type: text/json");
include_once '../../controle/Conexao.php';
include_once '../../controle/ReclamacoesDAO.php';


$idEstabelecimento = 795;
if (isset($_GET['id'])){
	$idEstabelecimento = $_GET["id"];
}




$conexao = new Conexao();
$recDAO = new ReclamacoesDAO();

$reclamacoes = new Reclamacoes();


$tamanho = count($recDAO->listarTodos());

// select * from estabelecimentos where est_id=70;
//RECLAMAÇÃO JOIN RESPOSTA COM O MESMO ID

$i=0;
$rec = new Reclamacoes();
$recPush = new Reclamacoes();
$numReclamacoes = new NumReclamacoes();

$fetchEst = array();
$fetchEst = $recDAO->pesqusiarEstabelecimento($idEstabelecimento);
// var_dump($fetchEst);
$semSolucao=0;
$totais=0;
$solucionadas=0;
foreach ($fetchEst as $est) {
	# code...
	$do = false;
	$date = strtotime($est->getDate())*1000;
	$totais++;
	if ($est->getSolucao()==1){
		//$numReclamacoes->setDate($est->getDate());
		//$numReclamacoes->setReclamacoesTotais($recDAO->numeroReclamacoesAteData($est->getDate(),$idEstabelecimento));
		
		//$solucionadas = number_format($numReclamacoes->getReclamacoesTotais(),2);
		$do=true;
		$solucionadas++;
		
	}
	
	else{
		$semSolucao++;
		$do = false;
		$data1[] = "[$date, $semSolucao]";
	}
	$data[] = "[$date, $solucionadas]";

}

// for ($i; $i<100; $i++){
// 	$rec=$recDAO->pesquisarPorIdSolucionados($i+1);
// 	if($rec->getSolucao()==1){
// 		$numReclamacoes->setDate($rec->getDate());
// 		$numReclamacoes->setReclamacoesTotais($recDAO->numeroReclamacoesAteData($rec->getDate()));
// 		$date = strtotime($numReclamacoes->getDate())*1000;
// 		$recTotais = number_format($numReclamacoes->getReclamacoesTotais(),2);
// 		$data[] = "[$date, $recTotais]";
// 	}else{

// 	}

// 	array_push($tabelaJoin, $rec);
// }

$jsonFinal = json_encode($data, JSON_PRETTY_PRINT|JSON_NUMERIC_CHECK);

$jsonFinal = str_replace('"',"",$jsonFinal);
echo str_replace(' ',"",$jsonFinal);

// echo $semSolucao;

?>

