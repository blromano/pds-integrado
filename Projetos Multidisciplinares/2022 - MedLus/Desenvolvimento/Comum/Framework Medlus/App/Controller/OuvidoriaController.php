<?php
    namespace App\Controller; //Faz parte do Namespace App\Controller

    use FW\Controller\Action; //utilizando outros namespaces, dessa forma não precisamos dar includes em arquivos
    use App\Model\OuvidoriaModel;
    use App\DAO\OuvidoriaDAO;
    
  

    class OuvidoriaController extends Action {
        //Método para Carregar a View do Formulário de Cadastro de Paciente
        public function cadastrar(){

            $title = "Ouvidoria"; //Utilizado para o <title> de cada página
            //para passar valores para a VIEW
            $this->getView()->title = $title; // passa para a View o valor da variável $title utilizado na linha 14 do arquivo dashboard.php da pasta View

            if(isset($_GET['status'])){
                $this->getView()->status = $_GET['status'];
            } else {
                $this->getView()->status = '' ;
            } 
            
            $this->render('/index', 'dashboard'); //Carrega o arquivo que esta dentro da pasta View/ouvidoria/listarouvidoria/index
        }

        //Método de Inserção do Formulário de Cadastro de Paciente
        public function inserir(){
            
            $ouvidoria = new OuvidoriaModel(); //Instanciando a Classe PacienteModel
            $OuvidoriaDAO = new OuvidoriaDAO(); // Instanciando a Classe PacienteDAO
             if(!isset($_POST['OUV_RECADO']) || !isset($_POST['OUV_MOTIVO']) || !isset($_POST['FK_USUARIOS_USU_ID'])){ //Verificando se os dados que estão vindo do formulário existem
                header('Location: /ouvidoria?status=203'); //Redirecionando caso os dados não existam
                die(); //Matando o processo para não executar as linhas 38, 39, 40, 42, 44 deste método
            }
            $ouvidoria->__set('OUV_RECADO', $_POST['OUV_RECADO']);
            $ouvidoria->__set('OUV_MOTIVO', $_POST['OUV_MOTIVO']);
            $ouvidoria->__set('FK_USUARIOS_USU_ID', $_POST['FK_USUARIOS_USU_ID']); 

            $OuvidoriaDAO->inserir($ouvidoria); //Executando o método Inserir da Classe PacienteDAO, com passagem de parâmetro o Objeto Paciente

            header('Location: /ouvidoria/enviar?msg=cadastro-sucesso'); //redireciona para /pacientes apos inserir paciente         

        }

        //Método para carregar a View de Listagem de todos os Pacientes Cadastrados
        public function listagem(){
            $title = "Cadastro dos Tipos de Remédios";
            //para passar valores para a VIEW
            $this->getView()->title = $title;

            $Ouvidorias;
            $OuvidoriaDAO = new OuvidoriaDAO();            
            $Ouvidorias = $OuvidoriaDAO->listar(); 
            $this->getView()->Ouvidorias = $Ouvidorias;                      
            $this->render('listarOuvidoria/index', 'dashboard', ''); //Carrega  o arquivo da pasta View/tipoRemedio/index.php
        }  

        public function abrir(){
            $title = "Cadastro de Ouvidoria";
            //para passar valores para a VIEW
            $this->getView()->title = $title;                    
            $this->render('index', 'dashboard', ''); //Carrega  o arquivo da pasta View/paciente/index.php
        }    
        //Método que carrega o Formulário de edição de Paciente
        public function editar(){                  
            
            $ouvidoria = new OuvidoriaModel();
            $OuvidoriaDAO = new OuvidoriaDAO();            
            
            if(isset($_GET['id'])){
                $ouvidoria = $OuvidoriaDAO->buscarPorId($_GET['id']); //Pega o paciente selecionado

                $this->getView()->ouvidoria = $ouvidoria;
            } else {
                $this->getView()->ouvidoria = '' ;
            }            
           
            $title = "Edição de Ouvidoria";
            //para passar valores para a VIEW
            $this->getView()->title = $title;
            $this->render('editarOuvidoria/index', 'dashboard', ''); //Carrega o arquivo da pasta View/paciente/editarPaciente/index.php
        }


        //Método para atualizar os dados do cadastro vindo do formulário de edição
        public function atualizar(){
                
            $ouvidoria = new OuvidoriaModel();
            $OuvidoriaDAO = new OuvidoriaDAO();

            $ouvidoria->__set('OUV_ID', $_POST['id']); //não pode ser o próprio ID da tabela, tem que ser o do Campo hidden
            $ouvidoria->__set('OUV_RECADO', $_POST['OUV_RECADO']);
            $ouvidoria->__set('OUV_SITUACAO', $_POST['OUV_SITUACAO']);
            $ouvidoria->__set('OUV_MOTIVO', $_POST['OUV_MOTIVO']);
            $ouvidoria->__set('FK_USUARIOS_USU_ID', $_POST['FK_USUARIOS_USU_ID']);
            
            $OuvidoriaDAO->alterar($ouvidoria); //Passando o Objeto para o método Alterar de PacienteDAO

            header('Location: /ouvidoria?msg=editar-sucesso'); //redireciona para /pacientes após alteração  
                      
        
        }

        public function atualizaLista(){
                
            $ouvidoria = new OuvidoriaModel();
            $OuvidoriaDAO = new OuvidoriaDAO();

            $ouvidoria->__set('OUV_ID', $_POST['ReclamacaoId']); //não pode ser o próprio ID da tabela, tem que ser o do Campo hidden
            $ouvidoria->__set('OUV_SITUACAO', $_POST['OUV_SITUACAO']);
            
            $OuvidoriaDAO->atualizaLista($ouvidoria); //Passando o Objeto para o método Alterar de PacienteDAO

            header('Location: /ouvidoria/listagem'); //redireciona para /pacientes após alteração               
        
        }

        //Método para Excluir um cadastro do Paciente
        public function excluir()
        {
            $OuvidoriaDAO = new OuvidoriaDAO(); 
            if(isset($_GET['id'])){
                $OuvidoriaDAO->excluir($_GET['id']); //Pega o ID do Paciente a ser excluido, aciona o médoto excluir de PacienteDAO
                header('Location: /ouvidoria?msg=exclusao-sucesso'); //redireciona para /pacientes após exclusão
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