<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=TEMPLATE", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully (CONECTADO COM SUCESSO)";
} catch (PDOException $e) {
    //echo "Connection failed: " . $e->getMessage();
}

if(isset($_GET['acao']) ){
    if($_GET['acao'] == 'add'){
        $id = intval($_GET['id']);
        $stmt1 = $conn->prepare("DELETE FROM POST WHERE ID = " . $id.";");
        $stmt1->execute();  
        echo "<script language='javascript' type='text/javascript'>alert('Deletado com sucesso!');window.location.href='index.php';;</script>"; 
    }
}
?>


