<?php

    namespace FW\Controller;
    use FW\Controller\Validar;

    abstract class Action implements Validar{
        
        private $view;
        
        function __construct() {
            
            try {
                $this->view = new \stdClass();
            } catch (Exception $ex) {
                echo $ex;
            }
            
        }

        protected function getView() {
            return $this->view;
        }
                
        protected function render($view, $layout, $include=''){
            $this->view->page = $view;
            $this->view->include = $include;
            if(file_exists("App/View/$layout.php")){
                require_once "App/View/$layout.php";            
            } else {
                $this->content();
            }
        }
        
        protected function content(){
            
            try{
                $classeAtual = get_class($this);
                $classeAtual = str_replace('App\\Controller\\', '', $classeAtual);
                $classeAtual = strtolower(str_replace('Controller', '', $classeAtual));                        
                require_once "App/View/$classeAtual/".$this->view->page.".php";            
            } catch (Exception $ex) {
                echo $ex;

            }
            
        }                
        
    }

?>