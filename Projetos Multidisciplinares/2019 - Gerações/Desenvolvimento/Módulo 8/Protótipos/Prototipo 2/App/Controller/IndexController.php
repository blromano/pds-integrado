<?php
    
    namespace App\Controller;
    
    use FW\Controller\Action;

    class IndexController extends Action{
                                
        public function index(){
            $this->render('index', 'layout');
        }
        
        public function sobre(){
            $this->render('sobre', 'layout');
        }    
        
        public function nos(){
            $this->render('nos', 'layout');
        } 
        
        public function login(){
            $this->render('login', 'layout');
        } 
       
    }

?>
