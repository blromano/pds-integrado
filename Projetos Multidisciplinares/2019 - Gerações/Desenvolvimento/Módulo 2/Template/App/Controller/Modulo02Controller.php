<?php
    
    namespace App\Controller;
    
    use FW\Controller\Action;

    class Modulo02Controller extends Action{
                                
        public function index(){
            $this->render('index', 'dashboard');
        }
        public function cadastromedicamento(){
            $this->render('cadastromedicamento', 'dashboard', '../');
        }
        public function cadastrarmedicacao(){
            $this->render('cadastrarmedicacao', 'dashboard', '../');
        }
        public function meuidoso(){
            $this->render('meuidoso', 'dashboard', '../');
        }
        public function idosoedfisico(){
            $this->render('idosoedfisico', 'dashboard', '../');
        }
        public function doencas(){
            $this->render('doencas', 'dashboard', '../');
        } 
        public function idosoenf(){
            $this->render('idosoenf', 'dashboard', '../');
        }
        public function medicamentos(){
            $this->render('medicamentos', 'dashboard', '../');
        }
        public function cadastro(){
            $this->render('cadastro', 'dashboard', '../');
        }
        public function analiseclinica(){
            $this->render('analiseclinica', 'dashboard', '../');
        }
        public function cadastroidoso(){
            $this->render('cadastroidoso', 'dashboard', '../');
        }
        public function cadastrodoenca(){
            $this->render('cadastrodoenca', 'dashboard', '../');
        }
        public function listar(){
            $this->render('listar', 'dashboard', '../');
        }
        public function registrardoenca(){
            $this->render('registrardoenca', 'dashboard', '../');
        }
        public function registrar_analise_clinica(){
            $this->render('registrar_analise_clinica', 'dashboard', '../');
        }
        public function listar_analise(){
            $this->render('listar_analise', 'dashboard', '../');
        }
        public function registrorestricoes(){
            $this->render('registrorestricoes', 'dashboard', '../');
        }
        public function listar_restricoes(){
            $this->render('listar_restricoes', 'dashboard', '../');
        }
        public function editar_restricoes(){
            $this->render('editar_restricoes', 'dashboard', '../');
        }
        public function excluir_restricoes(){
            $this->render('excluir_restricoes', 'dashboard', '../');
        }
        public function registroalergia(){
            $this->render('registroalergia', 'dashboard', '../');
        }
 
        public function listar_alergia(){
            $this->render('listar_alergia', 'dashboard', '../');
        }
        public function editar_alergia(){
            $this->render('editar_alergia', 'dashboard', '../');
        }
        public function excluir_alergia(){
            $this->render('excluir_alergia', 'dashboard', '../');
        }
        public function ficha(){
            $this->render('ficha', 'dashboard', '../');
        }
        public function listar_medicamentos(){
            $this->render('listar_medicamentos', 'dashboard', '../');
        }
        public function registrar_medicamentos(){
            $this->render('registrar_medicamentos', 'dashboard', '../');
        }
               
        public function registrar_doencas(){
            $this->render('registrar_doencas', 'dashboard', '../');
        }
 
        public function listar_doencas(){
            $this->render('listar_doencas', 'dashboard', '../');
        }
    }

?>