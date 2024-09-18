<?php

    namespace App\Controller;
    use App\Model\LoginModel;
    use App\DAO\LoginDAO;
    
    use FW\Controller\Action;
    
    class LoginController extends Action{

        public function index(){      
            $title = "Login de usuário";
            $boas_vindas = "Bem Vindo a MedLus";
   
            //para passar valores para a VIEW
            $this->getView()->title = $title;  
            $this->getView()->boas_vindas = $boas_vindas;
                 
            $this->render('index', 'login');
        }

        public function logar(){

            $login = new LoginModel();
            $loginDAO = new LoginDAO();
           
            $login->__set('USU_CPF', $_POST['USU_CPF']);
            $login->__set('USU_SENHA', $_POST['USU_SENHA']);
            
            if($loginDAO->efetuarLogin($login)){

                header('Location: /dashboard?msg=login-sucesso');   
            } else{
                header('Location: /?msg=login-incorreto');
            }


        }

        public function recuperarSenha(){      
            $title = "Recuperar Senha";
            $boas_vindas = "Esqueceu sua Senha?";
   
            //para passar valores para a VIEW
            $this->getView()->title = $title;  
            $this->getView()->boas_vindas = $boas_vindas;
                 
            $this->render('index', 'esqueceuSenha');
        }
        
        public function recuperar(){

            $recuperarSenha = new LoginModel();
            $recuperarSenhaDAO = new LoginDAO();
           
            $recuperarSenha->__set('USU_CPF', $_POST['USU_CPF']);
            

            $recuperarSenhaDAO->recuperarSenha($recuperarSenha);

            header('Location: \esqueceuSenha\index?msg=senha-sucesso');    

        }

        

	public function validaAutenticacao() {}
    }
    
?>