<?php

namespace App\Controller; //Faz parte do Namespace App\Controller

use FW\Controller\Action; //utilizando outros namespaces, dessa forma não precisamos dar includes em arquivos
use App\Model\SolicAgendOnlineModel;
use App\DAO\SolicAgendOnlineDAO;

class SolicAgendOnlineController extends Action
{


    //Método para Carregar a View do Formulário de Cadastro de Solicitação de Agendamento Online
    public function cadastrar()
    {

        $title = "Cadastro de Solicitação Consulta Online"; //Utilizado para o <title> de cada página
        //para passar valores para a VIEW
        $this->getView()->title = $title; // passa para a View o valor da variável $title utilizado na linha 14 do arquivo dashboard.php da pasta View

        if (isset($_GET['status'])) {
            $this->getView()->status = $_GET['status'];
        } else {
            $this->getView()->status = '';
        }
        $esp;
        $espDAO = new SolicAgendOnlineDAO();
        $esp = $espDAO->listarEsp();
        $this->getView()->esp = $esp;
        $this->render('cadastroSolic/index', 'dashboard'); //Carrega o arquivo que esta dentro da pasta View/solicAgendOnline/cadastroSolic/index
    }

    //Método de Inserção do Formulário de Cadastro de Solicitação de Agendamento Online
    public function inserir()
    {

        $solicitacao = new SolicAgendOnlineModel(); //Instanciando a Classe SolicAgendOnlineModel
        $solicAgendOnlineDAO = new SolicAgendOnlineDAO(); // Instanciando a Classe SolicAgendOnlineDAO
        
        $solicitacao->__set('SOL_HORARIO', $_POST['SOL_HORARIO']);
        $solicitacao->__set('SOL_DATA', $_POST['SOL_DATA']);
        $solicitacao->__set('FK_ESPECIALIDADES_ESP_ID', $_POST['FK_ESPECIALIDADES_ESP_ID']);

        $solicAgendOnlineDAO->inserir($solicitacao); //Executando o método Inserir da Classe solicAgendOnlineDAO, com passagem de parâmetro o Objeto solicitacao

        header('Location: /solicitacoesOnline/cadastrar?msg=cadastro-sucesso'); //redireciona para /solicitacoesOnline apos inserir solicitacao        

    }

    //Método para carregar a View de Listagem de todos os Solicitação de Agendamento Online Cadastrados
    public function listagem()
    {
        $title = "Cadastro de solicitacoes ";
        //para passar valores para a VIEW
        $this->getView()->title = $title;

        $solicitacoes;
        $solicAgendOnlineDAO = new SolicAgendOnlineDAO();
        $solicitacoes = $solicAgendOnlineDAO->listar();
        $this->getView()->solicitacoes = $solicitacoes;
        $this->render('listarSolicSecretaria/index', 'dashboard', ''); //Carrega  o arquivo da pasta View/solicAgendOnline/index.php
    }

    //Método que carrega o Formulário de edição de Solicitação de Agendamento Online
    public function editar()
    {

        $solicitacao = new SolicAgendOnlineModel();
        $solicAgendOnlineDAO = new SolicAgendOnlineDAO();
        
        if (isset($_GET['id'])) {
            $solicitacao = $solicAgendOnlineDAO->buscarPorId($_GET['id']); //Pega a solicitacao selecionado

            $this->getView()->solicitacao = $solicitacao;
        } else {
            $this->getView()->solicitacao = '';
        }

        $title = "Edição de Solicitação Consulta Online";
        //para passar valores para a VIEW
        $this->getView()->title = $title;
        $this->render('remarcarSoliAgendOn/index', 'dashboard', ''); //Carrega o arquivo da pasta View/solicAgendOnline/editarSolicitacao/index.php
    }

    public function confirmar()
    {
        $solicitacao = new SolicAgendOnlineModel();
        $solicAgendOnlineDAO = new SolicAgendOnlineDAO();
        
        if (isset($_GET['id'])) {
            $solicitacao = $solicAgendOnlineDAO->confirmarAgend($_GET['id']); //Pega a solicitacao selecionado

            $this->getView()->solicitacao = $solicitacao;
        } else {
            $this->getView()->solicitacao = '';
        }

        $title = "Edição de Solicitação Consulta Online";
        //para passar valores para a VIEW
        $this->getView()->title = $title;/* 
        header('Location: /solicitacoesOnline?msg=confirmacao-sucesso'); */
        $this->render('escolherMed/index', 'dashboard', ''); 

    }

    public function inserirMed()
    {

        $solicitacao = new SolicAgendOnlineModel(); //Instanciando a Classe SolicAgendOnlineModel
        $solicAgendOnlineDAO = new SolicAgendOnlineDAO(); // Instanciando a Classe SolicAgendOnlineDAO
        
        $solicitacao->__set('FK_MEDICOS_MED_ID', $_POST['FK_MEDICOS_MED_ID']);

        $solicAgendOnlineDAO->inserirMed($solicitacao); //Executando o método Inserir da Classe solicAgendOnlineDAO, com passagem de parâmetro o Objeto solicitacao

        header('Location: /solicitacoesOnline/cadastrar?msg=cadastro-sucesso'); //redireciona para /solicitacoesOnline apos inserir solicitacao        

    }
    

    //Método para atualizar os dados do cadastro vindo do formulário de edição
    public function atualizar()
    {
        $solicitacao = new SolicAgendOnlineModel();
        $solicAgendOnlineDAO = new SolicAgendOnlineDAO();
        
        $solicitacao->__set('SOL_ID', $_POST['SOL_ID']);
        $solicitacao->__set('SOL_HORARIO', $_POST['SOL_HORARIO']);
        $solicitacao->__set('SOL_DATA', $_POST['SOL_DATA']);

        $solicAgendOnlineDAO->alterar($solicitacao); //Passando o Objeto para o método Alterar de SolicAgendOnlineDAO

        header('Location: /solicitacoesOnline?msg=editar-sucesso'); //redireciona para /solicitacoesOnline após alteração               

    }

    //Método para Excluir um cadastro de Solicitação de Agendamento Online
    public function excluir()
    {
        $solicAgendOnlineDAO = new SolicAgendOnlineDAO();
        if (isset($_GET['id'])) {
            $solicAgendOnlineDAO->excluir($_GET['id']); //Pega o ID da Solicitação a ser excluido, aciona o médoto excluir de SolicAgendOnlineDAO
            header('Location: /solicitacoesOnline?msg=exclusao-sucesso'); //redireciona para /solicitacoesOnline após exclusão
        }
    }

    //Mensagens de Alerta personalizadas para cada método
    public function msgs()
    {

        if (isset($_GET['msg'])) {

            if ($_GET['msg'] == 'cadastro-sucesso') {
                $msg = "Cadastro do usuário realizado com sucesso!";
            }
            if ($_GET['msg'] == 'editar-sucesso') {
                $msg = "Usuário atualizado com sucesso!";
            }
            if ($_GET['msg'] == 'exclusao-sucesso') {
                $msg = "Usuário excluído com sucesso!";
            }
            if ($_GET['msg'] == 'confirmacao-sucesso') {
                $msg = "Confirmado com sucesso!";
            }

            $this->getView()->msg = $msg;
        } else {
            $this->getView()->msg = '';
        }

        $this->render('msgs', 'usuario', '');
    }


    //método para verificar a autenticação do usuário
    public function validaAutenticacao()
    {
        /* if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
                header('Location: /login');
                die();
            } */
    }
}
