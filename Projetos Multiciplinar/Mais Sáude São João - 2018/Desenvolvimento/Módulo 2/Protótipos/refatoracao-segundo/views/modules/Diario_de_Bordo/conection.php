<?php
$servername = "localhost";
$username = "root";
$password = "";
try {



    $conn = new PDO("mysql:host=$servername;dbname=BANCO_MSSJ", $username, $password);


    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully (CONECTADO COM SUCESSO)";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
