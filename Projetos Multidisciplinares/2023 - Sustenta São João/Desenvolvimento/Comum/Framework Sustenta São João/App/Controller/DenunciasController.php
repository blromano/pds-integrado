<?php

    namespace App\Controller;

    use FW\Controller\Action;
    use App\Model\DenunciaModel;
    use App\DAO\DenunciasDAO;
    use App\DAO\DenunciasCurtidasDAO;
    use App\DAO\ComentarioDAO;

    class DenunciasController extends Action{

        public function listarDenuncias(){
            $this->validaAutenticacao();
            $title = "Minhas Denúncias";
            $texto = "Saneamento";

            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;

            $denunciaDAO = new DenunciasDAO();

            $denuncias = $denunciaDAO->listarPorIdUsuario($_SESSION['id']);

            //para passar valores para a VIEW
            $this->getView()->denuncias = $denuncias;
            $this->render('listarDenuncias', 'dashboard'); //Carrega o arquivo listarDenuncia que esta na pasta dashboard
        }

        public function inserirDenuncia(){
        $this->validaAutenticacao();
        $dir = "resources/upload/"; 
        //$file = $_FILES["DEN_FOTO_VIDEO"];
        $nome_arquivo = rand() . "_" . basename($_FILES['DEN_FOTO_VIDEO']['name']);
        move_uploaded_file($_FILES['DEN_FOTO_VIDEO']['tmp_name'], $dir."/".$nome_arquivo);
            $denuncia = new DenunciaModel();
            $denunciaDAO = new DenunciasDAO();

            $denuncia->__set("DEN_TITULO",$_POST['DEN_TITULO']);
            $denuncia->__set("DEN_DESCRICAO",$_POST['DEN_DESCRICAO']);
            $denuncia->__set("DEN_FOTO_VIDEO", $nome_arquivo);
            $denuncia->__set("DEN_STATUS_DENUNCIA","A");
            $denuncia->__set("DEN_DATA_ALT_STATUS", date("Y-m-d h:m:s"));
            $denuncia->__set("DEN_DATA_PUBLICACAO", date("Y-m-d h:m:s"));
            $denuncia->__set("DEN_CEP",$_POST['DEN_CEP']);
            $denuncia->__set("DEN_RUA",$_POST['DEN_RUA']);
            $denuncia->__set("DEN_NUMERO",$_POST['DEN_NUMERO']);
            $denuncia->__set("DEN_COMPLEMENTO",$_POST['DEN_COMPLEMENTO']);
            $denuncia->__set("DEN_BAIRRO",$_POST['DEN_BAIRRO']);
            $denuncia->__set("DEN_QDE_CURTIDAS",0);
            $denuncia->__set("DEN_BAIRRO",$_POST['DEN_BAIRRO']);
            $denuncia->__set("DEN_BAIRRO",$_POST['DEN_BAIRRO']);
            $denuncia->__set("FK_CIDADAOS_USU_ID",$_SESSION['id']);
            //$denuncia->__set("FK_GESTORES_USU_ID",1);

            $denunciaDAO->inserir($denuncia);

            header('Location: /dashboard/cadastrarDenuncia');
        }
        public function reenviarDenuncia(){
            $this->validaAutenticacao();
            $dir = "resources/upload/"; 
            //$file = $_FILES["DEN_FOTO_VIDEO"];
            $nome_arquivo = rand() . "_" . basename($_FILES['DEN_FOTO_VIDEO']['name']);
            move_uploaded_file($_FILES['DEN_FOTO_VIDEO']['tmp_name'], $dir."/".$nome_arquivo);
                $denuncia = new DenunciaModel();
                $denunciaDAO = new DenunciasDAO();
    
                $denuncia->__set("DEN_TITULO",$_POST['DEN_TITULO']);
                $denuncia->__set("DEN_DESCRICAO",$_POST['DEN_DESCRICAO']);
                $denuncia->__set("DEN_FOTO_VIDEO", $nome_arquivo);
                $denuncia->__set("DEN_STATUS_DENUNCIA","A");
                $denuncia->__set("DEN_DATA_ALT_STATUS", date("Y-m-d h:m:s"));
                $denuncia->__set("DEN_DATA_PUBLICACAO", date("Y-m-d h:m:s"));
                $denuncia->__set("DEN_CEP",$_POST['DEN_CEP']);
                $denuncia->__set("DEN_RUA",$_POST['DEN_RUA']);
                $denuncia->__set("DEN_NUMERO",$_POST['DEN_NUMERO']);
                $denuncia->__set("DEN_COMPLEMENTO",$_POST['DEN_COMPLEMENTO']);
                $denuncia->__set("DEN_BAIRRO",$_POST['DEN_BAIRRO']);
                $denuncia->__set("DEN_QDE_CURTIDAS",0);
                $denuncia->__set("DEN_BAIRRO",$_POST['DEN_BAIRRO']);
                $denuncia->__set("DEN_BAIRRO",$_POST['DEN_BAIRRO']);
                $denuncia->__set("FK_CIDADAOS_USU_ID",$_SESSION['id']);
                //$denuncia->__set("FK_GESTORES_USU_ID",1);
    
                $denunciaDAO->inserir($denuncia);
    
                header('Location: /dashboard/cadastrarDenuncia');
            }
        
        
        public function editarDenuncia(){
            $this->validaAutenticacao();
            $denuncia = new DenunciaModel();
            $denunciaDAO =  new DenunciasDAO();
            $texto = "Dashboard";
          
            if(isset($_GET['id'])){
                $denuncia = $denunciaDAO->buscarPorId($_GET['id']);
                $this->getView()->denuncia = $denuncia;
                
            }else{
                $this->getView()->denuncia = '';
            }
            $title = "Editar Denuncia";
            
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
            $this->render('editarDenuncia','dashboard');
        }

        public function editarDenunciaSelecionada(){
            $this->validaAutenticacao();
            $denuncia = new DenunciaModel();
            $denunciaDAO = new DenunciasDAO();
            
            $dir = "resources/upload/"; 
            $nome_arquivo = rand() . "_" . basename($_FILES['DEN_FOTO_VIDEO']['name']);
            move_uploaded_file($_FILES['DEN_FOTO_VIDEO']['tmp_name'], $dir."/".$nome_arquivo);
            
            $denuncia->__set("DEN_ID",$_POST['DEN_ID']);
            $denuncia->__set("DEN_TITULO",$_POST['DEN_TITULO']);
            $denuncia->__set("DEN_DESCRICAO",$_POST['DEN_DESCRICAO']);
            $denuncia->__set("DEN_CEP",$_POST['DEN_CEP']);
            $denuncia->__set("DEN_RUA",$_POST['DEN_RUA']);
            $denuncia->__set("DEN_NUMERO",$_POST['DEN_NUMERO']);
            $denuncia->__set("DEN_COMPLEMENTO",$_POST['DEN_COMPLEMENTO']);
            $denuncia->__set("DEN_BAIRRO",$_POST['DEN_BAIRRO']);
            $denuncia->__set("DEN_FOTO_VIDEO", $nome_arquivo);
            
            $denunciaDAO->alterar($denuncia);
            
            header('Location: /dashboard/listarDenuncias');
        }
        
        public function excluirDenuncia(){
            $this->validaAutenticacao();
            $denunciaDAO = new DenunciasDAO();
            $id = $_GET['id'];
            
            $denunciaDAO->excluir($id);
            
            header('Location: /dashboard/listarDenuncias');
        }
        
        public function visualizarDenuncia(){
            $this->validaAutenticacao();
            $title = "Minhas Denúncias";
            $texto = "Saneamento";
            
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;

            $denuncia = new DenunciaModel();
            $denunciaDAO = new DenunciasDAO();
            $comentarioDAO = new ComentarioDAO();

            
            if(isset($_GET['id'])){
                $comentarios = $comentarioDAO->listarPorIdDenuncia($_GET['id']);
                $denuncia = $denunciaDAO->buscarPorId($_GET['id']);
                $this->getView()->denuncia = $denuncia;
                $this->getView()->comentarios = $comentarios;
            }else{
                $this->getView()->denuncia = '';
            }

            $this->render('visualizarDenuncia','dashboard');
        
            
        }
        
        public function feedDenuncia(){
            $this->validaAutenticacao();
            $title = "Feed de Denúncias";
            $texto = "Saneamento";
            
            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;

            $denunciaDAO = new DenunciasDAO();
            $denunciasCurtidasDAO = new DenunciasCurtidasDAO();
            $comentarioDAO = new ComentarioDAO();

            $denunciasCurtidasUSU = $denunciasCurtidasDAO->listarPorId($_SESSION['id']);
            $denuncias = $denunciaDAO->listar();
            $comentarios = $comentarioDAO->listar();

            //para passar valores para a VIEW
            $this->getView()->comentarios = $comentarios;
            $this->getView()->denuncias = $denuncias;
            $this->getView()->denunciasCurtidas = $denunciasCurtidasUSU;
            $this->render('feedDenuncia', 'dashboard'); //Carrega o arquivo listarDenuncia que esta na pasta dashboard
        }
        
        public function gestaoDenuncia(){
            $title = "Gestão de Denúncias";
            $texto = "Saneamento";

            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
            $denunciaDAO = new DenunciasDAO();
            
        

            $denuncias = $denunciaDAO->listar();
            
            $this->getView()->denuncias = $denuncias;

            $this->render('gestaoDenuncia', 'dashboard'); //Carrega o arquivo gestaoDenuncia que esta na pasta dashboard
        }
        
        public function alterarStatusDenuncia(){
            $this->validaAutenticacao();
            $denuncia = new DenunciaModel();
            $denunciaDAO = new DenunciasDAO();
            
     
            
            $denuncia->__set("DEN_ID",$_GET['DEN_ID']);
            $denuncia->__set("DEN_STATUS_DENUNCIA",$_GET['DEN_STATUS_DENUNCIA']);
           
            
            $denunciaDAO->alterarStatus($denuncia);
            
            header('Location: /dashboard/listarDenuncias');
        }
        
        //Acessa a tela de reportar violacao
        public function reportarDenuncia(){
            $this->validaAutenticacao();
            $title = "Reportar Violação";
            $texto = "Saneamento";

            //para passar valores para a VIEW
            $this->getView()->texto = $texto;
            $this->getView()->title = $title;
            $denunciaDAO = new DenunciasDAO();
            
            $denuncia = $denunciaDAO->buscarPorId($_GET['id']);
            
            $this->getView()->denuncia = $denuncia;

            $this->render('reportarDenuncia', 'dashboard'); //Carrega o arquivo gestaoDenuncia que esta na pasta dashboard
        }

        //Realizar o report da violacao na denuncia
        public function reportarViolacao(){
            $this->validaAutenticacao();
            $denuncia = new DenunciaModel();
            $denunciaDAO = new DenunciasDAO();
            $denuncia = $denunciaDAO->buscarPorID($_POST['DEN_ID']);

            if($_POST['VIO_DESCRICAO'] == 'outros'){
                $descricao = $_POST['outrosInput'];
            }else{
                $descricao = $_POST['VIO_DESCRICAO'];
            }
            
            $denunciaDAO->reportar($denuncia, $descricao);
            
            header('Location: /dashboard/feedDenuncia');
        }
        

        public function validaAutenticacao() {
            if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
                header('Location: /login');
                die();
            }
        }

    }

?>