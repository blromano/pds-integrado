<?php


namespace App\Controller;

use FW\Controller\Action;
use App\Model\Duvidas_FeedbacksModel;
use App\DAO\Duvidas_FeedbacksDAO;



class Duvidas_FeedbacksController extends Action{

    public function formCadastroGestor(){   
        $title = "Sustenta São João";
        $texto = "Cadastro de Pessoas";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('index', 'dashboard');
    }

    public function inserirDuvidas_Feedbacks(){
        $dir = "resources/uploaded_files"; 
        $file = $_FILES["DEF_ANEXO"];
        $nome_arquivo = rand() . "_" . $file["name"];
        move_uploaded_file($file["tmp_name"], "$dir/".$nome_arquivo);

        $duvidas_feedbacks = new Duvidas_FeedbacksModel();

        $duvidas_feedbacks->__set("DEF_DESCRICAO",$_POST['DEF_DESCRICAO']);
        $duvidas_feedbacks->__set("DEF_URGENCIA",$_POST['DEF_URGENCIA']);
        $duvidas_feedbacks->__set("DEF_TEMA",$_POST['DEF_TEMA']);
        $duvidas_feedbacks->__set("DEF_STATUS",0);
        $duvidas_feedbacks->__set("DEF_ANEXO",$nome_arquivo);
        $duvidas_feedbacks->__set("FK_CIDADAOS_USU_ID",$_SESSION['id']);
        $duvidas_feedbacks->__set("FK_SETORES_SET_ID", $_POST['FK_SETORES_SET_ID']);
    


        $duvidas_feedbacksdao = new Duvidas_FeedbacksDAO();
        $duvidas_feedbacksdao->inserir($duvidas_feedbacks);

        header('Location: /dashboard/gestaoduvidas'); 
    }

    public function formEditarGestor(){   
        $title = "Sustenta São João";
        $texto = "Editar de Pessoas";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $gestor = new GestorModel();
        $gestorDAO = new GestorDAO();

        $gestor = $gestorDAO->buscarPorId($_GET['id']);

        $this->getView()->gestor = $gestor;
        $this->render('editar', 'dashboard');
    }

    public function alterarDuvidas_Feedbacks(){
        $gestor = new GestorModel();
        $gestorDAO = new GestorDAO();

        $pessoa->__set("USU_ID",$_POST['USU_ID']);
        $pessoa->__set("USU_DATA_NASCIMENTO",$_POST['USU_DATA_NASCIMENTO']);
        $pessoa->__set("USU_CELULAR",$_POST['USU_CELULAR']);
        $pessoa->__set("USU_ESTADO",$_POST['USU_ESTADO']);
        $pessoa->__set("USU_CIDADE",$_POST['USU_CIDADE']);
        $pessoa->__set("USU_RUA",$_POST['USU_RUA']);
        $pessoa->__set("USU_NUMERO_RESIDENCIA",$_POST['USU_NUMERO_RESIDENCIA']);
        $pessoa->__set("USU_BAIRRO",$_POST['USU_BAIRRO']);
        $pessoa->__set("USU_CEP",$_POST['USU_CEP']);
        $pessoa->__set("USU_SEXO",$_POST['USU_SEXO']);
        $pessoa->__set("USU_FOTO_PERFIL",$_POST['USU_FOTO_PERFIL']);

        $gestorDAO->alterar($gestor);

        header('Location: /listarGestor');



        
    }

    public function excluirDuvidas_Feedbacks(){
        $duvida_feedback = new Duvidas_FeedbacksModel();
        $duvida_feedbackDAO = new Duvidas_FeedbacksDAO();

        //$pessoa->__set('PES_ID', $_GET['PES_ID']);
    

        $duvida_feedbackDAO->excluir($_GET['id']);

        header('Location: /dashboard/gestaoduvidas');



        
    }


    public function listarGestor(){   
        $title = "Sustenta São João";
        $texto = "Listar de Pessoas";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $gestor = new GestorDAO();
        $gestores = $gestor->listar();
        $this->getView()->pessoas = $pessoas;
        $this->render('listar', 'dashboard');
    }

    public function validaAutenticacao() {
        if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
            header('Location: /login');
            die();
        }
    }

}