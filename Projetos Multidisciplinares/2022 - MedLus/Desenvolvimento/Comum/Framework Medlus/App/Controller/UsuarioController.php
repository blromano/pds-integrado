<?php

namespace App\Controller;

use FW\Controller\Action;
use App\Model\UsuariosModel;
use App\DAO\UsuarioDAO;
use App\Model\MedicoModel;
use App\DAO\MedicoDAO;
use App\Model\EnfermeirosModel;
use App\DAO\EnfermeiroDAO;
use App\Model\SecretariasModel;
use App\DAO\SecretariasDAO;
use App\Model\PacienteModel;
use App\DAO\PacienteDAO;

class UsuarioController extends Action
{




    public function cadastrar()
    {

        $title = "Cadastro de Usuarios";

        $this->getView()->title = $title;

        if (isset($_GET['status'])) {
            $this->getView()->status = $_GET['status'];
        } else {
            $this->getView()->status = '';
        }

        $this->render('Registrar/index', 'dashboard');
    }

    public function cadastrarFuncionario()
    {

        $title = "Cadastro de Usuarios";

        $this->getView()->title = $title;

        if (isset($_GET['status'])) {
            $this->getView()->status = $_GET['status'];
        } else {
            $this->getView()->status = '';
        }

        $this->render('cadastroFuncionario/index', 'dashboard');
    }

    public function inserir()
    {

        $usuario = new UsuariosModel();
        $usuarioDAO = new UsuarioDAO();
        /* if(!isset($_POST['USU_CPF']) || !isset($_POST['USU_RG']) || !isset($_POST['USU_EMAIL'])  || !isset($_POST['USU_SENHA'])  || !isset($_POST['USU_NUMERO_CELULAR']) 
            || !isset($_POST['USU_TELEFONE']) || !isset($_POST['USU_DATA_DE_NASCIMENTO']) || !isset($_POST['USU_NOME'])  || !isset($_POST['USU_SEXO'])  
            || !isset($_POST['USU_CEP'])  || !isset($_POST['USU_COMPLEMENTO']) || !isset($_POST['USU_FOTO']) || !isset($_POST['USU_NOME_SOCIAL'])){ 
                header('Location: /pacientes/cadastrar?status=203'); 
                die();
            } */
        if (
            !isset($_POST['USU_CPF']) ||
            !isset($_POST['USU_RG']) ||
            !isset($_POST['USU_EMAIL']) ||
            !isset($_POST['USU_SENHA']) ||
            !isset($_POST['USU_NUMERO_CELULAR']) ||
            !isset($_POST['USU_DATA_DE_NASCIMENTO']) ||
            !isset($_POST['USU_NOME']) ||
            !isset($_POST['USU_NUMERO_RESIDENCIA']) ||
            !isset($_POST['USU_SEXO']) || !isset($_POST['USU_CEP'])
        ) {
            header('Location: /registrar?status=203'); //Redirecionando caso os dados não existam
            die(); //Matando o processo para não executar as linhas 38, 39, 40, 42, 44 deste método
        }

        $usuario->__set('USU_CPF', $_POST['USU_CPF']);
        $usuario->__set('USU_RG', $_POST['USU_RG']);
        $usuario->__set('USU_EMAIL', $_POST['USU_EMAIL']);
        $usuario->__set('USU_SENHA', $_POST['USU_SENHA']);
        $usuario->__set('USU_NUMERO_CELULAR', $_POST['USU_NUMERO_CELULAR']);
        $usuario->__set('USU_TELEFONE', $_POST['USU_TELEFONE']);
        $usuario->__set('USU_DATA_DE_NASCIMENTO', $_POST['USU_DATA_DE_NASCIMENTO']);
        $usuario->__set('USU_NOME', $_POST['USU_NOME']);
        $usuario->__set('USU_NUMERO_RESIDENCIA', $_POST['USU_NUMERO_RESIDENCIA']);
        $usuario->__set('USU_SEXO', $_POST['USU_SEXO']);
        $usuario->__set('USU_CEP', $_POST['USU_CEP']);
        $usuario->__set('USU_COMPLEMENTO', $_POST['USU_COMPLEMENTO']);
        $usuario->__set('USU_FOTO', $_POST['USU_FOTO']);
        $usuario->__set('USU_TIPO', $_POST['USU_TIPO']);
        $usuario->__set('USU_NOME_SOCIAL', $_POST['USU_NOME_SOCIAL']);
        $usuario->__set('USU_ATIVO', 1);

        $id = $usuarioDAO->inserir($usuario);

        if ($_POST['USU_TIPO'] == 'medico') {
            $medico = new MedicoModel();
            $medicoDAO = new MedicoDAO();
            $medico->__set('FK_USUARIOS_USU_ID', $id);
            $medico->__set('MED_CRM', $_POST['MED_CRM']);
            $medico->__set('MED_TELEFONE_PROFISSIONAL', $_POST['MED_TELEFONE_PROFISSIONAL']);
            $medico->__set('MED_EMAIL_PROFISSIONAL', $_POST['MED_EMAIL_PROFISSIONAL']);
            $medico->__set('MED_PRONTUARIO', 'M' . rand(10000, 99999));
            //$medico->__set('MED_PRONTUARIO', 'M' . uniqid(rand(10000, 99999)));
            //$medico->__set('MED_VALOR_CONSULTA', $_POST['MED_VALOR_CONSULTA']);
            //$medico->__set('MED_OBSERVACOES', 'teste'); // TESTANDO 
            $medico->__set('MED_FORMACAO', $_POST['MED_FORMACAO']);

            $medicoDAO->inserir($medico);
            echo "valor:" . $medico->__get('MED_VALOR_CONSULTA');
            echo "id:" . $id;
            echo "<br>crm:" . $medico->__get('MED_CRM');
            echo "<br>pront:" . $medico->__get('MED_PRONTUARIO');
            echo "<br>form:" . $medico->__get('MED_FORMACAO');
            //header('Location: /listagemMedico?msg=cadastro-sucesso');
            die();
        }

        if ($_POST['USU_TIPO'] == 'enfermeiro') {
            $enfermeiro = new EnfermeirosModel();
            $enfermeiroDAO = new EnfermeiroDAO();
            $enfermeiro->__set('ENF_EMAIL_PROFISSIONAL', $_POST['ENF_EMAIL_PROFISSIONAL']);
            //$enfermeiro->__set('ENF_PRONTUARIO', 'E' . uniqid(rand(10000, 99999)));
            $enfermeiro->__set('ENF_PRONTUARIO', 'E' . rand(10000, 99999));
            $enfermeiro->__set('ENF_COREN', $_POST['ENF_COREN']);
            $enfermeiro->__set('ENF_TELEFONE_PROFISSIONAL', $_POST['ENF_TELEFONE_PROFISSIONAL']);
            $enfermeiro->__set('FK_USUARIOS_USU_ID', $id);

            $enfermeiroDAO->inserir($enfermeiro);
            header('Location: /listagemEnfermeiro?msg=cadastro-sucesso');
        }

        if ($_POST['USU_TIPO'] == 'secretario') {
            $secretaria = new SecretariasModel();
            $secretariaDAO = new SecretariasDAO();
            $secretaria->__set('SEC_SETOR', $_POST['SEC_SETOR']);
            $secretaria->__set('SEC_TELEFONE_PROFISSIONAL', $_POST['SEC_TELEFONE_PROFISSIONAL']);
            $secretaria->__set('SEC_PRONTUARIO', 'S' . rand(10000, 99999));
            //$secretaria->__set('SEC_PRONTUARIO', 'S' . uniqid(rand(10000, 99999)));
            $secretaria->__set('SEC_EMAIL_PROFISSIONAL', $_POST['SEC_EMAIL_PROFISSIONAL']);
            $secretaria->__set('FK_USUARIOS_USU_ID', $id);
            $secretaria->__set('FK_EXAME_EXA_ID', $_POST['FK_EXAME_EXA_ID']);

            $secretariaDAO->inserir($secretaria);
            header('Location: /listagemSecretaria?msg=cadastro-sucesso');
        }

        if ($_POST['USU_TIPO'] == 'paciente') {
            $paciente = new PacienteModel();
            $pacienteDAO = new PacienteDAO();
            $paciente->__set('PAC_PRONTUARIO', 'P' . rand(10000, 99999));
            //$paciente->__set('PAC_PRONTUARIO', 'P' . uniqid(rand(10000, 99999)));
            $paciente->__set('FK_USUARIOS_USU_ID', $id);
            $paciente->__set('FK_PLANOS_PLA_ID', $_POST['FK_PLANOS_PLA_ID']);

            echo "TIPO-";
            echo $_POST['USU_TIPO'];

            $pacienteDAO->inserir($paciente);
            header('Location: /?msg=cadastro-sucesso');
        }

        echo "-ID-";
        echo $id;
        //header('Location: /pacientes?msg=cadastro-sucesso');
    }


    public function listagem()
    {
        $title = "Cadastro de Usuarios";

        $this->getView()->title = $title;

        $usuarioDAO = new UsuarioDAO();
        $usuarios = $usuarioDAO->listar();
        $this->getView()->usuarios = $usuarios;
        $this->render('listarFuncionario/index', 'dashboard'); //Carrega  o arquivo da pasta View/paciente/index.php
    }

    public function listarFuncionario()
    {
        $title = "Listagem de funcionarios";

        $this->getView()->title = $title;

        $usuarioDAO = new UsuarioDAO();
        $funcionarios = $usuarioDAO->listarFuncionarios();
        $this->getView()->funcionarios = $funcionarios;
        $this->render('listarFuncionario/index', 'dashboard'); //Carrega  o arquivo da pasta View/paciente/index.php
    }

    //Método que carrega o Formulário de edição de Paciente
    public function editar()
    {

        $usuario = new UsuariosModel();
        $usuarioDAO = new UsuarioDAO();

        if (isset($_GET['id'])) {
            $usuario = $usuarioDAO->buscarPorId($_GET['id']); //Pega o paciente selecionado

            $this->getView()->usuario = $usuario;
        } else {
            $this->getView()->usuario = '';
        }

        $title = "Edição de Paciente";

        $this->getView()->title = $title;
        $this->render('editarPaciente/index', 'dashboard', ''); //mudar
    }


    public function atualizar()
    {

        $usuario = new UsuariosModel();
        $usuarioDAO = new UsuarioDAO();

        $usuario->__set('USU_ID', $_POST['id']);
        $usuario->__set('USU_CPF', $_POST['USU_CPF']);
        $usuario->__set('USU_RG', $_POST['USU_RG']);
        $usuario->__set('USU_EMAIL', $_POST['USU_EMAIL']);
        $usuario->__set('USU_SENHA', $_POST['USU_SENHA']);
        $usuario->__set('USU_NUMERO_CELULAR', $_POST['USU_NUMERO_CELULAR']);
        $usuario->__set('USU_TELEFONE', $_POST['USU_TELEFONE']);
        $usuario->__set('USU_DATA_DE_NASCIMENTO', $_POST['USU_DATA_DE_NASCIMENTO']);
        $usuario->__set('USU_NOME', $_POST['USU_NOME']);
        $usuario->__set('USU_NUMERO_RESIDENCIA', $_POST['USU_NUMERO_RESIDENCIA']);
        $usuario->__set('USU_SEXO', $_POST['USU_SEXO']);
        $usuario->__set('USU_CEP', $_POST['USU_CEP']);
        $usuario->__set('USU_COMPLEMENTO', $_POST['USU_COMPLEMENTO']);
        $usuario->__set('USU_FOTO', $_POST['USU_FOTO']);
        $usuario->__set('USU_NOME_SOCIAL', $_POST['USU_NOME_SOCIAL']);


        $usuarioDAO->alterar($usuario);

        header('Location: /pacientes?msg=editar-sucesso');
    }


    public function excluir()
    {
        $usuarioDAO = new UsuarioDAO();
        if (isset($_GET['id'])) {
            $usuarioDAO->excluir($_GET['id']);
            header('Location: /pacientes?msg=exclusao-sucesso');
        }
    }

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

    public function excluirFuncionario()
    {
        $usuarioDAO = new UsuarioDAO();
        if (isset($_GET['id'])) {
            $usuarioDAO->excluir($_GET['id']);
            header('Location: /funcionario/listagem?msg=exclusao-sucesso');
        }
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
