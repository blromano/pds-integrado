<?php
session_start();

$_SESSION["CARDAPIO_USUARIO_ID"] = $_POST["CARDAPIO_USUARIO_ID"];

header("location:../../../?mod=palimentar&sub=inserir_cardapio");
//echo $_SESSION["CARDAPIO_USUARIO_ID"];


