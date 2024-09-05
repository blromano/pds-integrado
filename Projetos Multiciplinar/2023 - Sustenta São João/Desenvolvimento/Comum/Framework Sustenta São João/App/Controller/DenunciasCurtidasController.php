<?php

    namespace App\Controller;

    use FW\Controller\Action;
    use App\Model\DenunciasCurtidasModel;
    use App\DAO\DenunciasCurtidasDAO;
    
    class DenunciasCurtidasController extends Action{

        public function curtirDescurtirDenuncia(){
            $curtida = new DenunciasCurtidasModel();
            $curtida->__set("FK_DENUNCIAS_DEN_ID", $_POST['idDenuncia']);
            $curtida->__set("FK_CIDADAOS_USU_ID", $_POST['idUsuario']);

            $curtidaDAO = new DenunciasCurtidasDAO();

            // Verifica se o usuário já curtiu a denúncia
            $curtidaExiste = $curtidaDAO->listarPorId($_POST['idUsuario'], $_POST['idDenuncia']);

            if ($curtidaExiste) {
                $curtidaDAO->excluir($curtida);
                return false;
            } else {
                $curtidaDAO->inserir($curtida);
                return true;
            }
        }

        public function validaAutenticacao() {
            if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
                header('Location: /login');
                die();
            }
        }

    }
?>