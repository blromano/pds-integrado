<?php

    namespace App\Controller;

    use FW\Controller\Action;
    use App\Model\ComentarioModel;
    use App\DAO\ComentarioDAO;
   
    class ComentarioController extends Action{

        public function editarComentario(){
            $comentario = new ComentarioModel();
            $comentarioDAO =  new ComentarioDAO();
            $texto = "Dashboard";
          
            if(isset($_GET['id'])){
                $comentario = $comentarioDAO->buscarPorId($_GET['id']);
                $this->getView()->comentario = $comentario;

            }else{
                $this->getView()->comentario = '';
            }
            $title = "Editar";

            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
            $this->render('editarComentario','dashboard');
        }

        public function editarComentarioSelecionado(){
            $comentario = new comentarioModel();
            $comentarioDAO = new comentarioDAO();
            
            $comentario->__set("COM_ID",$_POST['COM_ID']);
            $comentario->__set("COM_TEXTO",$_POST['COM_TEXTO']);
            $comentario->__set("COM_DATA_HORA", Date("Y-m-d H:i:s"));
            
            $comentarioDAO->alterar($comentario);

            header('Location: /dashboard/meusComentarios');
        }

        public function adicionarComentario(){
            $title = "Adicionar Comentário";
            $texto = "Saneamento Básico";
            
            $idComentario = $_GET['id'];
            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
            $this->getView()->idComentario = $idComentario;

            $this->render('adicionarComentario', 'dashboard'); //Carrega o arquivo adicionarDenuncia que esta na pasta dashboard
        }

        public function adicionar(){
            
                $comentario = new ComentarioModel();
                $comentarioDAO = new ComentarioDAO();
    
                $comentario->__set("COM_TEXTO",$_POST['COM_TEXTO']);
                $comentario->__set("FK_DENUNCIAS_DEN_ID",$_POST['FK_DENUNCIAS_DEN_ID']);
                $comentario->__set("COM_DATA_HORA", Date("Y-m-d H:i:s"));
                $comentario->__set("FK_CIDADAOS_USU_ID",$_POST['FK_CIDADAOS_USU_ID']);
                
                
    
                $comentarioDAO->inserir($comentario);
    
                header('Location: /dashboard/feedDenuncia');
            }

        public function meusComentarios(){
            $this->validaAutenticacao();

            $title = "Meus Comentários";
            $texto = "Saneamento";

            //Lista os comentarios do usuario logado
            $comentarioDAO = new ComentarioDAO();
            $comentarios = $comentarioDAO->listarPorIdUsuario($_SESSION['id']);

            //para passar valores para a VIEW
            $this->getView()->comentarios = $comentarios;
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
            $this->render('meusComentarios', 'dashboard'); //Carrega o arquivo meusComentarios que esta na pasta dashboard
        }

        //Exclui o comentario selecionado
        public function excluirComentario(){
            $comentarioDAO = new ComentarioDAO();
            $comentarioDAO->excluir($_GET['id']);

            header('Location: /dashboard/meusComentarios');
        }

        public function validaAutenticacao() {
            if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
                header('Location: /login');
                die();
            }
        }
}