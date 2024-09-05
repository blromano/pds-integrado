<?php

namespace App\Controller;

use FW\Controller\Action;
use App\Model\Residuo_SolidoModel;
use App\DAO\Residuo_SolidoDAO;

class Residuo_SolidoController extends Action
{

    public function formCadastroResiduo()
    {
        $title = "Cadastro de Resíduos";
        $texto = "Sustentabilidade";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('index', 'dashboard');
    }

    public function inserirResiduo()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica se o campo nome foi preenchido
            if (isset($_POST["RES_NOME_RESIDUO"]) && !empty($_POST["RES_NOME_RESIDUO"])) {
      
                $residuo_solido = new Residuo_SolidoModel();
                $residuo_solido->__set("RES_NOME_RESIDUO", $_POST['RES_NOME_RESIDUO']);
                $residuo_solido->__set("RES_DESCRICAO", $_POST['RES_DESCRICAO']);

                $Residuo_SolidoDAO = new Residuo_SolidoDAO();
                $Residuo_SolidoDAO->inserir($residuo_solido);

                header('Location: /dashboard/listarResiduos');
            } else {
                // Se o campo nome não foi preenchido, exibe uma mensagem de erro
                echo "O campo nome é obrigatório.";
            }
        }
    }

    public function formEditarResiduo()
    {
        $title = "Editar Resíduo";
        $texto = "Sustentabilidade";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $residuo_solido = new Residuo_SolidoModel();
        $Residuo_SolidoDAO = new Residuo_SolidoDAO();

        if (isset($_GET['id'])) {
            $residuo_solido = $Residuo_SolidoDAO->buscarPorID($_GET['id']);
            $this->getView()->residuo_solido = $residuo_solido;
        } else {
            $this->getView()->residuo_solido = '';
        }

        $this->render('editarResiduo', 'dashboard');
    }

    public function alterarResiduo()
    {
        $residuo_solido = new Residuo_SolidoModel();
        $Residuo_SolidoDAO = new Residuo_SolidoDAO();

        $residuo_solido->__set('RES_ID', $_POST['RES_ID']);
        $residuo_solido->__set("RES_NOME_RESIDUO", $_POST['RES_NOME_RESIDUO']);
        $residuo_solido->__set("RES_DESCRICAO", $_POST['RES_DESCRICAO']);

        $Residuo_SolidoDAO->alterar($residuo_solido);

        header('Location: /dashboard/listarResiduos');
    }

    public function excluirResiduo()
    {
        $Residuo_SolidoDAO = new Residuo_SolidoDAO();

        if (isset($_GET['id'])) {
            $Residuo_SolidoDAO->excluir($_GET['id']);

            header('Location: /dashboard/listarResiduos');
        }
    }

    public function listarResiduo()
    {
        $title = "Resíduos Sólidos";
        $texto = "Sustentabilidade";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $Residuo_SolidoDAO = new Residuo_SolidoDAO();
        $residuos_solidos = $Residuo_SolidoDAO->listar();
        $this->getView()->residuo_solido = $residuos_solidos;
        $this->render('listarResiduos', 'dashboard');
    }

    public function validaAutenticacao()
    {
        if (!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
            header('Location: /login');
            die();
        }
    }
}
