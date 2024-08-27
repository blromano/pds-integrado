<?php
include '../../dao/mod02/pcdDAO.php';

$pcdDAO = new pcdDAO();

$pcd = new PCD($_POST['id'],$_POST['cidade'],$_POST['estado'],$_POST['latitude'],$_POST['longitude'],$_POST['descricao'],null);


$pcdDAO->Atualizar($pcd);


$pcdDAO = new pcdDAO();

$lista = $pcdDAO->Listar();

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



        echo json_encode($data);

    }



?>