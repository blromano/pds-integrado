<?php

namespace App\Controller;

use FW\Controller\Action;
use App\DAO\ModalidadesDAO;
use App\Model\ModalidadesModel;
use App\DAO\EventosDAO;
use App\Model\EventosModel;

    class CertificadoController extends Action{

        public function certificadoaluno(){      
            $title = "Meu certificado - Aluno";
            $texto = "";
            $icone_editar='<i class="ti-file btn-icon-append"></i>';
            $modalidades = new ModalidadesDAO();
            $nomeModalidadeAluno = $modalidades->buscarporid($_GET['id']);           
            $this->getView()->nomeModalidadeAluno = $nomeModalidadeAluno; 
            $this->getView()->title = $title;
            $this->getView()->texto = $texto;       
            $this->render('certificadoaluno','dashboard');

            
            
        }

        public function certificadoresponsavel(){   
            $title = "Meu certificado - Responsável de Equipe";
            $texto = "";
            $icone_editar='<i class="ti-file btn-icon-append"></i>';
    
            $this->getView()->title = $title;
            $this->getView()->texto = $texto;          
            $this->render('certificadoresponsavel','dashboard');
        }

        public function gerenciar(){
            $title = "Gerenciar Certificados";
            $texto = "";
            $icone_editar='<i class="ti-file btn-icon-append"></i>';
    
            $this->getView()->title = $title;
            $this->getView()->texto = $texto;             
            $this->render('gerenciar','dashboard');
        }

        public function validaAutenticacao() {}
    }

?>
