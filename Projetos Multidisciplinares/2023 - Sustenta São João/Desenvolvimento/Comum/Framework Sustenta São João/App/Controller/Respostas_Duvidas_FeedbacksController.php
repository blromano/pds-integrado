<?php


namespace App\Controller;

use FW\Controller\Action;
use App\Model\Respostas_Duvidas_FeedbacksModel;
use App\Model\Duvidas_FeedbacksModel;
use App\DAO\Respostas_Duvidas_FeedbacksDAO;
use App\DAO\Duvidas_FeedbacksDAO;


class Respostas_Duvidas_FeedbacksController extends Action{

    public function formCadastroGestor(){   
        $title = "Sustenta São João";
        $texto = "Cadastro de Pessoas";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('index', 'dashboard');
    }

    public function inserirRespostas_Duvidas_Feedbacks(){
        $dir = "resources/uploaded_files"; 
        $file = $_FILES["RES_ANEXO"];
        $nome_arquivo = rand() . "_" . $file["name"];
        move_uploaded_file($file["tmp_name"], "$dir/".$nome_arquivo);

        $respostas_duvidas_feedbacks = new Respostas_Duvidas_FeedbacksModel();
        $respostas_duvidas_feedbacks->__set("RES_TEXTO",$_POST['RES_TEXTO']);
        $respostas_duvidas_feedbacks->__set("RES_ANEXO",$nome_arquivo);
        $respostas_duvidas_feedbacks->__set("FK_DUVIDAS_FEEDBACKS_DEF_ID",$_POST['FK_DUVIDAS_FEEDBACKS_DEF_ID']);
        $respostas_duvidas_feedbacks->__set("FK_GESTORES_USU_ID",$_SESSION['id']);


        $respostas_duvidas_feedbacksdao = new Respostas_Duvidas_FeedbacksDAO();
        $respostas_duvidas_feedbacksdao->inserir($respostas_duvidas_feedbacks);

        $duvida_feedback = new Duvidas_FeedbacksModel();
        $duvida_feedbackDAO = new Duvidas_FeedbacksDAO();
        $duvida_feedback = $duvida_feedbackDAO->buscarPorID($_POST['FK_DUVIDAS_FEEDBACKS_DEF_ID']);
        $duvida_feedback->__set("DEF_STATUS", 1);
        //echo $duvida_feedback->__get("DEF_STATUS");
        //echo $duvida_feedback->__get("DEF_TEMA");
        $duvida_feedbackDAO->alterarrespondido($_POST['FK_DUVIDAS_FEEDBACKS_DEF_ID']);

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

    public function alterarGestor(){
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

    public function excluirGestor(){
        $gestor = new GestorModel();
        $gestorDAO = new GestorDAO();

        //$pessoa->__set('PES_ID', $_GET['PES_ID']);
    

        $pessoaDAO->excluir($_GET['id']);

        header('Location: /listarGestor');



        
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