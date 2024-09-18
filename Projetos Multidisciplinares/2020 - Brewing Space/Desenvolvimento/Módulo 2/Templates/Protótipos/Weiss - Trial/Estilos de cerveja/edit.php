<?php
session_start();
require_once('../../conexao/request.class.php');

$_SESSION['id'] = 1;
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $id_estilo = $_POST['id_estilo'];

    $nome = $_POST['nome'];
    $abvmin = $_POST['abv_min'];
    $abvmax = $_POST['abv_max'];
    $ebcmin = $_POST['ebc_min'];
    $ebcmax = $_POST['ebc_max'];
    $ibu = $_POST['ibu_rec'];


    $conexao = new Receita();
   	$estilo = $conexao->infoEstilo($id_estilo);

    if (!empty($estilo)) {
        $info = $conexao->altEstilo($nome, $abvmin, $abvmax, $ebcmin, $ebcmax, $ibu, $id_estilo);
        header("Location: index.php?alt=1");

    }else{
        header("Location: index.php?alt=0");
    }



}else {
    header("Location: ../../usuario/index.php");
}
?>