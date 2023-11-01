<?php
    
    namespace App\Controller;
    
    use FW\Controller\Action;

    class Modulo06Controller extends Action{
                                
        public function index(){
            $this->render('index', 'dashboard', '../');
        }
        
        public function cadastroAlimento(){
            $this->render('cadastroAlimento', 'dashboard', '../');
        }

        public function amostraAlimentos(){
            $this->render('amostraAlimentos', 'dashboard', '../');
        }
        
        public function tipoAlimento(){
            $this->render('tipoAlimento', 'dashboard', '../');
        }
        
        public function cadastrarAmostras(){
            $this->render('cadastrarAmostras', 'dashboard', '../');
        }
        
        public function consultaFeedback(){
            $this->render('consultaFeedback', 'dashboard', '../');
        }
        
        public function agendarConsulta(){
            $this->render('agendarConsulta', 'dashboard', '../');
        }
        
        public function planosAlimentares(){
            $this->render('planosAlimentares', 'dashboard', '../');
        }
        
        public function cadastroPlanosAlimentares(){
            $this->render('cadastroPlanosAlimentares', 'dashboard', '../');
        }
        
         public function statusdeAlimentacao(){
            $this->render('statusdeAlimentacao', 'dashboard', '../');
        }
    }

?>
