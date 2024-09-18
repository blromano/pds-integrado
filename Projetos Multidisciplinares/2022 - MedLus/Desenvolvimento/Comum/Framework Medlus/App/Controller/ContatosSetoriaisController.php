<?php
    namespace App\Controller; //Faz parte do Namespace App\Controller

    use FW\Controller\Action; //utilizando outros namespaces, dessa forma não precisamos dar includes em arquivos
    use App\Model\ContatosSetoriaisModel;
    use App\DAO\ContatosSetoriaisDAO;


    class ContatosSetoriaisController extends Action {

        
        
        //Método para Carregar a View do Formulário de Cadastro de um tipo de remédio
        public function cadastrar(){

            $title = "Cadastro de Contatos"; //Utilizado para o <title> de cada página
            //para passar valores para a VIEW
            $this->getView()->title = $title; // passa para a View o valor da variável $title utilizado na linha 14 do arquivo dashboard.php da pasta View

            if(isset($_GET['status'])){
                $this->getView()->status = $_GET['status'];
            } else {
                $this->getView()->status = '' ;
            } 
            
            $this->render('cadastroContatoSetorial/index', 'dashboard'); //Carrega o arquivo que esta dentro da pasta View/tipoRemedio/cadastroTipoRemedio/index
        }

        //Método de Inserção do Formulário de Cadastro de Tipo de Remédio
        public function inserir(){
            
            $contatosetorial = new ContatosSetoriaisModel(); //Instanciando a Classe TiposRemediosModel
            $ContatosSetoriaisDAO = new ContatosSetoriaisDAO(); // Instanciando a Classe TiposRemediosDAO
            if(!isset($_POST['CTT_RESPONSAVEL']) || 
            !isset($_POST['CTT_EMAIL']) || 
            !isset($_POST['CTT_TELEFONE']) || 
            !isset($_POST['CTT_SETOR']) || 
            !isset($_POST['CTT_WHATSAAP']) || 
            !isset($_POST['FK_SECRETARIAS_SEC_ID'])){ //Verificando se os dados que estão vindo do formulário existem
                header('Location: /contatosSetoriais?status=203'); //Redirecionando caso os dados não existam
                die(); //Matando o processo para não executar as linhas 38, 39, 40, 42, 44 deste método
            } 
            $contatosetorial->__set('CTT_RESPONSAVEL', $_POST['CTT_RESPONSAVEL']); //Passando os dados vindos do POST do Formulário para os Métodos Set de TipoRemedioModal
            $contatosetorial->__set('CTT_EMAIL', $_POST['CTT_EMAIL']);
            $contatosetorial->__set('CTT_TELEFONE', $_POST['CTT_TELEFONE']);
            $contatosetorial->__set('CTT_SETOR', $_POST['CTT_SETOR']);
            $contatosetorial->__set('CTT_WHATSAAP', $_POST['CTT_WHATSAAP']);
            $contatosetorial->__set('FK_SECRETARIAS_SEC_ID', $_POST['FK_SECRETARIAS_SEC_ID']);

            //print_r($contatosetorial);
           // exit(0);
            
            $ContatosSetoriaisDAO->inserir($contatosetorial); //Executando o método Inserir da Classe TiposRemediosDAO, com passagem de parâmetro o Objeto Tipo remedio

            header('Location: /contatosSetoriais?msg=cadastro-sucesso'); //redireciona para /tiposRemedios apos inserir tipo remédio         

        }

        //Método para carregar a View de Listagem de todos os Tipo de Remédios Cadastrados
        public function listagem(){
            $title = "Listagem dos Contatos";
            //para passar valores para a VIEW
            $this->getView()->title = $title;
            if(isset($_GET['msg'])){
                
                if($_GET['msg'] == 'cadastro-sucesso')
                {
                    $msg = "Cadastro do Contato realizado com sucesso!";
                }
                if($_GET['msg'] == 'editar-sucesso')
                {
                    $msg = "Contato atualizado com sucesso!";
                }
                if($_GET['msg'] == 'exclusao-sucesso')
                {
                    $msg = "Contato excluído com sucesso!";
                }
                
                $this->getView()->msg = $msg;
            } else {
                $this->getView()->msg = '' ;
            }
            $contatos_setoriais;
            $ContatosSetoriaisDAO = new ContatosSetoriaisDAO();            
            $contatos_setoriais = $ContatosSetoriaisDAO->listar(); 
            $this->getView()->contatos_setoriais = $contatos_setoriais;                      
            $this->render('index', 'dashboard', ''); //Carrega  o arquivo da pasta View/tipoRemedio/index.php
        }    

        
        //Método que carrega o Formulário de edição de Tipo de Remédio
        public function editar(){                  
            
            $contatosetorial = new ContatosSetoriaisModel();
            $ContatosSetoriaisDAO = new ContatosSetoriaisDAO();            
            
            if(isset($_GET['id'])){
                $contatosetorial = $ContatosSetoriaisDAO->buscarPorId($_GET['id']); //Pega o tipo de remédio selecionado

                $this->getView()->contatosetorial = $contatosetorial;
            } else {
                $this->getView()->contatosetorial = '' ;
            }            
           
            $title = "Edição de Contato";
            //para passar valores para a VIEW
            $this->getView()->title = $title;
            $this->render('editarContatoSetorial/index', 'dashboard', ''); //Carrega o arquivo da pasta View/tiposRemedios/editarPaciente/index.php
        }

        //Método para atualizar os dados do cadastro vindo do formulário de edição
        public function atualizar(){
                
            $contatosetorial = new ContatosSetoriaisModel();
            $ContatosSetoriaisDAO = new ContatosSetoriaisDAO();
           
            $contatosetorial->__set('CTT_ID', $_POST['id']); //não pode ser o próprio ID da tabela, tem que ser o do Campo hidden
            $contatosetorial->__set('CTT_RESPONSAVEL', $_POST['CTT_RESPONSAVEL']);
            $contatosetorial->__set('CTT_EMAIL', $_POST['CTT_EMAIL']);
            $contatosetorial->__set('CTT_TELEFONE', $_POST['CTT_TELEFONE']);
            $contatosetorial->__set('CTT_SETOR', $_POST['CTT_SETOR']);
            $contatosetorial->__set('CTT_WHATSAAP', $_POST['CTT_WHATSAAP']);
            $contatosetorial->__set('FK_SECRETARIAS_SEC_ID', $_POST['FK_SECRETARIAS_SEC_ID']);
            
            $ContatosSetoriaisDAO->alterar($contatosetorial); //Passando o Objeto para o método Alterar de PacienteDAO

            header('Location: /contatosSetoriais?msg=editar-sucesso'); //redireciona para /pacientes após alteração               
        
        }

        //Método para Excluir um cadastro do Tipo de Remédio
        public function excluir()
        {
            $ContatosSetoriaisDAO = new ContatosSetoriaisDAO(); 
            if(isset($_GET['id'])){
                $ContatosSetoriaisDAO->excluir($_GET['id']); //Pega o ID do Tipo de Remédio a ser excluido, aciona o médoto excluir de TiposRemediosDAO
                header('Location: /contatosSetoriais?msg=exclusao-sucesso'); //redireciona para /TipsoRemedios após exclusão
            }    
        }

        // //Mensagens de Alerta personalizadas para cada método
        // public function msgs(){     
            
        //     if(isset($_GET['msg'])){
                
        //         if($_GET['msg'] == 'cadastro-sucesso')
        //         {
        //             $msg = "Cadastro do Contato realizado com sucesso!";
        //         }
        //         if($_GET['msg'] == 'editar-sucesso')
        //         {
        //             $msg = "Contato atualizado com sucesso!";
        //         }
        //         if($_GET['msg'] == 'exclusao-sucesso')
        //         {
        //             $msg = "Contato excluído com sucesso!";
        //         }
                
        //         $this->getView()->msg = $msg;
        //     } else {
        //         $this->getView()->msg = '' ;
        //     }

        //     $this->render('msgs', 'contatoSetorial', '');
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