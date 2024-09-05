<?php

    namespace App\Controller;
    
    use FW\Controller\Action;
    
    class ErrorController extends Action{

        public function error404(){             
            $this->render('error404', 'error');
        }

    public function validaAutenticacao() {
        
    }

}
    
?>
