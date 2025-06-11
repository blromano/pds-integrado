<?php

    namespace App\Controller;

    use FW\Controller\Action;
    use App\Model\Organizadores_EventosModel;
    use App\DAO\Organizadores_EventosDAO;
    use App\Model\LoginModel;
    use App\DAO\LoginDAO;
    use App\Model\CampusModel;
    use App\DAO\CampusDAO;
    use App\Model\CidadesModel;
    use App\DAO\CidadesDAO;

    class Organizadores_EventosController extends Action{

        //o método index vai renderizar o conteúdo de view/index.php e colocar dentro da dashboard na área especificada
        
        public function cadastrarorg(){   
            
            $title = "Cadastro de um Novo Organizador";
            $texto = "";

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;

            $campusDAO = new CampusDAO();
            $campus = $campusDAO->listar();
            $this->getView()->campus = $campus;

            $cidadeDAO = new CidadesDAO();
            $cidades = $cidadeDAO->listar();
            $this->getView()->cidades = $cidades;

            $loginDAO = new LoginDAO();
            $log = $loginDAO->listar();
            $this->getView()->log = $log;

            $this->render('cadastrarorg','dashboard');
        }

        public function inserirOrganizadorEvento(){          
            
            $loginModel = new LoginModel();

            $loginModel->__set("LGN_EMAIL",$_POST['ORE_EMAIL']);
            $loginModel->__set("LGN_SENHA",$_POST['ORE_SENHA']);
            $loginModel->__set("LGN_TIPO","OE");

            $loginDAO = new LoginDAO();
            $loginDAO->inserir($loginModel);

            $LGN_ID = $loginDAO->BuscarPorEmail($_POST['ORE_EMAIL']);


            $organizador_eventoModel = new Organizadores_EventosModel();

            $organizador_eventoModel->__set("ORE_NOME", $_POST['ORE_NOME']);
            $organizador_eventoModel->__set("ORE_NOME_SOCIAL", $_POST['ORE_NOME_SOCIAL']);
            $organizador_eventoModel->__set("ORE_PRONTUARIO", $_POST['ORE_PRONTUARIO']);
            $organizador_eventoModel->__set("ORE_CPF", $_POST['ORE_CPF']);
            $organizador_eventoModel->__set("ORE_RG", $_POST['ORE_RG']);
            $organizador_eventoModel->__set("ORE_DATA_NASCIMENTO", $_POST['ORE_DATA_NASCIMENTO']);
            $organizador_eventoModel->__set("ORE_SEXO", $_POST['ORE_SEXO']);
            $organizador_eventoModel->__set("ORE_ETNIA", $_POST['ORE_ETNIA']);
            $organizador_eventoModel->__set("ORE_TELEFONE", $_POST['ORE_TELEFONE']);
            $organizador_eventoModel->__set("ORE_CEP", $_POST['ORE_CEP']);
            $organizador_eventoModel->__set("ORE_BAIRRO", $_POST['ORE_BAIRRO']);
            $organizador_eventoModel->__set("ORE_RUA", $_POST['ORE_RUA']);
            $organizador_eventoModel->__set("ORE_COMPLEMENTO", $_POST['ORE_COMPLEMENTO']);
            $organizador_eventoModel->__set("ORE_EMAIL", $_POST['ORE_EMAIL']);
            $organizador_eventoModel->__set("ORE_FOTO", $_POST['ORE_FOTO']);
            $organizador_eventoModel->__set("FK_CAMPUS_CAM_ID", $_POST['FK_CAMPUS_CAM_ID']);
            $organizador_eventoModel->__set("FK_CIDADES_CID_ID", $_POST['FK_CIDADES_CID_ID']);
            $organizador_eventoModel->__set("FK_LOGIN_LGN_ID", $LGN_ID);
            

            $orgDAO = new Organizadores_EventosDAO();
            $orgDAO->inserir($organizador_eventoModel);

            header('Location: /dashboard/organizadores_eventos/listar');

        }

        public function editarorg(){             

            $title = "Editar Organizador de Eventos - Dashboard";
            $texto = "form de edição do cadastro";
    
            $this->getView()->title = $title;
            $this->getView()->texto = $texto; 
                
            $organizador_eventoModel = new Organizadores_EventosModel();       
            $organizador_eventoDAO = new Organizadores_EventosDAO();
     
            $organizador_eventoModel = $organizador_eventoDAO->buscarPorId($_GET['ORE_ID']);                  

            $this->getView()->organizador_eventoModel = $organizador_eventoModel;

            $campusDAO = new CampusDAO();
            $campus = $campusDAO->listar();

            $this->getView()->campus = $campus;

            $cidadeDAO = new CidadesDAO();
            $cidades = $cidadeDAO->listar();

            $this->getView()->cidades = $cidades;

            $this->render('editarorg','dashboard');
        }

        public function alterar(){             
            $title = "Alterar - Dashboard";
            $texto = "form de edição do organizador";

            $this->getView()->title = $title;
            $this->getView()->texto = $texto; 

            $organizador_eventoModel = new Organizadores_EventosModel();
            $organizador_eventoDAO = new Organizadores_EventosDAO();
    
            $organizador_eventoModel->__set("ORE_ID", $_POST['ORE_ID']);
            $organizador_eventoModel->__set("ORE_NOME", $_POST['ORE_NOME']);
            $organizador_eventoModel->__set("ORE_NOME_SOCIAL", $_POST['ORE_NOME_SOCIAL']);
            $organizador_eventoModel->__set("ORE_PRONTUARIO", $_POST['ORE_PRONTUARIO']);
            $organizador_eventoModel->__set("ORE_CPF", $_POST['ORE_CPF']);
            $organizador_eventoModel->__set("ORE_RG", $_POST['ORE_RG']);
            $organizador_eventoModel->__set("ORE_DATA_NASCIMENTO", $_POST['ORE_DATA_NASCIMENTO']);
            $organizador_eventoModel->__set("ORE_SEXO", $_POST['ORE_SEXO']);
            $organizador_eventoModel->__set("ORE_ETNIA", $_POST['ORE_ETNIA']);
            $organizador_eventoModel->__set("ORE_TELEFONE", $_POST['ORE_TELEFONE']);
            $organizador_eventoModel->__set("ORE_CEP", $_POST['ORE_CEP']);
            $organizador_eventoModel->__set("ORE_BAIRRO", $_POST['ORE_BAIRRO']);
            $organizador_eventoModel->__set("ORE_RUA", $_POST['ORE_RUA']);
            $organizador_eventoModel->__set("ORE_COMPLEMENTO", $_POST['ORE_COMPLEMENTO']);
            $organizador_eventoModel->__set("LGN_EMAIL", $_POST['LGN_EMAIL']);
            $organizador_eventoModel->__set("ORE_FOTO", $_POST['ORE_FOTO']);
            $organizador_eventoModel->__set("FK_CAMPUS_CAM_ID", $_POST['FK_CAMPUS_CAM_ID']); 
            $organizador_eventoModel->__set("FK_CIDADES_CID_ID", $_POST['FK_CIDADES_CID_ID']);
            $organizador_eventoModel->__set("FK_LOGIN_LGN_ID",  $_POST['FK_LOGIN_LGN_ID']);
            
            $organizador_eventoDAO->alterar($organizador_eventoModel);
    
            header('Location: /dashboard/organizadores_eventos/listar');
        }

        public function listarorg(){     

            $title = "Listagem dos Eventos";
            $texto = "";
            $icone_editar='<i class="mdi mdi-pencil"></i>';
            $icone_restringir='<i class="mdi mdi-lock-outline"></i>';
            $icone_mudar='<i class="mdi mdi-history"></i>';

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar;
            $this->getView()->icone_restringir = $icone_restringir;
            $this->getView()->icone_mudar = $icone_mudar;
            
            $organizador_eventoDAO = new Organizadores_EventosDAO();
            $organizadores_eventos = $organizador_eventoDAO->listar();

            $this->getView()->organizadores_eventos = $organizadores_eventos;
            $this->render('listarorg','dashboard');
        }

        public function cracha(){            
            $title = "Gerar Crachá de Organizadores de Eventos - Dashboard";
            $texto = "";
            $icone_editar='<i class="ti-file btn-icon-append"></i>';

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar;

            if(isset($_SESSION['ID'])){
                $loginModel = new LoginModel();
                $loginDAO = new LoginDAO();
                
                $loginModel = $loginDAO->BuscarUsuarioLogado($_SESSION['ID']);
            

                if($loginModel->__get('LGN_TIPO') == 'OE') {

                    $organizador_EventoModel = new organizadores_EventosModel();
                    $organizador_EventoDAO = new organizadores_EventosDAO();
                        
                    $organizador_EventoModel = $organizador_EventoDAO->BuscarOrganizadorEventos($loginModel->__get('LGN_ID'));
                        
                    $this->getView()->organizador = $organizador_EventoModel;
                    $this->render('crachaorg', 'dashboard');
                }

                else{
                    //$this->getView()->  = '';
                }

                $this->render('crachaorg','dashboard');
            }
        }


        public function mudarsenhaore() {
            $title = "Alterar Senha do Organizador - Dashboard";
            $texto = "Formulario de Alteração de Senha do Organizador de Eventos";
        
            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
        
            $organizadores_eventosDAO = new Organizador_EventosDAO();
            $organizadores_eventosModel = $organizadores_eventosDAO->buscarPorId($_GET['LGN_ID']);
        
            $this->getView()->organizadores_eventosModel = $organizadores_eventosModel;
        
            $organizadores_eventos = $organizadores_eventosDAO->listar();
            $this->getView()->organizadores_eventosDAO = $organizadores_eventosDAO;
        
            $this->render('mudarsenhasec','dashboard');
        }
        
        public function atualizarsenhaore() {
            $organizadores_eventosModel = new Organizador_EventosModel();
            $organizadores_eventosDAO = new Organizador_EventosDAO();
        
            $organizadores_eventosModel->__set('LGN_SENHA', password_hash($_POST['LGN_SENHA'], PASSWORD_DEFAULT));
            $organizadores_eventosModel->__set('LGN_ID', $_POST['LGN_ID']);
            
            $organizadores_eventosDAO->mudarsenhasec($organizadores_eventosModel);
        
            header('Location: /dashboard/organizadores_eventos/listar');
            exit;
        }


        public function statusore(){  

            $title = "Restringir Organizador - Dashboard";
            $texto = "Formulario de Restrição de Organizador do Eventos";

            $this->getView()->title = $title;
            $this->getView()->texto = $texto; 
            
            $organizadores_eventosModel = new Organizadores_EventosModel();
            $organizadores_eventosDAO = new Organizadores_EventosDAO();
 
            $organizadores_eventosModel = $organizadores_eventosDAO->buscarPorId($_GET['LGN_ID']);                  

            $this->getView()->organizadores_eventosModel = $organizadores_eventosModel;

            $organizadores_eventosDAO = new Organizadores_EventosDAO();
            $organizadores_eventos = $organizadores_eventosDAO->listar();

            $this->getView()->organizadores_eventosDAO = $organizadores_eventosDAO;


            $this->render('restringirore','dashboard');
        }

        public function restringir() {

            $organizadores_eventosModel = new Organizadores_EventosModel();
            $organizadores_eventosDAO = new Organizadores_EventosDAO();             

                $organizadores_eventosModel->__set('LGN_ID', $_POST['LGN_ID']);
                $organizadores_eventosModel->__set('LGN_JUSTIFICATIVA_RESTRICAO', $_POST['LGN_JUSTIFICATIVA_RESTRICAO']);
                $organizadores_eventosModel->__set('LGN_ATIVO', $_POST['LGN_ATIVO']); 
        
                $organizadores_eventosDAO = new Organizadores_EventosDAO();
                $organizadores_eventosDAO->restringir($organizadores_eventosModel);

                header('Location: /dashboard/organizadores_eventos/listar');
        }


        public function validaAutenticacao() {}

    }
?>
