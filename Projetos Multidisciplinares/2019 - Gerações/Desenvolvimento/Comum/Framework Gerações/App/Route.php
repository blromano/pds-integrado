<?php    
    namespace App;
    
    use FW\Init\Boostrap;
    
    class Route extends Boostrap{
     
        public function initRoutes(){
            
            $routes['error'] = array(
                'route' => '/error',
                'controller' => 'ErrorController',
                'action' => 'error'
            );            
            
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
            
            $routes['cadastro'] = array(
                'route' => '/cadastro',
                'controller' => 'IndexController',
                'action' => 'cadastro'
            );                        
            
            $routes['registrar'] = array(
                'route' => '/registrar',
                'controller' => 'IndexController',
                'action' => 'registrar'
            );                                    
            
            $routes['login'] = array(
                'route' => '/login',
                'controller' => 'IndexController',
                'action' => 'login'
            );

            $routes['logoff'] = array(
                'route' => '/logout',
                'controller' => 'IndexController',
                'action' => 'logout'
            );            
            
            $routes['logar'] = array(
                'route' => '/logar',
                'controller' => 'AuthController',
                'action' => 'logar'
            );
            
            $this->setRoutes($routes);
            
        }

    }
    
?>