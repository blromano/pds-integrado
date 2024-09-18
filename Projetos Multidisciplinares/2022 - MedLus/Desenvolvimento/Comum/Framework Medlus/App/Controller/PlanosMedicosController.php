<?php
    namespace App\Controller; //Faz parte do Namespace App\Controller

    use FW\Controller\Action; //utilizando outros namespaces, dessa forma não precisamos dar includes em arquivos
    use App\Model\PlanosMedicosModel;
    use App\DAO\PlanosMedicosDAO;
    
  

    class PlanosMedicosController extends Action {
        //Método para Carregar a View do Formulário de Cadastro de Paciente
        public function cadastrar(){

            $title = "Cadastrar Planos Medicos"; //Utilizado para o <title> de cada página
            //para passar valores para a VIEW
            $this->getView()->title = $title; // passa para a View o valor da variável $title utilizado na linha 14 do arquivo dashboard.php da pasta View

            if(isset($_GET['status'])){
                $this->getView()->status = $_GET['status'];
            } else {
                $this->getView()->status = '' ;
            } 
            
            $this->render('cadastrarplanos/index', 'dashboard'); //Carrega o arquivo que esta dentro da pasta View/ouvidoria/listarouvidoria/index
        }

        //Método de Inserção do Formulário de Cadastro de Paciente
        public function inserir(){
            
            $PlanosMedico = new PlanosMedicosModel(); //Instanciando a Classe PacienteModel
            $PlanosMedicosDAO = new PlanosMedicosDAO(); // Instanciando a Classe PacienteDAO
            //  if(!isset($_POST['PLA_ID']) || !isset($_POST['PLA_AGENCIA']) || !isset($_POST['PLA_CONTATO'])!isset($_POST['PLA_PRECO']) || !isset($_POST['PLA_QUANTIDADEEXAMES']) || !isset($_POST['PLA_NOME']) || !isset($_POST['PLA_QUANTIDADECONSULTAS'])){ //Verificando se os dados que estão vindo do formulário existem
            //     header('Location: /Ouvidoria?status=203'); //Redirecionando caso os dados não existam
            //     die(); //Matando o processo para não executar as linhas 38, 39, 40, 42, 44 deste método
            // }
            $PlanosMedico->__set('PLA_AGENCIA', $_POST['PLA_AGENCIA']);
            $PlanosMedico->__set('PLA_CONTATO', $_POST['PLA_CONTATO']);
            $PlanosMedico->__set('PLA_PRECO', $_POST['PLA_PRECO']);
            $PlanosMedico->__set('PLA_QUANTIDADEEXAMES', $_POST['PLA_QUANTIDADEEXAMES']);
            $PlanosMedico->__set('PLA_NOME', $_POST['PLA_NOME']);
            $PlanosMedico->__set('PLA_QUANTIDADECONSULTAS', $_POST['PLA_QUANTIDADECONSULTAS']);
            $PlanosMedicosDAO->inserir($PlanosMedico); //Executando o método Inserir da Classe PacienteDAO, com passagem de parâmetro o Objeto Paciente

            header('Location: /planosmedicos?msg=cadastro-sucesso'); //redireciona para /pacientes apos inserir paciente         

        }

        //Método para carregar a View de Listagem de todos os Pacientes Cadastrados
        public function listagem(){
            $title = "Cadastro dos Planos Médicos";
            //para passar valores para a VIEW
            $this->getView()->title = $title;

            if(isset($_GET['msg'])){
                
                if($_GET['msg'] == 'cadastro-sucesso')
                {
                    $msg = "Planos Médicos cadastrado com sucesso!";
                }
                if($_GET['msg'] == 'editar-sucesso')
                {
                    $msg = "Planos Médicos atualizado com sucesso!";
                }
                if($_GET['msg'] == 'exclusao-sucesso')
                {
                    $msg = "Planos Médicos excluído com sucesso!";
                }
                
                $this->getView()->msg = $msg;
            } else {
                $this->getView()->msg = '' ;
            }
            $PlanosMedicos;
            $PlanosMedicosDAO = new PlanosMedicosDAO();            
            $PlanosMedicos = $PlanosMedicosDAO->listar(); 
            $this->getView()->PlanosMedicos = $PlanosMedicos;                      
            $this->render('listarplanos/index', 'dashboard', ''); //Carrega  o arquivo da pasta View/tipoRemedio/index.php
        }  
   
        //Método que carrega o Formulário de edição de Paciente
        public function editar(){                  
            
            $PlanosMedico = new PlanosMedicosModel();
            $PlanosMedicosDAO = new PlanosMedicosDAO();            
            
            if(isset($_GET['id'])){
                $PlanosMedico = $PlanosMedicosDAO->buscarPorId($_GET['id']); //Pega o paciente selecionado

                $this->getView()->PlanosMedico = $PlanosMedico;
            } else {
                $this->getView()->PlanosMedico = '' ;
            }            
           
            $title = "Edição de Planos Médicos";
            //para passar valores para a VIEW
            $this->getView()->title = $title;
            $this->render('editarplanos/index', 'dashboard', ''); //Carrega o arquivo da pasta View/paciente/editarPaciente/index.php
        }


        //Método para atualizar os dados do cadastro vindo do formulário de edição
        public function atualizar(){
                
            $PlanosMedico = new PlanosMedicosModel();
            $PlanosMedicosDAO = new PlanosMedicosDAO();
            
            $PlanosMedico->__set('PLA_ID', $_POST['id']);
            $PlanosMedico->__set('PLA_AGENCIA', $_POST['PLA_AGENCIA']);
            $PlanosMedico->__set('PLA_CONTATO', $_POST['PLA_CONTATO']);
            $PlanosMedico->__set('PLA_PRECO', $_POST['PLA_PRECO']);
            $PlanosMedico->__set('PLA_QUANTIDADEEXAMES', $_POST['PLA_QUANTIDADEEXAMES']);
            $PlanosMedico->__set('PLA_NOME', $_POST['PLA_NOME']);
            $PlanosMedico->__set('PLA_QUANTIDADECONSULTAS', $_POST['PLA_QUANTIDADECONSULTAS']);

            
            $PlanosMedicosDAO->alterar($PlanosMedico); //Passando o Objeto para o método Alterar de PacienteDAO

            header('Location: /planosmedicos?msg=cadastro-sucesso'); //redireciona para /pacientes após alteração  
                      
        
        }

        public function atualizaLista(){
                
            $PlanosMedico = new PlanosMedicosModel();
            $PlanosMedicosDAO = new PlanosMedicosDAO();
            
            $PlanosMedico->__set('PLA_ID', $_POST['id']);
            $PlanosMedico->__set('PLA_AGENCIA', $_POST['PLA_AGENCIA']);
            $PlanosMedico->__set('PLA_CONTATO', $_POST['PLA_CONTATO']);
            $PlanosMedico->__set('PLA_PRECO', $_POST['PLA_PRECO']);
            $PlanosMedico->__set('PLA_QUANTIDADEEXAMES', $_POST['PLA_QUANTIDADEEXAMES']);
            $PlanosMedico->__set('PLA_NOME', $_POST['PLA_NOME']);
            $PlanosMedico->__set('PLA_QUANTIDADECONSULTAS', $_POST['PLA_QUANTIDADECONSULTAS']);
            
            $PlanosMedicosDAO->atualizaLista($PlanosMedico); //Passando o Objeto para o método Alterar de PacienteDAO

            header('Location: /Ouvidoria/listagem'); //redireciona para /pacientes após alteração               
        
        }

        //Método para Excluir um cadastro do Paciente
        public function excluir()
        {
            $PlanosMedicosDAO = new PlanosMedicosDAO(); 
            if(isset($_GET['id'])){
                $PlanosMedicosDAO->excluir($_GET['id']); //Pega o ID do Paciente a ser excluido, aciona o médoto excluir de PacienteDAO
                header('Location: /planosmedicos?msg=exclusao-sucesso'); //redireciona para /pacientes após exclusão
            }    
        }

        // //Mensagens de Alerta personalizadas para cada método
        // public function msgs(){     
            
        //     if(isset($_GET['msg'])){
                
        //         if($_GET['msg'] == 'cadastro-sucesso')
        //         {
        //             $msg = "Cadastro do usuário realizado com sucesso!";
        //         }
        //         if($_GET['msg'] == 'editar-sucesso')
        //         {
        //             $msg = "Usuário atualizado com sucesso!";
        //         }
        //         if($_GET['msg'] == 'exclusao-sucesso')
        //         {
        //             $msg = "Usuário excluído com sucesso!";
        //         }
                
        //         $this->getView()->msg = $msg;
        //     } else {
        //         $this->getView()->msg = '' ;
        //     }

        //     $this->render('msgs', 'usuario', '');
        // }


        

        

        //método para verificar a autenticação do usuário
        public function validaAutenticacao(){
            /* if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
                header('Location: /login');
                die();
            } */

        }

    } 

?>