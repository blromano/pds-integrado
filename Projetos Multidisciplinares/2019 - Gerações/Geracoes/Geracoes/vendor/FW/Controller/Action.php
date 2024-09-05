<?php

    namespace FW\Controller;

    abstract class Action {
        
        private $view;
        
        function __construct() {
            $this->view = new \stdClass();
        }

        protected function getView() {
            return $this->view;
        }
                
        protected function render($view, $layout){
            $this->view->page = $view;
            if(file_exists("App/View/$layout.php")){
                require_once "App/View/$layout.php";            
            } else {
                $this->content();
            }
        }
        
        protected function content(){
            $classeAtual = get_class($this);
            $classeAtual = str_replace('App\\Controller\\', '', $classeAtual);
            $classeAtual = strtolower(str_replace('Controller', '', $classeAtual));
                        
            require_once "App/View/$classeAtual/".$this->view->page.".php";
        }
        
    }

?>