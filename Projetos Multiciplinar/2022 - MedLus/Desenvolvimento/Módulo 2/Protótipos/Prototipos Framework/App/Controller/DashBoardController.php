<?php

    namespace App\Controller;
    
    use FW\Controller\Action;
    
    class DashBoardController extends Action{

        public function index(){             
            $this->render('dashboard', 'dashboard');
        }

    public function validaAutenticacao() {
        
    }

}
    
?>
