<?php
$servername = 'localhost';
$dname = 'aw2';
$user = 'root';
$password = '';
try {
    $banco = new PDO("mysql:host=$servername;dbname=$dname", $user, $password);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro banco de dados: " . $e->getMessage() . "<br/>";
}
?>