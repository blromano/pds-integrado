<?php

      
                
   $tipo_cadastro = $_POST['tipo_cadastro'];
   if($tipo_cadastro == "patologia"){
       $tipo_cadastro = 1;
   }
   else if($tipo_cadastro == "medicacao"){
       $tipo_cadastro = 2;
   }

    $medicacao_patologia = $_POST['medicacao_patologia'];
    $hoje = date("Y/m/d");
    $codigo = 1;
    $con = new PDO("mysql:host=localhost;dbname=BANCO_MSSJ","root", "");

    $sql = "SELECT PAT_NOME FROM PATOLOGIAS_MEDICACOES WHERE PAT_NOME = '$medicacao_patologia' and FK_USUARIOS_USU_CODIGO = '$codigo'";

    $consulta = $con->prepare($sql);
    $consulta->execute();

     if($consulta->rowCount()>0){
        echo "<script>alert('NOME JA CADASTRADO PARA ESSE USUÁRIO.');</script>";
        echo "<script>location.href='../../../index.php?mod=usuarios&sub=patologias';</script>";
    }
    else{
        $stmt = $con->prepare("INSERT INTO PATOLOGIAS_MEDICACOES(PAT_NOME,PAT_TIPO,PAT_DATA_FIM,PAT_DATA_INICIO,FK_USUARIOS_USU_CODIGO ) "
        . "VALUES(?, ?, ?, ?, ?)");
        $stmt->bindParam(1,$medicacao_patologia);
        $stmt->bindParam(2,$tipo_cadastro);
        $stmt->bindParam(3,$hoje);
        $stmt->bindParam(4,$hoje);
        $stmt->bindParam(5,$codigo);
        $stmt->execute();

        echo "<script>alert('CADASTRO FEITO COM SUCESSO!');</script>";
        echo "<script>location.href='../../../index.php?mod=usuarios&sub=patologias';</script>";
    }

?>