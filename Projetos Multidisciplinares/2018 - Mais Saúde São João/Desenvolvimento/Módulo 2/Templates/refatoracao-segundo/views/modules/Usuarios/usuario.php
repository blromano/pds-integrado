
<?php

//toda página deverá ter isso!
session_start();
require_once '../../../../classes/DAO/usuariosDAO.php';
$objUSU = new usuariosDAO();

//VALIDAR O USUÁRIO
if ($_SESSION['logado'] == "sim") { // se ele tiver mesmo essa sessao(que foi passada a hora que ele logou) ele vai ficar na page
    $objUSU->UsuarioLogado($_SESSION['usuario_id']); // PASSEI O ID PRA FUNCIONAR O SELECT ALL 
} else {
    $_SESSION['login_incorreto'] = "<div class='container-fluid center'> <div class='row'> <div class='alert alert-danger'>Página não encontrada</div></div> </div>";
    header("Location: Login.php"); //vai mandar o cara embora
}

echo "Olá " . $_SESSION['nome_usuario'] . " , Bem vindo <br>";

echo "<button> <a href='?sair=sim'> SAIR </a> </button>";

//Deslogando 

if (!empty($_GET['sair'] == "sim")) { // se for igual a 1 ele vai sair
    $objUSU->SairUsuario();
}
?>

