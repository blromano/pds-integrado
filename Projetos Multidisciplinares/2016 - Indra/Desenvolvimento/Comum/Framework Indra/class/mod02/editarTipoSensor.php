<?php
include '../../dao/mod02/tipoSensorDAO.php';
include '../../dao/mod02/tipoMedicaoDAO.php';

$tipoSensorDAO = new tipoSensorDAO();
$tipoMedicaoDAO = new tipoMedicaoDAO();
$tiposensor = new tipoSensor($_REQUEST['idtiposensor-modal'], $_REQUEST['unidadeeditar'], $_REQUEST['tipoSensoreditar'], $_REQUEST['tipoeditar'], $_REQUEST['descricaoeditar']);
$tipoSensorDAO->Atualizar($tiposensor);
$lista = $tipoSensorDAO->Listagem_Tipo_Sensor();
if(isset($lista)){

      $data = array();

			foreach ($lista as $value):
        $timidnome1 = $tipoMedicaoDAO->listarPorId($value->getTimid());
        $timidnome2 = $timidnome1[0]->getTipoMedicao();
  			$data[] = array("TSE_ID"=>$value->getId(),"TSE_TIPO_SENSOR"=>$value->getTipo_sensor(), "TSE_TIMID"=>$timidnome2, "UNIDADE_MEDIDA"=>$value->getUnidade_medida(), "DESCRICAO"=>$value->getDescricao());

      endforeach;
      echo json_encode($data);
    }
?>