<?php
    namespace App\Controller; 

    use FW\Controller\Action; 
    use App\Model\UsuariosModel;
    use App\DAO\UsuarioDAO;
    use App\Model\SecretariasModel;
    use App\DAO\SecretariasDAO;


    class SecretariasController extends Action {
        
        public function cadastrar(){

            $title = "Cadastro de Secretarios/as"; 
          
            $this->getView()->title = $title; 

            if(isset($_GET['status'])){
                $this->getView()->status = $_GET['status'];
            } else {
                $this->getView()->status = '' ;
            } 
            
            $this->render('Registrar/index', 'dashboard'); //mudar dps
        }
      
        public function inserir(){
            
            $usuario = new UsuariosModel();
            $usuarioDAO = new UsuarioDAO();
            $secretaria = new SecretariasModel(); 
            $secretariaDAO = new SecretariasDAO();
            
            $usuario->__set('USU_CPF', $_POST['USU_CPF']); //Passando os dados vindos do POST do Formulário para os Métodos Set de PacienteModal
            $usuario->__set('USU_RG', $_POST['USU_RG']);
            $usuario->__set('USU_EMAIL', $_POST['USU_EMAIL']);
            $usuario->__set('USU_SENHA', $_POST['USU_SENHA']);
            $usuario->__set('USU_NUMERO_CELULAR', $_POST['USU_CELULAR']);
            $usuario->__set('USU_DATA_DE_NASCIMENTO', $_POST['USU_DATA_DE_NASCIMENTO']);
            $usuario->__set('USU_NOME', $_POST['USU_NOME']);
            $usuario->__set('USU_NUMERO_RESIDENCIA', $_POST['USU_NUMERO_RESIDENCIA']);
            $usuario->__set('USU_SEXO', $_POST['USU_SEXO']);
            $usuario->__set('USU_CEP', $_POST['USU_CEP']);
                
            $secretaria->__set('SEC_ID', 'S'.uniqid(rand(10000,99999)));
            $secretaria->__set('SEC_SETOR', $_POST['SEC_SETOR']);
            $secretaria->__set('SEC_TELEFONE_PROFISSIONAL', $_POST['SEC_TELEFONE_PROFISSIONAL']);
            $secretaria->__set('SEC_PRONTUARIO', $_POST['SEC_PRONTUARIO']);
            $secretaria->__set('SEC_EMAIL_PROFISSIONAL', $_POST['SEC_EMAIL_PROFISSIONAL']);
            $secretaria->__set('FK_USUARIOS_USU_ID', $_POST['FK_USUARIOS_USU_ID']);
            $secretaria->__set('FK_EXAME_EXA_ID', $_POST['FK_EXAME_EXA_ID']);

            $secretariaDAO->inserir($secretaria); 
            header('Location: /funcionarios?msg=cadastro-sucesso'); 
        }

        
        public function listagem(){
            $title = "Cadastro de secretarias";
            
            $this->getView()->title = $title;

           
            $secretariaDAO = new SecretariasDAO();            
            $secretaria = $secretariaDAO->listar(); 
            $this->getView()->secretaria = $secretaria;                      
            $this->render('index', 'dashboard', ''); //Carrega  o arquivo da pasta View/paciente/index.php
        }    

        
        //Método que carrega o Formulário de edição de Paciente
        public function editar(){                  
            
            $secretaria = new SecretariasModel();
            $secretariaDAO = new SecretariasDAO();            
            
            if(isset($_GET['id'])){
                $secretaria = $secretariaDAO->buscarPorId($_GET['id']); //Pega o paciente selecionado

                $this->getView()->secretaria = $secretaria;
            } else {
                $this->getView()->secretaria = '' ;
            }            
           
            $title = "Edição de secretaria";
           
            $this->getView()->title = $title;
            $this->render('editarFuncionarios/index', 'dashboard', ''); //mudar
        }

       
        public function atualizar(){
                
            $secretaria = new SecretariasModel();
            $secretariaDAO = new SecretariasDAO();
           
            $secretaria->__set('SEC_ID', $_POST['SEC_ID']);
            $secretaria->__set('SEC_SETOR', $_POST['SEC_SETOR']);
            $secretaria->__set('SEC_TELEFONE_PROFISSIONAL', $_POST['SEC_TELEFONE_PROFISSIONAL']);
            $secretaria->__set('SEC_PRONTUARIO', $_POST['SEC_PRONTUARIO']);
            $secretaria->__set('SEC_EMAIL_PROFISSIONAL', $_POST['SEC_EMAIL_PROFISSIONAL']);
            $secretaria->__set('FK_USUARIOS_USU_ID', $_POST['FK_USUARIOS_USU_ID']);
            $secretaria->__set('FK_EXAME_EXA_ID', $_POST['FK_EXAME_EXA_ID']);

            
            $secretariaDAO->alterar($secretaria); 

            header('Location: /funcioanrios?msg=editar-sucesso');     
        
        }

        
        public function excluir()
            {
            $secretariaDAO = new SecretariasDAO(); 
            if(isset($_GET['id'])){
                $secretariaDAO->excluir($_GET['id']); 
                header('Location: /funcionarios?msg=exclusao-sucesso');
            }
        }
        
        public function msgs(){     
            
            if(isset($_GET['msg'])){
                
                if($_GET['msg'] == 'cadastro-sucesso')
                {
                    $msg = "Cadastro da Secretária realizado com sucesso!";
                }
                if($_GET['msg'] == 'editar-sucesso')
                {
                    $msg = "Secretária atualizado com sucesso!";
                }
                if($_GET['msg'] == 'exclusao-sucesso')
                {
                    $msg = "Secretária excluído com sucesso!";
                }
                
                $this->getView()->msg = $msg;
            } else {
                $this->getView()->msg = '' ;
            }

            $this->render('msgs', 'funcionarios', '');
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