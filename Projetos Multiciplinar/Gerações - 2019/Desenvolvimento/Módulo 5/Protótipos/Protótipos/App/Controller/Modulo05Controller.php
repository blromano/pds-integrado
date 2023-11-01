<?php
    
    namespace App\Controller;
    
    use FW\Controller\Action;

    class Modulo05Controller extends Action{
                                
        public function index(){
            $this->render('index', 'dashboard', '../');
        }

        public function medicamentos(){
            $this->render('medicamentos', 'dashboard', '../');
        }

        public function cadastrarMedicamento(){
            $this->render('cadastrarMedicamento', 'dashboard', '../');
        }

        public function editarMedicamento(){
            $this->render('editarMedicamento', 'dashboard', '../');
        }

        public function excluirMedicamento(){
            $this->render('excluirMedicamento', 'dashboard', '../');
        }
        
        public function vacinas(){
            $this->render('vacinas', 'dashboard', '../');
        }

        public function cadastrarVacina(){
            $this->render('cadastrarVacina', 'dashboard', '../');
        }

        public function editarVacina(){
            $this->render('editarVacina', 'dashboard', '../');
        }

        public function excluirVacina(){
            $this->render('excluirVacina', 'dashboard', '../');
        }
        
        public function patologias(){
            $this->render('patologias', 'dashboard', '../');
        }

        public function cadastrarPatologia(){
            $this->render('cadastrarPatologia', 'dashboard', '../');
        }

        public function editarPatologia(){
            $this->render('editarPatologia', 'dashboard', '../');
        }

        public function excluirPatologia(){
            $this->render('excluirPatologia', 'dashboard', '../');
        }
        
        public function pesquisa(){
            $this->render('pesquisa', 'dashboard', '../');
        }

        public function analisesClinicas(){
            $this->render('analisesClinicas', 'dashboard', '../');
        }

        public function cadastrarAnalise(){
            $this->render('cadastrarAnalise', 'dashboard', '../');
        }

         public function editarAnalise(){
            $this->render('editarAnalise', 'dashboard', '../');
        }

        public function vacinacoes(){
            $this->render('vacinacoes', 'dashboard', '../');
        }

        public function cadastrarVacinacao(){
            $this->render('cadastrarVacinacao', 'dashboard', '../');
        }

        public function editarVacinacao(){
            $this->render('editarVacinacao', 'dashboard', '../');
        }

        public function prescricoes(){
            $this->render('prescricoes', 'dashboard', '../');
        }

         public function cadastrarPrescricao(){
            $this->render('cadastrarPrescricao', 'dashboard', '../');
        }

        public function editarPrescricao(){
            $this->render('editarPrescricao', 'dashboard', '../');
        }

        public function visualizarPrescricao(){
            $this->render('visualizarPrescricao', 'dashboard', '../');
        }

        public function incidentes(){
            $this->render('incidentes', 'dashboard', '../');
        }

         public function cadastrarIncidente(){
            $this->render('cadastrarIncidente', 'dashboard', '../');
        }

        public function editarIncidente(){
            $this->render('editarIncidente', 'dashboard', '../');
        }

        public function patologiasIdoso(){
            $this->render('patologiasIdoso', 'dashboard', '../');
        }

        public function cadastrarPI(){
            $this->render('cadastrarPI', 'dashboard', '../');
        }

        public function historicoEvolucao(){
            $this->render('historicoEvolucao', 'dashboard', '../');
        }

        public function cadastrarEvolucao(){
            $this->render('cadastrarEvolucao', 'dashboard', '../');
        }
       
    }

?>
