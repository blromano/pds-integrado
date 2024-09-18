<?php

namespace App\Controller; //Faz parte do Namespace App\Controller

use FW\Controller\Action; //utilizando outros namespaces, dessa forma não precisamos dar includes em arquivos
use App\Model\UsuariosModel;
use App\DAO\UsuarioDAO;
use App\Model\PacienteModel;
use App\DAO\PacienteDAO;


class PacienteController extends Action
{

    //Método para Carregar a View do Formulário de Cadastro de Paciente
    public function cadastrar()
    {

        $title = "Cadastro de Pacientes"; //Utilizado para o <title> de cada página
        //para passar valores para a VIEW
        $this->getView()->title = $title; // passa para a View o valor da variável $title utilizado na linha 14 do arquivo dashboard.php da pasta View

        if (isset($_GET['status'])) {
            $this->getView()->status = $_GET['status'];
        } else {
            $this->getView()->status = '';
        }

        $this->render('registrar/index', 'login'); //Carrega o arquivo que esta dentro da pasta View/paciente/cadastroPaciente/index
    }

    //Método de Inserção do Formulário de Cadastro de Paciente
    public function inserir()
    {
        /*
        $usuario = new UsuariosModel();
        $usuarioDAO = new UsuarioDAO();
        $paciente = new PacienteModel(); //Instanciando a Classe PacienteModel
        $pacienteDAO = new PacienteDAO(); // Instanciando a Classe PacienteDAO

        if (
            !isset($_POST['USU_NOME']) ||
            !isset($_POST['USU_CPF']) ||
            !isset($_POST['USU_RG']) ||
            !isset($_POST['USU_EMAIL']) ||
            !isset($_POST['USU_CELULAR']) ||
            !isset($_POST['USU_TELEFONE']) ||
            !isset($_POST['USU_SENHA']) ||
            !isset($_POST['USU_DATA_DE_NASCIMENTO']) ||
            !isset($_POST['USU_NUMERO_RESIDENCIA']) ||
            !isset($_POST['USU_COMPLEMENTO']) ||
            !isset($_POST['USU_SEXO']) ||
            !isset($_POST['USU_EMAIL']) ||
            !isset($_POST['USU_CEP']) ||
            !isset($_POST['PLA_ID'])
        ) { //Verificando se os dados que estão vindo do formulário existem
            header('Location: /registrar?status=203'); //Redirecionando caso os dados não existam
            die(); //Matando o processo para não executar as linhas 38, 39, 40, 42, 44 deste método
        }

        $usuario->__set('USU_CPF', $_POST['USU_CPF']); //Passando os dados vindos do POST do Formulário para os Métodos Set de PacienteModal
        $usuario->__set('USU_RG', $_POST['USU_RG']);
        $usuario->__set('USU_EMAIL', $_POST['USU_EMAIL']);
        $usuario->__set('USU_SENHA', $_POST['USU_SENHA']);
        $usuario->__set('USU_NUMERO_CELULAR', $_POST['USU_CELULAR']);
        $usuario->__set('USU_DATA_DE_NASCIMENTO', $_POST['USU_DATA_DE_NASCIMENTO']);
        $usuario->__set('USU_NOME', $_POST['USU_NOME']);
        $usuario->__set('USU_NUMERO_RESIDENCIA', $_POST['USU_NUMERO_RESIDENCIA']);
        $usuario->__set('USU_SEXO', $_POST['USU_SEXO']);
        $usuario->__set('USU_CEP', $_POST['USU_CEP']);
        $usuario->__set('USU_FOTO', 'exemplo.png');

        $usuId = $usuarioDAO->inserir($usuario); //Executando o método Inserir da Classe PacienteDAO, com passagem de parâmetro o Objeto Paciente

        $paciente->__set('PAC_PRONTUARIO', 'P' . uniqid(rand(10000, 99999)));
        $paciente->__set('FK_USUARIOS_USU_ID', $usuId);
        $paciente->__set('FK_PLANOS_PLA_ID', $_POST['PLA_ID']);

        $pacienteDAO->inserir($paciente);

        header('Location: /?msg=cadastro-sucesso'); //redireciona para /pacientes apos inserir paciente         
*/
    }

    //Método para carregar a View de Listagem de todos os Pacientes Cadastrados
    public function listagem()
    {
        $title = "Cadastro de Pacientes";
        //para passar valores para a VIEW
        $this->getView()->title = $title;

        $pacienteDAO = new PacienteDAO();
        $pacientes = $pacienteDAO->listar();
        $this->getView()->pacientes = $pacientes;
        $this->render('index', 'dashboard', ''); //Carrega  o arquivo da pasta View/paciente/index.php
    }


    //Método que carrega o Formulário de edição de Paciente
    public function editar()
    {

        $paciente = new PacienteModel();
        $pacienteDAO = new PacienteDAO();

        if (isset($_GET['id'])) {
            $paciente = $pacienteDAO->buscarPorId($_GET['id']); //Pega o paciente selecionado

            $this->getView()->paciente = $paciente;
        } else {
            $this->getView()->paciente = '';
        }

        $title = "Edição de Pacientes";
        //para passar valores para a VIEW
        $this->getView()->title = $title;
        $this->render('editarPaciente/index', 'dashboard', ''); //Carrega o arquivo da pasta View/paciente/editarPaciente/index.php
    }

    //Método para atualizar os dados do cadastro vindo do formulário de edição
    public function atualizar()
    {

        $paciente = new PacienteModel();
        $pacienteDAO = new PacienteDAO();

        $paciente->__set('PAC_ID', $_POST['id']); //não pode ser o próprio ID da tabela, tem que ser o do Campo hidden
        $paciente->__set('PAC_PRONTUARIO', $_POST['PAC_PRONTUARIO']);
        $paciente->__set('FK_USUARIOS_USU_ID', $_POST['FK_USUARIOS_USU_ID']);
        $paciente->__set('FK_PLANOS_PLA_ID', $_POST['FK_PLANOS_PLA_ID']);

        $pacienteDAO->alterar($paciente); //Passando o Objeto para o método Alterar de PacienteDAO

        header('Location: /pacientes?msg=editar-sucesso'); //redireciona para /pacientes após alteração               

    }

    //Método para Excluir um cadastro do Paciente
    public function excluir()
    {
        $pacienteDAO = new PacienteDAO();
        if (isset($_GET['id'])) {
            $pacienteDAO->excluir($_GET['id']); //Pega o ID do Paciente a ser excluido, aciona o médoto excluir de PacienteDAO
            header('Location: /pacientes?msg=exclusao-sucesso'); //redireciona para /pacientes após exclusão
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
