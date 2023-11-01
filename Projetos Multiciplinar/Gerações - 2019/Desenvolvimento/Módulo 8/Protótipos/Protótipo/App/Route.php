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
        
            
            $this->setRoutes($routes);
            
        }        
                        
    }

?>
