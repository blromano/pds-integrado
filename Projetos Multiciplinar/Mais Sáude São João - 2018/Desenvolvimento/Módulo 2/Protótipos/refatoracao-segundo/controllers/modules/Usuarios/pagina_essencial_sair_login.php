<?php
session_start();
include (CLASS_PATH . 'DAO/usuariosDAO.php');
$objUSU = new usuariosDAO();

//VALIDAR O USUÁRIO
if ($_SESSION['logado'] == "sim") { // se ele tiver mesmo essa sessao(que foi passada a hora que ele logou) ele vai ficar na page
    $objUSU->UsuarioLogado($_SESSION['usuario_id']); // PASSEI O ID PRA FUNCIONAR O SELECT ALL 
    $timeout = 1800; // Tempo da sessao em segundos ( 30 min vai desconectar o cara)
    // Verifica se existe o parametro timeout
    if (isset($_SESSION['timeout'])) {
        // Calcula o tempo que ja se passou desde a cricao da sessao
        $duracao = time() - (int) $_SESSION['timeout'];

        // Verifica se ja expirou o tempo da sessao
        if ($duracao > $timeout) {
            // Destroi a sessao e cria uma nova
             header("location:../../../PhpProject7/index.php?mod=usuarios&sub=login");
            session_destroy();
            session_start();
        }
    }
    // Atualiza o timeout.
    $_SESSION['timeout'] = time();
} else {
    $_SESSION['login_incorreto'] = "<div class='alert alert-danger col-md-6' style='margin-left: 25%'>Pagina não encontrada!</div>";
    header("location:../../../PhpProject7/index.php?mod=usuarios&sub=login");
}

echo "Olá " . $_SESSION['nome_usuario'] . " , Bem vindo <br>";
?>