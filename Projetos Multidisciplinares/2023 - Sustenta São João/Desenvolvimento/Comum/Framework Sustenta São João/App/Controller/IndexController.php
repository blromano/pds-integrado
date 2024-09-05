<?php

    namespace App\Controller;
    
    use FW\Controller\Action;
    
    class IndexController extends Action{

        public function index(){   
            $title = "Sustenta São João";
            $texto = "Página index";
   
            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
   
            $this->render('index', 'welcome');
        }
          
        

        public function validaAutenticacao() {
            if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
                header('Location: /login');
                die();
            }
        }

    }
    
?>
