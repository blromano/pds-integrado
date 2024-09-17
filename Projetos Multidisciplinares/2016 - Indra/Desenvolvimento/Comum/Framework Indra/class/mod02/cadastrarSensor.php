<?php
include '../../dao/mod02/sensorDAO.php';

$sensorDAO = new sensorDAO();
$sensor = new Sensor(null,$_POST['id_pcd'],$_POST['id_tipo'],$_POST['periodicidade_med'],0);
$sensorDAO->Criar($sensor);
$lista = $sensorDAO->Listar();
if(isset($lista)){
	
	$data = array();
	
	foreach ($lista as $value):
			
			$data[] = array("id"=>$value->getId(),"id_pcd"=> $value->getIdPcd(),"id_tipo"=> $value->getIdTipo(),"periodicidade_med"=> $value->getPeriodicidadeMed(),"estado"=> $value->getEstado());
				
					//"id"     => $value->getId(),
					//"cidade"  => $value->getCidade(),
					//"estado"   => $value->getEstado(),
					//"descricao"   => $value->getDescricao(),
					//"latitude"    => $value->getLatitude(),
					//"longitude"   => $$value->getLongitude()
					
				
			endforeach;
			
        
		
        echo json_encode($data);
	
	
	
}

?>