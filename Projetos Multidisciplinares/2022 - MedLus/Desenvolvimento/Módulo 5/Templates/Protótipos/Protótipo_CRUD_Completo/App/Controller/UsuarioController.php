<?php

    namespace App\Controller;
    
    use FW\Controller\Action;
    use App\Model\Usuario;
    use App\DAO\UsuarioDAO;
    
    class UsuarioController extends Action{              
        
        public function inserir(){
                
                
                $usuario = new Usuario();
                $usuarioDAO = new UsuarioDAO();
                if(!isset($_POST['nome']) || !isset($_POST['email']) || !isset($_POST['senha']) || !isset($_POST['nivel']) ){
                    header('Location: /usuario/cadastrar?status=203');
                    die();
                }
                $usuario->__set('nome', $_POST['nome']);
                $usuario->__set('email', $_POST['email']);
                $usuario->__set('nivel', $_POST['nivel']);
                $usuario->__set('senha', $_POST['senha']);
                            
                
                $usuarioDAO->inserir($usuario);

                header('Location: /usuario/cadastro?msg=cadastro-sucesso');                
            
            }

            public function atualizar(){
                
                
                $usuario = new Usuario();
                $usuarioDAO = new UsuarioDAO();
               
                $usuario->__set('idusuario', $_POST['id']);
                $usuario->__set('nome', $_POST['nome']);
                $usuario->__set('email', $_POST['email']);
                $usuario->__set('nivel', $_POST['nivel']);                
                
                $usuarioDAO->alterar($usuario);

                header('Location: /usuario/cadastro?msg=editar-sucesso');                
            
            }

        public function listagem()
        {

            $usuarios;
            $usuarioDAO = new UsuarioDAO();            
            
            $usuarios = $usuarioDAO->listar();

            $this->getView()->usuarios = $usuarios;                      
           
            $this->render('listagemUsuarios', 'usuario', '');


        }    
               

        public function cadastrar(){

            if(isset($_GET['status'])){
                $this->getView()->status = $_GET['status'];
            } else {
                $this->getView()->status = '' ;
            }
           
            $this->render('cadastrarUsuario', 'usuario', '');
        }

        public function editar(){                  
            
            $usuario = new Usuario();
            $usuarioDAO = new UsuarioDAO();            
            
            if(isset($_GET['id'])){
                $usuario = $usuarioDAO->buscarPorId($_GET['id']);

                $this->getView()->usuario = $usuario;
            } else {
                $this->getView()->usuario = '' ;
            }            
           
            $this->render('editarUsuario', 'usuario', '');
        } 

        public function excluir()
        {
            $usuarioDAO = new UsuarioDAO(); 
            if(isset($_GET['id'])){
                $usuarioDAO->excluir($_GET['id']);
                header('Location: /usuario/cadastro?msg=exclusao-sucesso');
            }    
        }
        
        public function msgs(){     
            
            if(isset($_GET['msg'])){
                
                if($_GET['msg'] == 'cadastro-sucesso')
                {
                    $msg = "Cadastro do usuário realizado com sucesso!";
                }
                if($_GET['msg'] == 'editar-sucesso')
                {
                    $msg = "Usuário atualizado com sucesso!";
                }
                if($_GET['msg'] == 'exclusao-sucesso')
                {
                    $msg = "Usuário excluído com sucesso!";
                }
                
                $this->getView()->msg = $msg;
            } else {
                $this->getView()->msg = '' ;
            }

            $this->render('msgs', 'usuario', '');
        }   

        public function validaAutenticacao() {
            if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
                header('Location: /login');
                die();
            }
        }       

}
    
?>
