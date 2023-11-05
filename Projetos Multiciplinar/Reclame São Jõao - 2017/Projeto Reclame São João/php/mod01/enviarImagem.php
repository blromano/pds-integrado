<?php

	class Upload{
		private $arquivo;
		private $altura;
		private $largura;
		private $pasta;

		function __construct($arquivo, $altura, $largura, $pasta){
			$this->arquivo = $arquivo;
			$this->altura  = $altura;
			$this->largura = $largura;
			$this->pasta   = $pasta;
		}
		
		private function getExtensao(){
			//retorna a extensao da imagem	
			$tmp = explode('.', $this->arquivo['name']);
			$extensao = end($tmp);
			return $extensao;
		}
		
		private function ehImagem($extensao){
			$extensoes = array('gif', 'jpeg', 'jpg', 'png');	 // extensoes permitidas
			if (in_array($extensao, $extensoes))
				return true;	
		}
		
		//largura, altura, tipo, localizacao da imagem original
		private function redimensionar($imgLarg, $imgAlt, $tipo, $img_localizacao){
			//descobrir novo tamanho sem perder a proporcao
			if ( $imgLarg > $imgAlt ){
				$novaLarg = $this->largura;
				$novaAlt = round( ($novaLarg / $imgLarg) * $imgAlt );
			}
			elseif ( $imgAlt > $imgLarg ){
				$novaAlt = $this->altura;
				$novaLarg = round( ($novaAlt / $imgAlt) * $imgLarg );
			}
			else // altura == largura
				$novaAltura = $novaLargura = max($this->largura, $this->altura);
			
			//redimencionar a imagem
			
			//cria uma nova imagem com o novo tamanho	
			$novaimagem = imagecreatetruecolor($novaLarg, $novaAlt);
			
			switch ($tipo){
				case 1:	// gif
					$origem = imagecreatefromgif($img_localizacao);
					imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0,
					$novaLarg, $novaAlt, $imgLarg, $imgAlt);
					imagegif($novaimagem, $img_localizacao);
					break;
				case 2:	// jpg
					$origem = imagecreatefromjpeg($img_localizacao);
					imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0,
					$novaLarg, $novaAlt, $imgLarg, $imgAlt);
					imagejpeg($novaimagem, $img_localizacao);
					break;
				case 3:	// png
					$origem = imagecreatefrompng($img_localizacao);
					imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0,
					$novaLarg, $novaAlt, $imgLarg, $imgAlt);
					imagepng($novaimagem, $img_localizacao);
					break;
			}
			
			//destroi as imagens criadas
			imagedestroy($novaimagem);
			imagedestroy($origem);
		}
		
		public function salvar(){									
			$extensao = $this->getExtensao();
			$arquivo2 = isset($_FILES['USU_FOTO_PERFIL'])?$_FILES['USU_FOTO_PERFIL']:"";
			if(isset($_FILES['USU_FOTO_PERFIL'])){
			$nome = $arquivo2['name'];
	}
			
			//gera um nome unico para a imagem em funcao do tempo
			$novo_nome = "cons_" . rand() . '.' . $extensao;
			
			//localizacao do arquivo 
			$destino = $this->pasta . $novo_nome;
			$_SESSION["USU_FOTO_PERFIL"] = $novo_nome;		
			//move o arquivo
			if (! move_uploaded_file($this->arquivo['tmp_name'], $destino)){
				
				if ($this->arquivo['error'] == 1)
					return "Tamanho excede o permitido";
				else
					$_SESSION["USU_FOTO_PERFIL"] = null;
					return "";
			}
				
			if ($this->ehImagem($extensao)){												
				//pega a largura, altura, tipo e atributo da imagem
				list($largura, $altura, $tipo, $atributo) = getimagesize($destino);

				// testa se é preciso redimensionar a imagem
				if(($largura > $this->largura) || ($altura > $this->altura))
					$this->redimensionar($largura, $altura, $tipo, $destino);
			}	
					
		}						
	}
?>
