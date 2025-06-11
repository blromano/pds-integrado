<?php

    namespace App\Controller;

    use FW\Controller\Action;

    class RestringirController extends Action{

        //o método index vai renderizar o conteúdo de view/index.php e colocar dentro da dashboard na área especificada
        public function restringir(){             
            $this->render('restringir','dashboard');
        }

    
        public function validaAutenticacao() {}
    }

?>
