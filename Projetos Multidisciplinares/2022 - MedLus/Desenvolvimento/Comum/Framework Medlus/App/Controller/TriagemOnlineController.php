<?php
    namespace App\Controller; //Faz parte do Namespace App\Controller

    use FW\Controller\Action; //utilizando outros namespaces, dessa forma não precisamos dar includes em arquivos
    use App\Model\TriagemOnlineModel;
    use App\DAO\TriagemOnlineDAO;


    class TriagemOnlineController extends Action {
        
        
        //Método para Carregar a View do Formulário de Cadastro da Triagem Online
        public function cadastrar(){

            $title = "Triagem Online";
            $this->getView()->title = $title; 

            if(isset($_GET['status'])){
                $this->getView()->status = $_GET['status'];
            } else {
                $this->getView()->status = '' ;
            } 
            
            $this->render('cadastroTriagemOnline/index', 'dashboard', ''); //Carrega o arquivo que esta dentro da pasta View/triagemOnline/cadastroTriagemOnline/index
        }

        //Método de Inserção do Formulário de Cadastro de Triagem Online
        public function inserir(){
            
           $triagemonline = new TriagemOnlineModel(); //Instanciando a Classe TriagemOnlineModel
            $TriagemOnlineDAO = new TriagemOnlineDAO(); // Instanciando a Classe TriagemOnlineDAO
            /* if( !isset($_POST['TRO_COLESTEROL']) || 
                !isset($_POST['TRO_FALTA_DE_AR']) ||
                !isset($_POST['TRO_PESO']) || 
                !isset($_POST['TRO_DOR_NO_CORPO']) ||
                !isset($_POST['TRO_DOR_DE_GARGANTA']) || 
                !isset($_POST['TRO_VOMITO']) ||
                !isset($_POST['TRO_CORIZA']) || 
                !isset($_POST['TRO_DOR_DE_CABECA']) ||
                !isset($_POST['TRO_DIABETES']) || 
                !isset($_POST['TRO_TOSSE']) ||
                !isset($_POST['TRO_DIARREIA']) || 
                !isset($_POST['TRO_FEBRE']) ||
                !isset($_POST['TRO_LESAO']) || 
                !isset($_POST['TRO_HIPERTENSAO']) || 
                !isset($_POST['TRO_SINTOMAS_ADICIONAIS']) || 
                !isset($_POST['FK_CONSULTAS_ONLINE_CTO_ID'])  
                ){ 
                    //Verificando se os dados que estão vindo do formulário existem
                
                header('Location: /triagemonline/cadastrar?status=203'); //Redirecionando caso os dados não existam
                die(); //Matando o processo para não executar as linhas 38, 39, 40, 42, 44 deste método
            } */

            //Passando os dados vindos do POST do Formulário para os Métodos Set de TriagemOnlineModal
            
            $SINTOMASC = $_POST['SINTOMASC'];

            //print_r($SINTOMASC); 
            //exit(0); 


            if(isset(($_POST['SINTOMASC'][0])))
            {
                $coriza = $_POST['SINTOMASC'][0];
                $triagemonline->__set('TRO_CORIZA', 1);                 
            }    
            else{
                $triagemonline->__set('TRO_CORIZA', 0);                 
            }

            if(isset(($_POST['SINTOMASC'][1])))
            {
                $febre = $_POST['SINTOMASC'][1];
                
                $triagemonline->__set('TRO_FEBRE', 1);
            }
            else{
                $triagemonline->__set('TRO_FEBRE', 0); 
            }

            if(isset(($_POST['SINTOMASC'][2])))
            {
                $falta_de_ar = $_POST['SINTOMASC'][2];
                
                $triagemonline->__set('TRO_FALTA_DE_AR', 1);
                
            }
            else{
                $triagemonline->__set('TRO_FALTA_DE_AR', 0); 
            }
            
            if(isset(($_POST['SINTOMASC'][3])))
            {
                $dor_de_cabeca = $_POST['SINTOMASC'][3];
                
                $triagemonline->__set('TRO_DOR_DE_CABECA', 1);
                
            }
            else{
                $triagemonline->__set('TRO_DOR_DE_CABECA', 0); 
            }
            
            if(isset(($_POST['SINTOMASC'][4])))
            {
                $dor_no_corpo = $_POST['SINTOMASC'][4];
                
                $triagemonline->__set('TRO_DOR_NO_CORPO', 1);
                
            }
            else{
                $triagemonline->__set('TRO_DOR_NO_CORPO', 0); 
            }

            if(isset(($_POST['SINTOMASC'][5])))
            {
                $dor_de_garganta = $_POST['SINTOMASC'][5];
                
                $triagemonline->__set('TRO_DOR_DE_GARGANTA', 1); 
                
            }
            else{
                $triagemonline->__set('TRO_DOR_DE_GARGANTA', 0); 
            }

            if(isset(($_POST['SINTOMASC'][6])))
            {
                $tosse = $_POST['SINTOMASC'][6];
                
                $triagemonline->__set('TRO_TOSSE', 1);
                
            }
            else{
                $triagemonline->__set('TRO_TOSSE', 0); 
            }

            if(isset(($_POST['SINTOMASC'][7])))
            {
                $vomito = $_POST['SINTOMASC'][7];
                
                $triagemonline->__set('TRO_VOMITO', 1);
                
            }
            else{
                $triagemonline->__set('TRO_VOMITO', 0); 
            }

            if(isset(($_POST['SINTOMASC'][8])))
            {
                $diarreia = $_POST['SINTOMASC'][8];
                
                $triagemonline->__set('TRO_DIARREIA', 1);
                
            }
            else{
                $triagemonline->__set('TRO_DIARREIA', 0); 
            }

            $colesterol = $_POST['TRO_COLESTEROL'];
            $peso = $_POST['TRO_PESO'];
            $diabetes = $_POST['TRO_DIABETES'];
            $lesao = $_POST['TRO_LESAO'];
            $hipertensao = $_POST['TRO_HIPERTENSAO'];
            $sintomas_adicionais = $_POST['TRO_SINTOMAS_ADICIONAIS'];
            $consultas_online_id = $_POST['FK_CONSULTAS_ONLINE_CTO_ID'];

            
            $triagemonline->__set('TRO_COLESTEROL', $colesterol); 
            $triagemonline->__set('TRO_PESO', $peso); 
            $triagemonline->__set('TRO_DIABETES', $diabetes); 
            $triagemonline->__set('TRO_LESAO', $lesao); 
            $triagemonline->__set('TRO_HIPERTENSAO', $hipertensao);
            $triagemonline->__set('TRO_SINTOMAS_ADICIONAIS', $sintomas_adicionais);
            $triagemonline->__set('FK_CONSULTAS_ONLINE_CTO_ID', $consultas_online_id);

            
            $TriagemOnlineDAO->inserir($triagemonline); //Executando o método Inserir da Classe TriagemOnlineDAO, com passagem de parâmetro o Objeto triagemonline

            header('Location: /../consultasOnline/listagem'); //redireciona para /triagemonline apos inserir triagem         

        }

        //Método para carregar a View de Listagem de todas as Triagens Online Cadastradas
        public function listagem(){
            $title = "Listagem de Triagem Online";
            //para passar valores para a VIEW
            $this->getView()->title = $title;

            $TriagemOnlineDAO = new TriagemOnlineDAO();            
            $triagensonline = $TriagemOnlineDAO->listar(); 
            $this->getView()->triagensonline = $triagensonline;                      
            $this->render('VisTriagemOnline/index', 'dashboard', ''); //Carrega  o arquivo da pasta View/triagemOnline/VisTriagemOnline/index.php
        }    

        
        //Método que carrega o Formulário de edição de Triagem Online
        public function editar(){                  
            
            $triagemonline = new TriagemOnlineModel();
            $TriagemOnlineDAO = new TriagemOnlineDAO();            
            
            if(isset($_GET['id'])){
                $triagemonline = $TriagemOnlineDAO->buscarPorId($_GET['id']); //Pega a Triagem Online selecionada

                $this->getView()->triagemonline = $triagemonline;
            } else {
                $this->getView()->triagemonline = '' ;
            }            
            
            $title = "Edição da Triagem Online";
            //para passar valores para a VIEW
            $this->getView()->title = $title;
            $this->render('editarTriagemOnline/index', 'dashboard', ''); //Carrega o arquivo da pasta View/triagemOnline/editarTriagemOnline/index.php
        }

        //Método para atualizar os dados do cadastro vindo do formulário de edição
        public function atualizar(){
                
            $triagemonline = new TriagemOnlineModel();
            $TriagemOnlineDAO = new TriagemOnlineDAO();
            

            //não pode ser o próprio ID da tabela, tem que ser o do Campo hidden
            $triagemonline->__set('TRO_COLESTEROL', $_POST['TRO_COLESTEROL']);  
            $triagemonline->__set('TRO_FALTA_DE_AR', $_POST['TRO_FALTA_DE_AR']);
            $triagemonline->__set('TRO_PESO', $_POST['TRO_PESO']);  
            $triagemonline->__set('TRO_DOR_NO_CORPO', $_POST['TRO_DOR_NO_CORPO']);  
            $triagemonline->__set('TRO_DOR_DE_GARGANTA', $_POST['TRO_DOR_DE_GARGANTA']);
            $triagemonline->__set('TRO_VOMITO', $_POST['TRO_VOMITO']); 
            $triagemonline->__set('TRO_CORIZA', $_POST['TRO_CORIZA']);  
            $triagemonline->__set('TRO_DOR_DE_CABECA', $_POST['TRO_DOR_DE_CABECA']);
            $triagemonline->__set('TRO_DIABETES', $_POST['TRO_DIABETES']); 
            $triagemonline->__set('TRO_TOSSE', $_POST['TRO_TOSSE']);  
            $triagemonline->__set('TRO_DIARREIA', $_POST['TRO_DIARREIA']);
            $triagemonline->__set('TRO_FEBRE', $_POST['TRO_FEBRE']); 
            $triagemonline->__set('TRO_LESAO', $_POST['TRO_LESAO']);  
            $triagemonline->__set('TRO_HIPERTENSAO', $_POST['TRO_HIPERTENSAO']);
            $triagemonline->__set('TRO_SINTOMAS_ADICIONAIS', $_POST['TRO_SINTOMAS_ADICIONAIS']);
            $triagemonline->__set('FK_CONSULTAS_ONLINE_CTO_ID', $_POST['FK_CONSULTAS_ONLINE_CTO_ID']);               
            
            $TriagemOnlineDAO->alterar($triagemonline); //Passando o Objeto para o método Alterar de TriagemOnlineDAO

            header('Location: /triagemonline?msg=editar-sucesso'); //redireciona para /triagemonline após alteração               
        
        }

        //Método para Excluir um cadastro do Triagem Online
        public function excluir()
        {
            $TriagemOnlineDAO = new TriagemOnlineDAO(); 
            if(isset($_GET['id'])){
                $TriagemOnlineDAO->excluir($_GET['id']); //Pega o ID da Triagem Online a ser excluida, aciona o médoto excluir de TriagemOnlineDAO
                header('Location: /triagemonline?msg=exclusao-sucesso'); //redireciona para /TriagemOnline após exclusão
            }    
        }

        //Mensagens de Alerta personalizadas para cada método
        public function msgs(){     
            
            if(isset($_GET['msg'])){
                
                if($_GET['msg'] == 'cadastro-sucesso')
                {
                    $msg = "Cadastro da Triagem Online realizado com sucesso!";
                }
                if($_GET['msg'] == 'editar-sucesso')
                {
                    $msg = "Triagem Online atualizada com sucesso!";
                }
                if($_GET['msg'] == 'exclusao-sucesso')
                {
                    $msg = "Triagem Online excluída com sucesso!";
                }
                
                $this->getView()->msg = $msg;
            } else {
                $this->getView()->msg = '' ;
            }

            $this->render('msgs', 'triagemonline', '');
        }


        //método para verificar a autenticação do Triagem Online
        public function validaAutenticacao(){
            if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
                header('Location: /login');
                die();
            }

        }

    } 

?>