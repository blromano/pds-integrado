<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "";
	try 
	{
		$conn = new PDO("mysql:host=$servername;dbname=BANCO_MSSJ", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 
	catch (PDOException $e) 
	{
		echo "Connection failed: " . $e->getMessage();
	}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>      
	<?php

	
	$tipo = rand(1,10000);
		 $stmt = $conn->prepare("INSERT INTO denuncias (DEN_TIPO_DENUNCIA, DEN_MOTIVO, DEN_CODIGO, DEN_CODIGO_COM_PUB_REC, FK_USUARIOS_USU_COD_DENUNCIADO,FK_USUARIOS_USU_COD_DENUNCIOU) VALUES ('1', '2',null,'.$tipo.','4','4');");
					$stmt->execute();
	
			echo "<script language='javascript' type='text/javascript'>alert('PUBLICACAO DENUNCIADA!');window.location.href='?mod=rsocial';</script>";    
	
       
	?>
    </body>
</html>
