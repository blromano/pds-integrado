<?php    
    namespace App;
    
    use FW\Init\Boostrap;
    
    class Route extends Boostrap{
     
        public function initRoutes(){
                       
            $routes['home'] = array(
                'route' => '/',
                'controller' => 'IndexController',
                'action' => 'index'
            );
            
            $routes['dashboard'] = array(
                'route' => '/dashboard',
                'controller' => 'DashBoardController',
                'action' => 'index'
            );
            
            $routes['error404'] = array(
                'route' => '/error404',
                'controller' => 'ErrorController',
                'action' => 'index'
            );
                                  
            try{
                $this->setRoutes($routes);
            } catch (Exception $ex) {
                echo $ex;
            }
            
            
            
        }

    }
    
?>