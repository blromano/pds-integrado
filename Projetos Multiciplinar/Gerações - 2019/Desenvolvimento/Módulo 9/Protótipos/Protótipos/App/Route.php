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
            
            $routes['md9-ulcera'] = array(
                'route' => '/md9/relatorio_ulcera',
                'controller' => 'Modulo09Controller',
                'action' => 'relatorio_ulcera'
            );
            
            $routes['md9-queda'] = array(
                'route' => '/md9/relatorio_queda',
                'controller' => 'Modulo09Controller',
                'action' => 'relatorio_queda'
            );
            
            $routes['md9-mortalidade'] = array(
                'route' => '/md9/relatorio_mortalidade',
                'controller' => 'Modulo09Controller',
                'action' => 'relatorio_mortalidade'
            );
            
            $routes['md9-limpeza'] = array(
                'route' => '/md9/relatorio_limpeza',
                'controller' => 'Modulo09Controller',
                'action' => 'relatorio_limpeza'
            );
            
             $routes['md9-fuga'] = array(
                'route' => '/md9/relatorio_fuga',
                'controller' => 'Modulo09Controller',
                'action' => 'relatorio_fuga'
            );
             
             $routes['md9-escabiose'] = array(
                'route' => '/md9/relatorio_escabiose',
                'controller' => 'Modulo09Controller',
                'action' => 'relatorio_escabiose'
            );
            
            $routes['md9-valor'] = array(
                'route' => '/md9/relatorio_valor',
                'controller' => 'Modulo09Controller',
                'action' => 'relatorio_valor'
            );
            
            $routes['md9-desidratacao'] = array(
                'route' => '/md9/relatorio_desidratacao',
                'controller' => 'Modulo09Controller',
                'action' => 'relatorio_desidratacao'
            );
            
             $routes['md9-diarreica'] = array(
                'route' => '/md9/relatorio_diarreica',
                'controller' => 'Modulo09Controller',
                'action' => 'relatorio_diarreica'
            );
             
             $routes['md9-recebidos'] = array(
                'route' => '/md9/relatorio_recebidos',
                'controller' => 'Modulo09Controller',
                'action' => 'relatorio_recebidos'
            );
            
            
            
            
            
            
            $this->setRoutes($routes);
            
        }        
                       
    }
        
?>
relatorio_desidratação

