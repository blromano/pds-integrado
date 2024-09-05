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
            
            $routes['md6-index'] = array(
                'route' => '/md6/',
                'controller' => 'Modulo06Controller',
                'action' => 'index'
            );
            
            $routes['md6-cadastro-de-alimentos'] = array(
                'route' => '/md6/alimento',
                'controller' => 'Modulo06Controller',
                'action' => 'cadastroAlimento'
            );
        
            $routes['md6-amostras'] = array(
                'route' => '/md6/amostra',
                'controller' => 'Modulo06Controller',
                'action' => 'cadastrarAmostras'
            );
            
            $routes['md6-tipo-de-alimento'] = array(
                'route' => '/md6/tipodealimento',
                'controller' => 'Modulo06Controller',
                'action' => 'tipoAlimento'
            );
            
            $routes['md6-amostra'] = array(
                'route' => '/md6/amostra',
                'controller' => 'Modulo06Controller',
                'action' => 'amostra'
            );
            
            $routes['md6-consulta-feedback'] = array(
                'route' => '/md6/consultaFeedback',
                'controller' => 'Modulo06Controller',
                'action' => 'consultaFeedback'
            );
            
            $routes['md6-agendar-consulta'] = array(
                'route' => '/md6/consulta',
                'controller' => 'Modulo06Controller',
                'action' => 'agendarConsulta'
            );
            
            $routes['md6-planos-alimentares'] = array(
                'route' => '/md6/planosalimentares',
                'controller' => 'Modulo06Controller',
                'action' => 'planosAlimentares'
            );
            
            $routes['md6-cadastro-planos-alimentares'] = array(
                'route' => '/md6/cadastroplanosalimentares',
                'controller' => 'Modulo06Controller',
                'action' => 'cadastroPlanosAlimentares'
            );
            
              $routes['md6-statusdeAlimentacao'] = array(
                'route' => '/md6/statusdeAlimentacao',
                'controller' => 'Modulo06Controller',
                'action' => 'statusdeAlimentacao'
            );
            $this->setRoutes($routes);
            
        }        
                        
    }

?>
