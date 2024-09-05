<?php

include_once 'conection.php';
$id = $_GET["id"];
$refeicao = $_GET["id2"];

 try {
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "DELETE FROM ALIMENTOS_DIARIOS_BORDO WHERE ALI_DIB_CODIGO = '$id'";

$conn->exec($sql);
    echo "Record deleted successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
header("location:?mod=dbordo&sub=inserir_refeicao&txt=".$refeicao);
?>