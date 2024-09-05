<?php

include '../../dao/mod02/pcdDAO.php';
include '../../dao/mod02/alteracaoDAO.php';

$pcdDAO = new pcdDAO();
$alteracaoDAO = new alteracaoDAO();

$status = $_REQUEST['input-status'];
$timezone_identifier = "America/Sao_Paulo";
date_default_timezone_set ($timezone_identifier);
$today = date("Y-m-d H:i:s");

if($status == 'Ativar'){
$pcd = new PCD ($_REQUEST['input-id'],null,null,null,null,null,1);
$alteracao = new alteracaoDeStatus(null, $today, $_REQUEST['justificativa'], 0, $_REQUEST['input-id'], 1);
} else{
$pcd = new PCD ($_REQUEST['input-id'],null,null,null,null,null,0);
$alteracao = new alteracaoDeStatus(null, $today, $_REQUEST['justificativa'], 1, $_REQUEST['input-id'], 1);
}
$pcdDAO->salvarAlteracao($pcd);
$alteracaoDAO->Criar($alteracao);

$lista = $pcdDAO->Listar_Funcionamento();

if(isset($lista)){

      $data = array();

			foreach ($lista as $value):

  			$data[] = array("PCD_ID"=>$value->getId(), "PCD_STATUS_FUNCIONAMENTO"=>$value->getPCD_STATUS_FUNCIONAMENTO());

      endforeach;
      echo json_encode($data);
    }

?>
