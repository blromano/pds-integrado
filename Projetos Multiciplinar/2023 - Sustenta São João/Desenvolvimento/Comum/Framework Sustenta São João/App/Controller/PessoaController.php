<?php


namespace App\Controller;

use FW\Controller\Action;
use App\Model\PessoaModel;
use App\DAO\PessoaDAO;



class PessoaController extends Action{

    public function formCadastroPessoa(){   
        $title = "Sustenta São João";
        $texto = "Cadastro de Pessoas";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('index', 'dashboard');
    }

    public function inserirPessoa(){

        $pessoa = new PessoaModel();
        $pessoa->__set("PES_NOME",$_POST['PES_NOME']);
        $pessoa->__set("PES_EMAIL",$_POST['PES_EMAIL']);
        $pessoa->__set("PES_TELEFONE",$_POST['PES_TELEFONE']);

        $pessoadao = new PessoaDAO();
        $pessoadao->adicionarPessoa($pessoa);
    }

    public function formEditarPessoa(){   
        $title = "Sustenta São João";
        $texto = "Editar de Pessoas";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $pessoa = new PessoaModel();
        $pessoaDAO = new PessoaDAO();

        $pessoa = $pessoaDAO->buscarPorId($_GET['id']);

        $this->getView()->pessoa = $pessoa;
        $this->render('editar', 'dashboard');
    }

    public function alterarPessoa(){
        $pessoa = new PessoaModel();
        $pessoaDAO = new PessoaDAO();

        $pessoa->__set('PES_ID', $_POST['PES_ID']);
        $pessoa->__set('PES_NOME', $_POST['PES_NOME']);
        $pessoa->__set('PES_EMAIL', $_POST['PES_EMAIL']);
        $pessoa->__set('PES_TELEFONE', $_POST['PES_TELEFONE']);

        $pessoaDAO->alterar($pessoa);

        header('Location: /listarPessoa');



        
    }

    public function excluirPessoa(){
        $pessoa = new PessoaModel();
        $pessoaDAO = new PessoaDAO();

        //$pessoa->__set('PES_ID', $_GET['PES_ID']);
    

        $pessoaDAO->excluir($_GET['id']);

        header('Location: /listarPessoa');



        
    }


    public function listarPessoa(){   
        $title = "Sustenta São João";
        $texto = "Listar de Pessoas";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $pessoa = new PessoaDAO();
        $pessoas = $pessoa->listar();

        

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