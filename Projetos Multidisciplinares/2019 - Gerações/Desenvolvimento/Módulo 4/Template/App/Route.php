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
            
            //MOD01
            $routes['md1-index'] = array(
                'route' => '/md1/',
                'controller' => 'Modulo01Controller',
                'action' => 'index'
            );
            
            //MOD04
            $routes['md4-pesquisarIdoso'] = array(
                'route' => '/md4/pesquisa',
                'controller' => 'Modulo04Controller',
                'action' => 'pesquisa'
            );
            
            $routes['md4-higiene'] = array(
                'route' => '/md4/higiene',
                'controller' => 'Modulo04Controller',
                'action' => 'higiene'
            );
            $routes['md4-sinaisVitais'] = array(
                'route' => '/md4/sinaisVitais',
                'controller' => 'Modulo04Controller',
                'action' => 'sinaisVitais'
            );
            $routes['md4-eliminacoes'] = array(
                'route' => '/md4/eliminacoes',
                'controller' => 'Modulo04Controller',
                'action' => 'eliminacoes'
            );
            
            //MOD05
            $routes['md5-pesquisarIdoso'] = array(
                'route' => '/md5/pesquisa',
                'controller' => 'Modulo05Controller',
                'action' => 'pesquisa'
            );
            
           
            
            
            
            $this->setRoutes($routes);
            
        }        
                        
    }

?>
