<?php


namespace App\Controller;

use FW\Controller\Action;
use App\Model\CidadaoModel;
use App\DAO\CidadaoDAO;



class CidadaoController extends Action{

    public function formCadastroCidadao(){   
        $title = "Sustenta São João";
        $texto = "Cadastro de Cidadãos";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('index', 'dashboard');
    }

    public function inserirCidadao(){
        $dir = "resources/uploaded_files"; 
        $file = $_FILES["USU_FOTO_PERFIL"];
        $nome_arquivo = rand() . "_" . $file["name"];
        move_uploaded_file($file["tmp_name"], "$dir/".$nome_arquivo);

        $cidadao = new CidadaoModel();

        $cidadao->__set("USU_CPF",$_POST['USU_CPF']);
        $cidadao->__set("USU_RG",$_POST['USU_RG']);
        $cidadao->__set("USU_DATA_NASCIMENTO",$_POST['USU_DATA_NASCIMENTO']);
        $cidadao->__set("USU_EMAIL",$_POST['USU_EMAIL']);
        $cidadao->__set("USU_SENHA",MD5($_POST['USU_SENHA']));
        $cidadao->__set("USU_CELULAR",$_POST['USU_CELULAR']);
        $cidadao->__set("USU_ESTADO",$_POST['USU_ESTADO']);
        $cidadao->__set("USU_CIDADE",$_POST['USU_CIDADE']);
        $cidadao->__set("USU_RUA",$_POST['USU_RUA']);
        $cidadao->__set("USU_NUMERO_RESIDENCIA",$_POST['USU_NUMERO_RESIDENCIA']);
        $cidadao->__set("USU_BAIRRO",$_POST['USU_BAIRRO']);
        $cidadao->__set("USU_CEP",$_POST['USU_CEP']);
        $cidadao->__set("USU_SEXO",$_POST['USU_SEXO']);
        $cidadao->__set("USU_FOTO_PERFIL",$nome_arquivo);
        $cidadao->__set("USU_NOME",$_POST['USU_NOME']);

        $cidadaodao = new CidadaoDAO();
        $cidadaodao->inserir($cidadao);
        header('Location: /login');
    }

    public function formEditarCidadao(){   
        $title = "Sustenta São João";
        $texto = "Editar Cidadãos";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $cidadao = new CidadaoModel();
        $cidadaoDAO = new CidadaoDAO();

        $cidadao = $cidadaoDAO->buscarPorId($_GET['id']);

        $this->getView()->cidadao = $cidadao;
        $this->render('editarCidadao', 'dashboard');
    }

    public function editar(){
        $cidadao = new CidadaoModel();
        $cidadaoDAO = new CidadaoDAO();

        $title = "Editar Perfil";

        //para passar valores para a VIEW
        $this->getView()->title = $title;

        if(isset($_GET['id'])){
            $cidadao = $cidadaoDAO->buscarPorId($_GET['id']);
            $this->getView()->cidadao = $cidadao;
        } else {
            $this->getView()->cidadao = '';
        }
        /*
        $cidadao->__set('USU_ID', $_POST['USU_ID']);
        $cidadao->__set('USU_EMAIL', $_POST['USU_EMAIL']);
        $cidadao->__set('USU_CELULAR', $_POST['USU_CELULAR']);
        $cidadao->__set('USU_ESTADO', $_POST['USU_ESTADO']);
        $cidadao->__set('USU_CIDADE', $_POST['USU_CIDADE']);
        $cidadao->__set('USU_RUA', $_POST['USU_RUA']);
        $cidadao->__set('USU_NUMERO_RESIDENCIA', $_POST['USU_NUMERO_RESIDENCIA']);
        $cidadao->__set('USU_BAIRRO', $_POST['USU_BAIRRO']);
        $cidadao->__set('USU_CEP', $_POST['USU_CEP']);

        $cidadaoDAO->alterar($cidadao);
        */

        $title = "Editar Perfil";
        $texto = "Editar Perfil";

        $this->getView()->title = $title;
        $this->getView()->texto = $texto;

        $this->render('editarCidadao', 'dashboard');
        
    }

    public function alterar(){
        $cidadao = new CidadaoModel();
        $cidadaoDAO = new CidadaoDAO();

        $cidadao->__set('USU_ID', $_POST['USU_ID']);
        $cidadao->__set('USU_CELULAR', $_POST['USU_CELULAR']);
        $cidadao->__set('USU_EMAIL', $_POST['USU_EMAIL']);
        $cidadao->__set('USU_CEP', $_POST['USU_CEP']);
        $cidadao->__set('USU_RUA', $_POST['USU_RUA']);
        $cidadao->__set('USU_NUMERO_RESIDENCIA', $_POST['USU_NUMERO_RESIDENCIA']);
        $cidadao->__set('USU_BAIRRO', $_POST['USU_BAIRRO']);
        $cidadao->__set('USU_CIDADE', $_POST['USU_CIDADE']);
        $cidadao->__set('USU_ESTADO', $_POST['USU_ESTADO']);

        try{
        $cidadaoDAO->alterar($cidadao);
        } catch (\PDOException $ex){

        }

        header('Location: /dashboard');
    }
    
    public function excluirCidadao(){
        $cidadao = new CidadaoModel();
        $cidadaoDAO = new CidadaoDAO();

        //$cidadao->__set('PES_ID', $_GET['PES_ID']);
    

        $cidadaoDAO->excluir($_GET['id']);

        header('Location: /listarCidadao');



        
    }

    public function listarCidadao(){   
        $title = "Sustenta São João";
        $texto = "Listar Cidadãos";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $cidadao = new CidadaoDAO();
        $cidadaoDAO = new CidadaoDAO();

        $cidadaoDAO->buscarPorID($_SESSION['id']);

        $this->render('listarCidadao', 'dashboard');
    }

    public function validaAutenticacao() {
        if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
            header('Location: /login');
            die();
        }
    }

}