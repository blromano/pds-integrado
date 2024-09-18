<?php
    namespace App\Controller; //Faz parte do Namespace App\Controller

    use FW\Controller\Action; //utilizando outros namespaces, dessa forma não precisamos dar includes em arquivos
    use App\Model\PagamentosModel;
    use App\DAO\PagamentosDAO;


    class PagamentosController extends Action {

        
        
        //Método para Carregar a View do Formulário de Cadastro de um tipo de remédio
        public function cadastrar(){

            $title = "Cadastro de Pagamento"; //Utilizado para o <title> de cada página
            //para passar valores para a VIEW
            $this->getView()->title = $title; // passa para a View o valor da variável $title utilizado na linha 14 do arquivo dashboard.php da pasta View

            if(isset($_GET['status'])){
                $this->getView()->status = $_GET['status'];
            } else {
                $this->getView()->status = '' ;
            } 
            
            $this->render('cadastroPagamento/index', 'dashboard'); //Carrega o arquivo que esta dentro da pasta View/tipoRemedio/cadastroTipoRemedio/index
        }

        //Método de Inserção do Formulário de Cadastro de Tipo de Remédio
        public function inserir(){
            
            $pagamento = new PagamentosModel(); //Instanciando a Classe TiposRemediosModel
            $PagamentosDAO = new PagamentosDAO(); // Instanciando a Classe TiposRemediosDAO
            if(!isset($_POST['PAG_DATAPAGAMENTO']) || 
            !isset($_POST['PAG_VALORPAGAMENTO']) || 
            !isset($_POST['PAG_DATAVENCIMENTO']) || 
            !isset($_POST['FK_PLANOS_PLA_ID']) || 
            !isset($_POST['FK_PACIENTES_PAC_ID'])){ //Verificando se os dados que estão vindo do formulário existem
                header('Location: /pagamentos?status=203'); //Redirecionando caso os dados não existam
                die(); //Matando o processo para não executar as linhas 38, 39, 40, 42, 44 deste método
            } 
            $pagamento->__set('PAG_DATAPAGAMENTO', $_POST['PAG_DATAPAGAMENTO']); //Passando os dados vindos do POST do Formulário para os Métodos Set de TipoRemedioModal
            $pagamento->__set('PAG_VALORPAGAMENTO', $_POST['PAG_VALORPAGAMENTO']);
            $pagamento->__set('PAG_DATAVENCIMENTO', $_POST['PAG_DATAVENCIMENTO']);
            $pagamento->__set('FK_PLANOS_PLA_ID', $_POST['FK_PLANOS_PLA_ID']);
            $pagamento->__set('FK_PACIENTES_PAC_ID', $_POST['FK_PACIENTES_PAC_ID']);

            //print_r($pagamento);
           // exit(0);
            
            $PagamentosDAO->inserir($pagamento); //Executando o método Inserir da Classe TiposRemediosDAO, com passagem de parâmetro o Objeto Tipo remedio

            header('Location: /pagamentos?msg=cadastro-sucesso'); //redireciona para /tiposRemedios apos inserir tipo remédio         

        }

        //Método para carregar a View de Listagem de todos os Tipo de Remédios Cadastrados
        public function listagem(){
            $title = "Listagem dos Pagamentos";
            //para passar valores para a VIEW
            $this->getView()->title = $title;     
            
            if(isset($_GET['msg'])){
                    
                    if($_GET['msg'] == 'cadastro-sucesso')
                    {
                        $msg = "Pagamento cadastrado  com sucesso!";
                    }
                    if($_GET['msg'] == 'editar-sucesso')
                    {
                        $msg = "Pagamento atualizado com sucesso!";
                    }
                    if($_GET['msg'] == 'exclusao-sucesso')
                    {
                        $msg = "Pagamento excluído com sucesso!";
                    }
                    
                    $this->getView()->msg = $msg;
                } else {
                    $this->getView()->msg = '' ;
                }
            
    
            $pagamentos;
            $PagamentosDAO = new PagamentosDAO();            
            $pagamentos = $PagamentosDAO->listar(); 
            $this->getView()->pagamentos = $pagamentos;                      
            $this->render('index', 'dashboard', ''); //Carrega  o arquivo da pasta View/tipoRemedio/index.php
        }    

        
        //Método que carrega o Formulário de edição de Tipo de Remédio
        public function editar(){                  
            
            $pagamento = new PagamentosModel();
            $PagamentosDAO = new PagamentosDAO();            
            
            if(isset($_GET['id'])){
                $pagamento = $PagamentosDAO->buscarPorId($_GET['id']); //Pega o tipo de remédio selecionado

                $this->getView()->pagamento = $pagamento;
            } else {
                $this->getView()->pagamento = '' ;
            }            
           
            $title = "Edição de Pagamento";
            //para passar valores para a VIEW
            $this->getView()->title = $title;
            $this->render('editarPagamento/index', 'dashboard', ''); //Carrega o arquivo da pasta View/tiposRemedios/editarPaciente/index.php
        }

        //Método para atualizar os dados do cadastro vindo do formulário de edição
        public function atualizar(){
                
            $pagamento = new PagamentosModel();
            $PagamentosDAO = new PagamentosDAO();
           
            $pagamento->__set('PAG_ID', $_POST['id']); //não pode ser o próprio ID da tabela, tem que ser o do Campo hidden
            $pagamento->__set('PAG_DATAPAGAMENTO', $_POST['PAG_DATAPAGAMENTO']);
            $pagamento->__set('PAG_VALORPAGAMENTO', $_POST['PAG_VALORPAGAMENTO']);
            $pagamento->__set('PAG_DATAVENCIMENTO', $_POST['PAG_DATAVENCIMENTO']);
            $pagamento->__set('FK_PLANOS_PLA_ID', $_POST['FK_PLANOS_PLA_ID']);
            $pagamento->__set('FK_PACIENTES_PAC_ID', $_POST['FK_PACIENTES_PAC_ID']);
            
            $PagamentosDAO->alterar($pagamento); //Passando o Objeto para o método Alterar de PacienteDAO

            header('Location: /pagamentos?msg=editar-sucesso'); //redireciona para /pacientes após alteração               
        
        }

        //Método para Excluir um cadastro do Tipo de Remédio
        public function excluir()
        {
            $PagamentosDAO = new PagamentosDAO(); 
            if(isset($_GET['id'])){
                $PagamentosDAO->excluir($_GET['id']); //Pega o ID do Tipo de Remédio a ser excluido, aciona o médoto excluir de TiposRemediosDAO
                header('Location: /pagamentos?msg=exclusao-sucesso'); //redireciona para /TipsoRemedios após exclusão
            }    
        }

        //Mensagens de Alerta personalizadas para cada método
        // public function msgs(){     
            
        //     if(isset($_GET['msg'])){
                
        //         if($_GET['msg'] == 'cadastro-sucesso')
        //         {
        //             $msg = "Cadastro do Pagamento realizado com sucesso!";
        //         }
        //         if($_GET['msg'] == 'editar-sucesso')
        //         {
        //             $msg = "Pagamento atualizado com sucesso!";
        //         }
        //         if($_GET['msg'] == 'exclusao-sucesso')
        //         {
        //             $msg = "Pagamento excluído com sucesso!";
        //         }
                
        //         $this->getView()->msg = $msg;
        //     } else {
        //         $this->getView()->msg = '' ;
        //     }

        //     $this->render('msgs', 'pagamento', '');
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