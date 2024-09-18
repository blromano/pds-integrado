<?php
session_start();
require_once('../../conexao/request.class.php');

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    $id = $_SESSION['id'];

    $nome = $_POST['nome_empresa'];
    $telefone = $_POST['telefone'];
    $ende = $_POST['endereco'];
    $desc = $_POST['desc_empresa'];
    $cnpj = $_POST['cnpj'];
    $foto = $_POST['foto'];
    $id_micro = $_POST['id_micro'];

    $fb = $_POST['facebook'];
	$insta = $_POST['instagram'];
	$tt = $_POST['twitter'];

	$r_sociais = "$fb, $insta, $tt";


    $conexao = new Receita();
   	$microcervejaria = $conexao->infoMicrocervejaria($id_micro);

    if ($microcervejaria->FK_USUARIOS_USU_ID == $id) {
        $info = $conexao->altMicrocervejaria($nome, $telefone, $ende, $desc, $r_sociais, $cnpj, $foto, $id_micro);
        header("Location: index.php?alt=1");

    }else{
        header("Location: index.php?alt=0");
    }



}else {
    header("Location: ../../usuario/index.php");
}
?>