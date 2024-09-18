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
		if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) 
		{
			echo 'Você enviou o arquivo: <strong>' . $_FILES[ 'arquivo' ][ 'name' ] . '</strong><br />';
			echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ 'arquivo' ][ 'type' ] . ' </strong ><br />';
			echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'arquivo' ][ 'tmp_name' ] . '</strong><br />';
			echo 'Seu tamanho é: <strong>' . $_FILES[ 'arquivo' ][ 'size' ] . '</strong> Bytes<br /><br />';
		 
			$arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
			$nome = $_FILES[ 'arquivo' ][ 'name' ];
		 
			// Pega a extensão
			$extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
		 
			// Converte a extensão para minúsculo
			$extensao = strtolower ( $extensao );
		 
			// Somente imagens, .jpg;.jpeg;.gif;.png
			// Aqui eu enfileiro as extensões permitidas e separo por ';'
			// Isso serve apenas para eu poder pesquisar dentro desta String
			if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) 
			{
				// Cria um nome único para esta imagem
				// Evita que duplique as imagens no servidor.
				// Evita nomes com acentos, espaços e caracteres não alfanuméricos
				$novoNome = uniqid ( time () ) . '.' . $extensao;
		 
				// Concatena a pasta com o nome
				$destino = 'assets/images/rede_social/images/ ' . $novoNome;
				
		 
				// tenta mover o arquivo para o destino
				if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) 
				{
					$sql1 = "UPDATE publicacoes SET PUB_IMAGEM = '$destino' WHERE pub_codigo = ". $_POST['cod_pub'];
					$stmt = $conn->prepare($sql1);
					$stmt->execute();
				
					echo ' < img src = "' . $destino . '" />';
				}
				else
				{
					echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
				}
			}
			else
			{
				echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
			}
		}
		if ( isset( $_FILES[ 'video' ][ 'name' ] ) && $_FILES[ 'video' ][ 'error' ] == 0 ) 
		{
			echo 'Você enviou o video: <strong>' . $_FILES[ 'video' ][ 'name' ] . '</strong><br />';
			echo 'Este video é do tipo: <strong > ' . $_FILES[ 'video' ][ 'type' ] . ' </strong ><br />';
			echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'video' ][ 'tmp_name' ] . '</strong><br />';
			echo 'Seu tamanho é: <strong>' . $_FILES[ 'video' ][ 'size' ] . '</strong> Bytes<br /><br />';
		 
			$video_tmp = $_FILES[ 'video' ][ 'tmp_name' ];
			$video = $_FILES[ 'video' ][ 'name' ];
		 
			// Pega a extensão
			$extensao_video = pathinfo ( $video, PATHINFO_EXTENSION );
		 
			// Converte a extensão para minúsculo
			$extensao_video = strtolower ( $extensao_video );
		 
			// Somente imagens, .jpg;.jpeg;.gif;.png
			// Aqui eu enfileiro as extensões permitidas e separo por ';'
			// Isso serve apenas para eu poder pesquisar dentro desta String
			if ( strstr ( '.mp4; .mov', $extensao_video ) ) 
			{
				// Cria um nome único para esta imagem
				// Evita que duplique as imagens no servidor.
				// Evita nomes com acentos, espaços e caracteres não alfanuméricos
				$nome_video = uniqid ( time () ) . '.' . $extensao;
		 
				// Concatena a pasta com o nome
				$destino_video = 'assets/images/rede_social/videos/ ' . $nome_video;
				
		 
				// tenta mover o arquivo para o destino
				if ( @move_uploaded_file ( $video_tmp, $destino_video ) ) 
				{
					$sql1 = "UPDATE publicacoes SET PUB_VIDEO = '$destino_video' WHERE pub_codigo = ". $_POST['cod_pub'];
					$stmt = $conn->prepare($sql1);
					$stmt->execute();
				}
				else
				{
					echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
				}
			}
			else
			{
				echo 'Você poderá enviar apenas arquivos "*.MP4;*.MOV"<br />';
			}
		}
		
		if (isset($_POST["cod_pub"]))
		{
			$sql = "UPDATE publicacoes SET PUB_TEXTO = '".$_POST['text_pub']."' WHERE PUB_CODIGO = ".$_POST['cod_pub'];
			$stmt = $conn->prepare($sql);	
			$stmt->execute();
			echo "<script language='javascript' type='text/javascript'>alert('PUBLICAÇÃO EDITADA!');window.location.href='?mod=rsocial';</script>";    
		}  
		else
		{
			echo "<script language='javascript' type='text/javascript'>alert('ERRO NO CODIGO!');window.location.href='?mod=rsocial';</script>"; 
		} 
  ?>
	</body>
</html>