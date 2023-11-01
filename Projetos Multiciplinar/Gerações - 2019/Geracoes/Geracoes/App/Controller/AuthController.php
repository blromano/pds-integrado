<?php

    namespace App\Controller;
    
    use FW\Controller\Action;
    use App\DAO\UsuarioDAO;
    use App\Model\Usuario;
    
    class AuthController extends Action{
        
        public function logar(){
            if(isset($_POST['usuario']) && isset($_POST['senha'])){

                $usuario = new Usuario();
                
                $usuario->setUsuario($_POST['usuario']);
                $usuario->setSenha($_POST['senha']);

                $usuarioDAO = new UsuarioDAO();
                $usuario = $usuarioDAO->autenticar($usuario);
                if($usuario->getId() != ""){
                    $this->getView()->dados = $usuario->getNome();
                    $_SESSION['user'] = $usuario->getId().$usuario->getUsuario();
                    $this->render('loginSucesso', 'layout1');
                }
                else{
                    $this->render('loginFracasso', 'layout1');
                }
            }
        }        
    }

?>