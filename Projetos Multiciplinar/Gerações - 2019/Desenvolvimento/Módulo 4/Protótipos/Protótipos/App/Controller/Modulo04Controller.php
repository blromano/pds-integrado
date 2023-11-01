<?php
    
    namespace App\Controller;
    
    use FW\Controller\Action;

    class Modulo04Controller extends Action{
                                
        public function index(){
            $this->render('index', 'dashboard', '../');
        }
        
        public function pesquisa(){
            $this->render('pesquisa', 'dashboard', '../');
        }
        
        public function higiene(){
            $this->render('higiene', 'dashboard', '../');
        }
        public function sinaisVitais(){
            $this->render('sinaisVitais', 'dashboard', '../');
        }
        public function eliminacoes(){
            $this->render('eliminacoes', 'dashboard', '../');
        }
       
    }

?>
