<?php

    namespace App\Controller;
    
    use FW\Controller\Action;
    
    class IndexController extends Action{

        public function index(){             
            $texto = "Página index";
   
            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
   
            $this->render('index', 'dashboard');
        }
          
        

        public function validaAutenticacao() {
            if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
                header('Location: /login');
                die();
            }
        }

    }
    
?>
