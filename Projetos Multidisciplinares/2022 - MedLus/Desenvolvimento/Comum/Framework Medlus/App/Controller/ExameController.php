<?php

namespace App\Controller; //Faz parte do Namespace App\Controller

use FW\Controller\Action; //utilizando outros namespaces, dessa forma não precisamos dar includes em arquivos
use App\Model\ExameModel;
use App\DAO\ExameDAO;
use Error;

class ExameController extends Action
{


    //Método para Carregar a View do Formulário de Cadastro de exame
    public function solicitar()
    {
        $title = "Solicitação de Exame";

        //para passar valores para a VIEW
        $this->getView()->title = $title; // passa para a View o valor da variável $title utilizado na linha 14 do arquivo dashboard.php da pasta View
        $this->render('solicitarExame/index', 'dashboard'); //Carrega o arquivo que esta dentro da pasta View/exame/solicitarExame/index
    }

    //Método de Inserção da Solicitação de Exame
    public function inserir()
    {
        //$user_id = $_SESSION['id'];
        //$user_id = 1;
        $pac_id = 1;

        /*

            CONSULTA INTERNA E EXTERNA

            FALTA DESCRICAO
            URL NULL

        */

        $exame = new ExameModel();
        $exameDAO = new ExameDAO();
        echo "TESTE";
        if (!isset($_POST['EXA_NOME']) || !isset($_POST['EXA_DATA_MARCADA']) || !isset($_FILES['EXA_URL_GUIA_MEDICA']) || !isset($_POST['EXA_SETOR_ATENDIMENTO']) || !isset($_POST['EXA_HORARIO'])) { //Verificando se os dados que estão vindo do formulário existem
            header('Location: /exame/solicitar?status=203'); //Redirecionando caso os dados não existam
            die(); //Matando o processo
        }

        date_default_timezone_set('America/Sao_Paulo');
        $exame->__set('EXA_DATA_CRIACAO',  date('Y-m-d H:m:s'), time());
        $exame->__set('EXA_STATUS', 0); // ZERO PORQUE É PENDENTE
        $exame->__set('EXA_NOME', $_POST['EXA_NOME']);
        $exame->__set('EXA_DATA_MARCADA', $_POST['EXA_DATA_MARCADA']);
        $exame->__set('EXA_SETOR_ATENDIMENTO', $_POST['EXA_SETOR_ATENDIMENTO']);
        $exame->__set('EXA_HORARIO', $_POST['EXA_HORARIO']);
        $exame->__set('FK_PACIENTES_PAC_ID', $pac_id);

        $message = '';

        if (isset($_FILES['EXA_URL_GUIA_MEDICA']) && $_FILES['EXA_URL_GUIA_MEDICA']['error'] === UPLOAD_ERR_OK) {
            // get details of the uploaded file
            $arquivoTemporario = $_FILES['EXA_URL_GUIA_MEDICA']['tmp_name'];
            $nomeArquivo = $_FILES['EXA_URL_GUIA_MEDICA']['name'];
            $fileSize = $_FILES['EXA_URL_GUIA_MEDICA']['size']; // in bytes
            $nomeArquivoCmps = explode(".", $nomeArquivo);
            $fileExtension = strtolower(end($nomeArquivoCmps));

            /* O nome do arquivo está sendo salvo da seguinte maneira: 
                DATA DE CRIAÇÃO - HASH DO NOME DO EXAME - "-" - "PACID" ID DO PACIENTE "PACID" 
            */
            $novoNomeArquivo = date("Ymd") . '-' . md5($_POST['EXA_NOME']) . '-PACID' . $pac_id . 'PACID' . '.' . $fileExtension;

            // check if file has one of the following extensions
            $extensoesPermitidas = array('jpg', 'png', 'pdf', 'jpeg');

            if (in_array($fileExtension, $extensoesPermitidas)) {
                $uploadDir = './resources/upload/guiamedica/';
                $dest_path = $uploadDir . $novoNomeArquivo;

                if (move_uploaded_file($arquivoTemporario, $dest_path)) {
                    $message = 'File is successfully uploaded.';
                } else {
                    header('Location: /exame/solicitar?status=203');
                    die();
                }
            } else {
                header('Location: /exame/solicitar?status=203');
                die();
            }
        } else {
            header('Location: /exame/solicitar?status=203');
            die();
        }

        $exame->__set('EXA_URL_GUIA_MEDICA', $novoNomeArquivo);
        $exameDAO->inserir($exame);

        header('Location: /exame/meusexames');
    }

   //Método para carregar a View de Listagem dos exames do paciente
   public function listarMeusExames()
   {
       //$user_id = $_SESSION['id'];
       $user_id = 1;

       $title = "Meus Exames";
       //para passar valores para a VIEW
       $this->getView()->title = $title;

       $exameDAO = new ExameDAO();
       $exames = $exameDAO->listarPorIdPaciente($user_id);
       $this->getView()->exames = $exames;
       $this->render('meusExames/index', 'dashboard'); //Carrega  o arquivo da pasta View/paciente/index.php
   }

   public function excluirMeuExame() {
        //$user_id = $_SESSION['id']; - através do id do usuário da ssession pegar o usuario do paciente
        $pac_id = 1;

        $title = "Excluir Exames";
        $this->getView()->title = $title;
        $exameDAO = new exameDAO();

        if (isset($_GET['id'])) {
            $exame = $exameDAO->buscarPorId($_GET['id']);
            if($exame) {
                if($exame->__get('FK_PACIENTES_PAC_ID') == $pac_id) {
                    $exameDAO->excluir($_GET['id']); //Pega o ID do Paciente a ser excluido, aciona o médoto excluir de exameDAO
                } else {
                    header('Location: /error404');
                    die();
                }
            } else {
                header('Location: /error404');
                die();
            }
        }
        
        header('Location: /exame/meusexames'); //redireciona para /pacientes após exclusão
    }


    // Metodo de Detalhar o EXAME
    public function detalhar()
    {
        $exame = new ExameModel();
        $exameDAO = new ExameDAO();
        if (isset($_GET['id'])) {
            $exame = $exameDAO->buscarPorIdNome($_GET['id']);
            $this->getView()->exame = $exame;
        } else {
            $this->getView()->exame = "";
        }
        $title = "Detalhamento do Exame";
        $this->getView()->title = $title;
        $this->render('detalharexame/index', 'dashboard',' ');
    }

    // Método de VIEW Autorizar o EXAME

    public function ViewAutorizarExame(){
        $exame = new ExameModel();
        $exameDAO = new ExameDAO();
        if(isset($_GET['id'])){
            $exame = $exameDAO->buscarPorId($_GET['id']);
            $title = "Autorizar ".$exame->__get("EXA_NOME");
            $this->getView()->title = $title;
            $this->getView()->exame = $exame;
            $this->render('autorizarexame/index', 'dashboard', '');
        }
        
    }

    // Método de Autorizar o EXAME

    public function autorizarExame(){
        $exame = new ExameModel();
        $exameDAO = new ExameDAO(); 
        if(isset($_GET['id'])){
            $exame = $exameDAO->buscarPorId($_GET['id']);
            if(isset($_POST['username']) && $_POST['username'] != '' && isset($_POST['passwd']) && $_POST['passwd'] != ''){
                $exame->__set('EXA_STATUS', '1');
                $exameDAO->alt($exame);
                header("Location: ./listarexame?msg=Autorizado_com_Sucesso");
            }else{
                header('Location: ./listarexame?msg=Esqueceu_de_preencher_um_campo');
                die();
            }
            
        }else{
            header('Location: ./listarexame?msg=ID_não_encontrado');
            die();
        }    
    }


    
    // Método para carregar a View de Listagem de Exames da Secretária
    public  function listarExames()
    {
        $title = "Exames Cadastrados";
        $this->getView()->title = $title;
        $examesDAO = new ExameDAO();
        $exames = $examesDAO->listarTodosExames();
        $this->getView()->exames = $exames;
        $this->render('listarExames/index', 'dashboard', '');
    }
    
    //Método para Visualizar a Tela de Exclusão um Exame do Listar Exames
    public function ViewExcluir()
    {
        $title = "Excluir Exame";
        $this->getView()->title = $title;
        $exame = new ExameModel();
        $exameDAO = new ExameDAO();
        if(isset($_GET['id'])){
            $exame = $exameDAO->buscarPorId($_GET['id']);
            $this->getView()->exame = $exame;
            $this->render('excluirexame/index', 'dashboard', '');
        }    
    }
    
    // Excluir Exame
    public function excluirExame(){
        $exame = new ExameModel();
        $exameDAO = new ExameDAO(); 
        if(isset($_GET['id'])){
            $exame = $exameDAO->buscarPorId($_GET['id']);
            if(isset($_POST['username']) && $_POST['username'] != '' && isset($_POST['passwd']) && $_POST['passwd'] != ''){
                $exameDAO->excluir($exame->__get('EXA_ID'));
                header("Location: ./listarexame?msg=Excluido_com_Sucesso");
            }else{
                header('Location: ./listarexame?msg=Esqueceu_de_preencher_um_campo');
                die();
            }
        }else{
            header('Location: ./listarexame?msg=ID_não_encontrado');
            die();
        }    
    }

    
    // Método de Recusar o EXAME

    public function recusarExame(){
        $exame = new ExameModel();
        $exameDAO = new ExameDAO(); 
        if(isset($_GET['id'])){
            $exame = $exameDAO->buscarPorId($_GET['id']);
            if(isset($_POST['username']) && $_POST['username'] != '' && isset($_POST['passwd']) && $_POST['passwd'] != '' && isset($_POST['justificativa']) && $_POST['justificativa'] != ""){
                $exame->__set('EXA_STATUS', '0');
                $exameDAO->alt($exame);
                header("Location: ./listarexame?msg=Recusado_com_Sucesso");
            }else{
                header('Location: ./listarexame?msg=Esqueceu_de_preencher_um_campo');
                die();
            }
        }else{
            header('Location: ./listarexame?msg=ID_não_encontrado');
            die();
        }    
    }

    // Método de VIEW Recusar o EXAME

    public function ViewRecusarExame(){
        $exame = new ExameModel();
        $exameDAO = new ExameDAO();
        if(isset($_GET['id'])){
            $exame = $exameDAO->buscarPorId($_GET['id']);
            $title = "Recusar ".$exame->__get("EXA_NOME");
            $this->getView()->title = $title;
            $this->getView()->exame = $exame;
            $this->render('recusarexame/index', 'dashboard', '');
        }
    }

    // Upload de Resultado do Exame

    public function uploadExame(){
        $exame = new ExameModel();
        $exameDAO = new ExameDAO(); 
        if(isset($_GET['id'])){
            $exame = $exameDAO->buscarPorId($_GET['id']);
            if (isset($_FILES['resultado']) && $_FILES['resultado']['error'] === UPLOAD_ERR_OK){
                $uploadDirectory = './resources/upload/resultadoExame/';
                $fileExtensionAllowed = ['jpeg', 'txt', 'pdf', 'png', 'jpg'];
                $fileName = $_FILES['resultado']['name'];
                $fileSize = $_FILES['resultado']['size'];
                $fileTmpName  = $_FILES['resultado']['tmp_name'];
                $fileType = $_FILES['resultado']['type'];
                $fileExtension = strtolower(end(explode('.',$fileName)));
                $novoNomeArquivo = date("Ymd") . '-' . md5($exame->__get("EXA_NOME")) . '-res' . $exame->__get("USU_NOME") . '.' . $fileExtension;
                if (in_array($fileExtension, $fileExtensionAllowed)) {
                    if($exame->__get("EXA_RESULTADO_EXAME") == $novoNomeArquivo){
                        header('Location: ./detalharexame?id='.$exame->__get('EXA_ID').'&msg=Arquivo_ja_está_no_Banco');
                        die();
                    }else{
                        $uploadDir = './resources/upload/resultadoExame/';
                        $dest_path = $uploadDir . $novoNomeArquivo;
                        if(move_uploaded_file($fileTmpName, $dest_path)) {
                            $exame->__set("EXA_RESULTADO_EXAME", $novoNomeArquivo);
                            $exameDAO->result($exame);
                            header('Location: ./detalharexame?id='.$exame->__get('EXA_ID').'&msg=Upload_com_Sucesso');
                            die();
                        } else {
                            header('Location: ./detalharexame?id='.$exame->__get('EXA_ID').'&msg=Upload_Nao_Ocorreu');
                            die();
                        }
                    }
                }else{
                    header('Location: ./detalharexame?id='.$exame->__get('EXA_ID').'&msg=Tipo_De_Arquivo_Não_Suportado');
                    die();
                }
            }else{
                header('Location: ./detalharexame?id='.$exame->__get('EXA_ID').'&msg=Sem_Arquivo');
                die();
            }
        }else{
            header('Location: ./detalharexame?id='.$exame->__get('EXA_ID').'&msg=ID_não_encontrado');
            die();
        }    
    }

    // Download de Resultado do Exame
    
    public function downloadExame(){
        $exame = new ExameModel();
        $exameDAO = new ExameDAO();
        if(isset($_GET['id'])){
            $exame = $exameDAO->buscarPorId($_GET['id']);
            $res = $exame->__get("EXA_RESULTADO_EXAME");
            $dir = './resources/upload/resultadoExame/';
            $fileName = $dir.$res;
            $type = strtolower(end(explode('.',$fileName)));
            if(isset($res)){
                if(!file_exists($fileName)){
                    header('Location: ./detalharexame?id='.$exame->__get('EXA_ID').'&msg=Arquivo_Inexistente');
                    die();
                }else{
                    header("Content-type: $type");
                    header("Content-Disposition: attachment;filename=Resultado.".$type);
                    header("Content-Transfer-Encoding: binary"); 
                    header('Pragma: no-cache'); 
                    header('Expires: 0');
                    set_time_limit(0);
                    ob_clean();
                    flush();
                    readfile($fileName);
                }
            }else{
                header('Location: ./detalharexame?id='.$exame->__get('EXA_ID').'&msg=Nao_Possui_Resultado_No_Banco');
                die();
            }
        }else{
            header('Location: ./detalharexame?id='.$exame->__get('EXA_ID').'&msg=Não_Achou_ID');
            die();
        }
    }

    public function viewEditarSolicitacaoExame()
    {
        //$user_id = $_SESSION['id'];
        $pac_id = 1;

        $exame = new ExameModel();
        $exameDAO = new ExameDAO();

        if (isset($_GET['id'])) {
            $exame = $exameDAO->buscarPorId($_GET['id']);
            if ($exame) {
                if ($exame->__get('FK_PACIENTES_PAC_ID') == $pac_id) {
                    $this->getView()->exame = $exame;
                } else {
                    header('Location: /error404');
                    die();
                }
            } else {
                header('Location: /error404');
                die();
            }
        }

        $title = "Edição de Solicitação de  exames";
        //para passar valores para a VIEW
        $this->getView()->title = $title;
        $this->render('editarSolicitacaoExame/index', 'dashboard', ''); //Carrega o arquivo da pasta View/exame/editarSolicitacaoExame/index.php
    }

    public function editarSolicitacaoExame()
    {
        //$user_id = $_SESSION['id'];
        $pac_id = 1;

        $exame = new ExameModel();
        $exameDAO = new ExameDAO();
 
        if (!isset($_POST['EXA_ID']) || !isset($_POST['EXA_NOME']) || !isset($_POST['EXA_DATA_MARCADA']) || !isset($_POST['EXA_SETOR_ATENDIMENTO']) || !isset($_POST['EXA_HORARIO'])) { //Verificando se os dados que estão vindo do formulário existem
            header('Location: /exame/editarSolicitacaoExame?id=1&status=203'); //Redirecionando caso os dados não existam
            die(); //Matando o processo
        }

        date_default_timezone_set('America/Sao_Paulo');
        $exame->__set('EXA_DATA_CRIACAO',  date('Y-m-d H:m:s'), time());
        $exame->__set('EXA_STATUS', 0); // ZERO PORQUE É PENDENTE
        $exame->__set('EXA_ID', $_POST['EXA_ID']);
        $exame->__set('EXA_NOME', $_POST['EXA_NOME']);
        $exame->__set('EXA_DATA_MARCADA', $_POST['EXA_DATA_MARCADA']);
        $exame->__set('EXA_SETOR_ATENDIMENTO', $_POST['EXA_SETOR_ATENDIMENTO']);
        $exame->__set('EXA_HORARIO', $_POST['EXA_HORARIO']);
        $exame->__set('FK_PACIENTES_PAC_ID', $pac_id);


        // FALTA EXCLUIR O ARQUIVO ANTIGO :)
        /*
            Deixar o arquivo antigo, bug ou feature?
        */
        if (isset($_FILES['EXA_URL_GUIA_MEDICA']) && $_FILES['EXA_URL_GUIA_MEDICA']['error'] === UPLOAD_ERR_OK) {
            // get details of the uploaded file
            $arquivoTemporario = $_FILES['EXA_URL_GUIA_MEDICA']['tmp_name'];
            $nomeArquivo = $_FILES['EXA_URL_GUIA_MEDICA']['name'];
            $fileSize = $_FILES['EXA_URL_GUIA_MEDICA']['size']; // in bytes
            $nomeArquivoCmps = explode(".", $nomeArquivo);
            $fileExtension = strtolower(end($nomeArquivoCmps));

            /* O nome do arquivo está sendo salvo da seguinte maneira: 
                DATA DE CRIAÇÃO - HASH DO NOME DO EXAME - "-" - "PACID" ID DO PACIENTE "PACID" 
            */
            $novoNomeArquivo = date("Ymd") . '-' . md5($_POST['EXA_NOME']) . '-PACID' . $pac_id . 'PACID' . '.' . $fileExtension;

            // check if file has one of the following extensions
            $extensoesPermitidas = array('jpg', 'png', 'pdf', 'jpeg');

            if (in_array($fileExtension, $extensoesPermitidas)) {
                $uploadDir = './resources/upload/guiamedica/';
                $dest_path = $uploadDir . $novoNomeArquivo;

                if (move_uploaded_file($arquivoTemporario, $dest_path)) {
                    $message = 'File is successfully uploaded.';
                } else {
                    header("Location: /exame/editarSolicitacaoExame?id=". $_POST['EXA_ID']."&status=203");
                    die();
                }
            } else {
                header("Location: /exame/editarSolicitacaoExame?id=". $_POST['EXA_ID']."&status=203");
                die();
            }

            $exame->__set('EXA_URL_GUIA_MEDICA', $novoNomeArquivo);
        }
        
        

        $exameDAO->editarSolicitacao($exame);
        header('Location: /exame/meusexames');
    }

    public function downloadGuia()
    {
        $user_id = 1; // isso será pego através do session posteriormente
        $pac_id = 1; // isso será pego através de algum dao do módulo 1

        if (!isset($_GET['guia'])) {
            header('Location: /error404');
            die();
        }

        $nomeDoArquivo = $_GET['guia'];
        $localDoArquivo = "./resources/upload/guiamedica/" . $nomeDoArquivo;

        if (!file_exists($localDoArquivo)) {
            header('Location: /error404');
            die();
        }

        $idPacienteArquivo = explode('PACID', $nomeDoArquivo)[1];

        if ($idPacienteArquivo != strval($pac_id)) {
            header('Location: /error404');
            die();
        }

        $extensao = explode('.', $nomeDoArquivo)[1];
        $nomeDoArquivoParaEnviar = "guiaMedica-" . explode("-", $nomeDoArquivo)[0] . $extensao;

        // Define informações necessárias no header
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: 0");
        header('Content-Disposition: attachment; filename="' . basename($nomeDoArquivoParaEnviar) . '"');
        header('Content-Length: ' . filesize($localDoArquivo));
        header('Pragma: public');

        //Clear system output buffer
        flush();

        // Envia o arquivo
        readfile($localDoArquivo);
    }

    public function validaAutenticacao(){}

}
