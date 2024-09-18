<?php
    namespace App\Controller; 

    use FW\Controller\Action;
    use App\Model\usuariosModel;
    use App\DAO\usuarioDAO;
    use App\Model\MedicoModel;
    use App\DAO\MedicoDAO;


    class MedicoController extends Action {
        
        public function cadastrar(){

            $title = "Cadastro de Medicos/as"; 
          
            $this->getView()->title = $title; 

            if(isset($_GET['status'])){
                $this->getView()->status = $_GET['status'];
            } else {
                $this->getView()->status = '' ;
            } 
            
            $this->render('cadastrarMedico/cadastrar', 'dashboard'); //mudar dps
        }
      
        public function inserir(){
            
            $usuario = new UsuariosModel();
            $usuarioDAO = new UsuarioDAO();
            $medico = new MedicoModel(); 
            $medicoDAO = new MedicoDAO();
            
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
                
            $medico->__set('MED_ID', 'M'.uniqid(rand(10000,99999)));
            $medico->__set('MED_CRM', $_POST['MED_CRM']);
            $medico->__set('MED_TELEFONE_PROFISSIONAL', $_POST['MED_TELEFONE_PROFISSIONAL']);
            $medico->__set('MED_EMAIL_PROFISSIONAL', $_POST['MED_EMAIL_PROFISSIONAL']);
            $medico->__set('MED_PRONTUARIO', $_POST['MED_PRONTUARIO']);
            $medico->__set('MED_VALOR_CONSULTA', $_POST['MED_VALOR_CONSULTA']);
            $medico->__set('MED_OBSERVACAO', $_POST['MED_OBSERVACAO']);
            $medico->__set('MED_FORMACAO', $_POST['MED_FORMACAO']);
            $medico->__set('FK_USUARIOS_USU_ID', $_POST['FK_USUARIOS_USU_ID']);
            
            $usuarioDAO->inserir($medico); 
            header('Location: /pacientes?msg=cadastro-sucesso'); // não sei
        }

        
        public function listagem(){
            $title = "Cadastro de Medicos";
            
            $this->getView()->title = $title;

            
            $medicoDAO = new MedicoDAO();            
            $medicos = $medicoDAO->listar(); 
            $this->getView()->medicos = $medicos;                      
            $this->render('index', 'dashboard', ''); //Carrega  o arquivo da pasta View/paciente/index.php
        }    

        
        //Método que carrega o Formulário de edição de Paciente
        public function editar(){                  
            
            $medico = new MedicoModel();
            $medicoDAO = new MedicoDAO();            
            
            if(isset($_GET['id'])){
                $medico = $medicoDAO->buscarPorId($_GET['id']); //Pega o paciente selecionado

                $this->getView()->medico = $medico;
            } else {
                $this->getView()->medico = '' ;
            }            
           
            $title = "Edição de Medico";
           
            $this->getView()->title = $title;
            $this->render('editarFuncionario/index', 'dashboard', ''); 
        }

       
        public function atualizar(){
                
            $medico = new MedicoModel();
            $medicoDAO = new MedicoDAO();
           
            $medico->__set('MED_ID', $_POST['id']);
            $medico->__set('MED_CRM', $_POST['crm']);
            $medico->__set('MED_TELEFONE_PROFISSIONAL', $_POST['telefone_profissional']);
            $medico->__set('MED_EMAIL_PROFISSIONAL', $_POST['email_profissional']);
            $medico->__set('MED_PRONTUARIO', $_POST['prontuario']);
            $medico->__set('MED_VALOR_CONSULTA', $_POST['valor_consulta']);
            $medico->__set('MED_OBSERVACAO', $_POST['observacao']);
            $medico->__set('MED_FORMACAO', $_POST['formacao']);
            $medico->__set('FK_USUARIOS_USU_ID', $_POST['usuario']);   
            
            $medicoDAO->alterar($medico); 

            header('Location: /pacientes?msg=editar-sucesso');     
        
        }

        
        public function excluir()
        {
            $medicoDAO = new MedicoDAO(); 
            if(isset($_GET['id'])){
                $medicoDAO->excluir($_GET['id']); 
                header('Location: /pacientes?msg=exclusao-sucesso');
            }

        }

        public function msgs(){     
            
            if(isset($_GET['msg'])){
                
                if($_GET['msg'] == 'cadastro-sucesso')
                {
                    $msg = "Cadastro do médico realizado com sucesso!";
                }
                if($_GET['msg'] == 'editar-sucesso')
                {
                    $msg = "Médico atualizado com sucesso!";
                }
                if($_GET['msg'] == 'exclusao-sucesso')
                {
                    $msg = "Médico excluído com sucesso!";
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