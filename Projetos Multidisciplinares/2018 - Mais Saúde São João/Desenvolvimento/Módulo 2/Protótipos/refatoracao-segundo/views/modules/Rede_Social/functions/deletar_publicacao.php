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
		if (isset($_POST["filhodaputa"]))
		{
			$query_select = "SELECT PUB_IMAGEM, PUB_VIDEO FROM PUBLICACOES WHERE PUB_CODIGO = ".$_POST['filhodaputa'];
			$query_delete_com = "DELETE FROM comentarios WHERE FK_PUBLICACOES_PUB_CODIGO = ".$_POST['filhodaputa'];
			$query_delete_pub = "DELETE FROM publicacoes WHERE PUB_CODIGO = ".$_POST['filhodaputa'];
			foreach ($conn->query($query_select) as $row)
			{
				if($row['PUB_IMAGEM'] != null)
				{
					echo unlink($row['PUB_IMAGEM']);
				}
				if($row['PUB_VIDEO'] != null)
				{
					echo unlink($row['PUB_VIDEO']);
				}
			}
			$param = $conn->prepare($query_delete_com);
			$param->execute();
			
			$stmt = $conn->prepare($query_delete_pub);
			$stmt->execute();
			echo "<script language='javascript' type='text/javascript'>alert('PUBLICAÇÃO EXCLUIDA!');window.location.href='?mod=rsocial';</script>";    
		}  
        else
        {
            echo "<script language='javascript' type='text/javascript'>alert('ERRO NO CODIGO!');window.location.href='?mod=rsocial';</script>";   
        }	
	?>
    </body>
</html>
