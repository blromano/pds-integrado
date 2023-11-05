<?php

include_once '../../../dao/mod03/ArquivoPcdImportadoDAO.php';
include_once '../../../dao/mod03/ConectarBD.php';
include_once '../../../modelo/mod03/Medicao.php';
include_once '../../../modelo/mod03/ArquivoPcdImportado.php';
include_once '../../../dao/mod03/MedicaoDAO.php';
include_once '../../../modelo/mod03/RetornoImportarArquivoMedicao.php';
require_once '../../../modelo/mod01/Usuario.php';
require_once '../../../modelo/mod01/UsuarioLogin.php';


session_start();

if(!isset($_SESSION['user'])){
    session_destroy();
    header('location:../../mod01/index1.php');
    } else{
    if($_SESSION['user']->getNivelAcesso() != 4) {
       
       switch ($_SESSION['user']->getNivelAcesso()) {
      
        case 1:
            header('Location: ../../mod01/indexNivel1.php');
            break;
        case 2:
            header('Location: ../../mod01/indexNivel2.php');
            break;
        case 3:
            header('Location: ../../mod01/indexNivel3.php');
            break;
        case 4:
            header('Location: ../../mod01/indexNivel4.php');
            break;      
        default:
            unset($_SESSION['user']); 
            session_destroy();
            header('location:../../mod01/index1.php'); 
            break;
        }

    }
}


if(isset($_POST['operacao'])){

    if($_POST['operacao'] == 'importar-arquivo'){

        $url = '../importacoes/' . $_POST['id-pcd'] . '-' . date('Ymd-His',time()) . '.txt';

        //move_uploaded_file($_FILES['file']['tmp_name'], $url);
        //$file = fopen($url, 'r');

        $file = fopen($_FILES['file']['tmp_name'], 'r');

        $dataArquivo = array();

        $ignorar = TRUE;

        while (!feof($file)){

            $linha = fgets($file);

            if($ignorar){
                $ignorar = FALSE;
                continue;
            }

            $dataArquivo[] = $linha;

        }

        $retorno = ArquivoPcdImportadoDAO::InserirArquivoMedicao($dataArquivo, basename($url), 1);

        $_SESSION['retorno']['titulo'] = $retorno->getTitulo();
        $_SESSION['retorno']['msg'] = $retorno->getMensagem();

        header("location: ImportarArquivosMedicao.php");

    }

}