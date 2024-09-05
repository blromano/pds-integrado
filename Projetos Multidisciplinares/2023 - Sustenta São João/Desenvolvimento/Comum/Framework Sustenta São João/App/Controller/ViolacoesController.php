<?php


namespace App\Controller;

use FW\Controller\Action;
use App\Model\ViolacoesModel;
use App\Model\DenunciasModel;
use App\DAO\ViolacoesDAO;
use App\DAO\DenunciasDAO;

class ViolacoesController extends Action{

        public function excluirViolacoes(){
            $violacoes = new ViolacoesModel();
            $violacoesDAO = new ViolacoesDAO();

            if(isset($_GET['id'])){
                $violacoesDAO->excluir($_GET['id']);
                    header('Location: /dashboard/listarViolacoes');       
                }                                        
        }
        
        //$setor->__set('SET_ID', $_GET['SET_ID']);
    
    public function listarViolacoes(){   
        $title = "Violações";
        $texto = " ";

        //para passar valores para a VIEW
        $this->getView()->texto = $texto;
        $this->getView()->title = $title;

        $denunciaDAO = new DenunciasDAO();
        $denuncias = $denunciaDAO->listarPorIdUsuario($_SESSION['id']);
        
        $ViolacoesDAO = new ViolacoesDAO();
        $violacoes = $ViolacoesDAO->listar();

        $this->getView()->denuncias = $denuncias;
        $this->getView()->violacoes = $violacoes;
        $this->render('listarViolacoes', 'dashboard');
    }

    public function validaAutenticacao() {
     
    }

    public function excluirViolacao()
    {
        $ViolacoesDAO = new ViolacoesDAO();

        if (isset($_GET['id'])) {
            $ViolacoesDAO->excluir($_GET['id']);

            header('Location: /dashboard/listarViolacoes');
        }
    }
}