<?php
    namespace App\Controller; //Faz parte do Namespace App\Controller

    use FW\Controller\Action; //utilizando outros namespaces, dessa forma não precisamos dar includes em arquivos
    use App\Model\RemediosModel;
    use App\DAO\RemediosDAO;
    use App\DAO\TiposRemediosDAO;


    class RemedioController extends Action {
        //Método para Carregar a View do Formulário de Cadastro de Paciente
        public function cadastrar(){

            $title = "Remedios"; //Utilizado para o <title> de cada página
            //para passar valores para a VIEW
            $this->getView()->title = $title; // passa para a View o valor da variável $title utilizado na linha 14 do arquivo dashboard.php da pasta View

            if(isset($_GET['status'])){
                $this->getView()->status = $_GET['status'];
            } else {
                $this->getView()->status = '' ;
            }
            
            $tipos_remedios;
            $TiposRemediosDAO = new TiposRemediosDAO();            
            $tipos_remedios = $TiposRemediosDAO->listar(); 
            $this->getView()->tipos_remedios = $tipos_remedios;

            
            $this->render('cadastroRemedio/index', 'dashboard'); //Carrega o arquivo que esta dentro da pasta View/remedio/listarremedio/index
        }

        //Método de Inserção do Formulário de Cadastro de Paciente
        public function inserir(){
            
            $remedio = new RemediosModel(); //Instanciando a Classe PacienteModel
            $remediosDAO = new RemediosDAO(); // Instanciando a Classe PacienteDAO
             /* if(!isset($_POST['REM_NOME']) || !isset($_POST['REM_DOSAGEM']) || !isset($_POST['REM_CONTRAINDICACAO']) || !isset($_POST['REM_INDICACAO']) || !isset($_POST['REM_OBSERVACOES']) || !isset($_POST['FK_TIPOS_REMEDIOS_TIP_ID'])){ //Verificando se os dados que estão vindo do formulário existem
                header('Location: /remedios?status=203'); //Redirecionando caso os dados não existam
                die(); //Matando o processo para não executar as linhas 38, 39, 40, 42, 44 deste método
            } */
            $remedio->__set('REM_NOME', $_POST['REM_NOME']);
            $remedio->__set('REM_DOSAGEM', $_POST['REM_DOSAGEM']);
            $remedio->__set('REM_CONTRAINDICACAO', $_POST['REM_CONTRAINDICACAO']);
            $remedio->__set('REM_INDICACAO', $_POST['REM_INDICACAO']);
            $remedio->__set('REM_OBSERVACOES', $_POST['REM_OBSERVACOES']);
            $remedio->__set('FK_TIPOS_REMEDIOS_TIP_ID', $_POST['FK_TIPOS_REMEDIOS_TIP_ID']);     
            $remediosDAO->inserir($remedio); //Executando o método Inserir da Classe PacienteDAO, com passagem de parâmetro o Objeto Paciente

            header('Location: /remedios?msg=cadastro-sucesso'); //redireciona para /pacientes apos inserir paciente         

        }

        //Método para carregar a View de Listagem de todos os Pacientes Cadastrados
        public function listagem(){
            $title = "Cadastro de Remedios";
            //para passar valores para a VIEW
            $this->getView()->title = $title;
            
            if(isset($_GET['msg'])){
                
                if($_GET['msg'] == 'cadastro-sucesso')
                {
                    $msg = "Rémedio cadastrado com sucesso!";
                }
                if($_GET['msg'] == 'editar-sucesso')
                {
                    $msg = "Rémedio atualizado com sucesso!";
                }
                if($_GET['msg'] == 'exclusao-sucesso')
                {
                    $msg = "Rémedio excluído com sucesso!";
                }
                
                $this->getView()->msg = $msg;
            } else {
                $this->getView()->msg = '' ;
            }

            $remedios;
            $remediosDAO = new RemediosDAO();            
            $remedios = $remediosDAO->listar(); 
            $this->getView()->remedios = $remedios;                      
            $this->render('listarRemedio/index', 'dashboard', ''); //Carrega  o arquivo da pasta View/paciente/index.php
        }    

        
        //Método que carrega o Formulário de edição de Paciente
        public function editar(){                  
            
            $remedio = new RemediosModel();
            $remediosDAO = new RemediosDAO();            
            
            if(isset($_GET['id'])){
                $remedio = $remediosDAO->buscarPorId($_GET['id']); //Pega o paciente selecionado

                $this->getView()->remedio = $remedio;
            } else {
                $this->getView()->remedio = '' ;
            }            
            $tipos_remedios;
            $TiposRemediosDAO = new TiposRemediosDAO();            
            $tipos_remedios = $TiposRemediosDAO->listar(); 
            $this->getView()->tipos_remedios = $tipos_remedios;
            $title = "Edição de Remedios";
            //para passar valores para a VIEW
            $this->getView()->title = $title;
            $this->render('editarRemedio/index', 'dashboard', ''); //Carrega o arquivo da pasta View/paciente/editarPaciente/index.php

        }


        //Método para atualizar os dados do cadastro vindo do formulário de edição
        public function atualizar(){
                
            $remedio = new RemediosModel();
            $remediosDAO = new RemediosDAO();

            $remedio->__set('REM_ID', $_POST['id']); //não pode ser o próprio ID da tabela, tem que ser o do Campo hidden
            $remedio->__set('REM_NOME', $_POST['REM_NOME']);
            $remedio->__set('REM_DOSAGEM', $_POST['REM_DOSAGEM']);
            $remedio->__set('REM_CONTRAINDICACAO', $_POST['REM_CONTRAINDICACAO']);
            $remedio->__set('REM_INDICACAO', $_POST['REM_INDICACAO']);
            $remedio->__set('REM_OBSERVACOES', $_POST['REM_OBSERVACOES']);
            $remedio->__set('FK_TIPOS_REMEDIOS_TIP_ID', $_POST['FK_TIPOS_REMEDIOS_TIP_ID']);                
            
            $remediosDAO->alterar($remedio); //Passando o Objeto para o método Alterar de PacienteDAO

            header('Location: /remedios?msg=editar-sucesso'); //redireciona para /pacientes após alteração               
        
        }

        //Método para Excluir um cadastro do Paciente
        public function excluir()
        {
            $remediosDAO = new RemediosDAO(); 
            if(isset($_GET['id'])){
                $remediosDAO->excluir($_GET['id']); //Pega o ID do Paciente a ser excluido, aciona o médoto excluir de PacienteDAO
                header('Location: /remedios?msg=exclusao-sucesso'); //redireciona para /pacientes após exclusão
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