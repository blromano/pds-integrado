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
            if(isset($_POST["conteudo"]))
            {        
                $pub_imagem = null;
                $pub_video = null;
                $pub_data_hora_publicacao = date("Y-m-d H:i:s");
                $pub_texto = $_POST["conteudo"];
                $usu_codigo = 1;
                if(isset($_FILES['arquivo']['name'])&& $_FILES['arquivo']['error'] == 0) 
                {
                    $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
                    $nome = $_FILES['arquivo']['name'];
                    $erro = $config = array();
                    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );			 
                    $extensao = strtolower ( $extensao );
                    if(strstr('.jpg;.jpeg;.gif;.png', $extensao)) 
                    {
                        $novoNome = uniqid(time()).'.'.$extensao;
                        $destino = 'assets/images/rede_social/images/'.$novoNome;
                        if(@move_uploaded_file($arquivo_tmp, $destino)) 
                        {
                            $pub_imagem = $destino;
                            if(isset($_FILES['video']['name' ] ) && $_FILES[ 'video' ][ 'error' ] == 0 ) 
						{
							echo 'Você enviou o video: <strong>' . $_FILES[ 'video' ][ 'name' ] . '</strong><br />';
							echo 'Este video é do tipo: <strong > ' . $_FILES[ 'video' ][ 'type' ] . ' </strong ><br />';
							echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'video' ][ 'tmp_name' ] . '</strong><br />';
							echo 'Seu tamanho é: <strong>' . $_FILES[ 'video' ][ 'size' ] . '</strong> Bytes<br /><br />';
						
							$video_tmp = $_FILES[ 'video' ][ 'tmp_name' ];
							$nome_video = $_FILES[ 'video' ][ 'name' ];

							$erro = $config = array();

							// Pega a extensão
							$extensao_video = pathinfo ($nome_video, PATHINFO_EXTENSION );
						 
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
								$newNome_video = uniqid(time()).'.'.$extensao_video;

								// Concatena a pasta com o nome
								$destino_video = 'assets/images/rede_social/videos/' . $newNome_video;

								// tenta mover o arquivo para o destino
								if ( @move_uploaded_file ( $video_tmp, $destino_video ) ) 
								{
									echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
									echo ' < img src = "' . $destino . '" />';
									echo "<script language='javascript' type='text/javascript'>alert('MENSAGEM CADASTRADA COM FOTO E VIDEO!');window.location.href='?mod=rsocial';</script>";   
									$pub_video = $destino_video;
									$stmt = $conn->prepare("INSERT INTO publicacoes (PUB_VIDEO, PUB_IMAGEM, PUB_DATA_HORA_PUBLICACAO, PUB_TEXTO, FK_USUARIOS_USU_CODIGO) VALUES ('".$pub_video."', '".$pub_imagem."', '".$pub_data_hora_publicacao."', '".$pub_texto."', ".$usu_codigo.");");
									$stmt->execute();
							
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
						else
						{
							$stmt = $conn->prepare("INSERT INTO publicacoes (PUB_VIDEO, PUB_IMAGEM, PUB_DATA_HORA_PUBLICACAO, PUB_TEXTO, FK_USUARIOS_USU_CODIGO) VALUES ('".$pub_video."', '".$pub_imagem."', '".$pub_data_hora_publicacao."', '".$pub_texto."', ".$usu_codigo.");");
							$stmt->execute();
							echo "<script language='javascript' type='text/javascript'>alert('MENSAGEM CADASTRADA COM FOTO SEM VIDEO!');window.location.href='?mod=rsocial';</script>";     
						}
				
					}
					else
					{
						echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
					}
				}
				else
				{
					echo 'Você poderá enviar apenas arquivos "*.mp4;*.mov" utilizando o botão de enviar vídeos!<br />';
				}
			}
			else
			{
				if ( isset( $_FILES[ 'video' ][ 'name' ] ) && $_FILES[ 'video' ][ 'error' ] == 0 ) 
				{
					echo 'Você enviou o video: <strong>' . $_FILES[ 'video' ][ 'name' ] . '</strong><br />';
					echo 'Este video é do tipo: <strong > ' . $_FILES[ 'video' ][ 'type' ] . ' </strong ><br />';
					echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'video' ][ 'tmp_name' ] . '</strong><br />';
					echo 'Seu tamanho é: <strong>' . $_FILES[ 'video' ][ 'size' ] . '</strong> Bytes<br /><br />';

					$video_tmp = $_FILES[ 'video' ][ 'tmp_name' ];
					$nome_video = $_FILES[ 'video' ][ 'name' ];

					$erro = $config = array();

					// Pega a extensão
					$extensao_video = pathinfo ( $nome_video, PATHINFO_EXTENSION );
				 
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
						$newNome_video = uniqid(time()).'.'.$extensao_video;

						// Concatena a pasta com o nome
						$destino_video = 'assets/images/rede_social/videos/ ' . $newNome_video;

						// tenta mover o arquivo para o destino
						if ( @move_uploaded_file ( $video_tmp, $destino_video ) ) 
						{
							echo 'Arquivo salvo com sucesso em : <strong>' . $destino_video . '</strong><br />';
							echo ' < img src = "' . $destino_video . '" />';
							echo "<script language='javascript' type='text/javascript'>alert('MENSAGEM CADASTRADA SEM FOTO E COM VIDEO!');window.location.href='?mod=rsocial';</script>";   
							$pub_video = $destino_video;
							$stmt = $conn->prepare("INSERT INTO publicacoes (PUB_VIDEO, PUB_IMAGEM, PUB_DATA_HORA_PUBLICACAO, PUB_TEXTO, FK_USUARIOS_USU_CODIGO) VALUES ('".$pub_video."', '".$pub_imagem."', '".$pub_data_hora_publicacao."', '".$pub_texto."', ".$usu_codigo.");");
							$stmt->execute();
					
						}
						else
						{
							echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
						}
					}
					else
					{
						echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png" utilizando o botão de enviar imagem!<br />';
					}
				}
				else
				{
					$stmt = $conn->prepare("INSERT INTO publicacoes (PUB_VIDEO, PUB_IMAGEM, PUB_DATA_HORA_PUBLICACAO, PUB_TEXTO, FK_USUARIOS_USU_CODIGO) VALUES ('".$pub_video."', '".$pub_imagem."', '".$pub_data_hora_publicacao."', '".$pub_texto."', ".$usu_codigo.");");
					$stmt->execute();
					echo "<script language='javascript' type='text/javascript'>alert('MENSAGEM CADASTRADA SEM FOTO SEM VIDEO!');window.location.href='?mod=rsocial';</script>";        
				}
		
			}
		}  
        else
        {
            echo "<script language='javascript' type='text/javascript'>alert('VERIFIQUE SE ESCREVEU UMA MENSAGEM!');window.location.href='?mod=rsocial';</script>";    
        }	
	?>
    </body>
</html>
