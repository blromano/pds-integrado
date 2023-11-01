<?php

    namespace App\Controller;
    
    use FW\Controller\Action;
    use App\DAO\ProdutoDAO;
    use App\DAO\InfoDAO;
    use App\DAO\UsuarioDAO;
    use App\Model\Usuario;
    

    class IndexController extends Action{        

        public function index(){
            
            $produtoDAO = new ProdutoDAO();
            $produtos = $produtoDAO->listar();
            
            $this->getView()->dados = $produtos;
            
            $this->render('index', 'layout1');
        }
        
        public function sobre(){                       
            
            $infoDAO = new InfoDAO();
            $infos = $infoDAO->listar();
            
            $this->getView()->dados = $infos;
            
            $this->render('sobre', 'layout1');
        }        
        
        public function cadastro(){
            $this->render('cadastro', 'layout1');
        }
        
        public function registrar(){
            
            if(isset($_POST['nome']) && isset($_POST['usuario']) && isset($_POST['senha'])){

                $usuario = new Usuario();
                
                $usuario->setNome($_POST['nome']);
                $usuario->setUsuario($_POST['usuario']);
                $usuario->setSenha($_POST['senha']);

                $usuarioDAO = new UsuarioDAO();
                $usuarioDAO->inserir($usuario);
                $usuario = $usuarioDAO->autenticar($usuario);
                $_SESSION['user'] = $usuario->getId().$usuario->getUsuario();
            }
            
            header('Location: /');
            die();
        }          
        
        public function login(){
            $this->render('login', 'layout1');
        }

        public function logout(){
            session_destroy();
            header('Location: /');
            die();
        }
    }
    

?>
