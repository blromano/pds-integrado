<?php
    
    namespace App\Controller;
    
    use FW\Controller\Action;

    class Modulo05Controller extends Action{
                                
        public function index(){
            $this->render('index', 'dashboard', '../');
        }
        
        public function pesquisa(){
            $this->render('pesquisa', 'dashboard', '../');
        }
       
         public function analises(){
            $this->render('analises', 'dashboard', '../');
        }
    }

?>
