<?php
    
    namespace App\Controller;
    
    use FW\Controller\Action;

    class Modulo08Controller extends Action{
                                
        public function index(){
            $this->render('index', 'dashboard', '../');
        }
       
    }

?>
