<?php


namespace App\Controller;

use FW\Controller\Action;
use App\Model\GestorModel;
use App\DAO\GestorDAO;



class GestorController extends Action{

    //Will - INÍCIO
    public function listarResponsavel(){   
        $title = "Listagem De Responsáveis da Prefeitura - Dashboard";
        $texto = "   ";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $gestor = new GestorDAO();
        $gestoresComSetores = $gestor->listarGestoresComSetores();
        $this->getView()->gestoresComSetores = $gestoresComSetores;
        $this->render('listarResponsavel', 'dashboard'); //Carrega o arquivo login que esta dentro da pasta dashboard
    }


    public function excluirResponsavelPrefeitura(){
        $gestor = new GestorDAO();
    
        if(isset($_GET['id'])){
            $gestor->excluirResponsavel($_GET['id']);
            header('Location: /dashboard/listarResponsavel');       
        }                                        
    }
        // 24/11/2023
        // public function inserirResponsavelPrefeitura() {

    //     if (isset($_POST['USU_NOME']) && isset($_POST['FK_SETORES_SET_ID'])) {
            
    //         $novoGestor = new GestorModel();
    //         $novoGestor->__set("USU_NOME", $_POST['USU_NOME']);
    //         $novoGestor->__set("FK_SETORES_SET_ID", $_POST['FK_SETORES_SET_ID']);
            
            
    //         $gestorDAO = new GestorDAO();
    //         $gestorDAO->inserirResponsavel($novoGestor);
            
            
    //         header('Location: /dashboard/listarResponsavel');
    //         exit(); 
    //     } else {
         
    //     }
    // }


    //Will - FIM
    





    public function formCadastroGestor(){   
        $title = "Sustenta São João";
        $texto = "Cadastro de Pessoas";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('index', 'dashboard');
    }

    public function inserirGestor(){
        $dir = "resources/uploaded_files"; 
        $file = $_FILES["USU_FOTO_PERFIL"];
        $nome_arquivo = rand() . "_" . $file["name"];
        move_uploaded_file($file["tmp_name"], "$dir/".$nome_arquivo);

        $gestor = new GestorModel();

        $gestor->__set("GES_PRONTUARIO",$_POST['GES_PRONTUARIO']);
        $gestor->__set("GES_RAMAL",$_POST['GES_RAMAL']);
        $gestor->__set("USU_CPF",$_POST['USU_CPF']);
        $gestor->__set("USU_RG",$_POST['USU_RG']);
        $gestor->__set("USU_DATA_NASCIMENTO",$_POST['USU_DATA_NASCIMENTO']);
        $gestor->__set("USU_EMAIL",$_POST['USU_EMAIL']);
        $gestor->__set("USU_SENHA",$_POST['USU_SENHA']);
        $gestor->__set("USU_CELULAR",$_POST['USU_CELULAR']);
        $gestor->__set("USU_ESTADO",$_POST['USU_ESTADO']);
        $gestor->__set("USU_CIDADE",$_POST['USU_CIDADE']);
        $gestor->__set("USU_RUA",$_POST['USU_RUA']);
        $gestor->__set("USU_NUMERO_RESIDENCIA",$_POST['USU_NUMERO_RESIDENCIA']);
        $gestor->__set("USU_BAIRRO",$_POST['USU_BAIRRO']);
        $gestor->__set("USU_CEP",$_POST['USU_CEP']);
        $gestor->__set("USU_SEXO",$_POST['USU_SEXO']);
        $gestor->__set("USU_FOTO_PERFIL",$nome_arquivo);
        $gestor->__set("USU_NOME",$_POST['USU_NOME']);
        $gestor->__set("FK_SETORES_SET_ID",$_POST['FK_SETORES_SET_ID']);


        $gestordao = new GestorDAO();
        $gestordao->inserir($gestor);

        header('Location: /dashboard/listarResponsavel');
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


    public function editar(){
        $gestor = new GestorModel();
        $gestorDAO = new GestorDAO();

        $title = "Editar Perfil";

        //para passar valores para a VIEW
        $this->getView()->title = $title;

        if(isset($_GET['id'])){
            $gestor = $gestorDAO->buscarPorId($_GET['id']);
            $this->getView()->gestor = $gestor;
        } else {
            $this->getView()->gestor = '';
        }

        $title = "Editar Perfil";
        $texto = "Editar Perfil";

        $this->getView()->title = $title;
        $this->getView()->texto = $texto;

        $this->render('editarGestor', 'dashboard');
        
    }

    public function alterarGestor(){
        $gestor = new GestorModel();
        $gestorDAO = new GestorDAO();

        $gestor->__set("USU_ID",$_POST['USU_ID']);
        $gestor->__set("USU_DATA_NASCIMENTO",$_POST['USU_DATA_NASCIMENTO']);
        $gestor->__set('USU_EMAIL', $_POST['USU_EMAIL']);
        $gestor->__set("USU_CELULAR",$_POST['USU_CELULAR']);
        $gestor->__set("USU_ESTADO",$_POST['USU_ESTADO']);
        $gestor->__set("USU_CIDADE",$_POST['USU_CIDADE']);
        $gestor->__set("USU_RUA",$_POST['USU_RUA']);
        $gestor->__set("USU_NUMERO_RESIDENCIA",$_POST['USU_NUMERO_RESIDENCIA']);
        $gestor->__set("USU_BAIRRO",$_POST['USU_BAIRRO']);
        $gestor->__set("USU_CEP",$_POST['USU_CEP']);
        /*$pessoa->__set("USU_SEXO",$_POST['USU_SEXO']);*/
        $gestor->__set("USU_FOTO_PERFIL",$_POST['USU_FOTO_PERFIL']);

        $gestorDAO->alterar($gestor);

        header('Location: /dashboard');
        
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