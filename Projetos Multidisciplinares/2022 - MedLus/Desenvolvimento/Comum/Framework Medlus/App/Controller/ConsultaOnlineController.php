<?php
    namespace App\Controller; 

    use FW\Controller\Action;
    use App\Model\ConsultaOnlineModel;
    use App\DAO\ConsultaOnlineDAO;
    use App\Model\PacienteModel;

    class ConsultaOnlineController extends Action {

        public function cadastrar(){

            $title = "Cadastro Consultas Online"; 
            $this->getView()->title = $title; 
            
            if(isset($_GET['status'])){
                $this->getView()->status = $_GET['status'];
            } else {
                $this->getView()->status = '' ;
            } 
            
            $this->render('cadastroConsultaOnline/index', 'dashboard', ''); 
        }

        public function inserir(){
            
            $consultaOnline = new ConsultaOnlineModel(); 
            $ConsultaOnlineDAO = new ConsultaOnlineDAO(); 
            if( !isset($_POST['CTO_DATA']) || 
                !isset($_POST['CTO_DIAGNOSTICO']) || 
                !isset($_POST['CTO_HORA_INICIO']) || 
                !isset($_POST['CTO_HORA_TERMINO']) || 
                !isset($_POST['CTO_JUSTIFICATIVA']) || 
                !isset($_POST['CTO_LINK_MEET']) || 
                !isset($_POST['CTO_OBSERVACOES']) || 
                !isset($_POST['CTO_PRESCRICAO'])
                /*!isset($_POST['CTO_STATUS']) || 
                
                !isset($_POST['FK_PACIENTES_PAC_ID']) || 
                !isset($_POST['FK_SOLICITACAO_AGEND_CON_ONLINE_SOL_ID']) */){ 
                header('Location: /consultas_online/cadastrar?status=203'); //Redirecionando caso os dados não existam
                die();            
            }
            $consultaOnline->__set('CTO_DATA', $_POST['CTO_DATA']);
            $consultaOnline->__set('CTO_DIAGNOSTICO', $_POST['CTO_DIAGNOSTICO']);
            $consultaOnline->__set('CTO_HORA_INICIO', $_POST['CTO_HORA_INICIO']); 
            $consultaOnline->__set('CTO_HORA_TERMINO', $_POST['CTO_HORA_TERMINO']); 
            $consultaOnline->__set('CTO_JUSTIFICATIVA', $_POST['CTO_JUSTIFICATIVA']); 
            $consultaOnline->__set('CTO_LINK_MEET', $_POST['CTO_LINK_MEET']); 
            $consultaOnline->__set('CTO_OBSERVACOES', $_POST['CTO_OBSERVACOES']); 
            $consultaOnline->__set('CTO_PRESCRICAO', $_POST['CTO_PRESCRICAO']); 
            $consultaOnline->__set('CTO_STATUS', $_POST['CTO_STATUS']); 
            $consultaOnline->__set('FK_MEDICOS_MED_ID', $_POST['FK_MEDICOS_MED_ID']); 
            $consultaOnline->__set('FK_PACIENTES_PAC_ID', $_POST['FK_PACIENTES_PAC_ID']); 
            $consultaOnline->__set('FK_SOLICITACAO_AGEND_CON_ONLINE_SOL_ID', $_POST['FK_SOLICITACAO_AGEND_CON_ONLINE_SOL_ID']); 
            
            $ConsultaOnlineDAO->inserir($consultaOnline);

            header('Location: /consultasOnline/cadastrar?msg=cadastro-sucesso'); 
            
        }

        public function listagem(){

            $title = "Detalhes da Consulta Online";

            $this->getView()->title = $title;

            $consultaOnline;
            $ConsultaOnlineDAO = new ConsultaOnlineDAO();   
            if(isset($_GET['id'])){         
                $consultas_online = $ConsultaOnlineDAO->buscarPorId($_GET['id']); 
                $this->getView()->consultaOnline = $consultas_online;                 
            }   else{
                echo "erro";
            }
            $this->render('VisConOnlinePac/index', 'dashboard', '');
        }    

        public function DetalhesMed(){

            $title = "Detalhes da Consulta Online";

            $this->getView()->title = $title;

            $consultaOnline;
            $ConsultaOnlineDAO = new ConsultaOnlineDAO();   
            if(isset($_GET['id'])){         
                $consultas_online = $ConsultaOnlineDAO->buscarPorId($_GET['id']); 
                $this->getView()->consultaOnline = $consultas_online;                 
            }   else{
                echo "erro";
            }
            $this->render('VisHisConOnMed/index', 'dashboard', '');
        }    

        public function listarConsultas(){
            // ARRUMAR HARD CODED
            //$pac = 1;

            $title = "Listagem das consultas";

            $this->getView()->title = $title;

            $consultas_online;
            $ConsultaOnlineDAO = new ConsultaOnlineDAO();            
            $consultas_online = $ConsultaOnlineDAO->listar(); 
            $this->getView()->consultas_online = $consultas_online;                      
            $this->render('ListagemConOnlinePac/index', 'dashboard', '');
        }    

        public function listarConsultasMed(){
            // ARRUMAR HARD CODED
            //$pac = 1;

            $title = "Listagem das consultas do Médico";

            $this->getView()->title = $title;

            $consultas_online;
            $ConsultaOnlineDAO = new ConsultaOnlineDAO();            
            $consultas_online = $ConsultaOnlineDAO->listarMed(); 
            $this->getView()->consultas_online = $consultas_online;                      
            $this->render('ListagemConOnlineMed/index', 'dashboard', '');
        }   

        public function listarConsultasConfirm(){
            // ARRUMAR HARD CODED
            //$pac = 1;

            $title = "Listagem das consultas do Médico";

            $this->getView()->title = $title;

            $consultas_online;
            $ConsultaOnlineDAO = new ConsultaOnlineDAO();            
            $consultas_online = $ConsultaOnlineDAO->listar(); 
            $this->getView()->consultas_online = $consultas_online;                      
            $this->render('ListagemConOnlineConfirm/index', 'dashboard', '');
        }   

        /* ublic function listarHistorico(){
            // ARRUMAR HARD CODED
            //$pac = 1;

            $title = "Listagem das consultas";

            $this->getView()->title = $title;

            $consultas_online;
            $ConsultaOnlineDAO = new ConsultaOnlineDAO();            
            $consultas_online = $ConsultaOnlineDAO->listar(); 
            $this->getView()->consultas_online = $consultas_online;                      
            $this->render('VisHisConOn/index', 'dashboard', '');
        }   */

        public function listarHistorico(){

            $title = "Detalhes da Consulta Online";

            $this->getView()->title = $title;

            $consultaOnline;
            $ConsultaOnlineDAO = new ConsultaOnlineDAO();   
            if(isset($_GET['id'])){         
                $consultas_online = $ConsultaOnlineDAO->buscarPorId($_GET['id']); 
                $this->getView()->consultaOnline = $consultas_online;                 
            }   else{
                echo "erro";
            }
            $this->render('VisHisConOn/index', 'dashboard', '');
        } 

        public function editar(){                  
            
            $consultaOnline = new ConsultaOnlineModel();
            $ConsultaOnlineDAO = new ConsultaOnlineDAO();            
            
            if(isset($_GET['id'])){
                $consultaOnline = $ConsultaOnlineDAO->buscarPorId($_GET['id']); 
                $this->getView()->consultaOnline = $consultaOnline;
            } else {
                $this->getView()->consultaOnline = '' ;
            }            
           
            $title = "Edição das Consultas Online";

            $this->getView()->title = $title;
            $this->render('EditarConOnPac/index', 'dashboard', ''); 
        }

        public function editarSec(){                  
            
            $consultaOnline = new ConsultaOnlineModel();
            $ConsultaOnlineDAO = new ConsultaOnlineDAO();            
            
            if(isset($_GET['id'])){
                $consultaOnline = $ConsultaOnlineDAO->buscarPorId($_GET['id']); 
                $this->getView()->consultaOnline = $consultaOnline;
            } else {
                $this->getView()->consultaOnline = '' ;
            }            
           
            $title = "Edição das Consultas Online";

            $this->getView()->title = $title;
            $this->render('EditarConOnSec/index', 'dashboard', ''); 
        }


        public function editarMed(){                  
            
            $consultaOnline = new ConsultaOnlineModel();
            $ConsultaOnlineDAO = new ConsultaOnlineDAO();            
            
            if(isset($_GET['id'])){
                $consultaOnline = $ConsultaOnlineDAO->buscarPorId($_GET['id']); 
                $this->getView()->consultaOnline = $consultaOnline;
            } else {
                $this->getView()->consultaOnline = '' ;
            }            
           
            $title = "Edição das Consultas Online";

            $this->getView()->title = $title;
            $this->render('EditarConOnMed/index', 'dashboard', ''); 
        }


        public function atualizar(){
                
            $consultaOnline = new ConsultaOnlineModel();
            $consultaOnlineDAO = new ConsultaOnlineDAO();
           
            $consultaOnline->__set('CTO_ID', $_POST['CTO_ID']); //não pode ser o próprio ID da tabela, tem que ser o do Campo hidden
            $consultaOnline->__set('CTO_DATA', $_POST['CTO_DATA']);
            $consultaOnline->__set('CTO_HORA_INICIO', $_POST['CTO_HORA_INICIO']);
            $consultaOnline->__set('CTO_HORA_TERMINO', $_POST['CTO_HORA_TERMINO']);
            $consultaOnlineDAO->alterar($consultaOnline);

            header('Location: /consultasOnline/listagem'); 
        }

        public function atualizarMed(){
                
            $consultaOnline = new ConsultaOnlineModel();
            $consultaOnlineDAO = new ConsultaOnlineDAO();

            $consultaOnline->__set('CTO_JUSTIFICATIVA', $_POST['CTO_JUSTIFICATIVA']);
            $consultaOnline->__set('CTO_DIAGNOSTICO', $_POST['CTO_DIAGNOSTICO']);        
            $consultaOnline->__set('CTO_OBSERVACOES', $_POST['CTO_OBSERVACOES']);   
            $consultaOnline->__set('CTO_PRESCRICAO', $_POST['CTO_PRESCRICAO']);

            $consultaOnline->__set('CTO_ID', $_POST['CTO_ID']); //não pode ser o próprio ID da tabela, tem que ser o do Campo hidden
            $consultaOnline->__set('CTO_DATA', $_POST['CTO_DATA']);
            $consultaOnline->__set('CTO_HORA_INICIO', $_POST['CTO_HORA_INICIO']);
            $consultaOnline->__set('CTO_HORA_TERMINO', $_POST['CTO_HORA_TERMINO']);
            $consultaOnlineDAO->alterar($consultaOnline);

            header('Location: /consultasOnline/listagemMed'); 
        }

        public function atualizarSec(){
                
            $consultaOnline = new ConsultaOnlineModel();
            $consultaOnlineDAO = new ConsultaOnlineDAO();
           
            $consultaOnline->__set('CTO_ID', $_POST['CTO_ID']); //não pode ser o próprio ID da tabela, tem que ser o do Campo hidden
            $consultaOnline->__set('CTO_DATA', $_POST['CTO_DATA']);
            $consultaOnline->__set('CTO_HORA_INICIO', $_POST['CTO_HORA_INICIO']);
            $consultaOnline->__set('CTO_HORA_TERMINO', $_POST['CTO_HORA_TERMINO']);
            $consultaOnlineDAO->alterar($consultaOnline);

            header('Location: /consultasOnline/listagemConfirm'); 
        }

        public function listarPacientes(){
            // ARRUMAR HARD CODED
            //$pac = 1;

            $title = "Listagem dos pacientes";

            $this->getView()->title = $title;

            $pacientes = new PacienteModel();
            $ConsultaOnlineDAO = new ConsultaOnlineDAO();            
            $consultas_online = $ConsultaOnlineDAO->listarPacientes(); 
            $this->getView()->pacientes = $consultas_online;                      
            $this->render('listagemPac/index', 'dashboard', '');
        }    
        

        public function excluir()
        {
            $ConsultaOnlineDAO = new ConsultaOnlineDAO(); 
            if(isset($_GET['id'])){
                $ConsultaOnlineDAO->excluir($_GET['id']); 
                header('Location: /consultasOnline/listagem'); 
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

        public function validaAutenticacao(){
            /* if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
                header('Location: /login');
                die();
            } */

        }

        public function listarConsultaPaciente(){
            // ARRUMAR HARD CODED
            //$pac = 1;

            $title = "Listagem das consultas online do Paciente";

            $this->getView()->title = $title;

            $consultas_online = new PacienteModel();
            $ConsultaOnlineDAO = new ConsultaOnlineDAO();            
            $consultas_online = $ConsultaOnlineDAO(); 
            $this->getView()->consultas_online = $consultas_online;                      
            $this->render('ListagemConsultasPac/index', 'dashboard', '');
        }  

    } 
    

?>