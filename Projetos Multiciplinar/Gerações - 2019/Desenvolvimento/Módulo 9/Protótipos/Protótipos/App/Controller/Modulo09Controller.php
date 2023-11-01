<?php
    
    namespace App\Controller;
    
    use FW\Controller\Action;

    class Modulo09Controller extends Action{
                                
        public function index(){
            $this->render('index', 'dashboard', '../');
        }
        
         public function relatorio_ulcera(){
            $this->render('relatorio_ulcera', 'dashboard', '../');
        }
        
        public function relatorio_queda(){
            $this->render('relatorio_queda', 'dashboard', '../');
        }
       
         public function relatorio_mortalidade (){
            $this->render('relatorio_queda', 'dashboard', '../');
        }
        
         public function relatorio_limpeza (){
            $this->render('relatorio_limpeza', 'dashboard', '../');
        }
        
        public function relatorio_fuga (){
            $this->render('relatorio_fuga', 'dashboard', '../');
        }
        
        public function relatorio_escabiose (){
            $this->render('relatorio_escabiose', 'dashboard', '../');
        }
        
        public function relatorio_valor (){
            $this->render('relatorio_valor', 'dashboard', '../');
        }
        
        public function relatorio_desidratacao (){
            $this->render('relatorio_desidratacao', 'dashboard', '../');
        }
       
        public function relatorio_desnutricao (){
            $this->render('relatorio_desnutricao', 'dashboard', '../');
        }
        
        public function relatorio_diarreica (){
            $this->render('relatorio_diarreica', 'dashboard', '../');
        }
        
         public function relatorio_recebidos (){
            $this->render('relatorio_recebidos', 'dashboard', '../');
        }
    }

?>


