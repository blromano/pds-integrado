<?php

    namespace App\Controller;
    
    use FW\Controller\Action;
    use App\DAO\Duvidas_FeedbacksDAO;
    use App\DAO\Respostas_Duvidas_FeedbacksDAO;
    use App\DAO\SetorDAO;
    use App\Controller\IndexController;

    class DashboardMod01Controller extends Action{

        public function index(){   
            $title = "Login de Usuários - Dashboard";
            $texto = "Login de Usuários";
   
            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
   
            $this->render('login', 'welcome'); //Carrega o arquivo login que esta dentro da pasta dashboard
        }
        
        public function dashboard(){   
            $title = "Dashboard - Sustenta São João";
            $texto = "Dashboard";
   
            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
   
            $this->render('index', 'dashboard'); //Carrega o arquivo index  que esta dentro da pasta dashboard
        }

        public function form(){   
            $title = "Dashboard - Sustenta São João";
            $texto = "Dashboard";
   
            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
   
            $this->render('form', 'dashboard'); //Carrega o arquivo form  que esta dentro da pasta dashboard
        }

        public function usuario(){   
            $title = "Usuário";
            $texto = "Dashboard";
   
            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
   
            $this->render('usuario', 'dashboard'); //Carrega o arquivo usuario  que esta dentro da pasta dashboard
        }

        public function cadastro(){   
            $title = "Cadastro de Cidadãos Comuns";
            $texto = "Dashboard";
   
            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
   
            $this->render('cadastro', 'dashboard'); //Carrega o arquivo cadastro  que esta dentro da pasta dashboard
        }

        public function cadastrogestores(){  
            $title = "Cadastro de Gestores";
            $texto = "Dashboard";
            
            $setores;
            $setorDAO = new SetorDAO();
            $setores = $setorDAO->listar();

            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
            $this->getView()->setores = $setores;
            

            $this->render('cadastrogestores', 'dashboard'); //Carrega o arquivo cadastrogestores  que esta dentro da pasta dashboard
        }

        public function duvidas(){   
            $controller = new DashboardMod01Controller();
            //$controller->validaAutenticacaoCidadao();
            $title = "Dúvidas";
            $texto = "Dúvidas e Feedbacks";
   
            $setores;
            $setorDAO = new SetorDAO();
            $setores = $setorDAO->listar();

            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
            $this->getView()->setores = $setores;
   
            $this->render('duvidas', 'dashboard'); //Carrega o arquivo duvidas  que esta dentro da pasta dashboard
        }

        public function login(){
            $title = "Login - Sustenta São João";
            $texto = "Dashboard";

            $this->getView()->texto = $texto;
            $this->getView()->title = $title;

            $this->render('login', 'dashboard');
        }

        public function logout(){  
            $controller = new DashboardMod01Controller();
            $controller->logoutSystem(); //chama a função de logout
   
            $this->render('/'); //após o logout redireciona para o index
        }

        public function recuperarsenha1(){
            $title = "Recuperar Senha - Sustenta São João";
            $texto = "Dashboard";

            $this->getView()->texto = $texto;
            $this->getView()->title = $title;

            $this->render('recuperarsenha1', 'dashboard');
        }

        public function recuperarsenha2(){
            $title = "Recuperar Senha - Sustenta São João";
            $texto = "Dashboard";

            $this->getView()->texto = $texto;
            $this->getView()->title = $title;

            $this->render('recuperarsenha2', 'dashboard');
        }

        public function responderDuvidas(){  
            $controller = new DashboardMod01Controller();
            //$controller->validaAutenticacaoGestor();
            $controller->validaDuvida_Feedback();
            $title = "Responder Dúvidas - Sustenta São João";
            $texto = "Dashboard";
   
            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
            $this->getView()->def_id = $_GET['id'];
   
            $this->render('responderDuvidas', 'dashboard'); //Carrega o arquivo index  que esta dentro da pasta dashboard
        }

        public function editarInfo(){   
            $title = "Editar Informações - Sustenta São João";
            $texto = "Dashboard";
   
            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
   
            $this->render('editarInfo', 'dashboard'); //Carrega o arquivo index  que esta dentro da pasta dashboard
        }

        public function gestaoDuvidas(){   
            $controller = new DashboardMod01Controller();
            //$controller->validaAutenticacaoGestor();
            $title = "Gestão de Dúvidas";
            $texto = "Dúvidas e Feedbacks";
            $duvidas;
            $duvidaDAO = new Duvidas_FeedbacksDAO();
            $duvidas = $duvidaDAO->listar();
            $setores;
            $setorDAO = new SetorDAO();
            $setores = $setorDAO->listar();
            /*$respostas;
            $respostaDAO = new Respostas_Duvidas_FeedbacksDAO();
            $respostas = $respostaDAO->listar();*/
            
            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
            $this->getView()->duvida = $duvidas;
            $this->getView()->setor = $setores;
            //$this->getView()->resposta = $respostas;
   
            $this->render('gestaoduvidas', 'dashboard'); //Carrega o arquivo index  que esta dentro da pasta dashboard
        }

        public function visualizarDuvidas(){  
            /*$controller = new DashboardMod01Controller();
            $controller->validaAutenticacaoGestor();
            $controller->validaDuvida_Feedback();*/
            $title = "Visualizar Dúvidas - Sustenta São João";
            $texto = "Dashboard";
            $duvidas;
            $duvidaDAO = new Duvidas_FeedbacksDAO();
            $duvidas = $duvidaDAO->listar();
            $respostas;
            $respostaDAO = new Respostas_Duvidas_FeedbacksDAO();
            $respostas = $respostaDAO->listar();

            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
            $this->getView()->duvida = $duvidas;
            $this->getView()->resposta = $respostas;
            /*$this->getView()->def_id = $_GET['id'];*/
   
            $this->render('visualizarDuvidas', 'dashboard'); //Carrega o arquivo index  que esta dentro da pasta dashboard
        }

        public function validaAutenticacao() {
            if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
                header('Location: /login');
                die();
            }
        }

        public function validaAutenticacaoCidadao() {
            if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '' || !isset($_SESSION['goc']) || $_SESSION['goc'] != 0) {
                header('Location: /login');
                die();
            }
        }

        public function logoutSystem() {
                session_destroy();
                header("location: /");
                exit();
        } //destrói a sessão que está criada e redireciona para o index

        public function validaAutenticacaoGestor() {
            if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '' || !isset($_SESSION['goc']) || $_SESSION['goc'] != 1) {
                header('Location: /login');
                die();
            }
        }

        public function validaDuvida_Feedback(){
            $duvidas;
            $duvidaDAO = new Duvidas_FeedbacksDAO();
            $duvidas = $duvidaDAO->listar();
            if(isset($_GET['id']))
            {
                foreach($duvidas as $duvida){
                    if($_GET['id'] == $duvida->__get('DEF_ID')){
                        $a=1;
                    }
                }
            }
            if(!isset ($a))
            {
                header('Location: gestaoduvidas');
                die();
            }
        }

    }
    
?>