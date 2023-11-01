<?php
    
    namespace App\Controller;
    
    use FW\Controller\Action;

    class DashboardController extends Action{
                                
        public function index(){
            $this->render('index', 'dashboard');
        }
        public function cadastromedicamento(){
            $this->render('cadastromedicamento', 'dashboard');
        }
        public function cadastrarmedicacao(){
            $this->render('cadastrarmedicacao', 'dashboard');
        }
        public function meuidoso(){
            $this->render('meuidoso', 'dashboard');
        }
        public function idosoedfisico(){
            $this->render('idosoedfisico', 'dashboard');
        }
        public function doencas(){
            $this->render('doencas', 'dashboard');
        } 
        public function idosoenf(){
            $this->render('idosoenf', 'dashboard');
        }
        public function medicamentos(){
            $this->render('medicamentos', 'dashboard');
        }
        public function cadastro(){
            $this->render('cadastro', 'dashboard');
        }
        public function analiseclinica(){
            $this->render('analiseclinica', 'dashboard');
        }
        public function cadastroidoso(){
            $this->render('cadastroidoso', 'dashboard');
        }
        public function cadastrodoenca(){
            $this->render('cadastrodoenca', 'dashboard', '../');
        }
        public function listar(){
            $this->render('listar', 'dashboard');
        }
               
    }

?>