<?php
    namespace App\Controller; //Faz parte do Namespace App\Controller

    use FW\Controller\Action; //utilizando outros namespaces, dessa forma não precisamos dar includes em arquivos
    use App\Model\EspecialidadesMedicasModel;
    use App\DAO\EspecialidadesMedicasDAO;


    class EspecialidadesMedicasController extends Action {

        
        
        //Método para Carregar a View do Formulário de Cadastro de um tipo de remédio
        public function cadastrar(){

            $title = "Cadastro de Especialidades Medicas"; //Utilizado para o <title> de cada página
            //para passar valores para a VIEW
            $this->getView()->title = $title; // passa para a View o valor da variável $title utilizado na linha 14 do arquivo dashboard.php da pasta View

            if(isset($_GET['status'])){
                $this->getView()->status = $_GET['status'];
            } else {
                $this->getView()->status = '' ;
            } 
            
            $this->render('cadastroespecialidade/index', 'dashboard'); //Carrega o arquivo que esta dentro da pasta View/tipoRemedio/cadastroTipoRemedio/index
        }

        //Método de Inserção do Formulário de Cadastro de Tipo de Remédio
        public function inserir(){
            
            $EspecialidadesMedica = new EspecialidadesMedicasModel(); //Instanciando a Classe TiposRemediosModel
            $EspecialidadesMedicasDAO = new EspecialidadesMedicasDAO(); // Instanciando a Classe TiposRemediosDAO
            // if(!isset($_POST['ESP_NOME'])  ){ //Verificando se os dados que estão vindo do formulário existem
            //     header('Location: /EspecialidadesMedica?status=203'); //Redirecionando caso os dados não existam
            //     die(); //Matando o processo para não executar as linhas 38, 39, 40, 42, 44 deste método
            // } 
            $EspecialidadesMedica->__set('ESP_NOME', $_POST['ESP_NOME']);
            
            $EspecialidadesMedicasDAO->inserir($EspecialidadesMedica); //Executando o método Inserir da Classe TiposRemediosDAO, com passagem de parâmetro o Objeto Tipo remedio

            header('Location: /EspecialidadesMedicas?msg=cadastro-sucesso'); //redireciona para /tiposRemedios apos inserir tipo remédio         

        }

        //Método para carregar a View de Listagem de todos os Tipo de Remédios Cadastrados
        public function listagem(){
            $title = "Listagem das Especialidades Médicas";
            //para passar valores para a VIEW

            $this->getView()->title = $title;
            if(isset($_GET['msg'])){
                
                if($_GET['msg'] == 'cadastro-sucesso')
                {
                    $msg = "Cadastro da Especialidade Médica realizado com sucesso!";
                }
                if($_GET['msg'] == 'editar-sucesso')
                {
                    $msg = "Especialidade Médica atualizada com sucesso!";
                }
                if($_GET['msg'] == 'exclusao-sucesso')
                {
                    $msg = "Especialidade Médica excluída com sucesso!";
                }
                
                $this->getView()->msg = $msg;
            } else {
                $this->getView()->msg = '' ;
            }

        

            $EspecialidadesMedicas;
            $EspecialidadesMedicasDAO = new EspecialidadesMedicasDAO();            
            $EspecialidadesMedicas = $EspecialidadesMedicasDAO->listar(); 
            $this->getView()->EspecialidadesMedicas = $EspecialidadesMedicas;                      
            $this->render('listarespecialidade/index', 'dashboard', ''); //Carrega  o arquivo da pasta View/tipoRemedio/index.php
        }    

        
        //Método que carrega o Formulário de edição de Tipo de Remédio
        public function editar(){                  
            
            $EspecialidadesMedica = new EspecialidadesMedicasModel();
            $EspecialidadesMedicasDAO = new EspecialidadesMedicasDAO();            
            
            if(isset($_GET['id'])){
                $EspecialidadesMedica = $EspecialidadesMedicasDAO->buscarPorId($_GET['id']); //Pega o tipo de remédio selecionado

                $this->getView()->EspecialidadesMedica = $EspecialidadesMedica;
            } else {
                $this->getView()->EspecialidadesMedica = '' ;
            }            
           
            $title = "Edição de Especialidades Medicas";
            //para passar valores para a VIEW
            $this->getView()->title = $title;
            $this->render('editarespecialidade/index', 'dashboard', ''); //Carrega o arquivo da pasta View/tiposRemedios/editarPaciente/index.php
        }

        //Método para atualizar os dados do cadastro vindo do formulário de edição
        public function atualizar(){
                
            $EspecialidadesMedica = new EspecialidadesMedicasModel();
            $EspecialidadesMedicasDAO = new EspecialidadesMedicasDAO();
           
            $EspecialidadesMedica->__set('ESP_ID', $_POST['id']); //não pode ser o próprio ID da tabela, tem que ser o do Campo hidden
            $EspecialidadesMedica->__set('ESP_NOME', $_POST['ESP_NOME']);

            $EspecialidadesMedicasDAO->alterar($EspecialidadesMedica); //Passando o Objeto para o método Alterar de PacienteDAO

            header('Location: /EspecialidadesMedicas?msg=editar-sucesso'); //redireciona para /pacientes após alteração               
        
        }

        //Método para Excluir um cadastro do Tipo de Remédio
        public function excluir()
        {
            $EspecialidadesMedicasDAO = new EspecialidadesMedicasDAO(); 
            if(isset($_GET['id'])){
                $EspecialidadesMedicasDAO->excluir($_GET['id']); //Pega o ID do Tipo de Remédio a ser excluido, aciona o médoto excluir de TiposRemediosDAO
                header('Location: /EspecialidadesMedicas?msg=exclusao-sucesso'); //redireciona para /TipsoRemedios após exclusão
            }    
        }

        // //Mensagens de Alerta personalizadas para cada método
        // public function msgs(){     
            
        //     if(isset($_GET['msg'])){
                
        //         if($_GET['msg'] == 'cadastro-sucesso')
        //         {
        //             $msg = "Cadastro do Especialidades Medica realizado com sucesso!";
        //         }
        //         if($_GET['msg'] == 'editar-sucesso')
        //         {
        //             $msg = "Especialidades Medica atualizado com sucesso!";
        //         }
        //         if($_GET['msg'] == 'exclusao-sucesso')
        //         {
        //             $msg = "Especialidades Medica excluído com sucesso!";
        //         }
                
        //         $this->getView()->msg = $msg;
        //     } else {
        //         $this->getView()->msg = '' ;
        //     }

        //     $this->render('msgs', 'EspecialidadesMedica', '');
        // }


        

        

        //método para verificar a autenticação do tipo de Remédio
        public function validaAutenticacao(){
            /* if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
                header('Location: /login');
                die();
            } */

        }

    } 

?>