<?php

    namespace App\Controller;
    
    use FW\Controller\Action;

    use App\Model\EventosModel;
    use App\DAO\EventosDAO;
    use App\Model\Organizadores_EventosModel;
    use App\DAO\Organizadores_EventosDAO;
    use App\Model\CampusModel;
    use App\DAO\CampusDAO;
    
    class EventosController extends Action{

        //o método index vai renderizar o conteúdo de view/index.php e colocar dentro da dashboard na área especificada
        public function listarEventos(){      

            $title = "Listagem dos Eventos";
            $texto = "";
            $icone_editar='<i class="mdi mdi-pencil"></i>';

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar;

            $eventoDAO = new EventosDAO();
            $eventos = $eventoDAO->listar();

            $this->getView()->eventos = $eventos;
            $this->render('listarEventos','dashboard');                  
        }

        public function listarEventosAluno(){      

            $title = "Listagem dos Eventos";
            $texto = "";
            $icone_editar='<i class="mdi mdi-pencil"></i>';

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar;

            $eventoDAO = new EventosDAO();
            $eventos = $eventoDAO->listar();

            $this->getView()->eventos = $eventos;
            $this->render('listarEventosAluno','dashboard');                  
        }


        public function editar(){  

                $title = "Editar - Dashboard";
                $texto = "form de edição do cadastro";
    
                $this->getView()->title = $title;
                $this->getView()->texto = $texto; 
                
                $eventoModel = new EventosModel();
                $eventoDAO = new EventosDAO();
     
                    $eventoModel = $eventoDAO->buscarPorId($_GET['EVO_ID']);                  

                    $this->getView()->eventoModel = $eventoModel;

                $campusDAO = new CampusDAO();
                $campus = $campusDAO->listar();

                $organizadores_eventosDAO = new Organizadores_EventosDAO();
                $organizadores_eventos = $organizadores_eventosDAO->listar();

                $this->getView()->campus = $campus;
                $this->getView()->organizadores_eventos = $organizadores_eventos;
    
    
                $this->render('editar','dashboard');
            }

            public function alterar(){             
                $title = "Alterar - Dashboard";
                $texto = "form de edição do cadastro";
    
                $this->getView()->title = $title;
                $this->getView()->texto = $texto; 

                $eventoModel = new EventosModel();
                $eventoDAO = new EventosDAO();
        
                $eventoModel->__set("EVO_ID", $_POST['EVO_ID']);
                $eventoModel->__set("EVO_NOME", $_POST['EVO_NOME']);
                $eventoModel->__set("FK_ORGANIZADORES_EVENTOS_ORE_ID", $_POST['FK_ORGANIZADORES_EVENTOS_ORE_ID']);
                $eventoModel->__set("FK_CAMPUS_CAM_ID", $_POST['FK_CAMPUS_CAM_ID']);
                $eventoModel->__set("EVO_DATA_INICIO", $_POST['EVO_DATA_INICIO']);
                $eventoModel->__set("EVO_DATA_FIM", $_POST['EVO_DATA_FIM']);
                $eventoModel->__set("EVO_STATUS", $_POST['EVO_STATUS']);
                $eventoModel->__set("EVO_RESTRICAO_IDADE_MIN", $_POST['EVO_RESTRICAO_IDADE_MIN']);
                $eventoModel->__set("EVO_RESTRICAO_IDADE_MAX", $_POST['EVO_RESTRICAO_IDADE_MAX']);
                $eventoModel->__set("EVO_RESTRICAO_GENERO", $_POST['EVO_RESTRICAO_GENERO']);
                $eventoModel->__set("EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN", $_POST['EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN']);
                $eventoModel->__set("EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX", $_POST['EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX']);
                $eventoModel->__set("EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN", $_POST['EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN']);
                $eventoModel->__set("EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX", $_POST['EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX']);
                $eventoModel->__set("EVO_RESTRICAO_OUTRAS", $_POST['EVO_RESTRICAO_OUTRAS']);
                
            
                $eventoDAO->alterar($eventoModel);
        
                header('Location: /dashboard/eventos/listar');
            }
        

        public function cadastrarEventos(){    
            $title = "Cadastro de um Novo Evento";
            $texto = "";

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;         
            
            $campusDAO = new CampusDAO();
            $campus = $campusDAO->listar();

            $organizadores_eventosDAO = new Organizadores_EventosDAO();
            $organizadores_eventos = $organizadores_eventosDAO->listar();

            $this->getView()->campus = $campus;
            $this->getView()->organizadores_eventos = $organizadores_eventos;

            $this->render('cadastrarEventos','dashboard');         
        }

        public function inserirEventos(){             
            
            $eventoModel = new EventosModel();

            $eventoModel->__set("EVO_NOME", $_POST['EVO_NOME']);
            $eventoModel->__set("FK_ORGANIZADORES_EVENTOS_ORE_ID", $_POST['FK_ORGANIZADORES_EVENTOS_ORE_ID']);
            $eventoModel->__set("FK_CAMPUS_CAM_ID", $_POST['FK_CAMPUS_CAM_ID']);
            $eventoModel->__set("EVO_DATA_INICIO", $_POST['EVO_DATA_INICIO']);
            $eventoModel->__set("EVO_DATA_FIM", $_POST['EVO_DATA_FIM']);
            $eventoModel->__set("EVO_STATUS", $_POST['EVO_STATUS']);
            $eventoModel->__set("EVO_RESTRICAO_IDADE_MIN", $_POST['EVO_RESTRICAO_IDADE_MIN']);
            $eventoModel->__set("EVO_RESTRICAO_IDADE_MAX", $_POST['EVO_RESTRICAO_IDADE_MAX']);
            $eventoModel->__set("EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN", $_POST['EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN']);
            $eventoModel->__set("EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX", $_POST['EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX']);
            $eventoModel->__set("EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN", $_POST['EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN']);
            $eventoModel->__set("EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX", $_POST['EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX']);
            $eventoModel->__set("EVO_RESTRICAO_OUTRAS", $_POST['EVO_RESTRICAO_OUTRAS']);
            $eventoModel->__set("EVO_RESTRICAO_GENERO", $_POST['EVO_RESTRICAO_GENERO']);

            $eventoDAO = new EventosDAO();
            $eventoDAO->inserir($eventoModel);

            header('Location: /dashboard/eventos/listar');

        }

        public function index(){             
            $this->render('index','dashboard');
        }


        public function restricoes(){       

            $title = "Restriçoes do Evento";
            $texto = "";

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;

            $eventoDAO = new EventosDAO();
            $eventos = $eventoDAO->restricoes($_GET['EVO_ID']);

            $this->getView()->eventos = $eventos;
            $this->render('restricoes','dashboard');                  

        }

        //o método index vai renderizar o conteúdo de view/index.php e colocar dentro da dashboard na área especificada
        public function secretarios(){             
            $this->render('secretarios','dashboard');
        }


        public function visualizarevento(){             
            $this->render('visualizarevento','dashboard');
        }

        //mod02 --- Só  pra testes
        public function listarEventos_mod02(){             
            $title = "Listagem dos Eventos";
            $texto = "";
            $icone_editar='<i class="ti-file btn-icon-append"></i>';

            $eventoModel = new EventosModel();
            $this->getView()->title = $title;
            $this->getView()->texto = $texto;

            $eventoDAO = new EventosDAO();
            $eventos = $eventoDAO->listarEventos_mod02();

            $this->getView()->eventos = $eventos;  
            $this->render('listarEventos_mod02','dashboard');
        }

        public function excluir(){             
            $eventoDAO = new EventosDAO();
        
            if(isset($_GET['EVO_ID'])){
                $eventoDAO->excluir($_GET['EVO_ID']);
                header('Location: /dashboard/eventos/listar');       
            }  
        }
          
	public function validaAutenticacao() {}
    }
    
?>
