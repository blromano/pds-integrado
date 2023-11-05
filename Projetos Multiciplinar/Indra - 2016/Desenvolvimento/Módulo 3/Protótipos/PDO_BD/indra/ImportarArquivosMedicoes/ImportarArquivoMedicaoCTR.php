<?php

include_once '../../dao/ArquivoPcdImportadoDAO.php';
include_once '../../dao/ConectarBD.php';
include_once '../../modelo/Medicao.php';
include_once '../../modelo/ArquivoPcdImportado.php';
include_once '../../dao/MedicaoDAO.php';
include_once '../../modelo/RetornoImportarArquivoMedicao.php';

session_start();

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