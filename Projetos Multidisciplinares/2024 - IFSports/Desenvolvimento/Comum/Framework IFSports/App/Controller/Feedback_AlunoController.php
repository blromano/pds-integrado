<?php

    namespace App\Controller;

    use FW\Controller\Action;
    use App\Model\Feedback_AlunosModel;
    use App\DAO\Feedback_AlunosDAO;

    class Feedback_AlunoController extends Action{

        //o método index vai renderizar o conteúdo de view/index.php e colocar dentro da dashboard na área especificada
        
        public function AcompanharFeedback(){             
            $this->render('AcompanharFeedback','dashboard');
        }

        public function InformarFeedback(){             
            $this->render('InformarFeedback','dashboard');
        }

        public function validaAutenticacao() {}
    }

?>
