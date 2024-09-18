<?php
    
    namespace App\Controller;
    
    use FW\Controller\Action;

    class DashboardController extends Action{
                                
        public function index(){
            $this->render('index', 'dashboard');
        }
               
    }

?>