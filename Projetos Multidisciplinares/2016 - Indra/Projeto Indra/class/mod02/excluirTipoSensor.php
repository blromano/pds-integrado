<?php
include '../../dao/mod02/tipoSensorDAO.php';
include '../../dao/mod02/tipoMedicaoDAO.php';

$tiposensorDAO = new tipoSensorDAO();
$tipoMedicaoDAO = new tipoMedicaoDAO();

if($tiposensorDAO->Deletar($_POST['idtiposensor']) == 1){
$lista = $tiposensorDAO->Listagem_Tipo_Sensor();
if(isset($lista)){

      $data = array();

			foreach ($lista as $value):
        $timidnome1 = $tipoMedicaoDAO->listarPorId($value->getTimid());
        $timidnome2 = $timidnome1[0]->getTipoMedicao();
  			$data[] = array("TSE_ID"=>$value->getId(),"TSE_TIPO_SENSOR"=>$value->getTipo_sensor(), "TSE_TIMID"=>$timidnome2, "UNIDADE_MEDIDA"=>$value->getUnidade_medida(), "DESCRICAO"=>$value->getDescricao());

      endforeach;
      echo json_encode($data);
    }
  } else {
    $retorno = array();
    $a = ($_POST['idtiposensor']);
    $retorno[] = array("valor"=>0);
    echo json_encode($retorno);
  }

?>
