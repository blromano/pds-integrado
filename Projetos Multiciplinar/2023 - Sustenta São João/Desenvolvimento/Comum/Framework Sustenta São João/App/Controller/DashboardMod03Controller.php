<?php

    namespace App\Controller;
    
    use FW\Controller\Action;
    use App\Model\DenunciasModel;
    use App\DAO\DenunciasDAO;

    
    class DashboardMod03Controller extends Action{

        public function index(){   
            $title = "Login de Usuários - Dashboard";
            $texto = "Login de Usuários";
   
            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
   
            $this->render('login', 'welcome'); //Carrega o arquivo login que esta dentro da pasta dashboard
        }

        public function cadastrarDenuncia(){
            $this->validaAutenticacao();
            $title = "Cadastro de Denúncia";
            $texto = "Saneamento";

            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;

            $this->render('cadastrarDenuncia', 'dashboard'); //Carrega o arquivo cadastrarDenuncia que esta na pasta dashboard
        }
        
       

        public function editarDenuncia(){
            $title = "Editar Denúncia";
            $texto = "Saneamento Básico";

            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;

            $this->render('editarDenuncia', 'dashboard'); //Carrega o arquivo editarDenuncia que esta na pasta dashboard
        }

        public function editarComentario(){
            $title = "Editar Comentário";
            $texto = "Saneamento Básico";

            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;

            $this->render('editarComentario', 'dashboard'); //Carrega o arquivo editarComentario que esta na pasta dashboard
        }

        public function listarViolacaoUso(){
            $title = "Lista de Violação de Uso";
            $texto = "Saneamento Básico";

            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;

            $this->render('listarViolacaoUso', 'dashboard'); //Carrega o arquivo listarDenuncia que esta na pasta dashboard
        }

        public function visualizarDenuncia(){
            $title = "Visualizar Publicação";
            $texto = "Saneamento Básico";

            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;

            $this->render('visualizarDenuncia', 'dashboard'); //Carrega o arquivo listarDenuncia que esta na pasta dashboard
        }

        public function feedDenuncia(){
            $title = "Feed Denuncia";
            $texto = "Saneamento Básico";

            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;

            $this->render('feedDenuncia', 'dashboard'); //Carrega o arquivo listarDenuncia que esta na pasta dashboard
        }

        public function Denuncia(){
            $title = "Denuncia";
            $texto = "Saneamento Básico";

            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;

            $this->render('Denuncia', 'dashboard'); //Carrega o arquivo listarDenuncia que esta na pasta dashboard
        }

        public function validaAutenticacao() {
            if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
                header('Location: /login');
                die();
            }
        }

    }

?>