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
            
            $routes['md3-index'] = array(
                'route' => '/md3/',
                'controller' => 'Modulo03Controller',
                'action' => 'index'
            );
            
            $routes['md3-financas'] = array(
                'route' => '/md3/financas',
                'controller' => 'Modulo03Controller',
                'action' => 'financas'
            );
            
            $routes['md3-CuidadosDiarios'] = array(
                'route' => '/md3/CuidadosDiarios',
                'controller' => 'Modulo03Controller',
                'action' => 'CuidadosDiarios'
            );
        
            $routes['md3-SinaisVitais'] = array(
                'route' => '/md3/SinaisVitais',
                'controller' => 'Modulo03Controller',
                'action' => 'SinaisVitais'
            );
        
             $routes['md3-Eliminacao'] = array(
                'route' => '/md3/Eliminacao',
                'controller' => 'Modulo03Controller',
                'action' => 'Eliminacao'
            );
            $routes['md3-Higiene'] = array(
                'route' => '/md3/Higiene',
                'controller' => 'Modulo03Controller',
                'action' => 'Higiene'
            );
             $routes['md3-EvolucaoDiaria'] = array(
                'route' => '/md3/EvolucaoDiaria',
                'controller' => 'Modulo03Controller',
                'action' => 'EvolucaoDiaria'
            );
         $routes['md3-PatologiasPrescricoes'] = array(
                'route' => '/md3/PatologiasPrescricoes',
                'controller' => 'Modulo03Controller',
                'action' => 'PatologiasPrescricoes'
            );
         $routes['md3-PadraoAlimentar'] = array(
                'route' => '/md3/PadraoAlimentar',
                'controller' => 'Modulo03Controller',
                'action' => 'PadraoAlimentar'
            );
          $routes['md3-AtividadesRecreativas'] = array(
                'route' => '/md3/AtividadesRecreativas',
                'controller' => 'Modulo03Controller',
                'action' => 'AtividadesRecreativas'
            );
           $routes['md3-EditarInfo'] = array(
                'route' => '/md3/EditarInfo',
                'controller' => 'Modulo03Controller',
                'action' => 'EditarInfo'
            );
        

               
            
            $this->setRoutes($routes);
            
        }        
                        
    }

?>
