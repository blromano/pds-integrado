<?php

namespace App\Controller;

use FW\Controller\Action;
use App\Model\EventosModel;
use App\DAO\EventosDAO;
use App\DAO\ModalidadesDAO;
use App\Model\ModalidadesModel;
use App\Model\Eventos_ModalidadesModel;
use App\DAO\Eventos_ModalidadesDAO;
use App\Model\ResponsavelEventoModalidadeModel;
use App\DAO\Responsavel_Evento_ModalidadeDAO;

class Responsavel_Evento_ModalidadeController extends Action {

    public function inserir(){  
            
            $responsavelModalidadeModel = new ResponsavelEventoModalidadeModel();

            
            $responsavelModalidadeModel->__set("FK_RESPONSAVEIS_EQUIPE_RES_ID", $_GET["RES_ID"]);
            $responsavelModalidadeModel->__set("FK_EVENTOS_MODALIDADES_EVM_ID", $_GET["EVM_ID"]);
            
            
            //$eventos_modalidadesModel = new Eventos_ModalidadesModel();

            //$eventos_modalidadesModel->__set("EVM_ID", $_POST['EVM_ID']);
            

            $responsavelModalidadeDAO = new Responsavel_Evento_ModalidadeDAO();
            $responsavelModalidadeDAO->inserirResponsavelModalidade($responsavelModalidadeModel);

            

            header('Location: /dashboard/responsaveis_equipe/listar');
        }


    public function listar() {    
            $title = "Atribuir responsável a um evento";
            $texto = "";
            $icone_editar='<i class="mdi mdi-pencil"></i>';

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar;

            $eventoDAO = new EventosDAO();
            $eventos = $eventoDAO->listar();

            $this->getView()->eventos = $eventos;        
        $this->render('atribuirEvento', 'dashboard');      
    }

    public function atribuirResponsavelEvento(){
            $title = "Atribuir responsável a Modalidade";
            $texto = "";

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar;

            $modalidadeDAO = new ModalidadesDAO();
            $modalidades = $modalidadeDAO->listar_modalidades_evento($_GET["EVO_ID"]);
        

            $eventosDAO = new EventosDAO();
            $evento = $eventosDAO->buscarPorId($_GET["EVO_ID"]);
        
            if ($evento) {
                $this->getView()->nome_evento = $evento->__get('EVO_NOME'); 
            } else {
                $this->getView()->nome_evento = 'Evento não encontrado';
            }
        
            $this->getView()->modalidades = $modalidades;
            $this->render('atribuirResponsavelEvento', 'dashboard');
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

    public function excluirResponsavelModalidade() { 
        $responsavelDAO = new Responsaveis_EquipeDAO();
        $eventosModalidadeDAO = new Eventos_ModalidadesDAO();
        $responsavelEventoModalidadeDAO= new Responsavel_Evento_ModalidadeDAO(); 
        
        if($_GET['RES_ID']=$_GET['FK_RESPONSAVEIS_EQUIPE_RES_ID']&$_GET['EVM_ID']=$_GET['FK_EVENTOS_MODALIDADES_EVM_ID']){
            $responsavelEventoModalidadeDAO->excluirResponsavelModalidade($_GET['REM_ID']);
            header('Location: /dashboard/responsaveis_equipe/listar');       
        }             
    }

    public function CriarTabelasDeResultados(){            
        $this->render('CriarTabelasDeResultados','dashboard');      
    }
//insere um responsavel no evento respectivo as modalidades listadas e lista as modalidades do evento
    public function AtribuirResponsavelEmModalidades(){
        $title = "Inscrever Responsável nas Modalidades - Dashboard";
            $texto = "Inscrever Responsável nas Modalidades do  ";
            $icone_editar = '<i class="mdi mdi-pencil"></i>';
            $icone_excluir = '<i class="mdi mdi-delete-forever"></i>';
            $icone_resultado = '<i class="mdi mdi-trophy-variant-outline"></i>';
        
            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar;
            $this->getView()->icone_excluir = $icone_excluir;
            $this->getView()->icone_resultado = $icone_resultado;
        
            $modalidadeDAO = new ModalidadesDAO();
            $modalidades = $modalidadeDAO->listar_modalidades_evento($_GET["EVO_ID"]);
        

            $eventosDAO = new EventosDAO();
            $evento = $eventosDAO->buscarPorId($_GET["EVO_ID"]);
        
            if ($evento) {
                $this->getView()->nome_evento = $evento->__get('EVO_NOME'); 
            } else {
                $this->getView()->nome_evento = 'Evento não encontrado';
            }
        
        $this->getView()->modalidades = $modalidades;            
        $this->render('atribuirModalidade','dashboard');      
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
        $resultadSegundoColocadoModel = new ResultadosModel();
        $resultadoTerceiroColocadoModel = new ResultadosModel();

        $resultadosDAO = new ResultadosDAO();

        $resultadoPrimeiroColocadoModel->__set("RST_COLOCACAO", '1');
        $resultadoPrimeiroColocadoModel->__set("FK_EVENTOS_MODALIDADES_EVM_ID", $_POST['EVM_ID']);
        $resultadoPrimeiroColocadoModel->__set("FK_CAMPUS_CAM_ID", $_POST['campus1']);
        $resultadosDAO->alterar($resultadoPrimeiroColocadoModel);
        
        $resultadSegundoColocadoModel->__set("RST_COLOCACAO", '2');
        $resultadSegundoColocadoModel->__set("FK_EVENTOS_MODALIDADES_EVM_ID", $_POST['EVM_ID']);
        $resultadSegundoColocadoModel->__set("FK_CAMPUS_CAM_ID", $_POST['campus2']);
        $resultadosDAO->alterar($resultadSegundoColocadoModel);

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
