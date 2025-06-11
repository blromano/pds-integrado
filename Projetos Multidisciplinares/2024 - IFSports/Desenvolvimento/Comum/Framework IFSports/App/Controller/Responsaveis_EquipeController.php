<?php

    namespace App\Controller;
    use FW\Controller\Action;
    use App\Model\Responsaveis_EquipeModel;
    use App\DAO\Responsaveis_EquipeDAO;
    use App\Model\LoginModel;
    use App\DAO\LoginDAO;
    use App\Model\CampusModel;
    use App\DAO\CampusDAO;
    use App\Model\EventosModel;
    use App\DAO\EventosDAO;
    use App\Model\Eventos_ModalidadesModel;
    use App\DAO\Eventos_ModalidadesDAO;
    use App\Model\CidadesModel;
    use App\DAO\CidadesDAO;

    class Responsaveis_EquipeController extends Action{

        //o método index vai renderizar o conteúdo de view/index.php e colocar dentro da dashboard na área especificada
        public function listar(){
            
            $title = "Listagem de Responsáveis - Dashboard";
            $texto = "";
            $icone_editar='<i class="mdi mdi-border-color"></i>';

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar;

            $responsavelDAO = new Responsaveis_EquipeDAO();
            $responsaveis = $responsavelDAO->listar();

            $this->getView()->responsaveis = $responsaveis;
            $this->render('listar','dashboard');
        }

        public function visualizar(){
            
            $title = "Listagem de Responsáveis - Dashboard";
            $texto = "";
            $icone_editar='<i class="mdi mdi-border-color"></i>';

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar;

            $responsavelDAO = new Responsaveis_EquipeDAO();
            $responsaveis = $responsavelDAO->listar();

            $this->getView()->responsaveis = $responsaveis;
            $this->render('visualizar','dashboard');
        }
        
        public function cracha(){            
            $title = "Gerar Crachá de Responsável de Equipe - Dashboard";
            $texto = "";
            $icone_editar='<i class="ti-file btn-icon-append"></i>';

            $this->getView()->title = $title;
            $this->getView()->texto = $texto;
            $this->getView()->icone_editar = $icone_editar; 

            if(isset($_GET['id'])){
                $loginModel = new LoginModel();
                $loginDAO = new LoginDAO();
                
                $loginModel = $loginDAO->BuscarUsuarioLogado($_GET['id']);
            

                if($loginModel->__get('LGN_TIPO') == 'RE') {
    
                    $responsavel_EquipeModel = new Responsaveis_EquipeModel();
                    $Responsavel_EquipeDAO = new Responsaveis_EquipeDAO();
                    
                    $responsavel_EquipeModel = $Responsavel_EquipeDAO->buscarResponsavelEquipe($loginModel->__get('LGN_ID'));
                    
                    $this->getView()->responsavel = $responsavel_EquipeModel;
    
                    $this->render('cracha', 'dashboard');
    
                }
    
                }else{
                    $this->getView()->alunoLogado = '';
                }

            $this->render('cracha','dashboard');
        }
        
        public function excluir(){             
            $responsavelDAO = new Responsaveis_EquipeDAO();
        
            if(isset($_GET['RES_ID'])){
                $responsavelDAO->excluir($_GET['RES_ID']);
                header('Location: /dashboard/responsaveis_equipe/listar');       
            } 
        }

        public function adicionar(){  
            $campusDAO = new CampusDAO();
            $campus = $campusDAO->listar();
            $this->getView()->campus = $campus;

            $cidadesDAO = new CidadesDAO();
            $cidades = $cidadesDAO->listar();
            $this->getView()->cidades = $cidades;

            $eventosModalidadesDAO = new Eventos_ModalidadesDAO();
            $eventosModalidades = $eventosModalidadesDAO->listarEventosModalidades();
            $this->getView()->eventosModalidades = $eventosModalidades;
            
            $this->render('adicionar','');
        }

        public function NovaSenha(){

            $responsavelModel = new Responsaveis_EquipeModel();
            $responsavelDAO = new Responsaveis_EquipeDAO();

            $responsavelModel = $responsavelDAO->buscarPorIdAlterar($_GET['RES_ID']);                 
            $this->getView()->responsavelModel = $responsavelModel;

            //$this->getView()->responsavelModel = $responsaveis;
            
            
            $this->render('editar','');

            
        }

        public function editar(){   
            $campusDAO = new CampusDAO();
            $campus = $campusDAO->listar();
            $this->getView()->campus = $campus;

            $cidadesDAO = new CidadesDAO();
            $cidades = $cidadesDAO->listar();
            $this->getView()->cidades = $cidades;

            $eventosDAO = new EventosDAO();
            $eventos = $eventosDAO->listar();
            $this->getView()->eventos = $eventos;


            $responsavelModel = new Responsaveis_EquipeModel();
            $responsavelDAO = new Responsaveis_EquipeDAO();

            $responsavelModel = $responsavelDAO->buscarPorIdAlterar($_GET['RES_ID']);                 
            $this->getView()->responsavelModel = $responsavelModel;

            //$this->getView()->responsavelModel = $responsaveis;
            
            
            $this->render('editar','');
        }

        public function alterar(){  
            $responsavelDAO = new Responsaveis_EquipeDAO();      
            $responsavelModel = new Responsaveis_EquipeModel();

            $responsavelModel->__set("RES_ID", $_POST['RES_ID']);
            $responsavelModel->__set("RES_NOME", $_POST['RES_NOME']);
            $responsavelModel->__set("RES_NOME_SOCIAL", $_POST['RES_NOME_SOCIAL']);
            $responsavelModel->__set("RES_DATA_NASCIMENTO", $_POST['RES_DATA_NASCIMENTO']);
            $responsavelModel->__set("RES_SEXO", $_POST['RES_SEXO']);
            $responsavelModel->__set("RES_ETNIA", $_POST['RES_ETNIA']);
            $responsavelModel->__set("RES_CPF", $_POST['RES_CPF']);
            $responsavelModel->__set("RES_RG", $_POST['RES_RG']);
            $responsavelModel->__set("RES_FOTO", $_POST['RES_FOTO']);
            $responsavelModel->__set("RES_TELEFONE", $_POST['RES_TELEFONE']);
            $responsavelModel->__set("RES_RUA", $_POST['RES_RUA']);
            $responsavelModel->__set("RES_BAIRRO", $_POST['RES_BAIRRO']);
            $responsavelModel->__set("RES_CEP", $_POST['RES_CEP']);
            $responsavelModel->__set("RES_COMPLEMENTO", $_POST['RES_COMPLEMENTO']);
            $responsavelModel->__set("RES_PRONTUARIO", $_POST['RES_PRONTUARIO']);
            $responsavelModel->__set("FK_LOGIN_LGN_ID", $_POST['FK_LOGIN_LGN_ID']);
            $responsavelModel->__set("FK_CAMPUS_CAM_ID", $_POST['FK_CAMPUS_CAM_ID']);   
            $responsavelModel->__set("FK_CIDADES_CID_ID", $_POST['FK_CIDADES_CID_ID']); 
        
            $responsavelDAO->alterar($responsavelModel);
    
            header('Location: /dashboard/responsaveis_equipe/listar');
        }

        public function inserir(){             
            $loginModel = new LoginModel();

            $loginModel->__set("LGN_EMAIL",$_POST['RES_EMAIL']);
            $loginModel->__set("LGN_SENHA",$_POST['RES_SENHA']);
            $loginModel->__set("LGN_TIPO","RE");

            $loginDAO = new LoginDAO();
            $loginDAO->inserir($loginModel);

            $LGN_ID = $loginDAO->buscarPorEmail($_POST['RES_EMAIL']);
            //print_r($LGN_ID);
            //exit();
            
            $responsaveisModel = new Responsaveis_EquipeModel();

            $responsaveisModel->__set("RES_NOME", $_POST['RES_NOME']);
            $responsaveisModel->__set("RES_NOME_SOCIAL", $_POST['RES_NOME_SOCIAL']);
            $responsaveisModel->__set("RES_DATA_NASCIMENTO", $_POST['RES_DATA_NASCIMENTO']);
            $responsaveisModel->__set("RES_SEXO", $_POST['RES_SEXO']);
            $responsaveisModel->__set("RES_ETNIA", $_POST['RES_ETNIA']);
            $responsaveisModel->__set("RES_CPF", $_POST['RES_CPF']);
            $responsaveisModel->__set("RES_RG", $_POST['RES_RG']);
            $responsaveisModel->__set("RES_FOTO", $_POST['RES_FOTO']);
            $responsaveisModel->__set("RES_TELEFONE", $_POST['RES_TELEFONE']);
            $responsaveisModel->__set("RES_RUA", $_POST['RES_RUA']);
            //$responsaveisModel->__set("RES_NUMERO", $_POST['RES_NUMERO']);
            $responsaveisModel->__set("RES_BAIRRO", $_POST['RES_BAIRRO']);
            $responsaveisModel->__set("RES_CEP", $_POST['RES_CEP']);
            $responsaveisModel->__set("RES_COMPLEMENTO", $_POST['RES_COMPLEMENTO']);
            $responsaveisModel->__set("RES_PRONTUARIO", $_POST['RES_PRONTUARIO']);
            //$responsaveisModel->__set("FK_CURSOS_CUR_ID", $_POST['FK_CURSOS_CUR_ID']);
            $responsaveisModel->__set("FK_LOGIN_LGN_ID", $LGN_ID);
            $responsaveisModel->__set("FK_CAMPUS_CAM_ID", $_POST['FK_CAMPUS_CAM_ID']);
            $responsaveisModel->__set("FK_CIDADES_CID_ID", $_POST['FK_CIDADES_CID_ID']);
            
            //$eventos_modalidadesModel = new Eventos_ModalidadesModel();

            //$eventos_modalidadesModel->__set("EVM_ID", $_POST['EVM_ID']);
            

            $responsavelDAO = new Responsaveis_EquipeDAO();
            $responsavelDAO->inserir($responsaveisModel);

            

            header('Location: /dashboard/responsaveis_equipe/listar');
        }

        public function cadastrarsenha(){             
            $this->render('cadastrar_senha','dashboard');
        }
        public function validaAutenticacao() {}
    
    }
?>
