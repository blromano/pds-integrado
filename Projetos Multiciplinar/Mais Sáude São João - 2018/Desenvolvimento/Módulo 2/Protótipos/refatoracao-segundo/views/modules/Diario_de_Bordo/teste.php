<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "";
	try 
	{
		$conn = new PDO("mysql:host=$servername;dbname=DIARIO_BORDO", $username, $password);
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
			date_default_timezone_set('America/Sao_Paulo');
			$data = date("Y-m-d H:i:s");
			$sql = ("SELECT * FROM ALIMENTOS WHERE ALI_CODIGO = '".$_POST['txt'])."'";
			
			$resultado = $conn->prepare($sql);		
			$valor = 0;			
			$r = $resultado->execute();
		
			foreach($r->fetchAll() as $alimento)
			{
				$valor = $alimento['peso'];
			}
			$txt = $_POST['txt'];
			$alm = $_POST['alimentos'];
			$prc = $_POST['porcao'];
			$prc2 = $_POST['porcao2'];
			$codigoali = 0;
			$codigodib = 0;
			$stmt = $conn->prepare("INSERT INTO DB_ALIMENTOS (DBA_TOTAL_CALORIA, DBA_COD_REFEICAO, DBA_PORCAO_INTEIRA, DBA_PORCAO_FRACIONADA, DBA_HORARIO, ALI_CODIGO, DIB_CODIGO) VALUES (".(($prc + $prc2) * $valor).", '".$txt."', '".$prc."', '".$prc2."', ".$data.", ".$codigoali.", ".$codigodib.");");
			$stmt->execute();
			echo "<script language='javascript' type='text/javascript'>alert('COMENTÁRIO CADASTRADO!');</script>";    

	?>
    </body>
</html>
