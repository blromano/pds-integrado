<?php

    namespace App;
    
    use FW\Init\Bootstrap;
    
    class Route extends Bootstrap{
                
        protected function initRoutes(){
            
            $routes['index'] = array(
                'route' => '/',
                'controller' => 'IndexController',
                'action' => 'index'
            );            
            
            $routes['sobre'] = array(
                'route' => '/sobre',
                'controller' => 'IndexController',
                'action' => 'sobre'
            );         
            
            $routes['nos'] = array(
                'route' => '/nos',
                'controller' => 'IndexController',
                'action' => 'nos'
            ); 
            
            $routes['login'] = array(
                'route' => '/login',
                'controller' => 'IndexController',
                'action' => 'login'
            ); 
            
            $routes['dashboard'] = array(
                'route' => '/dashboard',
                'controller' => 'DashboardController',
                'action' => 'index'
            );
            
            $routes['md9-index'] = array(
                'route' => '/md9/',
                'controller' => 'Modulo09Controller',
                'action' => 'index'
            );
            
            $routes['md1-index'] = array(
                'route' => '/md1/',
                'controller' => 'Modulo01Controller',
                'action' => 'index'
            );
            
            $routes['md8-index'] = array(
                'route' => '/md8/',
                'controller' => 'Modulo08Controller',
                'action' => 'index'
            );
            
            $routes['md8-cadastro_Tarefas'] = array(
                'route' => '/md8/cadastro_Tarefas',
                'controller' => 'Modulo08Controller',
                'action' => 'cadastro_Tarefas'
            );
            
            $routes['md8-controle_Doacoes'] = array(
                'route' => '/md8/controle_Doacoes',
                'controller' => 'Modulo08Controller',
                'action' => 'controle_Doacoes'
            );
            
            $routes['md8-ficha_Funcionario'] = array(
                'route' => '/md8/ficha_Funcionario',
                'controller' => 'Modulo08Controller',
                'action' => 'ficha_Funcionario'
            );
            
            $routes['md8-fluxo_Caixa'] = array(
                'route' => '/md8/fluxo_Caixa',
                'controller' => 'Modulo08Controller',
                'action' => 'fluxo_Caixa'
            );
            
            $routes['md8-lista_Funcionarios'] = array(
                'route' => '/md8/lista_Funcionarios',
                'controller' => 'Modulo08Controller',
                'action' => 'lista_Funcionarios'
            );
            
            $routes['md8-lista_Tarefas'] = array(
                'route' => '/md8/lista_Tarefas',
                'controller' => 'Modulo08Controller',
                'action' => 'lista_Tarefas'
            );
            
            $routes['md8-orcamento_Instituicao'] = array(
                'route' => '/md8/orcamento_Instituicao',
                'controller' => 'Modulo08Controller',
                'action' => 'orcamento_Instituicao'
            );
            
            $routes['md8-pagamentos_Paciente'] = array(
                'route' => '/md8/pagamentos_Paciente',
                'controller' => 'Modulo08Controller',
                'action' => 'pagamentos_Paciente'
            );
        
            
            $this->setRoutes($routes);
            
        }        
                        
    }

?>
