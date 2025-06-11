<?php

    namespace App\Controller;

    use FW\Controller\Action;
    use App\Model\CidadesModel;
    use App\DAO\CidadesDAO;

    class CidadesController extends Action{

        //o método index vai renderizar o conteúdo de view/index.php e colocar dentro da dashboard na área especificada

        public function cidades(){ 
            $cidadesDAO = new CidadesDAO();
            $cidades = $cidadesDAO->buscarPorId($_GET['estado']);
            return $cidades;
        }
        
        public function validaAutenticacao() {}
    }

?>
