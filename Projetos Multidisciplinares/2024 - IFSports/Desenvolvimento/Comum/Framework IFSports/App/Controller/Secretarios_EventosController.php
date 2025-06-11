<?php

    namespace App\Controller;

    use FW\Controller\Action;
    use App\Model\Secretarios_EventosModel;
    use App\DAO\Secretarios_EventosDAO;
    use App\Model\LoginModel;
    use App\DAO\LoginDAO;
    use App\Model\CampusModel;
    use App\DAO\CampusDAO;
    use App\Model\CidadesModel;
    use App\DAO\CidadesDAO;

    class Secretarios_EventosController extends Action{


        public function listarsec(){             
            $title = "Listagem dos Secretarios de Eventos - Dashboard";
            $texto = "Listagem dos Secretarios de Eventos";
            $icone_editar = '<i class="mdi mdi-pencil"></i>';
            $icone_restringir='<i class="mdi mdi-lock-outline"></i>';
            $icone_mudar='<i class="mdi mdi-history"></i>';
        
            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar;
            $this->getView()->icone_restringir = $icone_restringir;
            $this->getView()->icone_mudar = $icone_mudar;
        
            $secretario_eventoDAO = new Secretarios_EventosDAO();
            $secretarios_eventos = $secretario_eventoDAO->listar();
        
            $this->getView()->secretarios_eventos = $secretarios_eventos;
            $this->render('listarsec', 'dashboard');
        }

        public function cadastrarsec() {
            $title = "Cadastrar Novo Secretario";
            $texto = "Formulario de Cadastramento de Novo Secretario";
    
            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
    
            /* $secretarioDAO = new Secretarios_EventosDAO();
            $campus = $secretarioDAO->listarCampus();
    
            $this->getView()->campus = $campus; */

            $campusDAO = new CampusDAO();
            $campus = $campusDAO->listar();
            $this->getView()->campus = $campus;

            $cidadeDAO = new CidadesDAO();
            $cidades = $cidadeDAO->listar();
            $this->getView()->cidades = $cidades;

            $loginDAO = new LoginDAO();
            $log = $loginDAO->listar();
            $this->getView()->log = $log;
    
            $this->render('cadastrarsec', 'dashboard');
        }

        public function inserir() {

            $loginModel = new LoginModel();

            $loginModel->__set("LGN_EMAIL",$_POST['SCE_EMAIL']);
            $loginModel->__set("LGN_SENHA",$_POST['SCE_SENHA']);
            $loginModel->__set("LGN_TIPO","SE");

            $loginDAO = new LoginDAO();
            $loginDAO->inserir($loginModel);

            $LGN_ID = $loginDAO->BuscarPorEmail($_POST['SCE_EMAIL']);

            $secretario = new Secretarios_EventosModel();
            $secretario->__set('SCE_NOME', $_POST['SCE_NOME']);
            $secretario->__set('SCE_NOME_SOCIAL', $_POST['SCE_NOME_SOCIAL']);
            $secretario->__set('SCE_CPF', $_POST['SCE_CPF']);
            $secretario->__set('SCE_RG', $_POST['SCE_RG']);
            $secretario->__set('SCE_TELEFONE', $_POST['SCE_TELEFONE']);
            $secretario->__set('SCE_ETNIA', $_POST['SCE_ETNIA']);
            $secretario->__set('SCE_PRONTUARIO', $_POST['SCE_PRONTUARIO']);
            $secretario->__set('SCE_SEXO', $_POST['SCE_SEXO']);
            $secretario->__set('SCE_FOTO', $_POST['SCE_FOTO']);
            $secretario->__set('SCE_DATA_NASCIMENTO', $_POST['SCE_DATA_NASCIMENTO']);
            $secretario->__set('SCE_RUA', $_POST['SCE_RUA']);
            $secretario->__set('SCE_BAIRRO', $_POST['SCE_BAIRRO']);
            $secretario->__set('SCE_CEP', $_POST['SCE_CEP']);
            $secretario->__set('SCE_COMPLEMENTO', $_POST['SCE_COMPLEMENTO']);
            $secretario->__set('SCE_EMAIL', $_POST['SCE_EMAIL']);
            $secretario->__set('FK_CAMPUS_CAM_ID', $_POST['FK_CAMPUS_CAM_ID']);
            $secretario->__set("FK_CIDADES_CID_ID", $_POST['FK_CIDADES_CID_ID']);
            $secretario->__set("FK_LOGIN_LGN_ID", $LGN_ID);

            
        
            $secretario_eventoDAO = new Secretarios_EventosDAO();
            $secretario_eventoDAO->inserir($secretario);
        
            header('Location: /dashboard/secretarios_eventos/listar');
        }




        public function statussec(){  

            $title = "Restringir Secretario - Dashboard";
            $texto = "Formulario de Restrição de Secretario do Eventos";

            $this->getView()->title = $title;
            $this->getView()->texto = $texto; 
            
            $secretarios_eventosModel = new Secretarios_EventosModel();
            $secretarios_eventosDAO = new Secretarios_EventosDAO();
 
            $secretarios_eventosModel = $secretarios_eventosDAO->buscarPorId($_GET['LGN_ID']);                  

            $this->getView()->secretarios_eventosModel = $secretarios_eventosModel;

            $secretarios_eventosDAO = new Secretarios_EventosDAO();
            $secretarios_eventos = $secretarios_eventosDAO->listar();

            $this->getView()->secretarios_eventosDAO = $secretarios_eventosDAO;


            $this->render('restringirsec','dashboard');
        }

        public function restringir() {

            $secretarios_eventosModel = new Secretarios_EventosModel();
            $secretarios_eventosDAO = new Secretarios_EventosDAO();             

                $secretarios_eventosModel->__set('LGN_ID', $_POST['LGN_ID']);
                $secretarios_eventosModel->__set('LGN_JUSTIFICATIVA_RESTRICAO', $_POST['LGN_JUSTIFICATIVA_RESTRICAO']);
                $secretarios_eventosModel->__set('LGN_ATIVO', $_POST['LGN_ATIVO']); 
        
                $secretarios_eventosDAO = new Secretarios_EventosDAO();
                $secretarios_eventosDAO->restringir($secretarios_eventosModel);

                header('Location: /dashboard/secretarios_eventos/listar');
        }





        public function mudarsenhasec() {
            $title = "Alterar Senha do Secretario - Dashboard";
            $texto = "Formulario de Alteração de Senha do Secretario de Eventos";
        
            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
        
            $secretarios_eventosDAO = new Secretarios_EventosDAO();
            $secretarios_eventosModel = $secretarios_eventosDAO->buscarPorId($_GET['LGN_ID']);
        
            $this->getView()->secretarios_eventosModel = $secretarios_eventosModel;
        
            $secretarios_eventos = $secretarios_eventosDAO->listar();
            $this->getView()->secretarios_eventosDAO = $secretarios_eventosDAO;
        
            $this->render('mudarsenhasec','dashboard');
        }
        
        public function atualizarsenhasec() {
            $secretarios_eventosModel = new Secretarios_EventosModel();
            $secretarios_eventosDAO = new Secretarios_EventosDAO();
        
            $secretarios_eventosModel->__set('LGN_SENHA', password_hash($_POST['LGN_SENHA'], PASSWORD_DEFAULT));
            $secretarios_eventosModel->__set('LGN_ID', $_POST['LGN_ID']);
            
            $secretarios_eventosDAO->mudarsenhasec($secretarios_eventosModel);
        
            header('Location: /dashboard/secretarios_eventos/listar');
            exit;
        }
        



        public function editarsec(){  

            $title = "Editar Secretario - Dashboard";
            $texto = "Formulario de Edição do Secretario de Eventos";

            $this->getView()->title = $title;
            $this->getView()->texto = $texto; 
            
            $secretarios_eventosModel = new Secretarios_EventosModel();
            $secretarios_eventosDAO = new Secretarios_EventosDAO();
 
            $secretarios_eventosModel = $secretarios_eventosDAO->buscarPorId($_GET['SCE_ID']);                  

            $this->getView()->secretarios_eventosModel = $secretarios_eventosModel;

            $secretarioDAO = new Secretarios_EventosDAO();
            $campus = $secretarioDAO->listarCampus();

            $cidadeDAO = new CidadesDAO();
            $cidades = $cidadeDAO->listar();

            $this->getView()->campus = $campus;
            $this->getView()->secretarios_eventosDAO = $secretarios_eventosDAO;
            $this->getView()->cidades = $cidades;


            $this->render('editarsec','dashboard');
        }
        
    
        public function editar() {

            $secretarios_eventosModel = new Secretarios_EventosModel();
            $secretarios_eventosDAO = new Secretarios_EventosDAO();
    
                $secretarios_eventosModel->__set('SCE_ID', $_POST['SCE_ID']);
                $secretarios_eventosModel->__set('SCE_NOME', $_POST['SCE_NOME']);
                $secretarios_eventosModel->__set('SCE_NOME_SOCIAL', $_POST['SCE_NOME_SOCIAL']);
                $secretarios_eventosModel->__set('SCE_CPF', $_POST['SCE_CPF']);
                $secretarios_eventosModel->__set('SCE_RG', $_POST['SCE_RG']);
                $secretarios_eventosModel->__set('SCE_TELEFONE', $_POST['SCE_TELEFONE']);
                $secretarios_eventosModel->__set('SCE_ETNIA', $_POST['SCE_ETNIA']);
                $secretarios_eventosModel->__set('SCE_PRONTUARIO', $_POST['SCE_PRONTUARIO']);
                $secretarios_eventosModel->__set('SCE_SEXO', $_POST['SCE_SEXO']);
                $secretarios_eventosModel->__set('SCE_FOTO', $_POST['SCE_FOTO']);
                $secretarios_eventosModel->__set('SCE_DATA_NASCIMENTO', $_POST['SCE_DATA_NASCIMENTO']);
                $secretarios_eventosModel->__set('FK_CAMPUS_CAM_ID', $_POST['FK_CAMPUS_CAM_ID']);
                $secretarios_eventosModel->__set('SCE_RUA', $_POST['SCE_RUA']);
                $secretarios_eventosModel->__set('SCE_BAIRRO', $_POST['SCE_BAIRRO']);
                $secretarios_eventosModel->__set('SCE_CEP', $_POST['SCE_CEP']);
                $secretarios_eventosModel->__set('SCE_COMPLEMENTO', $_POST['SCE_COMPLEMENTO']);
                $secretarios_eventosModel->__set('FK_LOGIN_LGN_ID', $_POST['FK_LOGIN_LGN_ID']);
               

                $secretarios_eventosModel->__set('LGN_ID', $_POST['LGN_ID']);
                $secretarios_eventosModel->__set('LGN_EMAIL', $_POST['LGN_EMAIL']);
                $secretarios_eventosModel->__set('LGN_TIPO', $_POST['LGN_TIPO']); 
        
                $secretarios_eventosDAO = new Secretarios_EventosDAO();
                $secretarios_eventosDAO->alterar($secretarios_eventosModel);

                header('Location: /dashboard/secretarios_eventos/listar');
        }

        public function excluir(){

        }

        public function atribuirSec(){

            $title = "Listagem dos Secretarios de Eventos - Dashboard";
            $texto = "Listagem dos Secretarios de Eventos";
            $icone_editar = '<i class="mdi mdi-pencil"></i>';
            $icone_restringir='<i class="mdi mdi-lock-outline"></i>';
        
            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar;
            $this->getView()->icone_restringir = $icone_restringir;
        
            $secretario_eventoDAO = new Secretarios_EventosDAO();
            $secretarios_eventos = $secretario_eventoDAO->listar();
        
            $this->getView()->secretarios_eventos = $secretarios_eventos;
            $this->render('listarsec', 'dashboard');

        }
        
        /* RATIO + L
        public function excluir() {
            if (isset($_GET['SCE_ID']) && is_numeric($_GET['SCE_ID'])) {
                $SCE_ID = $_GET['SCE_ID'];
                $secretario_eventoDAO = new Secretarios_EventosDAO();
                $secretario_eventoDAO->excluir($SCE_ID);
        
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'ID inválido']);
            }
        }

    */

    public function cracha(){            
        $title = "Gerar Crachá de Secretários de Eventos - Dashboard";
        $texto = "";
        $icone_editar='<i class="ti-file btn-icon-append"></i>';

        $this->getView()->title = $title;
        $this->getView()->texto = $texto;
        $this->getView()->icone_editar = $icone_editar;

        if(isset($_SESSION['ID'])){
            $loginModel = new LoginModel();
            $loginDAO = new LoginDAO();
            
            $loginModel = $loginDAO->BuscarUsuarioLogado($_SESSION['ID']);
        

            if($loginModel->__get('LGN_TIPO') == 'SE') {

                $secretarios_eventosModel = new Secretarios_EventosModel();
                $secretario_eventoDAO = new Secretarios_EventosDAO();
                    
                $secretarios_eventoModel = $secretario_eventoDAO->BuscarSecretariosEventos($loginModel->__get('LGN_ID'));
                    
                $this->getView()->secretario = $secretarios_eventosModel;
                $this->render('crachasec', 'dashboard');
            }

            else{
                //$this->getView()->  = '';
            }

            $this->render('crachasec','dashboard');
        }
    }

        public function validaAutenticacao() {}
    }
    

?>
