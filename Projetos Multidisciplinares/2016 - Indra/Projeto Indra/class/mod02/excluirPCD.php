<?php
include '../../dao/mod02/pcdDAO.php';

$pcdDAO = new pcdDAO();

$pcd = new PCD($_REQUEST['id'],null,null,null,null,null,null);



$valor = $pcdDAO->Deletar($pcd);


$lista = $pcdDAO->Listar();



if($valor == 1){
	
	
	if(isset($lista)){


        $data = array();

            foreach ($lista as $value):

            $data[] = array("id"=>$value->getId(),"cidade"=> $value->getCidade(),"estado"=> $value->getEstado(),"descricao"=> $value->getDescricao(),"latitude"=> $value->getLatitude(),"longitude"=> $value->getLongitude());

                    //"id"     => $value->getId(),
                    //"cidade"  => $value->getCidade(),
                    //"estado"   => $value->getEstado(),
                    //"descricao"   => $value->getDescricao(),
                    //"latitude"    => $value->getLatitude(),
                    //"longitude"   => $$value->getLongitude()


            endforeach;




    }
	
}else{
	
	$data = false;
}
echo json_encode($data);


?>