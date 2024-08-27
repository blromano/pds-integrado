<?php

$servername = "localhost";
$usuario = "root";
$senha = "";
$dname = "banco";

try {
    $banco = new PDO("mysql:host=$servername;dbname=$usuarios", $usuario, $senha);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro banco de dados: " . $e->getMessage() . "<br/>";
}
?>

