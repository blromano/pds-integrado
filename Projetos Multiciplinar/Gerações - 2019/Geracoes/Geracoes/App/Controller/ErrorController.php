<?php

    namespace App\Controller;
    
    use FW\Controller\Action;   

    class ErrorController extends Action{        

        public function error(){                      
            $this->render('error', 'layout1');
        }
        
    }
    

?>
