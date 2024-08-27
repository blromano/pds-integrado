<?php

    namespace FW\Init;
    
    abstract class Bootstrap{
        
        private $routes;
        
        
        public function __construct() {
                        
            $this->initRoutes();
            
        }
        
        public function getRoutes() {
            return $this->routes;
        }

        public function setRoutes($routes) {
            $this->routes = $routes;
            $this->run($this->getURL());
        }      
        
        protected function run($url){           
            
            foreach ($this->getRoutes() as $key => $route) {                 
                                
                if($url == $route['route']){                    
                    
                    $class = "App\\Controller\\".$route['controller'];              
                    
                    $action = $route['action'];
                    
                    $controller = new $class();
                    $controller->$action();                   
                    
                }                
            }
        }        
        
        protected function getURL(){
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        }        
        
        abstract protected function initRoutes();
            
    }    
    
?>