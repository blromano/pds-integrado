<?php

namespace App\Controller;

use FW\Controller\Action;
use App\Model\Descarte_ResiduoModel;
use App\DAO\Descarte_ResiduoDAO;
use App\Model\PontoColetaModel;
use App\DAO\PontoColetaDAO;
use App\DAO\Residuo_SolidoDAO;

class Descarte_ResiduoController extends Action
{

    public function formCadastroDescarteResiduo()
    {
        $title = "Descarte de Resíduos";
        $texto = "Sustentabilidade";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $this->render('index', 'dashboard');
    }

    public function inserirDescarteResiduo()
    {
        $descarte_residuo = new Descarte_ResiduoModel();
        $descarte_residuo->__set("DSR_QUANTIDADE", $_POST['DSR_QUANTIDADE']);
        $descarte_residuo->__set("DSR_DATA_HORA_DESCARTE", $_POST['DSR_DATA_HORA_DESCARTE']);
        $descarte_residuo->__set("FK_CIDADAOS_USU_ID", $_POST['FK_CIDADAOS_USU_ID']);
        $descarte_residuo->__set("FK_RESIDUOS_SOLIDOS_RES_ID", $_POST['FK_RESIDUOS_SOLIDOS_RES_ID']);
        $descarte_residuo->__set('FK_PONTOS_COLETA_PCO_ID', $_POST['FK_PONTOS_COLETA_PCO_ID']);

        $Descarte_ResiduoDAO = new Descarte_ResiduoDAO();
        $Descarte_ResiduoDAO->inserir($descarte_residuo);

        header('Location: /dashboard/listarDescarteResiduos');
    }

    public function formEditarDescarteResiduo()
    {
        $title = "Editar Descarte";
        $texto = "Sustentabilidade";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $PontoColetaDAO = new PontoColetaDAO();
        $pontoColetas = $PontoColetaDAO->listar();

        $Residuo_SolidoDAO = new Residuo_SolidoDAO();
        $residuos_solidos = $Residuo_SolidoDAO->listar();
        $this->getView()->residuo_solido = $residuos_solidos;
        $this->getView()->pontoColeta = $pontoColetas;

        $descarte_residuo = new Descarte_ResiduoModel();
        $Descarte_ResiduoDAO = new Descarte_ResiduoDAO();

        if (isset($_GET['id'])) {
            $descarte_residuo = $Descarte_ResiduoDAO->buscarPorID($_GET['id']);
            $this->getView()->descarte_residuo = $descarte_residuo;
        } else {
            $this->getView()->descarte_residuo = '';
        }

        $this->render('editarDescarte', 'dashboard');
    }

    public function alterarDescarteResiduo()
    {
        $descarte_residuo = new Descarte_ResiduoModel();
        $Descarte_ResiduoDAO = new Descarte_ResiduoDAO();

        $descarte_residuo->__set('DSR_ID', $_POST['DSR_ID']);
        $descarte_residuo->__set("DSR_QUANTIDADE", $_POST['DSR_QUANTIDADE']);
        $descarte_residuo->__set("DSR_DATA_HORA_DESCARTE", $_POST['DSR_DATA_HORA_DESCARTE']);
        $descarte_residuo->__set("FK_CIDADAOS_USU_ID", $_POST['FK_CIDADAOS_USU_ID']);
        $descarte_residuo->__set("FK_RESIDUOS_SOLIDOS_RES_ID", $_POST['FK_RESIDUOS_SOLIDOS_RES_ID']);
        $descarte_residuo->__set('FK_PONTOS_COLETA_PCO_ID', $_POST['FK_PONTOS_COLETA_PCO_ID']);

        $Descarte_ResiduoDAO->alterar($descarte_residuo);

        header('Location: /dashboard/listarDescarteResiduos');
    }

    public function excluirDescarteResiduo()
    {
        $Descarte_ResiduoDAO = new Descarte_ResiduoDAO();

        if (isset($_GET['id'])) {
            $Descarte_ResiduoDAO->excluir($_GET['id']);

            header('Location: /dashboard/listarDescarteResiduos');
        }
    }

    public function listarDescarteResiduos()
    {
        $title = "Descartes";
        $texto = "Sustentabilidade";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $PontoColetaDAO = new PontoColetaDAO();
        $pontoColetas = $PontoColetaDAO->listar();

        $Residuo_SolidoDAO = new Residuo_SolidoDAO();
        $residuos_solidos = $Residuo_SolidoDAO->listar();
        
        $Descarte_ResiduoDAO = new Descarte_ResiduoDAO();
        $descarte_residuos = $Descarte_ResiduoDAO->listar();

        $this->getView()->residuo_solido = $residuos_solidos;
        $this->getView()->descarte_residuo = $descarte_residuos;
        $this->getView()->pontoColeta = $pontoColetas;
        
        $this->render('listarDescarteResiduos', 'dashboard');
    }

    public function validaAutenticacao()
    {
        if (!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
            header('Location: /login');
            die();
        }
    }
}
