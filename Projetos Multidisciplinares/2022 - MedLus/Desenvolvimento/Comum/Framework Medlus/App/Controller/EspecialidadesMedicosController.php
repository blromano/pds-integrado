<?php
    namespace App\Controller; //Faz parte do Namespace App\Controller

    use FW\Controller\Action; //utilizando outros namespaces, dessa forma não precisamos dar includes em arquivos
    use App\Model\EspecialidadesMedicosModel;
    use App\DAO\EspecialidadesMedicosDAO;
    use App\DAO\EspecialidadesMedicasDAO;


    class EspecialidadesMedicosController extends Action {

        
        
        //Método para Carregar a View do Formulário de Cadastro de um tipo de remédio
        public function cadastrar(){

            $title = "Cadastro de Medicos da Especialidade"; //Utilizado para o <title> de cada página
            //para passar valores para a VIEW
            $this->getView()->title = $title; // passa para a View o valor da variável $title utilizado na linha 14 do arquivo dashboard.php da pasta View

            if(isset($_GET['status'])){
                $this->getView()->status = $_GET['status'];
            } else {
                $this->getView()->status = '' ;
            } 
            $EspecialidadesMedica;
            $EspecialidadesMedicaDAO = new EspecialidadesMedicasDAO();            
            $EspecialidadesMedica = $EspecialidadesMedicaDAO->listar(); 
            $this->getView()->EspecialidadesMedica = $EspecialidadesMedica;
            $this->render('cadastroespecialidadeMed/index', 'dashboard'); //Carrega o arquivo que esta dentro da pasta View/tipoRemedio/cadastroTipoRemedio/index
        }

        //Método de Inserção do Formulário de Cadastro de Tipo de Remédio
        public function inserir(){
            
            $EspecialidadesMedico = new EspecialidadesMedicosModel(); //Instanciando a Classe TiposRemediosModel
            $EspecialidadesMedicosDAO = new EspecialidadesMedicosDAO(); // Instanciando a Classe TiposRemediosDAO
            // if(!isset($_POST['ESP_NOME'])  ){ //Verificando se os dados que estão vindo do formulário existem
            //     header('Location: /EspecialidadesMedico?status=203'); //Redirecionando caso os dados não existam
            //     die(); //Matando o processo para não executar as linhas 38, 39, 40, 42, 44 deste método
            // } 
                                                    //especialidades_medicos
            $EspecialidadesMedico->__set('FK_ESPECIALIDADES_ESP_ID', $_POST['FK_ESPECIALIDADES_ESP_ID']);      //especialidades_medicos
            $EspecialidadesMedico->__set('FK_MEDICOS_MED_ID', $_POST['FK_MEDICOS_MED_ID']);                    //especialidades_medicos
            // $EspecialidadesMedico->__set('USU_NOME', $_POST['USU_NOME']);                                      //usuarios
            // $EspecialidadesMedico->__set('USU_NUMERO_CELULAR', $_POST['USU_NUMERO_CELULAR']);                  //usuarios (Whatsapp)
            // $EspecialidadesMedico->__set('USU_NUMERO_RESIDENCIA', $_POST['USU_NUMERO_RESIDENCIA']);            //usuarios
            // $EspecialidadesMedico->__set('ESP_NOME', $_POST['ESP_NOME']);                                      //especialidades
            // $EspecialidadesMedico->__set('MED_EMAIL_PROFISSIONAL', $_POST['MED_EMAIL_PROFISSIONAL']);          //medicos
            // $EspecialidadesMedico->__set('MED_TELEFONE_PROFISSIONAL', $_POST['MED_TELEFONE_PROFISSIONAL']); 
            $EspecialidadesMedicosDAO->inserir($EspecialidadesMedico); //Executando o método Inserir da Classe TiposRemediosDAO, com passagem de parâmetro o Objeto Tipo remedio

            header('Location: /EspecialidadesMedicas'); //redireciona para /tiposRemedios apos inserir tipo remédio         

        }

        //Método para carregar a View de Listagem de todos os Tipo de Remédios Cadastrados
        public function listagem(){
            $title = "Listagem de Medicos da Especialidade";
            //para passar valores para a VIEW

            $this->getView()->title = $title;
            if(isset($_GET['msg'])){
                
                if($_GET['msg'] == 'cadastro-sucesso')
                {
                    $msg = " Cadastro de Medico da Especialidade realizado com sucesso!";
                }
                if($_GET['msg'] == 'editar-sucesso')
                {
                    $msg = "Medico da Especialidade atualizado com sucesso!";
                }
                if($_GET['msg'] == 'exclusao-sucesso')
                {
                    $msg = "Medico da Especialidade excluído com sucesso!";
                }
                
                $this->getView()->msg = $msg;
            } else {
                $this->getView()->msg = '' ;
            }

        

            $EspecialidadesMedicos = new EspecialidadesMedicosModel();
            $EspecialidadesMedicosDAO = new EspecialidadesMedicosDAO();
            if(isset($_GET['id'])){            
                $EspecialidadesMedicos = $EspecialidadesMedicosDAO->listarMedico($_GET['id']); 
                $this->getView()->EspecialidadesMedicos = $EspecialidadesMedicos;  
            } else {
                $this->getView()->EspecialidadesMedicos= '' ;
            }                          
            $this->render('listarespecialidadeMed/index', 'dashboard', ''); //Carrega  o arquivo da pasta View/tipoRemedio/index.php

        }    

        
        //Método que carrega o Formulário de edição de Tipo de Remédio
        public function editar(){                  
            
            $EspecialidadesMedico ;
            $EspecialidadesMedicosDAO = new EspecialidadesMedicosDAO();            
            
            if(isset($_GET['id'])){
                $EspecialidadesMedico = $EspecialidadesMedicosDAO->buscarPorId($_GET['id']); //Pega o tipo de remédio selecionado

                $this->getView()->EspecialidadesMedico = $EspecialidadesMedico;
            } else {
                $this->getView()->EspecialidadesMedico = '' ;
            }            
            $EspecialidadesMedica;
            $EspecialidadesMedicaDAO = new EspecialidadesMedicasDAO();            
            $EspecialidadesMedica = $EspecialidadesMedicaDAO->listar(); 
            $this->getView()->EspecialidadesMedica = $EspecialidadesMedica;

            // $tipos_remedios;
            // $TiposRemediosDAO = new TiposRemediosDAO();            
            // $tipos_remedios = $TiposRemediosDAO->listar(); 
            // $this->getView()->tipos_remedios = $tipos_remedios;
            $title = "Edição de de Medicos da Especialidade";
            //para passar valores para a VIEW
            $this->getView()->title = $title;
            $this->render('editarespecialidadeMed/index', 'dashboard', ''); //Carrega o arquivo da pasta View/tiposRemedios/editarPaciente/index.php
        }

        //Método para atualizar os dados do cadastro vindo do formulário de edição
        public function atualizar(){
                
            $EspecialidadesMedico = new EspecialidadesMedicosModel();
            $EspecialidadesMedicosDAO = new EspecialidadesMedicosDAO();
           
            $EspecialidadesMedico->__set('EPM_ID', $_POST['id']);                                          //especialidades_medicos
            $EspecialidadesMedico->__set('FK_ESPECIALIDADES_ESP_ID', $_POST['FK_ESPECIALIDADES_ESP_ID']);      //especialidades_medicos
            // $EspecialidadesMedico->__set('FK_MEDICOS_MED_ID', $_POST['FK_MEDICOS_MED_ID']);                    //especialidades_medicos
            // $EspecialidadesMedico->__set('USU_NOME', $_POST['USU_NOME']);                                      //usuarios
            // $EspecialidadesMedico->__set('USU_NUMERO_CELULAR', $_POST['USU_NUMERO_CELULAR']);                  //usuarios (Whatsapp)
            // $EspecialidadesMedico->__set('USU_NUMERO_RESIDENCIA', $_POST['USU_NUMERO_RESIDENCIA']);            //usuarios
            // $EspecialidadesMedico->__set('ESP_NOME', $_POST['ESP_NOME']);                                      //especialidades
            // $EspecialidadesMedico->__set('MED_EMAIL_PROFISSIONAL', $_POST['MED_EMAIL_PROFISSIONAL']);          //medicos
            // $EspecialidadesMedico->__set('MED_TELEFONE_PROFISSIONAL', $_POST['MED_TELEFONE_PROFISSIONAL']); 

            $EspecialidadesMedicosDAO->alterar($EspecialidadesMedico); //Passando o Objeto para o método Alterar de PacienteDAO

            header('Location: /EspecialidadesMedicas'); //redireciona para /pacientes após alteração               
        
        }

        //Método para Excluir um cadastro do Tipo de Remédio
        public function excluir()
        {
            $EspecialidadesMedicosDAO = new EspecialidadesMedicosDAO(); 
            if(isset($_GET['id'])){
                $EspecialidadesMedicosDAO->excluir($_GET['id']); //Pega o ID do Tipo de Remédio a ser excluido, aciona o médoto excluir de TiposRemediosDAO
                header('Location: /EspecialidadesMedicas'); //redireciona para /TipsoRemedios após exclusão
            }    
        }

        // //Mensagens de Alerta personalizadas para cada método
        // public function msgs(){     
            
        //     if(isset($_GET['msg'])){
                
        //         if($_GET['msg'] == 'cadastro-sucesso')
        //         {
        //             $msg = "Cadastro do Especialidades Medico realizado com sucesso!";
        //         }
        //         if($_GET['msg'] == 'editar-sucesso')
        //         {
        //             $msg = "Especialidades Medico atualizado com sucesso!";
        //         }
        //         if($_GET['msg'] == 'exclusao-sucesso')
        //         {
        //             $msg = "Especialidades Medico excluído com sucesso!";
        //         }
                
        //         $this->getView()->msg = $msg;
        //     } else {
        //         $this->getView()->msg = '' ;
        //     }

        //     $this->render('msgs', 'EspecialidadesMedico', '');
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