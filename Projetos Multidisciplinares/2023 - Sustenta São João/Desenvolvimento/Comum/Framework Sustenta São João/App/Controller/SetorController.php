<?php


namespace App\Controller;

use FW\Controller\Action;
use App\Model\SetorModel;
use App\DAO\SetorDAO;



class SetorController extends Action{


    // public function listarResponsavel(){   
    //     $title = "Listagem De Responsáveis da Prefeitura - Dashboard";
    //     $texto = "   ";

    //     //para passar valores para a VIEW
    //     $this->getView()->texto = $texto;
    //     $this->getView()->title = $title;

    //     $this->render('listarResponsavel', 'dashboard'); //Carrega o arquivo login que esta dentro da pasta dashboard
    // }

    public function formCadastroSetor(){   
        $title = "Oi";
        $texto = "Administrativo";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('index', 'dashboard');
    }

    public function inserirSetor(){

        $setor = new SetorModel();
        $setor->__set("SET_NOME",$_POST['SET_NOME']);
        $setor->__set("SET_DATA_CRIACAO",$_POST['SET_DATA_CRIACAO']);
        $setor->__set("SET_DESCRICAO_SERVICOS",$_POST['SET_DESCRICAO_SERVICOS']);

        $setordao = new SetorDAO();
        $setordao->inserir($setor);
            header('Location: /dashboard/listarSetores');       
        
    }

    public function formEditarSetor(){   
        $title = "Editar Setores";
        $texto = "Sustenta São João";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $setorDAO = new SetorDAO();
       
        if (isset($_GET['id'])) {
            $setor = $setorDAO->buscarPorID($_GET['id']);
            $this->getView()->setor = $setor;
        } else {
            $this->getView()->setor = '';
        }

        $this->render('editarSetores', 'dashboard');
    }

    public function alterarSetores(){
        $setor = new SetorModel();
        $setorDAO = new SetorDAO();

        $setor->__set('SET_ID', $_POST['SET_ID']);
        $setor->__set("SET_NOME", $_POST['SET_NOME']);
        $setor->__set("SET_DESCRICAO_SERVICOS", $_POST['SET_DESCRICAO_SERVICOS']);
        $setor->__set("SET_DATA_CRIACAO", $_POST['SET_DATA_CRIACAO']);

        $setorDAO->alterar($setor);
        header('Location: /dashboard/listarSetores');
    }

    // public function excluirSetores()
    //     {
    //         $setorDAO = new SetorDAO();
    //             if(isset($_GET['id'])){
    //             $setorDAO->excluir($_GET['id']);
    //             header('Location: /dashboard/listarSetores');
    //             }            
    //     }

        public function excluirSetores(){
            $setor = new SetorModel();
            $setorDAO = new SetorDAO();

            if(isset($_GET['id'])){
                $setorDAO->excluir($_GET['id']);
                    header('Location: /dashboard/listarSetores');       
                }                                        
        }
        
        //$setor->__set('SET_ID', $_GET['SET_ID']);
    
    public function listarSetores(){   
        $title = "Setores";
        $texto = "Administrativo";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $setorDAO = new SetorDAO();
        $setores = $setorDAO->listar();
        $this->getView()->setor = $setores;
        $this->render('listarSetores', 'dashboard');
    }

    /*public function gerarRelatorioSetor(){   
        $title = "Sustenta São João";
        $texto = "Gerar Relatórios";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $setores;
        $setorDAO = new SetorDAO();
        $setores = $setorDAO->gerarRelatorioSetor();
        $this->getView()->setores  = $setores;
        $this->render('gerarRelatorio', 'dashboard');
    }*/

    public function validaAutenticacao() {
     
    }

    public function excluirSetor()
    {
        $setorDAO = new setorDAO();

        if (isset($_GET['id'])) {
            $setorDAO->excluir($_GET['id']);

            header('Location: /dashboard/listarSetores');
        }
    }

    

}