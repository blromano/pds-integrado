<?php
    require_once VIEWS_PATH."modules/Rede_Social/Conexao.php";
    $conn = new Conexao();
    $conn = $conn->getConexao();
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>    
	<?php
		

		if (isset($_POST["codigo"]))
		{
			$sql = "UPDATE comentarios SET COM_CAMPO_TEXTO = '".$_POST['texto']."' WHERE COM_CODIGO = ".$_POST['codigo'];
			$stmt = $conn->prepare($sql);	
			$stmt->execute();
			echo "<script language='javascript' type='text/javascript'>alert('COMENTARIO EDITADO!');window.location.href='?mod=rsocial';</script>";    
		}  
		else
		{
			echo "<script language='javascript' type='text/javascript'>alert('ERRO NO CODIGO!');window.location.href='?mod=rsocial';</script>"; 
		} 
  ?>
	</body>
</html>