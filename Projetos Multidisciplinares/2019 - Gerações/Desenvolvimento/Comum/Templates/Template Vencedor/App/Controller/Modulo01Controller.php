<?php
    
    namespace App\Controller;
    
    use FW\Controller\Action;

    class Modulo01Controller extends Action{
                                
        public function index(){
            $this->render('index', 'dashboard', '../');
        }
       
    }

?>
