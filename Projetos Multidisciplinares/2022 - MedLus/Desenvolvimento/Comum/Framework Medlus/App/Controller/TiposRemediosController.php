<?php
    namespace App\Controller; //Faz parte do Namespace App\Controller

    use FW\Controller\Action; //utilizando outros namespaces, dessa forma não precisamos dar includes em arquivos
    use App\Model\TiposRemediosModel;
    use App\DAO\TiposRemediosDAO;


    class TiposRemediosController extends Action {

        
        
        //Método para Carregar a View do Formulário de Cadastro de um tipo de remédio
        public function cadastrar(){

            $title = "Cadastro de Tipo de Remédio"; //Utilizado para o <title> de cada página
            //para passar valores para a VIEW
            $this->getView()->title = $title; // passa para a View o valor da variável $title utilizado na linha 14 do arquivo dashboard.php da pasta View

            if(isset($_GET['status'])){
                $this->getView()->status = $_GET['status'];
            } else {
                $this->getView()->status = '' ;
            } 
            
            $this->render('cadastroTipoRemedio/index', 'dashboard'); //Carrega o arquivo que esta dentro da pasta View/tipoRemedio/cadastroTipoRemedio/index
        }

        //Método de Inserção do Formulário de Cadastro de Tipo de Remédio
        public function inserir(){
            
            $tiporemedio = new TiposRemediosModel(); //Instanciando a Classe TiposRemediosModel
            $TiposRemediosDAO = new TiposRemediosDAO(); // Instanciando a Classe TiposRemediosDAO
             if(!isset($_POST['TIP_NOME']) || 
            !isset($_POST['TIP_OBSERVACOES'])){ 
                //Verificando se os dados que estão vindo do formulário existem
                header('Location: /tipoRemedio/cadastrar?status=203'); //Redirecionando caso os dados não existam
                die(); //Matando o processo para não executar as linhas 38, 39, 40, 42, 44 deste método
            } 
            $tiporemedio->__set('TIP_NOME', $_POST['TIP_NOME']); //Passando os dados vindos do POST do Formulário para os Métodos Set de TipoRemedioModal
            $tiporemedio->__set('TIP_OBSERVACOES', $_POST['TIP_OBSERVACOES']);
            
            $TiposRemediosDAO->inserir($tiporemedio); //Executando o método Inserir da Classe TiposRemediosDAO, com passagem de parâmetro o Objeto Tipo remedio

            header('Location: /tiposRemedios?msg=cadastro-sucesso'); //redireciona para /tiposRemedios apos inserir tipo remédio         

        }

        //Método para carregar a View de Listagem de todos os Tipo de Remédios Cadastrados
        public function listagem(){
            $title = "Listagem dos Tipos de Remédios";
            //para passar valores para a VIEW
            $this->getView()->title = $title;

            //msgs de sucesso
            if(isset($_GET['msg'])){
                
                if($_GET['msg'] == 'cadastro-sucesso')
                {
                    $msg = "Cadastro do Tipo de Remédio realizado com sucesso!";
                }
                if($_GET['msg'] == 'editar-sucesso')
                {
                    $msg = "Tipo de Remédio atualizado com sucesso!";
                }
                if($_GET['msg'] == 'exclusao-sucesso')
                {
                    $msg = "Tipo de Remédio excluído com sucesso!";
                }
                
                $this->getView()->msg = $msg;
            } else {
                $this->getView()->msg = '' ;
            }

            $tipos_remedios;
            $TiposRemediosDAO = new TiposRemediosDAO();            
            $tipos_remedios = $TiposRemediosDAO->listar(); 
            $this->getView()->tipos_remedios = $tipos_remedios;                      
            $this->render('index', 'dashboard', ''); //Carrega  o arquivo da pasta View/tipoRemedio/index.php   
        }    

        
        //Método que carrega o Formulário de edição de Tipo de Remédio
        public function editar(){                  
            
            $tiporemedio = new TiposRemediosModel();
            $TiposRemediosDAO = new TiposRemediosDAO();            
            
            if(isset($_GET['id'])){
                $tiporemedio = $TiposRemediosDAO->buscarPorId($_GET['id']); //Pega o tipo de remédio selecionado

                $this->getView()->tiporemedio = $tiporemedio;
            } else {
                $this->getView()->tiporemedio = '' ;
            }            
           
            $title = "Edição de Tipo de Remédios";
            //para passar valores para a VIEW
            $this->getView()->title = $title;
            $this->render('editarTipoRemedio/index', 'dashboard', ''); //Carrega o arquivo da pasta View/tiposRemedios/editarPaciente/index.php
        }

        //Método para atualizar os dados do cadastro vindo do formulário de edição
        public function atualizar(){
                
            $tiporemedio = new TiposRemediosModel();
            $TiposRemediosDAO = new TiposRemediosDAO();
           
            $tiporemedio->__set('TIP_ID', $_POST['id']); //não pode ser o próprio ID da tabela, tem que ser o do Campo hidden
            $tiporemedio->__set('TIP_NOME', $_POST['TIP_NOME']);
            $tiporemedio->__set('TIP_OBSERVACOES', $_POST['TIP_OBSERVACOES']);
            
            $TiposRemediosDAO->alterar($tiporemedio); //Passando o Objeto para o método Alterar de PacienteDAO

            header('Location: /tiposRemedios?msg=editar-sucesso'); //redireciona para /pacientes após alteração               
        
        }

        //Método para Excluir um cadastro do Tipo de Remédio
        public function excluir()
        {
            $TiposRemediosDAO = new TiposRemediosDAO(); 
            if(isset($_GET['id'])){
                $TiposRemediosDAO->excluir($_GET['id']); //Pega o ID do Tipo de Remédio a ser excluido, aciona o médoto excluir de TiposRemediosDAO
                header('Location: /tiposRemedios?msg=exclusao-sucesso'); //redireciona para /TipsoRemedios após exclusão
            }    
        }

        //Mensagens de Alerta personalizadas para cada método
        // public function msgs(){     
            
        //     if(isset($_GET['msg'])){
                
        //         if($_GET['msg'] == 'cadastro-sucesso')
        //         {
        //             $msg = "Cadastro do Tipo de Remédio realizado com sucesso!";
        //         }
        //         if($_GET['msg'] == 'editar-sucesso')
        //         {
        //             $msg = "Tipo de Remédio atualizado com sucesso!";
        //         }
        //         if($_GET['msg'] == 'exclusao-sucesso')
        //         {
        //             $msg = "Tipo de Remédio excluído com sucesso!";
        //         }
                
        //         $this->getView()->msg = $msg;
        //     } else {
        //         $this->getView()->msg = '' ;
        //     }

        //     $this->render('msgs', 'tipoRemedio', '');
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