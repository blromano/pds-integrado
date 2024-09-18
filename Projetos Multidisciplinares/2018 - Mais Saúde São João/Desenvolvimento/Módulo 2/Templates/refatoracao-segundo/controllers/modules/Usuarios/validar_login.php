<?php
session_start();
require_once '../../../classes/DAO/usuariosDAO.php';
$objUSU = new usuariosDAO();
if(isset($_POST['btLogar'])){ // se o cara clicar no botão logar
	$objUSU->logarUsuario($_POST); //VAI ENVIAR VIA POST OS DADOS DOS FORM PARA A FUNCAO LOGAR USU na forma de um array
        
}
else{
    $_SESSION['login_incorreto'] = "<div class='alert alert-danger col-md-6' style='margin-left: 25%'>Pagina não encontrada!</div>";
   header("location:../../../index.php?mod=usuarios&sub=login");
}