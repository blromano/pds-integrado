<?php
    
    namespace App\Controller;
    
    use FW\Controller\Action;

    class Modulo07Controller extends Action{
                                
        public function index(){
            $this->render('index', 'dashboard', '../');
        }
        public function AlterarAtividadeFisica(){
            $this->render('AlterarAtividadeFisica', 'dashboard', '../');
        }
        public function AlterarTreinamentoFisico(){
            $this->render('AlterarTreinamentoFisico', 'dashboard', '../');
        }
        public function CadastrarAtividadeFisica(){
            $this->render('CadastrarAtividadeFisica', 'dashboard', '../');
        }
        public function CadastrarTreinamentoFisico(){
            $this->render('CadastrarTreinamentoFisico', 'dashboard', '../');
        }
        public function ListarAtividadeFisica(){
            $this->render('ListarAtividadeFisica', 'dashboard', '../');
        }
        public function ListarTreinamentoFisico(){
            $this->render('ListarTreinamentoFisico', 'dashboard', '../');
        }
        public function VerMaisSobreTreinamentoFisico(){
            $this->render('VerMaisSobreTreinamentoFisico', 'dashboard', '../');
        }
        public function VisualizarTreinamentoFisico(){
            $this->render('VisualizarTreinamentoFisico', 'dashboard', '../');
        }
        public function RegistrarConsulta(){
            $this->render('RegistrarConsulta', 'dashboard', '../');
        }
        public function ListarConsultas(){
            $this->render('ListarConsultas', 'dashboard', '../');
        }
        public function CadastrarConsultaIdosos(){
            $this->render('CadastrarConsultaIdosos', 'dashboard', '../');
        }
        public function AlterarAtividadeRecreativa(){
            $this->render('AlterarAtividadeRecreativa', 'dashboard', '../');
        }
        public function CadastrarAtividadeRecreativa(){
            $this->render('CadastrarAtividadeRecreativa', 'dashboard', '../');
        }
        public function CadastrarPlanejamentoMensal(){
            $this->render('CadastrarPlanejamentoMensal', 'dashboard', '../');
        }
        public function ListaPresencaAtividadeRecreativa(){
            $this->render('ListaPresencaAtividadeRecreativa', 'dashboard', '../');
        }
        public function ListarAtividadeRecreativa(){
            $this->render('ListarAtividadeRecreativa', 'dashboard', '../');
        }
        public function ListarPlanejamentoMensal(){
            $this->render('ListarPlanejamentoMensal', 'dashboard', '../');
        }
        public function ListarEducadoresFisicosFisioterapeuta(){
            $this->render('ListarEducadoresFisicosFisioterapeuta', 'dashboard', '../');
        }
        
    }

?>

          