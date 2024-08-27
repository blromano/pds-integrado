<?php
    
    namespace FW\Init;
    
    abstract class Boostrap {
        
        private $routes;
        
        function __construct() {
            $this->initRoutes();
            $this->run($this->getUrl());
        }
        
        function getRoutes() {
            return $this->routes;
        }

        function setRoutes($routes) {
            $this->routes = $routes;
        }       
        
        protected function run($url){
            
            $rotaValida = false;
            
            foreach ($this->getRoutes() as $key => $route) {
                if($url == $route['route']){
                    $class = "App\\Controller\\".$route['controller'];
                    $controller = new $class();                    
                    $action = $route['action'];
                    $controller->$action();
                    $rotaValida = true;
                }
            }
            
            if(!$rotaValida){
                $class = "App\\Controller\\ErrorController";
                $controller = new $class();                    
                $action = "error404";
                $controller->$action();
                $rotaValida = true;
            }
            
        }

        protected function getUrl(){
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            
        }
                
        abstract protected function initRoutes();
    }
?>
