<?php


$servername = "localhost";
$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=TEMPLATE", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //echo "Connection failed: " . $e->getMessage();
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        if (isset($_POST["conteudo"])){
                
                $cT = $_POST["conteudo"];
                $stmt = $conn->prepare("INSERT INTO POST (CONTEUDO) VALUES ('". $cT . "');");
                $stmt->execute();
                echo "<script language='javascript' type='text/javascript'>alert('MENSAGEM CADASTRADA!');window.location.href='index.php';;</script>";
                
                
        }  
          else{
              echo "<script language='javascript' type='text/javascript'>alert('VERIFIQUE SE ESCREVEU UMA MENSAGEM!');window.location.href='index.php';;</script>";
          }
        ?>
    </body>
</html>
