<?php
    namespace App\Controller; 

    use FW\Controller\Action; 
    use App\Model\EnfermeirosModel;
    use App\DAO\EnfermeiroDAO;
    use App\DAO\UsuarioDAO;
    use App\Model\UsuariosModel;


    class EnfermeiroController extends Action {
        
        public function cadastrar(){

            $title = "Cadastro de Enfermeiros/as"; 
          
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
            $enfermeiro = new EnfermeirosModel(); 
            $EnfermeiroDAO = new EnfermeiroDAO();

            
            /* if(!isset($_POST['ENF_EMAIL_PRODISSIONAL']) || !isset($_POST['ENF_PRONTUARIO']) || !isset($_POST['ENF_COREN'])  || !isset($_POST['ENF_TELEFONE_PROFISSIONAL'])  || !isset($_POST['FK_USUARIOS_USU_ID']))
            { 
                header('Location: /funcionarios/cadastrar?status=203'); 
                die();
            }
                */ 
             
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
    
            $usuarioDAO->inserir($usuario); //Executando o método Inserir da Classe PacienteDAO, com passagem de parâmetro o Objeto Paciente
           
            $enfermeiro->__set('ENF_ID', 'F'.uniqid(rand(10000,99999))); 
            $enfermeiro->__set('ENF_ID', $_POST['MED_ID']);
            $enfermeiro->__set('ENF_EMAIL_PRODISSIONAL', $_POST['ENF_EMAIL_PRODISSIONAL']);
            $enfermeiro->__set('ENF_PRONTUARIO', $_POST['ENF_PRONTUARIO']);
            $enfermeiro->__set('ENF_COREN', $_POST['ENF_COREN']);
            $enfermeiro->__set('ENF_TELEFONE_PROFISSIONAL',$_POST['ENF_TELEFONE_PROFISSIONAL']);
            $enfermeiro->__set('FK_USUARIOS_USU_ID', $_POST['FK_USUARIOS_USU_ID']);
            
            $EnfermeiroDAO->inserir($enfermeiro); 
            header('Location: /funcionarios?msg=cadastro-sucesso'); 
        }

        
        public function listagem(){
            $title = "Cadastro de Enfermeiros";
            
            $this->getView()->title = $title;

            $enfermeiroDAO = new EnfermeiroDAO();            
            $enfermeiros = $enfermeiroDAO->listar(); 
            $this->getView()->enfermeiros = $enfermeiros;                      
            $this->render('index', 'dashboard', ''); //Carrega  o arquivo da pasta View/paciente/index.php
        }    

        
        //Método que carrega o Formulário de edição de Paciente
        public function editar(){                  
            
            $enfermeiro = new EnfermeirosModel();
            $EnfermeiroDAO = new EnfermeiroDAO();            
            
            if(isset($_GET['id'])){
                $enfermeiro = $EnfermeiroDAO->buscarPorId($_GET['id']); //Pega o paciente selecionado

                $this->getView()->enfermeiro = $enfermeiro;
            } else {
                $this->getView()->enfermeiro = '' ;
            }            
           
            $title = "Edição de Enfermeiro";
           
            $this->getView()->title = $title;
            $this->render('editarFuncionario/index', 'dashboard', ''); 
        }

       
        public function atualizar(){
                
            $enfermeiro = new EnfermeirosModel();
            $EnfermeiroDAO = new EnfermeiroDAO();
           
            $enfermeiro->__set('ENF_ID', $_POST['id']);
            $enfermeiro->__set('ENF_EMAIL_PRODISSIONAL', $_POST['email']);
            $enfermeiro->__set('ENF_PRONTUARIO', $_POST['prontuario']);
            $enfermeiro->__set('ENF_COREN', $_POST['coren']);
            $enfermeiro->__set('ENF_TELEFONE_PROFISSIONAL', $_POST['telefone_profissional']);
            $enfermeiro->__set('FK_USUARIOS_USU_ID', $_POST['usuario']);
               
            
            $EnfermeiroDAO->alterar($enfermeiro); 

            header('Location: /funcionarios?msg=editar-sucesso');     
        
        }

        
        public function excluir()
        {
            $EnfermeiroDAO = new EnfermeiroDAO(); 
                if(isset($_GET['id'])){
                $EnfermeiroDAO->excluir($_GET['id']); 
                header('Location: /funcionarios?msg=exclusao-sucesso');
            }
        }   
        
        public function msgs(){     
            
            if(isset($_GET['msg'])){
                
                if($_GET['msg'] == 'cadastro-sucesso')
                {
                    $msg = "Cadastro do enfermeiro realizado com sucesso!";
                }
                if($_GET['msg'] == 'editar-sucesso')
                {
                    $msg = "Enfermeiro atualizado com sucesso!";
                }
                if($_GET['msg'] == 'exclusao-sucesso')
                {
                    $msg = "Enfermeiro excluído com sucesso!";
                }
                
                $this->getView()->msg = $msg;
            } else {
                $this->getView()->msg = '' ;
            }

            $this->render('msgs', 'enfermeiro', '');
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