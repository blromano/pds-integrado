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
		if (isset($_POST["id_comentario"]))
		{
			$query_delete = "DELETE FROM comentarios WHERE COM_CODIGO = ".$_POST['id_comentario'];
			
			$stmt = $conn->prepare($query_delete);
			$stmt->execute();
			echo "<script language='javascript' type='text/javascript'>alert('COMENTÁRIO EXCLUIDO!');window.location.href='?mod=rsocial';</script>";    
		}  
        else
        {
            echo "<script language='javascript' type='text/javascript'>alert('ERRO NO CODIGO!');window.location.href='?mod=rsocial';</script>";   
        }	
	?>
    </body>
</html>
