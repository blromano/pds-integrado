<?php

    namespace App\Controller;
    
    use FW\Controller\Action;
    
    class DashboardController extends Action{

        //o método index vai renderizar o conteúdo de view/index.php e colocar dentro da dashboard na área especificada
        public function index(){             
            $this->render('index', 'dashboard');
        }

          
	public function validaAutenticacao() {}
    }
    
?>
