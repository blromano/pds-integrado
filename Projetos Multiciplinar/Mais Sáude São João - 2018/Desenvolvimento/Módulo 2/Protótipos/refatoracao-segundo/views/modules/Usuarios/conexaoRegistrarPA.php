<?php

      
                
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
   // $hoje = date("Y/m/d H:i");
    $codigo = 1;
    $con = new PDO("mysql:host=localhost;dbname=BANCO_MSSJ","root", "");
  
    $stmt = $con->prepare("INSERT INTO PESOS_ALTURAS (PEA_DATA_HORA_CADASTRO,PEA_PESO,PEA_ALTURA,FK_USUARIOS_USU_CODIGO ) "
    . "VALUES(NOW(), ?, ?, ?)");
   // $stmt->bindParam(1,$hoje);
    $stmt->bindParam(1,$peso);
    $stmt->bindParam(2,$altura);
    $stmt->bindParam(3,$codigo);
    $stmt->execute();

    echo "<script>alert('DADOS REGISTRADOS COM SUCESSO!');</script>";
    echo "<script>location.href='../../../index.php?mod=usuarios&sub=registrar';</script>";
    

?>