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
       date_default_timezone_set('America/Sao_Paulo');
        if (isset($_POST["comentario"]))
        {
			$com_data_hora_comentario = date("Y-m-d H:i:s");
            $com_campo_texto = $_POST["comentario"];
            $pub_codigo = $_POST["id_pub"];
            $usu_codigo = 1;			
			$stmt = $conn->prepare("INSERT INTO comentarios (COM_DATA_HORA, COM_CAMPO_TEXTO, FK_PUBLICACOES_PUB_CODIGO, FK_USUARIOS_USU_CODIGO) VALUES ('".$com_data_hora_comentario."', '".$com_campo_texto."', '".$pub_codigo."', ".$usu_codigo.");");
			$stmt->execute();
			echo "<script language='javascript' type='text/javascript'>alert('COMENTÁRIO CADASTRADO!');window.location.href='?mod=rsocial';</script>";  

		}  
        else
        {
            echo "<script language='javascript' type='text/javascript'>alert('VERIFIQUE SE ESCREVEU UM COMENTÁRIO!');window.location.href='?mod=rsocial';</script>"; 
        }	
	?>
    </body>
</html>
