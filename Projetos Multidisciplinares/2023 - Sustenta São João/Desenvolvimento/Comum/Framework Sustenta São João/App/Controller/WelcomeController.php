<?php

    namespace App\Controller;
    
    use FW\Controller\Action;
    
    class WelcomeController extends Action{

        public function index(){   
            $title = "Sustenta São João";
            $texto = "Sustenta São João";
   
            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
   
            $this->render('index', 'welcome');
        }

        public function sobre(){   
            $title = "Sustenta São João";
            $texto = "Quem Somos";
   
            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
   
            $this->render('sobre', 'welcome');
        }

        public function servicos(){   
            $title = "Sustenta São João";
            $texto = "Serviços";
   
            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
   
            $this->render('servicos', 'welcome');
        }

        public function validaAutenticacao() {
            if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
                header('Location: /login');
                die();
            }
        }

    }
    
?>
