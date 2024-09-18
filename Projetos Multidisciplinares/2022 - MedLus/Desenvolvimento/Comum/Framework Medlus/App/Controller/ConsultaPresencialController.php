<?php
    namespace App\Controller; //Faz parte do Namespace App\Controller

    use FW\Controller\Action; //utilizando outros namespaces, dessa forma não precisamos dar includes em arquivos
    use App\Model\ConsultaPresencialModel;
    use App\DAO\ConsultaPresencialDAO;


    class ConsultaPresencialController extends Action {
        public function listarDirecionadas() {
            $title = "Consultas Presenciais Direcionadas";
            //para passar valores para a VIEW
            $this->getView()->title = $title;

            $consultaPresencialDAO = new ConsultaPresencialDAO();            
            $consultas = $consultaPresencialDAO->listarConsultasPresenciaisDirecionadas(); 
            $this->getView()->consultas = $consultas;                      
            $this->render('listarConsultasDirecionadas/index', 'dashboard'); //Carrega  o arquivo da pasta View/paciente/index.php
        }
        
        //Método para Carregar a View do Formulário de Cadastro de Paciente
        public function cadastrar(){

            $title = "Cadastro de consultas presenciais"; //Utilizado para o <title> de cada página
            //para passar valores para a VIEW
            $this->getView()->title = $title; // passa para a View o valor da variável $title utilizado na linha 14 do arquivo dashboard.php da pasta View

            if(isset($_GET['status'])){
                $this->getView()->status = $_GET['status'];
            } else {
                $this->getView()->status = '' ;
            } 
            
            $this->render('SolicitacaoConsultaPresencial/index', 'dashboard'); //Carrega o arquivo que esta dentro da pasta View/paciente/cadastroPaciente/index
        }

        //Método de Inserção do Formulário de Cadastro de Paciente
        public function inserir(){
            
            $consultaPresencial = new ConsultaPresencialModel(); //Instanciando a Classe ConsultaPresencialModel
            $consultaPresencialDAO = new ConsultaPresencialDAO(); // Instanciando a Classe ConsultaPresencialDAO
            if( !isset($_POST['COP_DESCRICAO']) || 
                !isset($_POST['COP_RETORNO']) ||
                !isset($_POST['COP_lOCAL_CONSULTA_DIRECIONADA']) ||
                !isset($_POST['COP_NIVEL_PRIORIDADE']) /* || 
                !isset($_POST['FK_CONSULTAS_ONLINE_CTO_ID']) ||
                !isset($_POST['FK_MEDICOS_MED_ID']) ||
                !isset($_POST['FK_PACIENTES_PAC_ID']) */){ //Verificando se os dados que estão vindo do formulário existem
                header('Location: /consultasPresenciais/cadastrar?status=203'); //Redirecionando caso os dados não existam
                die(); //Matando o processo para não executar as linhas 38, 39, 40, 42, 44 deste método
            }
            $consultaPresencial->__set('COP_DESCRICAO', $_POST['COP_DESCRICAO']); //Passando os dados vindos do POST do Formulário para os Métodos Set de PacienteModal
            $consultaPresencial->__set('COP_RETORNO', $_POST['COP_RETORNO']);
            $consultaPresencial->__set('COP_lOCAL_CONSULTA_DIRECIONADA', $_POST['COP_lOCAL_CONSULTA_DIRECIONADA']);
            $consultaPresencial->__set('COP_NIVEL_PRIORIDADE', $_POST['COP_NIVEL_PRIORIDADE']);
            $consultaPresencial->__set('FK_CONSULTAS_ONLINE_CTO_ID', $_POST['FK_CONSULTAS_ONLINE_CTO_ID']);
            $consultaPresencial->__set('FK_MEDICOS_MED_ID', $_POST['FK_MEDICOS_MED_ID']);
            $consultaPresencial->__set('FK_PACIENTES_PAC_ID', $_POST['FK_PACIENTES_PAC_ID']);
            
            $consultaPresencialDAO->inserir($consultaPresencial); //Executando o método Inserir da Classe ConsultaPresencialDAO, com passagem de parâmetro o Objeto Paciente

            header('Location: /consultasPresenciais?msg=cadastro-sucesso'); //redireciona para /pacientes apos inserir paciente         

        }

        //Método para carregar a View de Listagem de todos os Pacientes Cadastrados        
        //Módulo 04 - (NÃO APAGAR!!!)
        public function listagem(){
            $title = "Cadastro de Consultas Presenciais";
            //para passar valores para a VIEW
            $this->getView()->title = $title;

            $consultasPresenciais;
            $consultaPresencialDAO = new ConsultaPresencialDAO();            
            $consultasPresenciais = $consultaPresencialDAO->listarConsultaPresencial(); 
            $this->getView()->consultasPresenciais = $consultasPresenciais;                      
            $this->render('ListagemConsultaPresencial/index', 'dashboard', ''); //Carrega  o arquivo da pasta View/paciente/index.php
        }   

        public function atualizarCopForm(){
                
            $paciente = new ConsultaPresencialModel();
            $consultaPresencialDAO = new ConsultaPresencialDAO();
           
            $consultaPresencial->__set('COP_ID', $_POST['id']); //não pode ser o próprio ID da tabela, tem que ser o do Campo hidden
            $consultaPresencial->__set('COP_DESCRICAO', $_POST['COP_DESCRICAO']);
            $consultaPresencial->__set('COP_RETORNO', $_POST['COP_RETORNO']);
            $consultaPresencial->__set('COP_DATA_RETORNO', $_POST['COP_DATA_RETORNO']);   
            
            $consultaPresencialDAO->alterar($consultaPresencial); //Passando o Objeto para o método Alterar de ConsultaPresencialDAO

            header('Location: /consultasPresenciais?msg=editar-sucesso'); //redireciona para /pacientes após alteração               
        
        }

         //Método para carregar a View de Listagem de todos os Pacientes Cadastrados        
        //Módulo 04 - (NÃO APAGAR!!!)
        public function consultaFormulario(){
            $idConsulta = $_GET['id'];
           
            $title = "Cadastro de Consultas Presenciais";
            //para passar valores para a VIEW
            $this->getView()->title = $title;
            

            $consultaPresencialDAO = new ConsultaPresencialDAO();            
            $consultasPresencial = $consultaPresencialDAO->buscarPorId($idConsulta);
            


            $this->getView()->consultasPresencial = $consultasPresencial;                
            
                                
            $this->render('FormularioConsultaPresencial/index', 'dashboard', ''); //Carrega  o arquivo da pasta View/paciente/index.php
            header('Location: /consultas_listar');
        } 

        
        //Método que carrega o Formulário de edição de Paciente
        public function editar(){                  
            
            $consultaPresencial = new ConsultaPresencialModel();
            $consultaPresencialDAO = new ConsultaPresencialDAO();            
            
            if(isset($_GET['id'])){
                $consultaPresencial = $consultaPresencialDAO->buscarPorId($_GET['id']); //Pega o paciente selecionado

                $this->getView()->consultaPresencial = $consultaPresencial;
            } else {
                $this->getView()->consultaPresencial = '' ;
            }            
           
            $title = "Edição de consultaPresencial";
            //para passar valores para a VIEW
            $this->getView()->title = $title;
            $this->render('editarConsultaPresencial/index', 'dashboard', ''); //Carrega o arquivo da pasta View/paciente/editarPaciente/index.php
        }

        //Método para atualizar os dados do cadastro vindo do formulário de edição
        public function atualizar(){
                
            $paciente = new ConsultaPresencialModel();
            $consultaPresencialDAO = new ConsultaPresencialDAO();
           
            $consultaPresencial->__set('COP_ID', $_POST['id']); //não pode ser o próprio ID da tabela, tem que ser o do Campo hidden
            $consultaPresencial->__set('COP_DESCRICAO', $_POST['COP_DESCRICAO']);
            $consultaPresencial->__set('COP_RETORNO', $_POST['COP_RETORNO']);
            $consultaPresencial->__set('COP_lOCAL_CONSULTA_DIRECIONADA', $_POST['COP_lOCAL_CONSULTA_DIRECIONADA']);
            $consultaPresencial->__set('COP_NIVEL_PRIORIDADE', $_POST['COP_NIVEL_PRIORIDADE']);
            $consultaPresencial->__set('FK_CONSULTAS_ONLINE_CTO_ID', $_POST['FK_CONSULTAS_ONLINE_CTO_ID']);
            $consultaPresencial->__set('FK_MEDICOS_MED_ID', $_POST['FK_MEDICOS_MED_ID']);
            $consultaPresencial->__set('FK_PACIENTES_PAC_ID', $_POST['FK_PACIENTES_PAC_ID']);                
            
            $consultaPresencialDAO->alterar($consultaPresencial); //Passando o Objeto para o método Alterar de ConsultaPresencialDAO

            header('Location: /consultasPresenciais?msg=editar-sucesso'); //redireciona para /pacientes após alteração               
        
        }

        //Método para Excluir um cadastro do Paciente
        public function excluir()
        {
            $consultaPresencialDAO = new ConsultaPresencialDAO(); 
            if(isset($_GET['id'])){
                $consultaPresencialDAO->excluir($_GET['id']); //Pega o ID do Paciente a ser excluido, aciona o médoto excluir de ConsultaPresencialDAO
                header('Location: /consultasPresenciais?msg=exclusao-sucesso'); //redireciona para /pacientes após exclusão
            }    
        }

        //Mensagens de Alerta personalizadas para cada método
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


        

        

        //método para verificar a autenticação do usuário
        public function validaAutenticacao(){
            /* if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
                header('Location: /login');
                die();
            } */

        }

    } 

?>