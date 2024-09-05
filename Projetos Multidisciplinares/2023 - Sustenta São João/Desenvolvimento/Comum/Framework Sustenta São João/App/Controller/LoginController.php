<?php

    namespace App\Controller;
    
    use FW\Controller\Action;
    use App\Model\GestorModel;
    use App\DAO\GestorDAO;
    use App\Model\CidadaoModel;
    use App\DAO\CidadaoDAO;

    class LoginController extends Action{

        public function index(){      
            $title = "Login de usuário";
            $boas_vindas = "Bem Vindo a MedLus";
   
            //para passar valores para a VIEW
            $this->getView()->title = $title;  
            $this->getView()->boas_vindas = $boas_vindas;
                 
            $this->render('index', 'login');
        }
        public function verificarLogin(){
            session_destroy();
            $cidadaodao = new CidadaoDAO();
            $cidadaos = $cidadaodao->listar();
            foreach($cidadaos as $cidadao)
            {
                //if(($cidadao->__get("USU_EMAIL") == $_POST['USU_EMAIL']) & ($cidadao->__get("USU_SENHA") == MD5($_POST['USU_SENHA'])))
                if(($cidadao->__get("USU_EMAIL") == $_POST['USU_EMAIL']) & ($cidadao->__get("USU_SENHA") == MD5($_POST['USU_SENHA'])))
                {
                    session_start();
                    $_SESSION['id'] = $cidadao->__get("USU_ID");
                    $_SESSION['nome'] = $cidadao->__get("USU_NOME");
                    $_SESSION['goc'] = 0;
                    $_SESSION['img'] = $cidadao->__get("USU_FOTO_PERFIL");
                    header('Location: /dashboard'); 
                    die();
                }
            }

            $gestordao = new GestorDAO();
            $gestores = $gestordao->listar();
            foreach($gestores as $gestor)
            {
                //if(($gestor->__get("USU_EMAIL") == $_POST['USU_EMAIL']) & ($gestor->__get("USU_SENHA") == MD5($_POST['USU_SENHA'])))
                if(($gestor->__get("USU_EMAIL") == $_POST['USU_EMAIL']) & ($gestor->__get("USU_SENHA") == MD5($_POST['USU_SENHA'])))
                {
                    session_start();
                    $_SESSION['id'] = $gestor->__get("USU_ID");
                    $_SESSION['nome'] = $gestor->__get("USU_NOME");
                    $_SESSION['goc'] = 1;
                    $_SESSION['img'] = $gestor->__get("USU_FOTO_PERFIL");
                    header('Location: /dashboard'); 
                    die();
                }
            }

            if(!isset($_SESSION['id']))
            {
                header('Location: /login'); 
                //echo $cidadao->__get("USU_SENHA");
                //echo "\n";
                //echo MD5($_POST['USU_SENHA']);
                die();
            }
        }
          
	public function validaAutenticacao() {}
    }
    
?>