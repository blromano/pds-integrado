<?php
    
    namespace App\Controller;
    
    use FW\Controller\Action;

    class Modulo03Controller extends Action{
                                
        public function index(){
            $this->render('index','dashboard' ,'../');
        }
        
        public function financas(){
            $this->render('financas','dashboard','../');
        }
        
        public function CuidadosDiarios(){
            $this->render('CuidadosDiarios','dashboard','../');
        }
        public function SinaisVitais(){
            $this->render('SinaisVitais','dashboard','../');
        }
         public function Eliminacao(){
            $this->render('Eliminacao','dashboard','../');
        }
        public function Higiene(){
            $this->render('Higiene','dashboard','../');
        }
            
       public function EvolucaoDiaria(){
            $this->render('EvolucaoDiaria','dashboard','../');
        }
           public function PatologiasPrescricoes(){
            $this->render('PatologiasPrescricoes','dashboard','../');
        }
        public function PadraoAlimentar(){
            $this->render('PadraoAlimentar','dashboard','../');
        }
        public function AtividadesRecreativas(){
            $this->render('AtividadesRecreativas','dashboard','../');
        }
        public function EditarInfo(){
            $this->render('EditarInfo','dashboard','../');
        } 
        
    }

?>
