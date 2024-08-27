<?php
    
    namespace App\Controller;
    
    use FW\Controller\Action;

    class Modulo08Controller extends Action{
                                
        
        public function cadastro_Tarefas(){
            $this->render('cadastro_Tarefas', 'dashboard', '../');
        }
        
        public function controle_Doacoes(){
            $this->render('controle_Doacoes', 'dashboard', '../');
        }
        
        public function ficha_Funcionario(){
            $this->render('ficha_Funcionario', 'dashboard', '../');
        }
        
        public function fluxo_Caixa(){
            $this->render('fluxo_Caixa', 'dashboard', '../');
        }
        
        public function lista_Tarefas(){
            $this->render('lista_Tarefas', 'dashboard', '../');
        }
        
        public function lista_Funcionarios(){
            $this->render('lista_Funcionarios', 'dashboard', '../');
        }
        
        public function orcamento_Instituicao(){
            $this->render('fluxo_Caixa', 'dashboard', '../');
        }
        
        public function pagamentos_Paciente(){
            $this->render('pagamentos_Paciente', 'dashboard', '../');
        }
        
        
        
        
       
    }

?>
