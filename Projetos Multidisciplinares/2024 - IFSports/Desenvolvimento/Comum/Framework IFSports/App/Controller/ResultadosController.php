<?php

namespace App\Controller;

use FW\Controller\Action;
use App\Model\ResultadosModel;
use App\DAO\ResultadosDAO;
use App\DAO\CampusDAO;
use App\Model\CampusModel;
use App\DAO\EventosDAO;
use App\Model\EventosModel;
use App\DAO\ModalidadesDAO;
use App\Model\ModalidadesModel;

class ResultadosController extends Action {

    //o método index vai renderizar o conteúdo de view/index.php e colocar dentro da dashboard na área especificada

    public function listar() {
        $this->render('listar', 'dashboard'); // passar os resultados para a view 
    }

    public function cadastrar() {             
        $this->render('cadastrar','dashboard');
    }

    public function editar() {             
        $this->render('editar','dashboard');
    }

    public function excluir() {             
        $this->render('excluir','dashboard');
    }

    public function CriarTabelasDeResultados(){            
        $this->render('CriarTabelasDeResultados','dashboard');      
    }

    public function GerenciarTabelasDeResultados() {  
        $title = "Gerenciar Resultados - Dashboard";
        $texto = "";
        $icone_editar='<i class="ti-file btn-icon-append"></i>';

        $this->getView()->title = $title;
        $this->getView()->texto = $texto;         
        
        $campus = new CampusDAO();
        $listaCampus = $campus->listar();           
        $this->getView()->listaCampus = $listaCampus; 

        $eventos = new EventosDAO();
        $nomeEvento = $eventos->buscarporid($_GET['EVM_ID']);           
        $this->getView()->nomeEvento = $nomeEvento; 

        $modalidades = new ModalidadesDAO();
        $nomeModalidade = $modalidades->buscarporid($_GET['EVM_ID']);           
        $this->getView()->nomeModalidade = $nomeModalidade; 

        $resultadosDAO = new ResultadosDAO();
        $resultadosPorModalidade = $resultadosDAO->pesquisarResultadoPorModalidade($_GET['EVM_ID']);
        
        if ($resultadosPorModalidade) {
            $campus1 = $resultadosPorModalidade[0]['FK_CAMPUS_CAM_ID'];
            $campus2 = $resultadosPorModalidade[1]['FK_CAMPUS_CAM_ID'];
            $campus3 = $resultadosPorModalidade[2]['FK_CAMPUS_CAM_ID'];
            
            $this->getView()->campus1 = $campus1;
            $this->getView()->campus2 = $campus2;
            $this->getView()->campus3 = $campus3;
        }
        
        $this->render('GerenciarTabelasDeResultados','dashboard');
    }

    public function InserirResultadosPorModalidade() {

        $resultadoPrimeiroColocadoModel = new ResultadosModel();
        $resultadSegundoColocadoModel = new ResultadosModel();
        $resultadoTerceiroColocadoModel = new ResultadosModel();

        $resultadosDAO = new ResultadosDAO();

        $resultadoPrimeiroColocadoModel->__set("RST_COLOCACAO", '1');
        $resultadoPrimeiroColocadoModel->__set("FK_EVENTOS_MODALIDADES_EVM_ID", $_POST['EVM_ID']);
        $resultadoPrimeiroColocadoModel->__set("FK_CAMPUS_CAM_ID", $_POST['campus1']);
        $resultadosDAO->inserir($resultadoPrimeiroColocadoModel);
        
        $resultadSegundoColocadoModel->__set("RST_COLOCACAO", '2');
        $resultadSegundoColocadoModel->__set("FK_EVENTOS_MODALIDADES_EVM_ID", $_POST['EVM_ID']);
        $resultadSegundoColocadoModel->__set("FK_CAMPUS_CAM_ID", $_POST['campus2']);
        $resultadosDAO->inserir($resultadSegundoColocadoModel);

        $resultadoTerceiroColocadoModel->__set("RST_COLOCACAO", '3');
        $resultadoTerceiroColocadoModel->__set("FK_EVENTOS_MODALIDADES_EVM_ID", $_POST['EVM_ID']);
        $resultadoTerceiroColocadoModel->__set("FK_CAMPUS_CAM_ID", $_POST['campus3']);
        $resultadosDAO->inserir($resultadoTerceiroColocadoModel);
        
       header('Location: /dashboard/modalidades/GerenciarTabelasDeResultados?EVM_ID=' . $_POST['EVM_ID'] . "&campus1=" . $_POST['campus1'] . "&campus2=" . $_POST['campus2'] . "&campus3=" . $_POST['campus3']);
    }

    public function AtualizarResultadosPorModalidade() {
        $resultadoPrimeiroColocadoModel = new ResultadosModel();
        $resultadoSegundoColocadoModel   = new ResultadosModel();
        $resultadoTerceiroColocadoModel = new ResultadosModel();

        $resultadosDAO = new ResultadosDAO();

        $resultadoPrimeiroColocadoModel->__set("RST_COLOCACAO", '1');
        $resultadoPrimeiroColocadoModel->__set("FK_EVENTOS_MODALIDADES_EVM_ID", $_POST['EVM_ID']);
        $resultadoPrimeiroColocadoModel->__set("FK_CAMPUS_CAM_ID", $_POST['campus1']);
        $resultadosDAO->alterar($resultadoPrimeiroColocadoModel);
        
        $resultadoSegundoColocadoModel->__set("RST_COLOCACAO", '2');
        $resultadoSegundoColocadoModel->__set("FK_EVENTOS_MODALIDADES_EVM_ID", $_POST['EVM_ID']);
        $resultadoSegundoColocadoModel->__set("FK_CAMPUS_CAM_ID", $_POST['campus2']);
        $resultadosDAO->alterar($resultadoSegundoColocadoModel);

        $resultadoTerceiroColocadoModel->__set("RST_COLOCACAO", '3');
        $resultadoTerceiroColocadoModel->__set("FK_EVENTOS_MODALIDADES_EVM_ID", $_POST['EVM_ID']);
        $resultadoTerceiroColocadoModel->__set("FK_CAMPUS_CAM_ID", $_POST['campus3']);
        $resultadosDAO->alterar($resultadoTerceiroColocadoModel);

       header('Location: /dashboard/modalidades/GerenciarTabelasDeResultados?EVM_ID=' . $_POST['EVM_ID'] . "&campus1=" . $_POST['campus1'] . "&campus2=" . $_POST['campus2'] . "&campus3=" . $_POST['campus3']);
    }

    public function VisualizarTabelasDeResultados() {             
        $this->render('VisualizarTabelasDeResultados','dashboard');
    }

    public function validaAutenticacao() {
        // Código da função de validação aqui
    }

} 
?>
