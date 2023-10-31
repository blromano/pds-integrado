<?php

    namespace App\Controller;
    
    use FW\Controller\Action;
    
    class LoginController extends Action{

        public function teste(){             
            $this->render('login', 'paciente');
        }

    public function validaAutenticacao() {
        
    }

}
    
?>