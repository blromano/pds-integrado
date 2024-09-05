<?php

namespace App\Controller;

use FW\Controller\Action;
use App\DAO\ViolacoesDAO;
use App\DAO\SetorDAO;

class DashboardMod05Controller extends Action
{

    public function index()
    {
        $title = "Login de Usuários - Dashboard";
        $texto = "Login de Usuários";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('login', 'welcome'); //Carrega o arquivo login que esta dentro da pasta dashboard
    }

    public function gestaoSetores()
    {
        $title = "Gestão de Setores - Dashboard";
        $texto = "   ";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('gestaoSetores', 'dashboard'); //Carrega o arquivo login que esta dentro da pasta dashboard
    }

    public function tiposSaneamentos()
    {
        $title = "Tipos de Saneamento - Dashboard";
        $texto = "   ";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('tiposSaneamentos', 'dashboard'); //Carrega o arquivo login que esta dentro da pasta dashboard
    }


    public function listarSetores()
    {
        $title = "Listagem de Setores - Dashboard";
        $texto = "   ";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('listarSetores', 'dashboard'); //Carrega o arquivo login que esta dentro da pasta dashboard
    }

    

    public function adicionarSetores()
    {
        $title = "Adicionar Setor";
        $texto = "Administrativo";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('adicionarSetores', 'dashboard'); //Carrega o arquivo login que esta dentro da pasta dashboard
    }

  
    public function pesquisarSaneamentos()
    {
        $title = "Pesquisa dos Saneamentos - Dashboard";
        $texto = "   ";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('pesquisarSaneamentos', 'dashboard'); //Carrega o arquivo login que esta dentro da pasta dashboard
    }

    public function inserirSaneamentos()
    {
        $title = "Adicionar Saneamento";
        $texto = "Administrativo";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('inserirSaneamentos', 'dashboard'); //Carrega o arquivo login que esta dentro da pasta dashboard
    }

    // inserirResponsavel - 23/11 - teste
    

    public function inserirResponsavel()
    {
        $title = "Inserir Saneamentos - Dashboard";
        $texto = "   ";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        echo 'Toaqui';
        $setorDAO = new SetorDAO();
        $setores = $setorDAO->listar();
        $this->getView()->setor = $setores;
        $this->render('inserirResponsavel', 'dashboard'); //Carrega o arquivo login que esta dentro da pasta dashboard
    }
        
    // 14/10/2023
    // public function editarTiposSaneamentos(){   
    //     $title = "Editar Tipos de Saneamentos - Dashboard";
    //     $texto = "   ";


    //     $this->getView()->texto = $texto;
    //     $this->getView()->title = $title;

    //     $this->render('editarTiposSaneamentos', 'dashboard'); 
    // }

    public function editarSaneamentos()
    {
        $title = "Editar Saneamentos - Dashboard";
        $texto = "   ";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('editarSaneamentos', 'dashboard'); //Carrega o arquivo login que esta dentro da pasta dashboard
    }

    public function denunciasEncaminhadas()
    {
        $title = "Denúncias Encaminhadas - Dashboard";
        $texto = "   ";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('denunciasEncaminhadas', 'dashboard'); //Carrega o arquivo login que esta dentro da pasta dashboard
    }

    public function editarResponsavel()
    {
        $title = "Editar Responsavel - Dashboard";
        $texto = "   ";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('editarResponsavel', 'dashboard'); //Carrega o arquivo login que esta dentro da pasta dashboard
    }

    public function editarSetores()
    {
        $title = "Editar Setores- Dashboard";
        $texto = "   ";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('editarSetores', 'dashboard'); //Carrega o arquivo login que esta dentro da pasta dashboard
    }

    public function adicionarResponsavel()
    {
        $title = "Adicionar Responsavel - Dashboard";
        $texto = "   ";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('adicionarResponsavel', 'dashboard'); //Carrega o arquivo login que esta dentro da pasta dashboard
    }
    public function encaminharEmailDenuncia()
    {
        $title = " ";
        $texto = "   ";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('encaminharEmailDenuncia', 'dashboard'); //Carrega o arquivo login que esta dentro da pasta dashboard
    }
    public function visualizarPDenuncias()
    {
        $title = " ";
        $texto = "   ";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('visualizarPDenuncias', 'dashboard'); //Carrega o arquivo login que esta dentro da pasta dashboard
    }
    public function teste()
    {
        $title = "TESTE";
        $texto = "   ";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('teste', 'dashboard'); //Carrega o arquivo login que esta dentro da pasta dashboard
    }

    public function validaAutenticacao()
    {
        if (!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
            header('Location: /login');
            die();
        }
    }
}
