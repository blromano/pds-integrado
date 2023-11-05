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
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <form id='form' action='' method='post'>
        <input type='text' name='novo' placeholder='Atualize o conteudo da publicação:'>
        <input type='submit' value='Editar!' name='editar'>
    </form>
    </body>
</html>
<?php
if (isset($_POST["novo"]) && ($_POST["novo"] != "")) {
        $novoP = $_POST["novo"];
        $stmt1 = $conn->prepare("UPDATE POST SET CONTEUDO='".$novoP."' WHERE id='".$id."';");
        $stmt1->execute();  
        echo "<script language='javascript' type='text/javascript'>alert('Editado com sucesso!');window.location.href='index.php';;</script>"; 
}   
?>